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
use Gs2\Schedule\Model\RepeatSetting;
use Gs2\Schedule\Model\Event;
use Gs2\Schedule\Model\RepeatSchedule;

class VerifyEventResult implements IResult {
    /** @var Event */
    private $item;
    /** @var bool */
    private $inSchedule;
    /** @var int */
    private $scheduleStartAt;
    /** @var int */
    private $scheduleEndAt;
    /** @var RepeatSchedule */
    private $repeatSchedule;
    /** @var bool */
    private $isGlobalSchedule;

	public function getItem(): ?Event {
		return $this->item;
	}

	public function setItem(?Event $item) {
		$this->item = $item;
	}

	public function withItem(?Event $item): VerifyEventResult {
		$this->item = $item;
		return $this;
	}

	public function getInSchedule(): ?bool {
		return $this->inSchedule;
	}

	public function setInSchedule(?bool $inSchedule) {
		$this->inSchedule = $inSchedule;
	}

	public function withInSchedule(?bool $inSchedule): VerifyEventResult {
		$this->inSchedule = $inSchedule;
		return $this;
	}

	public function getScheduleStartAt(): ?int {
		return $this->scheduleStartAt;
	}

	public function setScheduleStartAt(?int $scheduleStartAt) {
		$this->scheduleStartAt = $scheduleStartAt;
	}

	public function withScheduleStartAt(?int $scheduleStartAt): VerifyEventResult {
		$this->scheduleStartAt = $scheduleStartAt;
		return $this;
	}

	public function getScheduleEndAt(): ?int {
		return $this->scheduleEndAt;
	}

	public function setScheduleEndAt(?int $scheduleEndAt) {
		$this->scheduleEndAt = $scheduleEndAt;
	}

	public function withScheduleEndAt(?int $scheduleEndAt): VerifyEventResult {
		$this->scheduleEndAt = $scheduleEndAt;
		return $this;
	}

	public function getRepeatSchedule(): ?RepeatSchedule {
		return $this->repeatSchedule;
	}

	public function setRepeatSchedule(?RepeatSchedule $repeatSchedule) {
		$this->repeatSchedule = $repeatSchedule;
	}

	public function withRepeatSchedule(?RepeatSchedule $repeatSchedule): VerifyEventResult {
		$this->repeatSchedule = $repeatSchedule;
		return $this;
	}

	public function getIsGlobalSchedule(): ?bool {
		return $this->isGlobalSchedule;
	}

	public function setIsGlobalSchedule(?bool $isGlobalSchedule) {
		$this->isGlobalSchedule = $isGlobalSchedule;
	}

	public function withIsGlobalSchedule(?bool $isGlobalSchedule): VerifyEventResult {
		$this->isGlobalSchedule = $isGlobalSchedule;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyEventResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyEventResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Event::fromJson($data['item']) : null)
            ->withInSchedule(array_key_exists('inSchedule', $data) ? $data['inSchedule'] : null)
            ->withScheduleStartAt(array_key_exists('scheduleStartAt', $data) && $data['scheduleStartAt'] !== null ? $data['scheduleStartAt'] : null)
            ->withScheduleEndAt(array_key_exists('scheduleEndAt', $data) && $data['scheduleEndAt'] !== null ? $data['scheduleEndAt'] : null)
            ->withRepeatSchedule(array_key_exists('repeatSchedule', $data) && $data['repeatSchedule'] !== null ? RepeatSchedule::fromJson($data['repeatSchedule']) : null)
            ->withIsGlobalSchedule(array_key_exists('isGlobalSchedule', $data) ? $data['isGlobalSchedule'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "inSchedule" => $this->getInSchedule(),
            "scheduleStartAt" => $this->getScheduleStartAt(),
            "scheduleEndAt" => $this->getScheduleEndAt(),
            "repeatSchedule" => $this->getRepeatSchedule() !== null ? $this->getRepeatSchedule()->toJson() : null,
            "isGlobalSchedule" => $this->getIsGlobalSchedule(),
        );
    }
}