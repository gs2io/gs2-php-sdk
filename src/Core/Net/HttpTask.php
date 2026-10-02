<?php


namespace Gs2\Core\Net;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
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

    /**
     * @var bool
     */
    private $enableCompressRequest;

    /**
     * @var bool
     */
    private $enableDecompressResponse;

    public function __construct(
        string $method,
        string $url,
        IResponseHandler $handler,
        bool $enableCompressRequest = true,
        bool $enableDecompressResponse = true
    ) {
        $this->request = new Request($method, $url);
        $this->handler = $handler;
        $this->enableCompressRequest = $enableCompressRequest;
        $this->enableDecompressResponse = $enableDecompressResponse;

        if ($enableDecompressResponse) {
            $this->request = $this->request->withHeader('Accept-Encoding', 'gzip');
        }
    }

    /**
     * Can be called at most once
     *
     * @param ClientInterface|null $client
     * @param array $options
     * @return PromiseInterface
     */
    public function send(ClientInterface $client = null, array $options = []): PromiseInterface {
        if ($this->enableDecompressResponse) {
            $options['decode_content'] = 'gzip';
        } else {
            $options['decode_content'] = false;
        }
        if ($client === null) {
            $client = new Client();
        }
        return $client->sendAsync($this->request, $options);
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
        $jsonBody = count($body) == 0 ? "{}" : json_encode($body, JSON_UNESCAPED_SLASHES);

        if ($this->enableCompressRequest) {
            $compressedBody = gzencode($jsonBody);
            $this->request = $this->request
                ->withHeader('Content-Encoding', 'gzip')
                ->withBody(Utils::streamFor($compressedBody));
        } else {
            $this->request = $this->request->withBody(Utils::streamFor($jsonBody));
        }
    }
}
