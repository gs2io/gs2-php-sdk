<?php

namespace Gs2\Core\Net;


use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;

class Steady {

    const CONNECT_TIMEOUT = 5;

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

    public static function normalizeEndpoint(?string $endpoint): ?string {
        if ($endpoint === null) {
            return null;
        }
        $normalized = rtrim(trim($endpoint), '/');
        return $normalized === '' ? null : $normalized;
    }

    public static function serviceUrl(string $steady, string $service): string {
        return $steady . '/' . $service;
    }

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

    public static function isSteadyUrl(?string $steady, string $url): bool {
        $steady = self::normalizeEndpoint($steady);
        if ($steady === null) {
            return false;
        }
        return $url === $steady || strpos($url, $steady . '/') === 0;
    }

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
