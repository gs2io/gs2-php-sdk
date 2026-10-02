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
 * Request for describeRankingssByUserId: Get ranking by User ID
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#describerankingssbyuserid
 */
class DescribeRankingssByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Category Model name */
    private $categoryName;
    /** @var string User ID */
    private $userId;
    /** @var string Scope Name */
    private $additionalScopeName;
    /** @var int Index to start retrieving rankings */
    private $startIndex;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeRankingssByUserIdRequest {
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withCategoryName(?string $categoryName): DescribeRankingssByUserIdRequest {
		$this->categoryName = $categoryName;
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withUserId(?string $userId): DescribeRankingssByUserIdRequest {
		$this->userId = $userId;
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withAdditionalScopeName(?string $additionalScopeName): DescribeRankingssByUserIdRequest {
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withStartIndex(?int $startIndex): DescribeRankingssByUserIdRequest {
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withPageToken(?string $pageToken): DescribeRankingssByUserIdRequest {
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withLimit(?int $limit): DescribeRankingssByUserIdRequest {
		$this->limit = $limit;
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
     * @return DescribeRankingssByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DescribeRankingssByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeRankingssByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeRankingssByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAdditionalScopeName(array_key_exists('additionalScopeName', $data) && $data['additionalScopeName'] !== null ? $data['additionalScopeName'] : null)
            ->withStartIndex(array_key_exists('startIndex', $data) && $data['startIndex'] !== null ? $data['startIndex'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "additionalScopeName" => $this->getAdditionalScopeName(),
            "startIndex" => $this->getStartIndex(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}