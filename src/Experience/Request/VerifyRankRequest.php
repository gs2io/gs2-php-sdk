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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyRank: Verify rank
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#verifyrank
 */
class VerifyRankRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Experience Model name */
    private $experienceName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var string Property ID */
    private $propertyId;
    /** @var int Current Rank */
    private $rankValue;
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
     * @return VerifyRankRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyRankRequest {
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
     * @return VerifyRankRequest
     */
	public function withAccessToken(?string $accessToken): VerifyRankRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Experience Model name */
	public function getExperienceName(): ?string {
		return $this->experienceName;
	}
    /** @param string|null $experienceName Experience Model name */
	public function setExperienceName(?string $experienceName) {
		$this->experienceName = $experienceName;
	}
    /**
     * @param string|null $experienceName Experience Model name
     * @return VerifyRankRequest
     */
	public function withExperienceName(?string $experienceName): VerifyRankRequest {
		$this->experienceName = $experienceName;
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
     * @return VerifyRankRequest
     */
	public function withVerifyType(?string $verifyType): VerifyRankRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return VerifyRankRequest
     */
	public function withPropertyId(?string $propertyId): VerifyRankRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return int|null Current Rank */
	public function getRankValue(): ?int {
		return $this->rankValue;
	}
    /** @param int|null $rankValue Current Rank */
	public function setRankValue(?int $rankValue) {
		$this->rankValue = $rankValue;
	}
    /**
     * @param int|null $rankValue Current Rank
     * @return VerifyRankRequest
     */
	public function withRankValue(?int $rankValue): VerifyRankRequest {
		$this->rankValue = $rankValue;
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
     * @return VerifyRankRequest
     */
	public function withMultiplyValueSpecifyingQuantity(?bool $multiplyValueSpecifyingQuantity): VerifyRankRequest {
		$this->multiplyValueSpecifyingQuantity = $multiplyValueSpecifyingQuantity;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyRankRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyRankRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyRankRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withExperienceName(array_key_exists('experienceName', $data) && $data['experienceName'] !== null ? $data['experienceName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withRankValue(array_key_exists('rankValue', $data) && $data['rankValue'] !== null ? $data['rankValue'] : null)
            ->withMultiplyValueSpecifyingQuantity(array_key_exists('multiplyValueSpecifyingQuantity', $data) ? $data['multiplyValueSpecifyingQuantity'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "experienceName" => $this->getExperienceName(),
            "verifyType" => $this->getVerifyType(),
            "propertyId" => $this->getPropertyId(),
            "rankValue" => $this->getRankValue(),
            "multiplyValueSpecifyingQuantity" => $this->getMultiplyValueSpecifyingQuantity(),
        );
    }
}