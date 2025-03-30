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

class VerifyStaminaRecoverIntervalMinutesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $verifyType;
    /** @var int */
    private $value;
    /** @var bool */
    private $multiplyValueSpecifyingQuantity;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): VerifyStaminaRecoverIntervalMinutesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): VerifyStaminaRecoverIntervalMinutesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
	public function withStaminaName(?string $staminaName): VerifyStaminaRecoverIntervalMinutesRequest {
		$this->staminaName = $staminaName;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyStaminaRecoverIntervalMinutesRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
	public function getValue(): ?int {
		return $this->value;
	}
	public function setValue(?int $value) {
		$this->value = $value;
	}
	public function withValue(?int $value): VerifyStaminaRecoverIntervalMinutesRequest {
		$this->value = $value;
		return $this;
	}
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyStaminaRecoverIntervalMinutesRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyStaminaRecoverIntervalMinutesRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyStaminaRecoverIntervalMinutesRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyStaminaRecoverIntervalMinutesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withValue(array_key_exists('value', $data) && $data['value'] !== null ? $data['value'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "staminaName" => $this->getStaminaName(),
            "verifyType" => $this->getVerifyType(),
            "value" => $this->getValue(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
        );
    }
}