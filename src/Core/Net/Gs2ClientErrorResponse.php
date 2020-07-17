<?php


namespace Gs2\Core\Net;


use Gs2\Core\Exception\Gs2Exception;

class Gs2ClientErrorResponse extends Gs2Response
{
    /**
     * Gs2ClientErrorResponse constructor.
     * @param Gs2Exception $exception
     */
    public function __construct(Gs2Exception $exception)
    {
        parent::__construct("");
        $this->exception = $exception;
    }
}