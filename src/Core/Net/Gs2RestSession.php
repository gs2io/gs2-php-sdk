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
    /** @var string Project token */
    public $access_token;
    /** @var string Bearer */
    public $token_type;
    /** @var int Lifetime in seconds */
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
        $url = $this->gs2RestSession->endpointHost("identifier") . "/projectToken/login";
        $params = [
            'timeout' => 60,
            'body' => json_encode([
                'client_id' => $this->gs2RestSession->getGs2Credential()->getClientId(),
                'client_secret' => $this->gs2RestSession->getGs2Credential()->getClientSecret(),
            ], JSON_UNESCAPED_SLASHES),
            'headers' => [
                "Content-Type" => "application/json",
            ],
        ];
        return $this->gs2RestSession->sendAsync($url, 'POST', $params)->then(
            function (Response $response) {
                return LoginResult::fromArray(json_decode($response->getBody()->getContents(), true));
            },
            function ($e) {
                throw Gs2RestSession::mapRejection($e);
            }
        )->then(
            function (LoginResult $result) {
                $this->gs2RestSession->openCallback($result->access_token, null);
            },
            function (Throwable $e) {
                $gs2Exception = $e instanceof Gs2Exception ? $e : new NoInternetConnectionException($e->getMessage());
                var_dump($gs2Exception->getMessage());
                $this->gs2RestSession->openCallback(null, $gs2Exception);
                throw $gs2Exception;
            }
        );
    }
}


class Gs2RestSession extends Gs2Session {

    static $endpointHost = "https://{service}.{region}.gen2.gs2io.com";

    /**
     * @var bool
     */
    private $m_IsOpenCancelled;

    private $steadyEndpoint = null;

    private $httpClient = null;

    /**
     * Gs2RestSession constructor.
     * @param BasicGs2Credential $basicGs2Credential
     * @param string|null $region
     * @param string|null $steadyEndpoint
     */
    public function __construct(
        BasicGs2Credential $basicGs2Credential,
        string $region = null,
        string $steadyEndpoint = null
    ) {
        parent::__construct($basicGs2Credential, $region);
        $this->steadyEndpoint = Steady::normalizeEndpoint($steadyEndpoint);
    }

    public function getSteadyEndpoint(): ?string {
        return $this->steadyEndpoint;
    }

    public function setSteadyEndpoint(?string $steadyEndpoint): self {
        $this->steadyEndpoint = Steady::normalizeEndpoint($steadyEndpoint);
        return $this;
    }

    public function endpointHost(string $service): string {
        if ($this->steadyEndpoint !== null) {
            return Steady::serviceUrl($this->steadyEndpoint, $service);
        }
        return str_replace('{service}', $service, str_replace('{region}', $this->getRegion(), Gs2RestSession::$endpointHost));
    }

    public function resolveUrl(string $url): string {
        return Steady::rewriteUrl($this->steadyEndpoint, Gs2RestSession::$endpointHost, $this->getRegion(), $url);
    }

    public function getHttpClient(): ClientInterface {
        if ($this->httpClient === null) {
            $this->httpClient = new Client();
        }
        return $this->httpClient;
    }

    public function setHttpClient(ClientInterface $client): self {
        $this->httpClient = $client;
        return $this;
    }

    public function sendHttpTask(HttpTaskBuilder $builder): PromiseInterface {
        $url = $this->resolveUrl($builder->getUrl() ?? '');
        $builder->setUrl($url);
        $client = $this->getHttpClient();
        return $this->sendWithSteadyRetry($url, function (array $options) use ($builder, $client) {
            return $builder->build()->send($client, $options);
        });
    }

    public function sendAsync(string $url, string $method, array $params): PromiseInterface {
        $client = $this->getHttpClient();
        return $this->sendWithSteadyRetry($url, function (array $options) use ($client, $method, $url, $params) {
            return $client->requestAsync($method, $url, $options + $params);
        });
    }

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
