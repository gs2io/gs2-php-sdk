<?php


namespace Gs2\Core\Net;


use Gs2\Core\Model\AsyncAction;
use Gs2\Core\Model\AsyncResult;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
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

        $this->builder = HttpTaskBuilder::create();
        $this->clazz = $clazz;
    }

    /**
     *
     */
    public function prepareImpl() {
        $this->builder->setHeader("X-GS2-CLIENT-ID", $this->getGs2Session()->getGs2Credential()->getClientId());
        $this->builder->setHeader("Authorization", "Bearer ". $this->getProjectToken());
    }

    /**
     *
     */
    public function executeImpl(): PromiseInterface {
        return $this->builder->build()->send()->then(
            function (Response $response) {
                return (new ReflectionMethod($this->clazz, 'fromJson'))->invoke(null, json_decode($response->getBody()->getContents(), true));
            },
            function (RequestException $response) {
                $gs2Response = new Gs2RestResponse($response->getResponse()->getBody()->getContents(), $response->getResponse()->getStatusCode());
                throw $gs2Response->getGs2Exception();
            }
        );
    }
}