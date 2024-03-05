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

namespace Gs2\Enchant\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class VerifyRarityParameterStatusRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $parameterName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $propertyId;
    /** @var string */
    private $verifyType;
    /** @var string */
    private $parameterValueName;
    /** @var int */
    private $parameterCount;
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
	public function withNamespaceName(?string $namespaceName): VerifyRarityParameterStatusRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
	public function withParameterName(?string $parameterName): VerifyRarityParameterStatusRequest {
		$this->parameterName = $parameterName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): VerifyRarityParameterStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): VerifyRarityParameterStatusRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
	public function withVerifyType(?string $verifyType): VerifyRarityParameterStatusRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
	public function getParameterValueName(): ?string {
		return $this->parameterValueName;
	}
	public function setParameterValueName(?string $parameterValueName) {
		$this->parameterValueName = $parameterValueName;
	}
	public function withParameterValueName(?string $parameterValueName): VerifyRarityParameterStatusRequest {
		$this->parameterValueName = $parameterValueName;
		return $this;
	}
	public function getParameterCount(): ?int {
		return $this->parameterCount;
	}
	public function setParameterCount(?int $parameterCount) {
		$this->parameterCount = $parameterCount;
	}
	public function withParameterCount(?int $parameterCount): VerifyRarityParameterStatusRequest {
		$this->parameterCount = $parameterCount;
		return $this;
	}
	public function getMultiplyValueSpecifyingQuantity(): ?bool {
		return $this->multiplyValueSpecifyingQuantity;
	}
	public function setMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity) {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
	}
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyRarityParameterStatusRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyRarityParameterStatusRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyRarityParameterStatusRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyRarityParameterStatusRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withParameterValueName(array_key_exists('parameterValueName', $data) && $data['parameterValueName'] !== null ? $data['parameterValueName'] : null)
            ->withParameterCount(array_key_exists('parameterCount', $data) && $data['parameterCount'] !== null ? $data['parameterCount'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "parameterName" => $this->getParameterName(),
            "accessToken" => $this->getAccessToken(),
            "propertyId" => $this->getPropertyId(),
            "verifyType" => $this->getVerifyType(),
            "parameterValueName" => $this->getParameterValueName(),
            "parameterCount" => $this->getParameterCount(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
        );
    }
}