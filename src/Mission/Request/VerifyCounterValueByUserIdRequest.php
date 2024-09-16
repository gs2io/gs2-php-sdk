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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class VerifyCounterValueByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $counterName;
    /** @var string */
    private $verifyType;
    /** @var string */
    private $scopeType;
    /** @var string */
    private $resetType;
    /** @var string */
    private $conditionName;
    /** @var int */
    private $value;
    /** @var bool */
    private $multiplyValueSpecifyingQuantity;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): VerifyCounterValueByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): VerifyCounterValueByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getCounterName(): ?string {
		return $this->counterName;
	}
	public function setCounterName(?string $counterName) {
		$this->counterName = $counterName;
	}
	public function withCounterName(?string $counterName): VerifyCounterValueByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyCounterValueByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
	public function getScopeType(): ?string {
		return $this->scopeType;
	}
	public function setScopeType(?string $scopeType) {
		$this->scopeType = $scopeType;
	}
	public function withScopeType(?string $scopeType): VerifyCounterValueByUserIdRequest {
		$this->scopeType = $scopeType;
		return $this;
	}
	public function getResetType(): ?string {
		return $this->resetType;
	}
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
	public function withResetType(?string $resetType): VerifyCounterValueByUserIdRequest {
		$this->resetType = $resetType;
		return $this;
	}
	public function getConditionName(): ?string {
		return $this->conditionName;
	}
	public function setConditionName(?string $conditionName) {
		$this->conditionName = $conditionName;
	}
	public function withConditionName(?string $conditionName): VerifyCounterValueByUserIdRequest {
		$this->conditionName = $conditionName;
		return $this;
	}
	public function getValue(): ?int {
		return $this->value;
	}
	public function setValue(?int $value) {
		$this->value = $value;
	}
	public function withValue(?int $value): VerifyCounterValueByUserIdRequest {
		$this->value = $value;
		return $this;
	}
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyCounterValueByUserIdRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyCounterValueByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyCounterValueByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCounterValueByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyCounterValueByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withScopeType(array_key_exists('scopeType', $data) && $data['scopeType'] !== null ? $data['scopeType'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withConditionName(array_key_exists('conditionName', $data) && $data['conditionName'] !== null ? $data['conditionName'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "counterName" => $this->getCounterName(),
            "verifyType" => $this->getVerifyType(),
            "scopeType" => $this->getScopeType(),
            "resetType" => $this->getResetType(),
            "conditionName" => $this->getConditionName(),
            "value" => $this->getValue(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}