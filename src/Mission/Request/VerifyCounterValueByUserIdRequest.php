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

/**
 * Request for verifyCounterValueByUserId: Verify counter value by User ID
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#verifycountervaluebyuserid
 */
class VerifyCounterValueByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Counter Model name */
    private $counterName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var string Scope type */
    private $scopeType;
    /** @var string Reset timing */
    private $resetType;
    /** @var string Condition Name */
    private $conditionName;
    /** @var int Count value */
    private $value;
    /** @var bool Whether to multiply the value used for verification when specifying the quantity */
    private $multiplyValueSpecifyingQuantity;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyCounterValueByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyCounterValueByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
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
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withCounterName(?string $counterName): VerifyCounterValueByUserIdRequest {
		$this->counterName = $counterName;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyCounterValueByUserIdRequest {
		$this->verifyType = $verifyType;
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
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withScopeType(?string $scopeType): VerifyCounterValueByUserIdRequest {
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
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withResetType(?string $resetType): VerifyCounterValueByUserIdRequest {
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
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withConditionName(?string $conditionName): VerifyCounterValueByUserIdRequest {
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
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withValue(?int $value): VerifyCounterValueByUserIdRequest {
		$this->value = $value;
		return $this;
	}
    /** @return bool|null Whether to multiply the value used for verification when specifying the quantity */
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
    /** @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity */
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
    /**
     * @param bool|null $multiplyValueSpecifyingQuantity Whether to multiply the value used for verification when specifying the quantity
     * @return VerifyCounterValueByUserIdRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyCounterValueByUserIdRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return VerifyCounterValueByUserIdRequest
     */
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