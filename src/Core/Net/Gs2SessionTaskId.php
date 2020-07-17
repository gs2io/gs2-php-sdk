<?php


namespace Gs2\Core\Net;


class Gs2SessionTaskId
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $value) {
        $this->value = $value;
    }

    public function equals(Gs2SessionTaskId $other) {
        return $this->value == $other->value;
    }
}