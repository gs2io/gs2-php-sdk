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
 * Request for verifyCounterValue: Verify counter value
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#verifycountervalue
 */
class VerifyCounterValueRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
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
     * @return VerifyCounterValueRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyCounterValueRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return VerifyCounterValueRequest
     */
	public function withAccessToken(?string $accessToken): VerifyCounterValueRequest {
		$this->accessToken = $accessToken;
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
     * @return VerifyCounterValueRequest
     */
	public function withCounterName(?string $counterName): VerifyCounterValueRequest {
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
     * @return VerifyCounterValueRequest
     */
	public function withVerifyType(?string $verifyType): VerifyCounterValueRequest {
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
     * @return VerifyCounterValueRequest
     */
	public function withScopeType(?string $scopeType): VerifyCounterValueRequest {
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
     * @return VerifyCounterValueRequest
     */
	public function withResetType(?string $resetType): VerifyCounterValueRequest {
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
     * @return VerifyCounterValueRequest
     */
	public function withConditionName(?string $conditionName): VerifyCounterValueRequest {
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
     * @return VerifyCounterValueRequest
     */
	public function withValue(?int $value): VerifyCounterValueRequest {
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
     * @return VerifyCounterValueRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyCounterValueRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyCounterValueRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCounterValueRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyCounterValueRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withCounterName(array_key_exists('counterName', $data) && $data['counterName'] !== null ? $data['counterName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withScopeType(array_key_exists('scopeType', $data) && $data['scopeType'] !== null ? $data['scopeType'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withConditionName(array_key_exists('conditionName', $data) && $data['conditionName'] !== null ? $data['conditionName'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "counterName" => $this->getCounterName(),
            "verifyType" => $this->getVerifyType(),
            "scopeType" => $this->getScopeType(),
            "resetType" => $this->getResetType(),
            "conditionName" => $this->getConditionName(),
            "value" => $this->getValue(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
        );
    }
}