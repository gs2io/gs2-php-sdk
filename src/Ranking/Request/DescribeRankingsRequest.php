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

class DescribeRankingsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $categoryName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $additionalScopeName;
    /** @var int */
    private $startIndex;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DescribeRankingsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
	public function withCategoryName(?string $categoryName): DescribeRankingsRequest {
		$this->categoryName = $categoryName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): DescribeRankingsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getAdditionalScopeName(): ?string {
		return $this->additionalScopeName;
	}
	public function setAdditionalScopeName(?string $additionalScopeName) {
		$this->additionalScopeName = $additionalScopeName;
	}
	public function withAdditionalScopeName(?string $additionalScopeName): DescribeRankingsRequest {
		$this->additionalScopeName = $additionalScopeName;
		return $this;
	}
	public function getStartIndex(): ?int {
		return $this->startIndex;
	}
	public function setStartIndex(?int $startIndex) {
		$this->startIndex = $startIndex;
	}
	public function withStartIndex(?int $startIndex): DescribeRankingsRequest {
		$this->startIndex = $startIndex;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): DescribeRankingsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
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