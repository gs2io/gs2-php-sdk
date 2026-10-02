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

/**
 * Request for verifyRarityParameterStatus: Verify rarity parameter
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#verifyrarityparameterstatus
 */
class VerifyRarityParameterStatusRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rarity Parameter Model name */
    private $parameterName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Property ID of the resource that owns the parameter */
    private $propertyId;
    /** @var string Type of verification */
    private $verifyType;
    /** @var string Name */
    private $parameterValueName;
    /** @var int Number of parameters to verify */
    private $parameterCount;
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
     * @return VerifyRarityParameterStatusRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyRarityParameterStatusRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Rarity Parameter Model name */
	public function getParameterName(): ?string {
		return $this->parameterName;
	}
    /** @param string|null $parameterName Rarity Parameter Model name */
	public function setParameterName(?string $parameterName) {
		$this->parameterName = $parameterName;
	}
    /**
     * @param string|null $parameterName Rarity Parameter Model name
     * @return VerifyRarityParameterStatusRequest
     */
	public function withParameterName(?string $parameterName): VerifyRarityParameterStatusRequest {
		$this->parameterName = $parameterName;
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
     * @return VerifyRarityParameterStatusRequest
     */
	public function withAccessToken(?string $accessToken): VerifyRarityParameterStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Property ID of the resource that owns the parameter */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID of the resource that owns the parameter */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID of the resource that owns the parameter
     * @return VerifyRarityParameterStatusRequest
     */
	public function withPropertyId(?string $propertyId): VerifyRarityParameterStatusRequest {
		$this->propertyId = $propertyId;
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
     * @return VerifyRarityParameterStatusRequest
     */
	public function withVerifyType(?string $verifyType): VerifyRarityParameterStatusRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return string|null Name */
	public function getParameterValueName(): ?string {
		return $this->parameterValueName;
	}
    /** @param string|null $parameterValueName Name */
	public function setParameterValueName(?string $parameterValueName) {
		$this->parameterValueName = $parameterValueName;
	}
    /**
     * @param string|null $parameterValueName Name
     * @return VerifyRarityParameterStatusRequest
     */
	public function withParameterValueName(?string $parameterValueName): VerifyRarityParameterStatusRequest {
		$this->parameterValueName = $parameterValueName;
		return $this;
	}
    /** @return int|null Number of parameters to verify */
	public function getParameterCount(): ?int {
		return $this->parameterCount;
	}
    /** @param int|null $parameterCount Number of parameters to verify */
	public function setParameterCount(?int $parameterCount) {
		$this->parameterCount = $parameterCount;
	}
    /**
     * @param int|null $parameterCount Number of parameters to verify
     * @return VerifyRarityParameterStatusRequest
     */
	public function withParameterCount(?int $parameterCount): VerifyRarityParameterStatusRequest {
		$this->parameterCount = $parameterCount;
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
     * @return VerifyRarityParameterStatusRequest
     */
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