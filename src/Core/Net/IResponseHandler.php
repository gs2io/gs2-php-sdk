<?php

namespace Gs2\Core\Net;

interface IResponseHandler {

    /**
     * @param Gs2Response $response
     */
    function callback(Gs2Response $response);
}