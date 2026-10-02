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
 * Target Counter
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#targetcountermodel
 */
class TargetCounterModel implements IModel {
	/**
     * @var string Counter Model name
	 */
	private $counterName;
	/**
     * @var string Scope type
	 */
	private $scopeType;
	/**
     * @var string Target Reset timing
	 */
	private $resetType;
	/**
     * @var string Condition Name
	 */
	private $conditionName;
	/**
     * @var int Target value
	 */
	private $value;
    /** @return string|null Counter Model name */
	public function getCounterName(): ?string {
		return $this->counterName;
	}
    /** @param string|null $counterName Counter Model name */
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
    /**
     * @param string|null $counterName Counter Model name
     * @return TargetCounterModel
     */
	public function withCounterName(?string $counterName): TargetCounterModel {
		$this->counterName = $counterName;
		return $this;
	}
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
     * @return TargetCounterModel
     */
	public function withScopeType(?string $scopeType): TargetCounterModel {
		$this->scopeType = $scopeType;
		return $this;
	}
    /** @return string|null Target Reset timing */
	public function getResetType(): ?string {
		return $this->resetType;
	}
    /** @param string|null $resetType Target Reset timing */
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
    /**
     * @param string|null $resetType Target Reset timing
     * @return TargetCounterModel
     */
	public function withResetType(?string $resetType): TargetCounterModel {
		$this->resetType = $resetType;
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
     * @return TargetCounterModel
     */
	public function withConditionName(?string $conditionName): TargetCounterModel {
		$this->conditionName = $conditionName;
		return $this;
	}
    /** @return int|null Target value */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Target value */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Target value
     * @return TargetCounterModel
     */
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