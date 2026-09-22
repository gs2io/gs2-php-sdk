<?php


namespace Gs2\Core\Net;


use Gs2\Core\Exception\Gs2Exception;
use Gs2\Core\Exception\NoInternetConnectionException;
use Gs2\Core\Model\BasicGs2Credential;
use GuzzleHttp\Client as Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class LoginResult {
    /** @var string プロジェクトトークン */
    public $access_token;
    /** @var string Bearer */
    public $token_type;
    /** @var int 有効期間(秒) */
    public $expires_in;

    public static function fromArray(array $data): LoginResult {
        $item = new LoginResult();
        $item->access_token = $data['access_token'];
        $item->token_type = $data['token_type'];
        $item->expires_in = $data['expires_in'];
        return $item;
    }
}

class Gs2LoginTask
{
    /**
     * @var Gs2RestSession
     */
    private $gs2RestSession;

    public function __construct(Gs2RestSession $gs2RestSession) {
        $this->gs2RestSession = $gs2RestSession;
    }

    function execute(): PromiseInterface
    {
        // ★プロジェクトトークンのログインも Steady 配下（<steady>/identifier/projectToken/login）へ向ける。
        //   放置すると Steady のアプリの identifier だけ共有クラウドへ行く。
        //   SteadyEndpoint 未設定なら従来と byte 単位で同じ URL。
        $url = $this->gs2RestSession->endpointHost("identifier") . "/projectToken/login";
        $params = [
            // ★ログインだけは従来どおり要求全体の上限 60 秒を持つ（生成クライアントの要求には置かない）。
            //   このため errno 28 は接続段階とも総時間切れとも取れるが、ログインは冪等なので再送しても害は無い。
            'timeout' => 60,
            'body' => json_encode([
                'client_id' => $this->gs2RestSession->getGs2Credential()->getClientId(),
                'client_secret' => $this->gs2RestSession->getGs2Credential()->getClientSecret(),
            ], JSON_UNESCAPED_SLASHES),
            'headers' => [
                "Content-Type" => "application/json",
            ],
        ];
        // ★送信はセッションに任せる（Steady 宛なら接続段階の上限と、接続段階の失敗の 1 回だけの再送）
        return $this->gs2RestSession->sendAsync($url, 'POST', $params)->then(
            function (Response $response) {
                return LoginResult::fromArray(json_decode($response->getBody()->getContents(), true));
            },
            function ($e) {
                // 応答のある失敗は従来どおりステータス→例外の写像、それ以外（接続失敗など）はそのまま
                throw Gs2RestSession::mapRejection($e);
            }
        )->then(
            function (LoginResult $result) {
                $this->gs2RestSession->openCallback($result->access_token, null);
            },
            function (Throwable $e) {
                // ★接続段階の失敗は Gs2Exception ではない（Guzzle の ConnectException）ので包み直す。
                //   包まないと openCallback(?Gs2Exception) に渡せない。
                $gs2Exception = $e instanceof Gs2Exception ? $e : new NoInternetConnectionException($e->getMessage());
                var_dump($gs2Exception->getMessage());
                $this->gs2RestSession->openCallback(null, $gs2Exception);
                throw $gs2Exception;
            }
        );
    }
}


/**
 * REST セッション。
 *
 * Steady（専用フリート）を使うときは open() の前に setSteadyEndpoint(https://<host>) を呼ぶ。
 * 設定すると全サービスの接続先が <steady>/<service> になり（プロジェクトトークンのログインも
 * <steady>/identifier 配下）、Steady 宛の要求だけ接続段階に上限（Steady::CONNECT_TIMEOUT）と
 * 接続段階の失敗の 1 回だけの再送が付く。未設定なら URL もクライアントの挙動も従来どおり。
 */
class Gs2RestSession extends Gs2Session {

    static $endpointHost = "https://{service}.{region}.gen2.gs2io.com";

    /**
     * @var bool
     */
    private $m_IsOpenCancelled;

    /**
     * @var string|null Steady（専用フリート）の基点（https://<host>、末尾 / 無し）。null なら共有クラウド
     */
    private $steadyEndpoint = null;

    /**
     * @var ClientInterface|null 送信に使う Guzzle クライアント（未設定なら初回に生成。試験では差し替える）
     */
    private $httpClient = null;

    /**
     * Gs2RestSession constructor.
     * @param BasicGs2Credential $basicGs2Credential
     * @param string|null $region
     * @param string|null $steadyEndpoint Steady（専用フリート）の基点（https://<host>）。null なら共有クラウド
     */
    public function __construct(
        BasicGs2Credential $basicGs2Credential,
        string $region = null,
        string $steadyEndpoint = null
    ) {
        parent::__construct($basicGs2Credential, $region);
        $this->steadyEndpoint = Steady::normalizeEndpoint($steadyEndpoint);
    }

    /**
     * @return string|null Steady（専用フリート）の基点。未設定なら null
     */
    public function getSteadyEndpoint(): ?string {
        return $this->steadyEndpoint;
    }

    /**
     * Steady（専用フリート）の基点（https://<host>）を設定する。末尾の / と空白は落とす。null / 空文字で解除。
     * open() の前に設定すること（プロジェクトトークンのログインもこの配下へ向く）。
     *
     * @param string|null $steadyEndpoint
     * @return $this
     */
    public function setSteadyEndpoint(?string $steadyEndpoint): self {
        $this->steadyEndpoint = Steady::normalizeEndpoint($steadyEndpoint);
        return $this;
    }

    /**
     * サービスの接続先。
     * 優先順: SteadyEndpoint ＞ 共有クラウドの template（Gs2RestSession::$endpointHost）。
     * SteadyEndpoint が空なら結果は従来と byte 単位で同じ文字列。
     *
     * @param string $service サービス名（例: "account"）
     * @return string
     */
    public function endpointHost(string $service): string {
        if ($this->steadyEndpoint !== null) {
            return Steady::serviceUrl($this->steadyEndpoint, $service);
        }
        return str_replace('{service}', $service, str_replace('{region}', $this->getRegion(), Gs2RestSession::$endpointHost));
    }

    /**
     * 生成クライアント（src/<Service>/...）が共有クラウドの template から組んだ URL を、
     * SteadyEndpoint が設定されていれば <steady>/<service>/... へ読み替える。
     * template から組まれていない URL（アプリが独自に差し替えた宛先）は触らない。
     *
     * @param string $url
     * @return string
     */
    public function resolveUrl(string $url): string {
        return Steady::rewriteUrl($this->steadyEndpoint, Gs2RestSession::$endpointHost, $this->getRegion(), $url);
    }

    /**
     * @return ClientInterface 送信に使う Guzzle クライアント
     */
    public function getHttpClient(): ClientInterface {
        if ($this->httpClient === null) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

    /**
     * 送信に使う Guzzle クライアントを差し替える（試験で handler を注入する口）。
     *
     * @param ClientInterface $client
     * @return $this
     */
    public function setHttpClient(ClientInterface $client): self {
        $this->httpClient = $client;
        return $this;
    }

    /**
     * HttpTaskBuilder の内容を送る（Gs2RestSessionTask から利用）。
     * 宛先は resolveUrl() で Steady 配下へ読み替える。
     *
     * @param HttpTaskBuilder $builder
     * @return PromiseInterface<ResponseInterface>
     */
    public function sendHttpTask(HttpTaskBuilder $builder): PromiseInterface {
        $url = $this->resolveUrl($builder->getUrl() ?? '');
        $builder->setUrl($url);
        $client = $this->getHttpClient();
        // ★HttpTask は最大 1 回しか送れないので、再送のたびに builder から組み直す（本文は builder が持っている）。
        return $this->sendWithSteadyRetry($url, function (array $options) use ($builder, $client) {
            return $builder->build()->send($client, $options);
        });
    }

    /**
     * URL を直に送る（プロジェクトトークンのログインから利用）。
     *
     * @param string $url
     * @param string $method
     * @param array $params Guzzle のリクエストオプション
     * @return PromiseInterface<ResponseInterface>
     */
    public function sendAsync(string $url, string $method, array $params): PromiseInterface {
        $client = $this->getHttpClient();
        return $this->sendWithSteadyRetry($url, function (array $options) use ($client, $method, $url, $params) {
            return $client->requestAsync($method, $url, $options + $params);
        });
    }

    /**
     * Steady 宛なら接続段階に上限（Steady::CONNECT_TIMEOUT）を置き、接続段階の失敗
     * （1 バイトも送っていない: DNS / TCP の接続拒否・接続タイムアウト / TLS handshake）なら
     * 同じ要求をもう 1 回だけ送る。フリートが手放した公開 IP に当たったとき、名前を引き直して
     * 別のノードへ着く機会を 1 回だけ作る。2 回目も失敗したら誤りを返す（3 回目は無い）。
     * 送信後の失敗（応答のある誤り、読み取りタイムアウト、途中切断）は届いたかもしれないので再送しない
     * （非冪等要求の二重実行を作らない）。SteadyEndpoint 未設定・Steady 以外の宛先は従来どおり 1 回だけ送る。
     *
     * @param string $url
     * @param callable $send function(array $options): PromiseInterface
     * @return PromiseInterface<ResponseInterface>
     */
    private function sendWithSteadyRetry(string $url, callable $send): PromiseInterface {
        if (!Steady::isSteadyUrl($this->steadyEndpoint, $url)) {
            return $send([]);
        }
        $options = ['connect_timeout' => Steady::CONNECT_TIMEOUT];
        return $send($options)->otherwise(
            function ($e) use ($send, $options) {
                if (!Steady::isConnectFailure($e)) {
                    return Create::rejectionFor($e);
                }
                return $send($options);
            }
        );
    }

    /**
     * Guzzle の失敗を GS2 の例外に写す。応答のある RequestException は従来どおりステータス→例外の写像、
     * それ以外（接続失敗など）はそのまま返す。
     *
     * @param mixed $e
     * @return Throwable
     */
    public static function mapRejection($e): Throwable {
        if ($e instanceof RequestException && $e->hasResponse()) {
            $gs2Response = new Gs2RestResponse($e->getResponse()->getBody()->getContents(), $e->getResponse()->getStatusCode());
            return $gs2Response->getGs2Exception();
        }
        if ($e instanceof Throwable) {
            return $e;
        }
        return new NoInternetConnectionException("");
    }

    function openImpl() {
        $this->m_IsOpenCancelled = false;
        (new Gs2LoginTask($this))->execute()->wait();
    }

    function cancelOpenImpl()
    {
        $this->m_IsOpenCancelled = true;
    }

    function closeImpl(): bool {
        $gs2ClientException = new NoInternetConnectionException("");  // TODO
        $this->closeCallback($gs2ClientException, true);

        return true;
    }
}
