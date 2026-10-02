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
 * Scoped Value
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#scopedvalue
 */
class ScopedValue implements IModel {
	/**
     * @var string Scope type
	 */
	private $scopeType;
	/**
     * @var string Reset timing
	 */
	private $resetType;
	/**
     * @var string Condition Name
	 */
	private $conditionName;
	/**
     * @var int Count value
	 */
	private $value;
	/**
     * @var int Next reset timing
	 */
	private $nextResetAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
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
     * @return ScopedValue
     */
	public function withScopeType(?string $scopeType): ScopedValue {
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
     * @return ScopedValue
     */
	public function withResetType(?string $resetType): ScopedValue {
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
     * @return ScopedValue
     */
	public function withConditionName(?string $conditionName): ScopedValue {
		$this->conditionName = $conditionName;
		return $this;
	}
    /** @return int|null Count value */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Count value */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Count value
     * @return ScopedValue
     */
	public function withValue(?int $value): ScopedValue {
		$this->value = $value;
		return $this;
	}
    /** @return int|null Next reset timing */
	public function getNextResetAt(): ?int {
		return $this->nextResetAt;
	}
    /** @param int|null $nextResetAt Next reset timing */
	public function setNextResetAt(?int $nextResetAt) {
		$this->nextResetAt = $nextResetAt;
	}
    /**
     * @param int|null $nextResetAt Next reset timing
     * @return ScopedValue
     */
	public function withNextResetAt(?int $nextResetAt): ScopedValue {
		$this->nextResetAt = $nextResetAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return ScopedValue
     */
	public function withUpdatedAt(?int $updatedAt): ScopedValue {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?ScopedValue {
        if ($data === null) {
            return null;
        }
        return (new ScopedValue())
            ->withScopeType(array_key_exists('scopeType', $data) && $data['scopeType'] !== null ? $data['scopeType'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withConditionName(array_key_exists('conditionName', $data) && $data['conditionName'] !== null ? $data['conditionName'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withNextResetAt(array_key_exists('nextResetAt', $data) && $data['nextResetAt'] !== null ? $data['nextResetAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "scopeType" => $this->getScopeType(),
            "resetType" => $this->getResetType(),
            "conditionName" => $this->getConditionName(),
            "value" => $this->getValue(),
            "nextResetAt" => $this->getNextResetAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}