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
 * Request for describeRankings: Get Ranking
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#describerankings
 */
class DescribeRankingsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Category Model name */
    private $categoryName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Scope Name */
    private $additionalScopeName;
    /** @var int Index to start retrieving rankings */
    private $startIndex;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
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
     * @return DescribeRankingsRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeRankingsRequest {
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
     * @return DescribeRankingsRequest
     */
	public function withCategoryName(?string $categoryName): DescribeRankingsRequest {
		$this->categoryName = $categoryName;
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
     * @return DescribeRankingsRequest
     */
	public function withAccessToken(?string $accessToken): DescribeRankingsRequest {
		$this->accessToken = $accessToken;
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
     * @return DescribeRankingsRequest
     */
	public function withAdditionalScopeName(?string $additionalScopeName): DescribeRankingsRequest {
		$this->additionalScopeName = $additionalScopeName;
		return $this;
	}
    /** @return int|null Index to start retrieving rankings */
	public function getStartIndex(): ?int {
		return $this->startIndex;
	}
    /** @param int|null $startIndex Index to start retrieving rankings */
	public function setStartIndex(?int $startIndex) {
		$this->startIndex = $startIndex;
	}
    /**
     * @param int|null $startIndex Index to start retrieving rankings
     * @return DescribeRankingsRequest
     */
	public function withStartIndex(?int $startIndex): DescribeRankingsRequest {
		$this->startIndex = $startIndex;
		return $this;
	}
    /** @return string|null Token specifying the position from which to start acquiring data */
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
    /** @param string|null $pageToken Token specifying the position from which to start acquiring data */
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
    /**
     * @param string|null $pageToken Token specifying the position from which to start acquiring data
     * @return DescribeRankingsRequest
     */
	public function withPageToken(?string $pageToken): DescribeRankingsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data items to retrieve */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data items to retrieve */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data items to retrieve
     * @return DescribeRankingsRequest
     */
	public function withLimit(?int $limit): DescribeRankingsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeRankingsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeRankingsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withAdditionalScopeName(array_key_exists('additionalScopeName', $data) && $data['additionalScopeName'] !== null ? $data['additionalScopeName'] : null)
            ->withStartIndex(array_key_exists('startIndex', $data) && $data['startIndex'] !== null ? $data['startIndex'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "accessToken" => $this->getAccessToken(),
            "additionalScopeName" => $this->getAdditionalScopeName(),
            "startIndex" => $this->getStartIndex(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}