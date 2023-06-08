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

namespace Gs2\Schedule\Model;

use Gs2\Core\Model\IModel;


class RepeatSchedule implements IModel {
	/**
     * @var int
	 */
	private $repeatCount;
	/**
     * @var int
	 */
	private $currentRepeatStartAt;
	/**
     * @var int
	 */
	private $currentRepeatEndAt;
	/**
     * @var int
	 */
	private $lastRepeatEndAt;
	/**
     * @var int
	 */
	private $nextRepeatStartAt;
	public function getRepeatCount(): ?int {
		return $this->repeatCount;
	}
	public function setRepeatCount(?int $repeatCount) {
		$this->repeatCount = $repeatCount;
	}
	public function withRepeatCount(?int $repeatCount): RepeatSchedule {
		$this->repeatCount = $repeatCount;
		return $this;
	}
	public function getCurrentRepeatStartAt(): ?int {
		return $this->currentRepeatStartAt;
	}
	public function setCurrentRepeatStartAt(?int $currentRepeatStartAt) {
		$this->currentRepeatStartAt = $currentRepeatStartAt;
	}
	public function withCurrentRepeatStartAt(?int $currentRepeatStartAt): RepeatSchedule {
		$this->currentRepeatStartAt = $currentRepeatStartAt;
		return $this;
	}
	public function getCurrentRepeatEndAt(): ?int {
		return $this->currentRepeatEndAt;
	}
	public function setCurrentRepeatEndAt(?int $currentRepeatEndAt) {
		$this->currentRepeatEndAt = $currentRepeatEndAt;
	}
	public function withCurrentRepeatEndAt(?int $currentRepeatEndAt): RepeatSchedule {
		$this->currentRepeatEndAt = $currentRepeatEndAt;
		return $this;
	}
	public function getLastRepeatEndAt(): ?int {
		return $this->lastRepeatEndAt;
	}
	public function setLastRepeatEndAt(?int $lastRepeatEndAt) {
		$this->lastRepeatEndAt = $lastRepeatEndAt;
	}
	public function withLastRepeatEndAt(?int $lastRepeatEndAt): RepeatSchedule {
		$this->lastRepeatEndAt = $lastRepeatEndAt;
		return $this;
	}
	public function getNextRepeatStartAt(): ?int {
		return $this->nextRepeatStartAt;
	}
	public function setNextRepeatStartAt(?int $nextRepeatStartAt) {
		$this->nextRepeatStartAt = $nextRepeatStartAt;
	}
	public function withNextRepeatStartAt(?int $nextRepeatStartAt): RepeatSchedule {
		$this->nextRepeatStartAt = $nextRepeatStartAt;
		return $this;
	}

    public static function fromJson(?array $data): ?RepeatSchedule {
        if ($data === null) {
            return null;
        }
        return (new RepeatSchedule())
            ->withRepeatCount(array_key_exists('repeatCount', $data) && $data['repeatCount'] !== null ? $data['repeatCount'] : null)
            ->withCurrentRepeatStartAt(array_key_exists('currentRepeatStartAt', $data) && $data['currentRepeatStartAt'] !== null ? $data['currentRepeatStartAt'] : null)
            ->withCurrentRepeatEndAt(array_key_exists('currentRepeatEndAt', $data) && $data['currentRepeatEndAt'] !== null ? $data['currentRepeatEndAt'] : null)
            ->withLastRepeatEndAt(array_key_exists('lastRepeatEndAt', $data) && $data['lastRepeatEndAt'] !== null ? $data['lastRepeatEndAt'] : null)
            ->withNextRepeatStartAt(array_key_exists('nextRepeatStartAt', $data) && $data['nextRepeatStartAt'] !== null ? $data['nextRepeatStartAt'] : null);
    }

    public function toJson(): array {
        return array(
            "repeatCount" => $this->getRepeatCount(),
            "currentRepeatStartAt" => $this->getCurrentRepeatStartAt(),
            "currentRepeatEndAt" => $this->getCurrentRepeatEndAt(),
            "lastRepeatEndAt" => $this->getLastRepeatEndAt(),
            "nextRepeatStartAt" => $this->getNextRepeatStartAt(),
        );
    }
}