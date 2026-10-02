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
 * Request for describeNearRankings: Get ranking near the specified score
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#describenearrankings
 */
class DescribeNearRankingsRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Category Model name */
    private $categoryName;
    /** @var string Scope Name */
    private $additionalScopeName;
    /** @var int Score */
    private $score;
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
     * @return DescribeNearRankingsRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeNearRankingsRequest {
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
     * @return DescribeNearRankingsRequest
     */
	public function withCategoryName(?string $categoryName): DescribeNearRankingsRequest {
		$this->categoryName = $categoryName;
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
     * @return DescribeNearRankingsRequest
     */
	public function withAdditionalScopeName(?string $additionalScopeName): DescribeNearRankingsRequest {
		$this->additionalScopeName = $additionalScopeName;
		return $this;
	}
    /** @return int|null Score */
	public function getScore(): ?int {
		return $this->score;
	}
    /** @param int|null $score Score */
	public function setScore(?int $score) {
		$this->score = $score;
	}
    /**
     * @param int|null $score Score
     * @return DescribeNearRankingsRequest
     */
	public function withScore(?int $score): DescribeNearRankingsRequest {
		$this->score = $score;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeNearRankingsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeNearRankingsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withAdditionalScopeName(array_key_exists('additionalScopeName', $data) && $data['additionalScopeName'] !== null ? $data['additionalScopeName'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "additionalScopeName" => $this->getAdditionalScopeName(),
            "score" => $this->getScore(),
        );
    }
}