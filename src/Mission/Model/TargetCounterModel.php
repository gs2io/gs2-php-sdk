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


class TargetCounterModel implements IModel {
	/**
     * @var string
	 */
	private $counterName;
	/**
     * @var string
	 */
	private $scopeType;
	/**
     * @var string
	 */
	private $resetType;
	/**
     * @var string
	 */
	private $conditionName;
	/**
     * @var int
	 */
	private $value;
	public function getCounterName(): ?string {
		return $this->counterName;
	}
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
	public function withCounterName(?string $counterName): TargetCounterModel {
		$this->counterName = $counterName;
		return $this;
	}
	public function getScopeType(): ?string {
		return $this->scopeType;
	}
	public function setScopeType(?string $scopeType) {
		$this->scopeType = $scopeType;
	}
	public function withScopeType(?string $scopeType): TargetCounterModel {
		$this->scopeType = $scopeType;
		return $this;
	}
	public function getResetType(): ?string {
		return $this->resetType;
	}
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
	public function withResetType(?string $resetType): TargetCounterModel {
		$this->resetType = $resetType;
		return $this;
	}
	public function getConditionName(): ?string {
		return $this->conditionName;
	}
	public function setConditionName(?string $conditionName) {
		$this->conditionName = $conditionName;
	}
	public function withConditionName(?string $conditionName): TargetCounterModel {
		$this->conditionName = $conditionName;
		return $this;
	}
	public function getValue(): ?int {
		return $this->value;
	}
	public function setValue(?int $value) {
		$this->value = $value;
	}
	public function withValue(?int $value): TargetCounterModel {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?TargetCounterModel {
        if ($data === null) {
            return null;
        }
        return (new TargetCounterModel())
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withScopeType(array_key_exists('scopeType', $data) && $data['scopeType'] !== null ? $data['scopeType'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withConditionName(array_key_exists('conditionName', $data) && $data['conditionName'] !== null ? $data['conditionName'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null);
    }

    public function toJson(): array {
        return array(
            "counterName" => $this->getCounterName(),
            "scopeType" => $this->getScopeType(),
            "resetType" => $this->getResetType(),
            "conditionName" => $this->getConditionName(),
            "value" => $this->getValue(),
        );
    }
}