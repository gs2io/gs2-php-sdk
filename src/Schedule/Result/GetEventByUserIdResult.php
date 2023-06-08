<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Schedule\Result;

use Gs2\Core\Model\IResult;
use Gs2\Schedule\Model\Event;
use Gs2\Schedule\Model\RepeatSchedule;

class GetEventByUserIdResult implements IResult {
    /** @var Event */
    private $item;
    /** @var int */
    private $repeatCount;
    /** @var bool */
    private $inSchedule;
    /** @var RepeatSchedule */
    private $repeatSchedule;

	public function getItem(): ?Event {
		return $this->item;
	}

	public function setItem(?Event $item) {
		$this->item = $item;
	}

	public function withItem(?Event $item): GetEventByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getRepeatCount(): ?int {
		return $this->repeatCount;
	}

	public function setRepeatCount(?int $repeatCount) {
		$this->repeatCount = $repeatCount;
	}

	public function withRepeatCount(?int $repeatCount): GetEventByUserIdResult {
		$this->repeatCount = $repeatCount;
		return $this;
	}

	public function getInSchedule(): ?bool {
		return $this->inSchedule;
	}

	public function setInSchedule(?bool $inSchedule) {
		$this->inSchedule = $inSchedule;
	}

	public function withInSchedule(?bool $inSchedule): GetEventByUserIdResult {
		$this->inSchedule = $inSchedule;
		return $this;
	}

	public function getRepeatSchedule(): ?RepeatSchedule {
		return $this->repeatSchedule;
	}

	public function setRepeatSchedule(?RepeatSchedule $repeatSchedule) {
		$this->repeatSchedule = $repeatSchedule;
	}

	public function withRepeatSchedule(?RepeatSchedule $repeatSchedule): GetEventByUserIdResult {
		$this->repeatSchedule = $repeatSchedule;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetEventByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Event::fromJson($data['item']) : null)
            ->withRepeatCount(array_key_exists('repeatCount', $data) && $data['repeatCount'] !== null ? $data['repeatCount'] : null)
            ->withInSchedule(array_key_exists('inSchedule', $data) ? $data['inSchedule'] : null)
            ->withRepeatSchedule(array_key_exists('repeatSchedule', $data) && $data['repeatSchedule'] !== null ? RepeatSchedule::fromJson($data['repeatSchedule']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "repeatCount" => $this->getRepeatCount(),
            "inSchedule" => $this->getInSchedule(),
            "repeatSchedule" => $this->getRepeatSchedule() !== null ? $this->getRepeatSchedule()->toJson() : null,
        );
    }
}