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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyStaminaOverflowValueByUserId: Verify the value of the overflow value by User ID
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#verifystaminaoverflowvaluebyuserid
 */
class VerifyStaminaOverflowValueByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Stamina Model Name */
    private $staminaName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Value to be verified */
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
     * @return VerifyStaminaOverflowValueByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyStaminaOverflowValueByUserIdRequest {
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
     * @return VerifyStaminaOverflowValueByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyStaminaOverflowValueByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Stamina Model Name */
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
    /** @param string|null $staminaName Stamina Model Name */
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
    /**
     * @param string|null $staminaName Stamina Model Name
     * @return VerifyStaminaOverflowValueByUserIdRequest
     */
	public function withStaminaName(?string $staminaName): VerifyStaminaOverflowValueByUserIdRequest {
		$this->staminaName = $staminaName;
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
     * @return VerifyStaminaOverflowValueByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyStaminaOverflowValueByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Value to be verified */
	public function getValue(): ?int {
		return $this->value;
	}
    /** @param int|null $value Value to be verified */
	public function setValue(?int $value) {
		$this->value = $value;
	}
    /**
     * @param int|null $value Value to be verified
     * @return VerifyStaminaOverflowValueByUserIdRequest
     */
	public function withValue(?int $value): VerifyStaminaOverflowValueByUserIdRequest {
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
     * @return VerifyStaminaOverflowValueByUserIdRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyStaminaOverflowValueByUserIdRequest {
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
     * @return VerifyStaminaOverflowValueByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyStaminaOverflowValueByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyStaminaOverflowValueByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyStaminaOverflowValueByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyStaminaOverflowValueByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "staminaName" => $this->getStaminaName(),
            "verifyType" => $this->getVerifyType(),
            "value" => $this->getValue(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}