<?php

namespace Gs2\Core\Net;

use GuzzleHttp\Promise\PromiseInterface;

abstract class Gs2SessionTask implements IResponseHandler {

    /**
     * @var Gs2Session
     */
    private $gs2Session;

    /**
     * @var Gs2SessionTaskId
     */
    public $gs2SessionTaskId;

    /**
     * @return Gs2Session
     */
    protected function getGs2Session(): Gs2Session
    {
        return $this->gs2Session;
    }

    /**
     * @return Gs2SessionTaskId
     */
    protected function getGs2SessionTaskId(): Gs2SessionTaskId
    {
        return $this->gs2SessionTaskId;
    }

    /**
     * @return string
     */
    function getProjectToken(): string
    {
        return $this->gs2Session->getProjectToken();
    }

    // Gs2Session::execute() から利用
    abstract public function prepareImpl();     // ロックの内側から呼ばれるので gs2Session のプライベートメンバに安全にアクセス可能
    abstract public function executeImpl(): PromiseInterface;     // ロックの外側から呼ばれるので直接コールバックを呼び出し可能

    /**
     * Gs2SessionTask constructor.
     * @param Gs2Session $gs2Session
     */
    public function __construct(Gs2Session $gs2Session)
    {
        $this->gs2Session = $gs2Session;
    }

    /**
     * @param Gs2Response $gs2Response
     */
    public function callback(Gs2Response $gs2Response)
    {
        $this->gs2Session->notifyComplete($this);
    }

    /**
     *
     */
    public function execute() {
        $this->gs2Session->execute($this);
    }

}
