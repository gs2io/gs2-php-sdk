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


class RepeatSetting implements IModel {
	/**
     * @var string
	 */
	private $repeatType;
	/**
     * @var int
	 */
	private $beginDayOfMonth;
	/**
     * @var int
	 */
	private $endDayOfMonth;
	/**
     * @var string
	 */
	private $beginDayOfWeek;
	/**
     * @var string
	 */
	private $endDayOfWeek;
	/**
     * @var int
	 */
	private $beginHour;
	/**
     * @var int
	 */
	private $endHour;
	public function getRepeatType(): ?string {
		return $this->repeatType;
	}
	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}
	public function withRepeatType(?string $repeatType): RepeatSetting {
		$this->repeatType = $repeatType;
		return $this;
	}
	public function getBeginDayOfMonth(): ?int {
		return $this->beginDayOfMonth;
	}
	public function setBeginDayOfMonth(?int $beginDayOfMonth) {
		$this->beginDayOfMonth = $beginDayOfMonth;
	}
	public function withBeginDayOfMonth(?int $beginDayOfMonth): RepeatSetting {
		$this->beginDayOfMonth = $beginDayOfMonth;
		return $this;
	}
	public function getEndDayOfMonth(): ?int {
		return $this->endDayOfMonth;
	}
	public function setEndDayOfMonth(?int $endDayOfMonth) {
		$this->endDayOfMonth = $endDayOfMonth;
	}
	public function withEndDayOfMonth(?int $endDayOfMonth): RepeatSetting {
		$this->endDayOfMonth = $endDayOfMonth;
		return $this;
	}
	public function getBeginDayOfWeek(): ?string {
		return $this->beginDayOfWeek;
	}
	public function setBeginDayOfWeek(?string $beginDayOfWeek) {
		$this->beginDayOfWeek = $beginDayOfWeek;
	}
	public function withBeginDayOfWeek(?string $beginDayOfWeek): RepeatSetting {
		$this->beginDayOfWeek = $beginDayOfWeek;
		return $this;
	}
	public function getEndDayOfWeek(): ?string {
		return $this->endDayOfWeek;
	}
	public function setEndDayOfWeek(?string $endDayOfWeek) {
		$this->endDayOfWeek = $endDayOfWeek;
	}
	public function withEndDayOfWeek(?string $endDayOfWeek): RepeatSetting {
		$this->endDayOfWeek = $endDayOfWeek;
		return $this;
	}
	public function getBeginHour(): ?int {
		return $this->beginHour;
	}
	public function setBeginHour(?int $beginHour) {
		$this->beginHour = $beginHour;
	}
	public function withBeginHour(?int $beginHour): RepeatSetting {
		$this->beginHour = $beginHour;
		return $this;
	}
	public function getEndHour(): ?int {
		return $this->endHour;
	}
	public function setEndHour(?int $endHour) {
		$this->endHour = $endHour;
	}
	public function withEndHour(?int $endHour): RepeatSetting {
		$this->endHour = $endHour;
		return $this;
	}

    public static function fromJson(?array $data): ?RepeatSetting {
        if ($data === null) {
            return null;
        }
        return (new RepeatSetting())
            ->withRepeatType(array_key_exists('repeatType', $data) && $data['repeatType'] !== null ? $data['repeatType'] : null)
            ->withBeginDayOfMonth(array_key_exists('beginDayOfMonth', $data) && $data['beginDayOfMonth'] !== null ? $data['beginDayOfMonth'] : null)
            ->withEndDayOfMonth(array_key_exists('endDayOfMonth', $data) && $data['endDayOfMonth'] !== null ? $data['endDayOfMonth'] : null)
            ->withBeginDayOfWeek(array_key_exists('beginDayOfWeek', $data) && $data['beginDayOfWeek'] !== null ? $data['beginDayOfWeek'] : null)
            ->withEndDayOfWeek(array_key_exists('endDayOfWeek', $data) && $data['endDayOfWeek'] !== null ? $data['endDayOfWeek'] : null)
            ->withBeginHour(array_key_exists('beginHour', $data) && $data['beginHour'] !== null ? $data['beginHour'] : null)
            ->withEndHour(array_key_exists('endHour', $data) && $data['endHour'] !== null ? $data['endHour'] : null);
    }

    public function toJson(): array {
        return array(
            "repeatType" => $this->getRepeatType(),
            "beginDayOfMonth" => $this->getBeginDayOfMonth(),
            "endDayOfMonth" => $this->getEndDayOfMonth(),
            "beginDayOfWeek" => $this->getBeginDayOfWeek(),
            "endDayOfWeek" => $this->getEndDayOfWeek(),
            "beginHour" => $this->getBeginHour(),
            "endHour" => $this->getEndHour(),
        );
    }
}