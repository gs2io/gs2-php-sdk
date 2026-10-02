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
 * Request for verifyRarityParameterStatusByUserId: Verify rarity parameter by User ID
 *
 * @see https://docs.gs2.io/api_reference/enchant/sdk/#verifyrarityparameterstatusbyuserid
 */
class VerifyRarityParameterStatusByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Rarity Parameter Model name */
    private $parameterName;
    /** @var string User ID */
    private $userId;
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyRarityParameterStatusByUserIdRequest {
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withParameterName(?string $parameterName): VerifyRarityParameterStatusByUserIdRequest {
		$this->parameterName = $parameterName;
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyRarityParameterStatusByUserIdRequest {
		$this->userId = $userId;
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): VerifyRarityParameterStatusByUserIdRequest {
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyRarityParameterStatusByUserIdRequest {
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withParameterValueName(?string $parameterValueName): VerifyRarityParameterStatusByUserIdRequest {
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withParameterCount(?int $parameterCount): VerifyRarityParameterStatusByUserIdRequest {
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyRarityParameterStatusByUserIdRequest {
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
     * @return VerifyRarityParameterStatusByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyRarityParameterStatusByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyRarityParameterStatusByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyRarityParameterStatusByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyRarityParameterStatusByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withParameterName(array_key_exists('parameterName', $data) && $data['parameterName'] !== null ? $data['parameterName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withParameterValueName(array_key_exists('parameterValueName', $data) && $data['parameterValueName'] !== null ? $data['parameterValueName'] : null)
            ->withParameterCount(array_key_exists('parameterCount', $data) && $data['parameterCount'] !== null ? $data['parameterCount'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "parameterName" => $this->getParameterName(),
            "userId" => $this->getUserId(),
            "propertyId" => $this->getPropertyId(),
            "verifyType" => $this->getVerifyType(),
            "parameterValueName" => $this->getParameterValueName(),
            "parameterCount" => $this->getParameterCount(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}