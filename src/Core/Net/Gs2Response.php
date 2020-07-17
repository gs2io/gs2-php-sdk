<?php

namespace Gs2\Core\Net;


use Gs2\Core\Exception\Gs2Exception;

abstract class Gs2Response {

    /**
     * @var string
     */
    protected $message;

    /**
     * @var Gs2Exception
     */
    protected $exception;

    /**
     * Gs2Response constructor.
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return Gs2Exception
     */
    public function getGs2Exception(): ?Gs2Exception
    {
        return $this->exception;
    }
}