<?php


namespace Gs2\Core\Exception;


class UnknownException extends Gs2Exception {

    /**
     * SessionNotOpenException constructor.
     * @param string|array $message
     */
    public function __construct(string $message) {
        parent::__construct($message);
    }
}
