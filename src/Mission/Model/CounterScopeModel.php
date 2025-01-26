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


class CounterScopeModel implements IModel {
	/**
     * @var string
	 */
	private $scopeType;
	/**
     * @var string
	 */
	private $resetType;
	/**
     * @var int
	 */
	private $resetDayOfMonth;
	/**
     * @var string
	 */
	private $resetDayOfWeek;
	/**
     * @var int
	 */
	private $resetHour;
	/**
     * @var string
	 */
	private $conditionName;
	/**
     * @var VerifyAction
	 */
	private $condition;
	/**
     * @var int
	 */
	private $anchorTimestamp;
	/**
     * @var int
	 */
	private $days;
	public function getScopeType(): ?string {
		return $this->scopeType;
	}
	public function setScopeType(?string $scopeType) {
		$this->scopeType = $scopeType;
	}
	public function withScopeType(?string $scopeType): CounterScopeModel {
		$this->scopeType = $scopeType;
		return $this;
	}
	public function getResetType(): ?string {
		return $this->resetType;
	}
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
	public function withResetType(?string $resetType): CounterScopeModel {
		$this->resetType = $resetType;
		return $this;
	}
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}
	public function withResetDayOfMonth(?int $resetDayOfMonth): CounterScopeModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}
	public function withResetDayOfWeek(?string $resetDayOfWeek): CounterScopeModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
	public function withResetHour(?int $resetHour): CounterScopeModel {
		$this->resetHour = $resetHour;
		return $this;
	}
	public function getConditionName(): ?string {
		return $this->conditionName;
	}
	public function setConditionName(?string $conditionName) {
		$this->conditionName = $conditionName;
	}
	public function withConditionName(?string $conditionName): CounterScopeModel {
		$this->conditionName = $conditionName;
		return $this;
	}
	public function getCondition(): ?VerifyAction {
		return $this->condition;
	}
	public function setCondition(?VerifyAction $condition) {
		$this->condition = $condition;
	}
	public function withCondition(?VerifyAction $condition): CounterScopeModel {
		$this->condition = $condition;
		return $this;
	}
	public function getAnchorTimestamp(): ?int {
		return $this->anchorTimestamp;
	}
	public function setAnchorTimestamp(?int $anchorTimestamp) {
		$this->anchorTimestamp = $anchorTimestamp;
	}
	public function withAnchorTimestamp(?int $anchorTimestamp): CounterScopeModel {
		$this->anchorTimestamp = $anchorTimestamp;
		return $this;
	}
	public function getDays(): ?int {
		return $this->days;
	}
	public function setDays(?int $days) {
		$this->days = $days;
	}
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