<?php

namespace Gs2\Core\Model;

use Gs2\Core\Exception\Gs2Exception;

/**
 * Class AsyncResult
 * @template T
 * @package Gs2\Core\Model
 */
class AsyncResult {

    /**
     * @var IResult<T>|null
     */
    private $result;

    /**
     * @var Gs2Exception|null
     */
    private $error;

    /**
     * AsyncResult constructor.
     * @param IResult<T>|null $result
     * @param Gs2Exception|null $error
     */
    public function __construct(
        ?IResult $result,
        ?Gs2Exception $error
    ) {
        $this->result = $result;
        $this->error = $error;
    }

    /**
     * @return IResult
     */
    public function getResult(): ?IResult {
        return $this->result;
    }

    /**
     * @return Gs2Exception
     */
    public function getError(): ?Gs2Exception {
        return $this->error;
    }
}
