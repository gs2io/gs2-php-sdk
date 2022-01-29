<?php


namespace Gs2\Core\Net;


use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Utils;

class HttpTask {

    /**
     * @var Request
     */
    private $request;

    /**
     * @var IResponseHandler
     */
    private $handler;

    public function __construct(
        string $method,
        string $url,
        IResponseHandler $handler
    ) {
        $this->request = new Request($method, $url);
        $this->handler = $handler;
    }

    /**
     * 最大1回までしか呼べません
     */
    public function send(): PromiseInterface {
        return (new Client())->sendAsync($this->request);
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addHeaderEntry(string $key, string $value) {
        $this->request = $this->request->withAddedHeader($key, $value);
    }

    /**
     * @param array $body
     */
    public function setBody(array $body) {
        if (count($body) == 0) {
            $this->request = $this->request->withBody(Utils::streamFor("{}"));
        } else {
            $this->request = $this->request->withBody(Utils::streamFor(json_encode($body)));
        }
    }
}
