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
 * Request for subRankCap: Subtract rank cap
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#subrankcap
 */
class SubRankCapRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Experience Model name */
    private $experienceName;
    /** @var string Property ID */
    private $propertyId;
    /** @var int Current Rank Cap */
    private $rankCapValue;
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
     * @return SubRankCapRequest
     */
	public function withNamespaceName(?string $namespaceName): SubRankCapRequest {
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
     * @return SubRankCapRequest
     */
	public function withAccessToken(?string $accessToken): SubRankCapRequest {
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
     * @return SubRankCapRequest
     */
	public function withExperienceName(?string $experienceName): SubRankCapRequest {
		$this->experienceName = $experienceName;
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
     * @return SubRankCapRequest
     */
	public function withPropertyId(?string $propertyId): SubRankCapRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return int|null Current Rank Cap */
	public function getRankCapValue(): ?int {
		return $this->rankCapValue;
	}
    /** @param int|null $rankCapValue Current Rank Cap */
	public function setRankCapValue(?int $rankCapValue) {
		$this->rankCapValue = $rankCapValue;
	}
    /**
     * @param int|null $rankCapValue Current Rank Cap
     * @return SubRankCapRequest
     */
	public function withRankCapValue(?int $rankCapValue): SubRankCapRequest {
		$this->rankCapValue = $rankCapValue;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SubRankCapRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SubRankCapRequest {
        if ($data === null) {
            return null;
        }
        return (new SubRankCapRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withExperienceName(array_key_exists('experienceName', $data) && $data['experienceName'] !== null ? $data['experienceName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withRankCapValue(array_key_exists('rankCapValue', $data) && $data['rankCapValue'] !== null ? $data['rankCapValue'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "experienceName" => $this->getExperienceName(),
            "propertyId" => $this->getPropertyId(),
            "rankCapValue" => $this->getRankCapValue(),
        );
    }
}