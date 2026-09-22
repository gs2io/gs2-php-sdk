<?php


namespace Gs2\Core\Net;


use Gs2\Core\Model\AsyncAction;
use Gs2\Core\Model\AsyncResult;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\ResponseInterface;
use ReflectionMethod;

/**
 * Class Gs2RestSessionTask
 * @package Gs2\Core\Net
 */
class Gs2RestSessionTask extends Gs2SessionTask {

    /**
     * @var HttpTaskBuilder
     */
    protected $builder;

    /**
     * @template T
     * @var AsyncAction<AsyncResult<T>>
     */
    private $callback;

    /**
     * @template T
     * @var string
     */
    private $clazz;

    /**
     * @var Gs2RestSession
     */
    private $gs2RestSession;

    /**
     * Gs2RestSessionTask constructor.
     * @template T
     * @param Gs2RestSession $gs2RestSession
     * @param string $clazz
     */
    public function __construct(
        Gs2RestSession $gs2RestSession,
        string $clazz
    )
    {
        parent::__construct($gs2RestSession);

        $this->gs2RestSession = $gs2RestSession;
        $this->builder = HttpTaskBuilder::create();
        $this->clazz = $clazz;
    }

    /**
     *
     */
    public function prepareImpl() {
        $this->builder->setHeader("X-GS2-CLIENT-ID", $this->getGs2Session()->getGs2Credential()->getClientId());
        $this->builder->setHeader("Authorization", "Bearer ". $this->getProjectToken());
        $this->builder->setEnableCompressRequest($this->getGs2Session()->isCompressRequestEnabled());
        $this->builder->setEnableDecompressResponse($this->getGs2Session()->isDecompressResponseEnabled());
    }

    /**
     *
     */
    public function executeImpl(): PromiseInterface {
        // ★送信はセッションに任せる（Steady 宛なら接続段階の上限と、接続段階の失敗の 1 回だけの再送）
        return $this->gs2RestSession->sendHttpTask($this->builder)->then(
            function (ResponseInterface $response) {
                return (new ReflectionMethod($this->clazz, 'fromJson'))->invoke(null, json_decode($response->getBody()->getContents(), true));
            },
            function ($e) {
                // 応答のある失敗は従来どおりステータス→例外の写像、それ以外（接続失敗など）はそのまま
                throw Gs2RestSession::mapRejection($e);
            }
        );
    }
}