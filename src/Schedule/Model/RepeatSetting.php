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


/**
 * Repeat Setting
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#repeatsetting
 */
class RepeatSetting implements IModel {
	/**
     * @var string Repeat Type
	 */
	private $repeatType;
	/**
     * @var int Begin Day of Month
	 */
	private $beginDayOfMonth;
	/**
     * @var int End Day of Month
	 */
	private $endDayOfMonth;
	/**
     * @var string Begin Day of Week
	 */
	private $beginDayOfWeek;
	/**
     * @var string End Day of Week
	 */
	private $endDayOfWeek;
	/**
     * @var int Begin Hour
	 */
	private $beginHour;
	/**
     * @var int End Hour
	 */
	private $endHour;
	/**
     * @var int Anchor Timestamp
	 */
	private $anchorTimestamp;
	/**
     * @var int Active Days
	 */
	private $activeDays;
	/**
     * @var int Inactive Days
	 */
	private $inactiveDays;
    /** @return string|null Repeat Type */
	public function getRepeatType(): ?string {
		return $this->repeatType;
	}
    /** @param string|null $repeatType Repeat Type */
	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}
    /**
     * @param string|null $repeatType Repeat Type
     * @return RepeatSetting
     */
	public function withRepeatType(?string $repeatType): RepeatSetting {
		$this->repeatType = $repeatType;
		return $this;
	}
    /** @return int|null Begin Day of Month */
	public function getBeginDayOfMonth(): ?int {
		return $this->beginDayOfMonth;
	}
    /** @param int|null $beginDayOfMonth Begin Day of Month */
	public function setBeginDayOfMonth(?int $beginDayOfMonth) {
		$this->beginDayOfMonth = $beginDayOfMonth;
	}
    /**
     * @param int|null $beginDayOfMonth Begin Day of Month
     * @return RepeatSetting
     */
	public function withBeginDayOfMonth(?int $beginDayOfMonth): RepeatSetting {
		$this->beginDayOfMonth = $beginDayOfMonth;
		return $this;
	}
    /** @return int|null End Day of Month */
	public function getEndDayOfMonth(): ?int {
		return $this->endDayOfMonth;
	}
    /** @param int|null $endDayOfMonth End Day of Month */
	public function setEndDayOfMonth(?int $endDayOfMonth) {
		$this->endDayOfMonth = $endDayOfMonth;
	}
    /**
     * @param int|null $endDayOfMonth End Day of Month
     * @return RepeatSetting
     */
	public function withEndDayOfMonth(?int $endDayOfMonth): RepeatSetting {
		$this->endDayOfMonth = $endDayOfMonth;
		return $this;
	}
    /** @return string|null Begin Day of Week */
	public function getBeginDayOfWeek(): ?string {
		return $this->beginDayOfWeek;
	}
    /** @param string|null $beginDayOfWeek Begin Day of Week */
	public function setBeginDayOfWeek(?string $beginDayOfWeek) {
		$this->beginDayOfWeek = $beginDayOfWeek;
	}
    /**
     * @param string|null $beginDayOfWeek Begin Day of Week
     * @return RepeatSetting
     */
	public function withBeginDayOfWeek(?string $beginDayOfWeek): RepeatSetting {
		$this->beginDayOfWeek = $beginDayOfWeek;
		return $this;
	}
    /** @return string|null End Day of Week */
	public function getEndDayOfWeek(): ?string {
		return $this->endDayOfWeek;
	}
    /** @param string|null $endDayOfWeek End Day of Week */
	public function setEndDayOfWeek(?string $endDayOfWeek) {
		$this->endDayOfWeek = $endDayOfWeek;
	}
    /**
     * @param string|null $endDayOfWeek End Day of Week
     * @return RepeatSetting
     */
	public function withEndDayOfWeek(?string $endDayOfWeek): RepeatSetting {
		$this->endDayOfWeek = $endDayOfWeek;
		return $this;
	}
    /** @return int|null Begin Hour */
	public function getBeginHour(): ?int {
		return $this->beginHour;
	}
    /** @param int|null $beginHour Begin Hour */
	public function setBeginHour(?int $beginHour) {
		$this->beginHour = $beginHour;
	}
    /**
     * @param int|null $beginHour Begin Hour
     * @return RepeatSetting
     */
	public function withBeginHour(?int $beginHour): RepeatSetting {
		$this->beginHour = $beginHour;
		return $this;
	}
    /** @return int|null End Hour */
	public function getEndHour(): ?int {
		return $this->endHour;
	}
    /** @param int|null $endHour End Hour */
	public function setEndHour(?int $endHour) {
		$this->endHour = $endHour;
	}
    /**
     * @param int|null $endHour End Hour
     * @return RepeatSetting
     */
	public function withEndHour(?int $endHour): RepeatSetting {
		$this->endHour = $endHour;
		return $this;
	}
    /** @return int|null Anchor Timestamp */
	public function getAnchorTimestamp(): ?int {
		return $this->anchorTimestamp;
	}
    /** @param int|null $anchorTimestamp Anchor Timestamp */
	public function setAnchorTimestamp(?int $anchorTimestamp) {
		$this->anchorTimestamp = $anchorTimestamp;
	}
    /**
     * @param int|null $anchorTimestamp Anchor Timestamp
     * @return RepeatSetting
     */
	public function withAnchorTimestamp(?int $anchorTimestamp): RepeatSetting {
		$this->anchorTimestamp = $anchorTimestamp;
		return $this;
	}
    /** @return int|null Active Days */
	public function getActiveDays(): ?int {
		return $this->activeDays;
	}
    /** @param int|null $activeDays Active Days */
	public function setActiveDays(?int $activeDays) {
		$this->activeDays = $activeDays;
	}
    /**
     * @param int|null $activeDays Active Days
     * @return RepeatSetting
     */
	public function withActiveDays(?int $activeDays): RepeatSetting {
		$this->activeDays = $activeDays;
		return $this;
	}
    /** @return int|null Inactive Days */
	public function getInactiveDays(): ?int {
		return $this->inactiveDays;
	}
    /** @param int|null $inactiveDays Inactive Days */
	public function setInactiveDays(?int $inactiveDays) {
		$this->inactiveDays = $inactiveDays;
	}
    /**
     * @param int|null $inactiveDays Inactive Days
     * @return RepeatSetting
     */
	public function withInactiveDays(?int $inactiveDays): RepeatSetting {
		$this->inactiveDays = $inactiveDays;
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
            ->withEndHour(array_key_exists('endHour', $data) && $data['endHour'] !== null ? $data['endHour'] : null)
            ->withAnchorTimestamp(array_key_exists('anchorTimestamp', $data) && $data['anchorTimestamp'] !== null ? $data['anchorTimestamp'] : null)
            ->withActiveDays(array_key_exists('activeDays', $data) && $data['activeDays'] !== null ? $data['activeDays'] : null)
            ->withInactiveDays(array_key_exists('inactiveDays', $data) && $data['inactiveDays'] !== null ? $data['inactiveDays'] : null);
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
            "anchorTimestamp" => $this->getAnchorTimestamp(),
            "activeDays" => $this->getActiveDays(),
            "inactiveDays" => $this->getInactiveDays(),
        );
    }
}