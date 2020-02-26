<?php


namespace Gs2\Core\Net;


class HttpTaskBuilder
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $url;

    /**
     * @var array
     */
    private $headers = [];

    /**
     * @var array
     */
    private $body;

    /**
     * @var IResponseHandler
     */
    private $handler;

    private function __construct() {}

    /**
     * @return HttpTaskBuilder
     */
    public static function create(): HttpTaskBuilder {
        return new HttpTaskBuilder();
    }

    /**
     * @param string $method
     * @return HttpTaskBuilder
     */
    public function setMethod(string $method): HttpTaskBuilder {
        $this->method = $method;
        return $this;
    }

    /**
     * @param string $url
     * @return HttpTaskBuilder
     */
    public function setUrl(string $url): HttpTaskBuilder {
        $this->url = $url;
        return $this;
    }

    /**
     * @param string $key
     * @param string $value
     * @return HttpTaskBuilder
     */
    public function setHeader(string $key, string $value): HttpTaskBuilder {
        $this->headers[$key] = $value;
        return $this;
    }

    /**
     * @param array $body
     * @return HttpTaskBuilder
     */
    public function setBody(array $body): HttpTaskBuilder {
        $this->body = $body;
        return $this;
    }

    /**
     * @param IResponseHandler $handler
     * @return HttpTaskBuilder
     */
    public function setHttpResponseHandler(IResponseHandler $handler): HttpTaskBuilder {
        $this->handler = $handler;
        return $this;
    }

    /**
     *
     */
    public function build(): HttpTask {
        $httpTask = new HttpTask($this->method, $this->url, $this->handler);
        foreach ($this->headers as $key => $value) {
            $httpTask->addHeaderEntry($key, $value);
        }
        if ($this->method == "POST" || $this->method == "PUT") {
            $httpTask->setBody($this->body);
        }
        return $httpTask;
    }

}