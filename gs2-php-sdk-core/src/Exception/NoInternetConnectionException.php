<?php


namespace Gs2\Core\Exception;


class NoInternetConnectionException extends Gs2Exception {

    /**
     * NoInternetConnectionException constructor.
     * @param string|array $message
     */
    public function __construct($message) {
        parent::__construct($message);
    }
}
