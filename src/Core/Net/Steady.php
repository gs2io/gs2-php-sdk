<?php

// Steady（専用フリート）の基点。
//
// フリートは 1 つの名前（SteadyEndpoint、例 https://bs-dev.ap-northeast-1.dev.gen2.gs2io.com）で受け、
// REST は <steady>/<service>/... を使う。名前はフリートのノードへ直接解決される（間に ALB は無い）ので、
// フリートが手放した公開 IP に当たると SYN が落ちる。そのため Steady のときだけ接続段階に上限
// （Steady::CONNECT_TIMEOUT）を置き、接続段階の失敗（1 バイトも送っていない）だけは同じ要求をもう 1 回だけ送る。
// 送信後の失敗は届いたかもしれないので再送しない（非冪等要求の二重実行を作らない）。
//
// ★PHP SDK には WebSocket セッションが無いので、WebSocket の基点は扱わない（Go の steadyWebSocketUrl 相当は無し）。

namespace Gs2\Core\Net;


use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class Steady {

    /**
     * Steady の基点への接続段階（DNS / TCP 接続 / TLS handshake）の上限（秒）。
     * フリートが手放した公開 IP は SYN を落とすので、OS 既定（1〜2 分）に任せない。
     * Guzzle の connect_timeout として Steady 宛の要求だけに置く（要求全体の timeout は置かない ――
     * GS2 の長い API を殺すため）。
     */
    const CONNECT_TIMEOUT = 5;

    /**
     * TLS handshake / 証明書検証の失敗を表す cURL の errno。
     * 1 バイトも送っていないので再送の対象だが、Guzzle は 35 以外を「応答の無い RequestException」で返すので
     * errno で見分ける。
     */
    const TLS_HANDSHAKE_CURL_ERRNOS = [
        35, // CURLE_SSL_CONNECT_ERROR
        51, // CURLE_PEER_FAILED_VERIFICATION
        53, // CURLE_SSL_ENGINE_NOTFOUND
        54, // CURLE_SSL_ENGINE_SETFAILED
        58, // CURLE_SSL_CERTPROBLEM
        59, // CURLE_SSL_CIPHER
        60, // CURLE_SSL_CACERT
        77, // CURLE_SSL_CACERT_BADFILE
        83, // CURLE_SSL_ISSUER_ERROR
        90, // CURLE_SSL_PINNEDPUBKEYNOTMATCH
        91, // CURLE_SSL_INVALIDCERTSTATUS
    ];

    /**
     * 末尾の / と空白を落とす。空なら null（= 共有クラウド）。
     *
     * @param string|null $endpoint
     * @return string|null
     */
    public static function normalizeEndpoint(?string $endpoint): ?string {
        if ($endpoint === null) {
            return null;
        }
        $normalized = rtrim(trim($endpoint), '/');
        return $normalized === '' ? null : $normalized;
    }

    /**
     * Steady の基点配下のサービスの接続先（<steady>/<service>）。
     *
     * @param string $steady 正規化済みの基点
     * @param string $service サービス名（例: "account"）
     * @return string
     */
    public static function serviceUrl(string $steady, string $service): string {
        return $steady . '/' . $service;
    }

    /**
     * 生成クライアントが共有クラウドの template（Gs2RestSession::$endpointHost）から組んだ URL を
     * Steady 配下（<steady>/<service>/...）へ読み替える。
     *
     * ★生成物（src/<Service>/...）は静的な template を直に str_replace するので、読み替えは送信の直前に行う。
     * ★template から組まれていない URL（アプリが独自に差し替えた宛先）は触らない ―― これが PHP での
     *   「サービスごとの override ＞ SteadyEndpoint ＞ 共有クラウドの template」の優先順になる。
     *
     * @param string|null $steady Steady の基点（null なら共有クラウド。URL は素通し）
     * @param string $template {service} / {region} を含む共有クラウドの template
     * @param string $region リージョン
     * @param string $url 生成クライアントが組んだ URL
     * @return string
     */
    public static function rewriteUrl(?string $steady, string $template, string $region, string $url): string {
        $steady = self::normalizeEndpoint($steady);
        if ($steady === null || strpos($template, '{service}') === false) {
            return $url;
        }
        $pattern = preg_quote($template, '#');
        $pattern = str_replace(preg_quote('{region}', '#'), preg_quote($region, '#'), $pattern);
        $pattern = str_replace(preg_quote('{service}', '#'), '([^/?\\#]+)', $pattern);
        if (preg_match('#^' . $pattern . '((?:[/?\\#].*)?)$#', $url, $matched) !== 1) {
            return $url;
        }
        return self::serviceUrl($steady, $matched[1]) . $matched[2];
    }

    /**
     * 要求 URL が Steady の基点宛か（接続段階の上限と再送を付ける相手か）。
     *
     * @param string|null $steady
     * @param string $url
     * @return bool
     */
    public static function isSteadyUrl(?string $steady, string $url): bool {
        $steady = self::normalizeEndpoint($steady);
        if ($steady === null) {
            return false;
        }
        return $url === $steady || strpos($url, $steady . '/') === 0;
    }

    /**
     * 「1 バイトも送っていない」失敗か（DNS / TCP の接続拒否・接続タイムアウト / TLS handshake）。
     * これだけが再送の対象。
     *
     * Guzzle の ConnectException は cURL の接続系 errno（6 / 7 / 28 / 35 / 52）に付くが、
     * 52 CURLE_GOT_NOTHING は接続と送信が済んだ後の「応答が空」なので除く。
     * 28 CURLE_OPERATION_TIMEDOUT は Steady 宛の要求に要求全体の timeout を置かない（connect_timeout だけ）ので
     * 接続段階と判断できる。証明書検証の失敗は応答の無い RequestException で返るので errno で拾う。
     * 応答のある失敗（5xx など）は届いているので偽。
     *
     * @param mixed $e
     * @return bool
     */
    public static function isConnectFailure($e): bool {
        if ($e instanceof ConnectException) {
            $errno = $e->getHandlerContext()['errno'] ?? null;
            return $errno === null || (int)$errno !== 52;
        }
        if ($e instanceof RequestException) {
            if ($e->hasResponse()) {
                return false;
            }
            $errno = $e->getHandlerContext()['errno'] ?? null;
            return $errno !== null && in_array((int)$errno, self::TLS_HANDSHAKE_CURL_ERRNOS, true);
        }
        return false;
    }
}
