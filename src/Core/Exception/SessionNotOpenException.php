<?php


namespace Gs2\Core\Exception;


class SessionNotOpenException extends Gs2Exception {

    /**
     * SessionNotOpenException constructor.
     * @param string|array $message
     */
    public function __construct($message) {
        parent::__construct($message);
	}
}
