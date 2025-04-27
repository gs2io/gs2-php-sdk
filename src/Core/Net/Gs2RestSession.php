<?php


namespace Gs2\Core\Net;


use Gs2\Core\Exception\Gs2Exception;
use Gs2\Core\Exception\NoInternetConnectionException;
use Gs2\Core\Model\BasicGs2Credential;
use GuzzleHttp\Client as Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;

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
        $url = str_replace('{service}', "identifier", str_replace('{region}', $this->gs2RestSession->getRegion(), Gs2RestSession::$endpointHost)). "/projectToken/login";
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
        $client = new Client();
        return $client->postAsync($url, $params)->then(
            function (Response $response) {
                return LoginResult::fromArray(json_decode($response->getBody()->getContents(), true));
            },
            function (RequestException $response) {
                $gs2Response = new Gs2RestResponse($response->getResponse()->getBody()->getContents(), $response->getResponse()->getStatusCode());
                throw $gs2Response->getGs2Exception();
            }
        )->then(
            function (LoginResult $result) {
                $this->gs2RestSession->openCallback($result->access_token, null);
            },
            function (Gs2Exception $e) {
                var_dump($e->getMessage());
                $this->gs2RestSession->openCallback(null, $e);
                throw $e;
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

    /**
     * Gs2RestSession constructor.
     * @param BasicGs2Credential $basicGs2Credential
     * @param string|null $region
     */
    public function __construct(
        BasicGs2Credential $basicGs2Credential,
        string $region = null
    ) {
        parent::__construct($basicGs2Credential, $region);
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
