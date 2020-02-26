<?php

namespace Gs2\Core\Model;

/**
 * @template T
 * @package Gs2\Core\Model
 */
interface AsyncAction
{
    /**
     * @param AsyncResult $result
     */
    function callback(AsyncResult $result);
}