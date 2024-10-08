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


class ScopedValue implements IModel {
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
	/**
     * @var int
	 */
	private $nextResetAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getScopeType(): ?string {
		return $this->scopeType;
	}
	public function setScopeType(?string $scopeType) {
		$this->scopeType = $scopeType;
	}
	public function withScopeType(?string $scopeType): ScopedValue {
		$this->scopeType = $scopeType;
		return $this;
	}
	public function getResetType(): ?string {
		return $this->resetType;
	}
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
	public function withResetType(?string $resetType): ScopedValue {
		$this->resetType = $resetType;
		return $this;
	}
	public function getConditionName(): ?string {
		return $this->conditionName;
	}
	public function setConditionName(?string $conditionName) {
		$this->conditionName = $conditionName;
	}
	public function withConditionName(?string $conditionName): ScopedValue {
		$this->conditionName = $conditionName;
		return $this;
	}
	public function getValue(): ?int {
		return $this->value;
	}
	public function setValue(?int $value) {
		$this->value = $value;
	}
	public function withValue(?int $value): ScopedValue {
		$this->value = $value;
		return $this;
	}
	public function getNextResetAt(): ?int {
		return $this->nextResetAt;
	}
	public function setNextResetAt(?int $nextResetAt) {
		$this->nextResetAt = $nextResetAt;
	}
	public function withNextResetAt(?int $nextResetAt): ScopedValue {
		$this->nextResetAt = $nextResetAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
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