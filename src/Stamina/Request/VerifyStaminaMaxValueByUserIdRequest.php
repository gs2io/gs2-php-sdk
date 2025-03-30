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

class VerifyStaminaMaxValueByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $verifyType;
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
	public function withNamespaceName(?string $namespaceName): VerifyStaminaMaxValueByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): VerifyStaminaMaxValueByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
	public function withStaminaName(?string $staminaName): VerifyStaminaMaxValueByUserIdRequest {
		$this->staminaName = $staminaName;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyStaminaMaxValueByUserIdRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
	public function getValue(): ?int {
		return $this->value;
	}
	public function setValue(?int $value) {
		$this->value = $value;
	}
	public function withValue(?int $value): VerifyStaminaMaxValueByUserIdRequest {
		$this->value = $value;
		return $this;
	}
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyStaminaMaxValueByUserIdRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyStaminaMaxValueByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyStaminaMaxValueByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyStaminaMaxValueByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyStaminaMaxValueByUserIdRequest())
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