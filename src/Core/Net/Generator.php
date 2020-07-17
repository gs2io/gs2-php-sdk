<?php

namespace Gs2\Core\Net;

use Gs2\Core\Net\Gs2SessionTaskId;

class Generator
{
    const INVALID_ID_VALUE = 0;
    const LOGIN_ID_VALUE = 1;
    const RESERVED_ID_VALUE_MAX = 10000;

    /**
     * @var int
     */
    private $valueCounter = Generator::INVALID_ID_VALUE;

    /**
     * @return Gs2SessionTaskId
     */
    public function issue(): Gs2SessionTaskId {
        if (++$this->valueCounter <= Generator::RESERVED_ID_VALUE_MAX) {
            $this->valueCounter = Generator::RESERVED_ID_VALUE_MAX + 1;
        }

        return new Gs2SessionTaskId($this->valueCounter);
    }
}