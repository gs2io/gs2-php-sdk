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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;


/**
 * Counter Reset Timing Model
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#counterscopemodel
 */
class CounterScopeModel implements IModel {
	/**
     * @var string Scope type
	 */
	private $scopeType;
	/**
     * @var string Reset timing
	 */
	private $resetType;
	/**
     * @var int Date to reset
	 */
	private $resetDayOfMonth;
	/**
     * @var string Day of the week to reset
	 */
	private $resetDayOfWeek;
	/**
     * @var int Hour of Reset
	 */
	private $resetHour;
	/**
     * @var string Condition Name
	 */
	private $conditionName;
	/**
     * @var VerifyAction Condition
	 */
	private $condition;
	/**
     * @var int Base date and time for counting elapsed days
	 */
	private $anchorTimestamp;
	/**
     * @var int Number of days to reset
	 */
	private $days;
    /** @return string|null Scope type */
	public function getScopeType(): ?string {
		return $this->scopeType;
	}
    /** @param string|null $scopeType Scope type */
	public function setScopeType(?string $scopeType) {
		$this->scopeType = $scopeType;
	}
    /**
     * @param string|null $scopeType Scope type
     * @return CounterScopeModel
     */
	public function withScopeType(?string $scopeType): CounterScopeModel {
		$this->scopeType = $scopeType;
		return $this;
	}
    /** @return string|null Reset timing */
	public function getResetType(): ?string {
		return $this->resetType;
	}
    /** @param string|null $resetType Reset timing */
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
    /**
     * @param string|null $resetType Reset timing
     * @return CounterScopeModel
     */
	public function withResetType(?string $resetType): CounterScopeModel {
		$this->resetType = $resetType;
		return $this;
	}
    /** @return int|null Date to reset */
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}
    /** @param int|null $resetDayOfMonth Date to reset */
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}
    /**
     * @param int|null $resetDayOfMonth Date to reset
     * @return CounterScopeModel
     */
	public function withResetDayOfMonth(?int $resetDayOfMonth): CounterScopeModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
    /** @return string|null Day of the week to reset */
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}
    /** @param string|null $resetDayOfWeek Day of the week to reset */
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}
    /**
     * @param string|null $resetDayOfWeek Day of the week to reset
     * @return CounterScopeModel
     */
	public function withResetDayOfWeek(?string $resetDayOfWeek): CounterScopeModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
    /** @return int|null Hour of Reset */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
    /** @param int|null $resetHour Hour of Reset */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
    /**
     * @param int|null $resetHour Hour of Reset
     * @return CounterScopeModel
     */
	public function withResetHour(?int $resetHour): CounterScopeModel {
		$this->resetHour = $resetHour;
		return $this;
	}
    /** @return string|null Condition Name */
	public function getConditionName(): ?string {
		return $this->conditionName;
	}
    /** @param string|null $conditionName Condition Name */
	public function setConditionName(?string $conditionName) {
		$this->conditionName = $conditionName;
	}
    /**
     * @param string|null $conditionName Condition Name
     * @return CounterScopeModel
     */
	public function withConditionName(?string $conditionName): CounterScopeModel {
		$this->conditionName = $conditionName;
		return $this;
	}
    /** @return VerifyAction|null Condition */
	public function getCondition(): ?VerifyAction {
		return $this->condition;
	}
    /** @param VerifyAction|null $condition Condition */
	public function setCondition(?VerifyAction $condition) {
		$this->condition = $condition;
	}
    /**
     * @param VerifyAction|null $condition Condition
     * @return CounterScopeModel
     */
	public function withCondition(?VerifyAction $condition): CounterScopeModel {
		$this->condition = $condition;
		return $this;
	}
    /** @return int|null Base date and time for counting elapsed days */
	public function getAnchorTimestamp(): ?int {
		return $this->anchorTimestamp;
	}
    /** @param int|null $anchorTimestamp Base date and time for counting elapsed days */
	public function setAnchorTimestamp(?int $anchorTimestamp) {
		$this->anchorTimestamp = $anchorTimestamp;
	}
    /**
     * @param int|null $anchorTimestamp Base date and time for counting elapsed days
     * @return CounterScopeModel
     */
	public function withAnchorTimestamp(?int $anchorTimestamp): CounterScopeModel {
		$this->anchorTimestamp = $anchorTimestamp;
		return $this;
	}
    /** @return int|null Number of days to reset */
	public function getDays(): ?int {
		return $this->days;
	}
    /** @param int|null $days Number of days to reset */
	public function setDays(?int $days) {
		$this->days = $days;
	}
    /**
     * @param int|null $days Number of days to reset
     * @return CounterScopeModel
     */
	public function withDays(?int $days): CounterScopeModel {
		$this->days = $days;
		return $this;
	}

    public static function fromJson(?array $data): ?CounterScopeModel {
        if ($data === null) {
            return null;
        }
        return (new CounterScopeModel())
            ->withScopeType(array_key_exists('scopeType', $data) && $data['scopeType'] !== null ? $data['scopeType'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withConditionName(array_key_exists('conditionName', $data) && $data['conditionName'] !== null ? $data['conditionName'] : null)
            ->withCondition(array_key_exists('condition', $data) && $data['condition'] !== null ? VerifyAction::fromJson($data['condition']) : null)
            ->withAnchorTimestamp(array_key_exists('anchorTimestamp', $data) && $data['anchorTimestamp'] !== null ? $data['anchorTimestamp'] : null)
            ->withDays(array_key_exists('days', $data) && $data['days'] !== null ? $data['days'] : null);
    }

    public function toJson(): array {
        return array(
            "scopeType" => $this->getScopeType(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "conditionName" => $this->getConditionName(),
            "condition" => $this->getCondition() !== null ? $this->getCondition()->toJson() : null,
            "anchorTimestamp" => $this->getAnchorTimestamp(),
            "days" => $this->getDays(),
        );
    }
}