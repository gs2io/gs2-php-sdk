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

namespace Gs2\Ranking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getRanking: Get Ranking
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#getranking
 */
class GetRankingRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Category Model name */
    private $categoryName;
    /** @var string User ID from which the ranking is obtained (used to determine the duration of the GS2-Schedule). */
    private $accessToken;
    /** @var string User ID of the user who earned the score */
    private $scorerUserId;
    /** @var string Score Unique ID */
    private $uniqueId;
    /** @var string Scope Name */
    private $additionalScopeName;
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
     * @return GetRankingRequest
     */
	public function withNamespaceName(?string $namespaceName): GetRankingRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Category Model name */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
    /** @param string|null $categoryName Category Model name */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
    /**
     * @param string|null $categoryName Category Model name
     * @return GetRankingRequest
     */
	public function withCategoryName(?string $categoryName): GetRankingRequest {
		$this->categoryName = $categoryName;
		return $this;
	}
    /** @return string|null User ID from which the ranking is obtained (used to determine the duration of the GS2-Schedule). */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID from which the ranking is obtained (used to determine the duration of the GS2-Schedule). */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID from which the ranking is obtained (used to determine the duration of the GS2-Schedule).
     * @return GetRankingRequest
     */
	public function withAccessToken(?string $accessToken): GetRankingRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null User ID of the user who earned the score */
	public function getScorerUserId(): ?string {
		return $this->scorerUserId;
	}
    /** @param string|null $scorerUserId User ID of the user who earned the score */
	public function setScorerUserId(?string $scorerUserId) {
		$this->scorerUserId = $scorerUserId;
	}
    /**
     * @param string|null $scorerUserId User ID of the user who earned the score
     * @return GetRankingRequest
     */
	public function withScorerUserId(?string $scorerUserId): GetRankingRequest {
		$this->scorerUserId = $scorerUserId;
		return $this;
	}
    /** @return string|null Score Unique ID */
	public function getUniqueId(): ?string {
		return $this->uniqueId;
	}
    /** @param string|null $uniqueId Score Unique ID */
	public function setUniqueId(?string $uniqueId) {
		$this->uniqueId = $uniqueId;
	}
    /**
     * @param string|null $uniqueId Score Unique ID
     * @return GetRankingRequest
     */
	public function withUniqueId(?string $uniqueId): GetRankingRequest {
		$this->uniqueId = $uniqueId;
		return $this;
	}
    /** @return string|null Scope Name */
	public function getAdditionalScopeName(): ?string {
		return $this->additionalScopeName;
	}
    /** @param string|null $additionalScopeName Scope Name */
	public function setAdditionalScopeName(?string $additionalScopeName) {
		$this->additionalScopeName = $additionalScopeName;
	}
    /**
     * @param string|null $additionalScopeName Scope Name
     * @return GetRankingRequest
     */
	public function withAdditionalScopeName(?string $additionalScopeName): GetRankingRequest {
		$this->additionalScopeName = $additionalScopeName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRankingRequest {
        if ($data === null) {
            return null;
        }
        return (new GetRankingRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withScorerUserId(array_key_exists('scorerUserId', $data) && $data['scorerUserId'] !== null ? $data['scorerUserId'] : null)
            ->withUniqueId(array_key_exists('uniqueId', $data) && $data['uniqueId'] !== null ? $data['uniqueId'] : null)
            ->withAdditionalScopeName(array_key_exists('additionalScopeName', $data) && $data['additionalScopeName'] !== null ? $data['additionalScopeName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "accessToken" => $this->getAccessToken(),
            "scorerUserId" => $this->getScorerUserId(),
            "uniqueId" => $this->getUniqueId(),
            "additionalScopeName" => $this->getAdditionalScopeName(),
        );
    }
}