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
 * Request for calcRanking: Forced execution of the ranking calculation process
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#calcranking
 */
class CalcRankingRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Category Model name */
    private $categoryName;
    /** @var string Additional scope */
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
     * @return CalcRankingRequest
     */
	public function withNamespaceName(?string $namespaceName): CalcRankingRequest {
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
     * @return CalcRankingRequest
     */
	public function withCategoryName(?string $categoryName): CalcRankingRequest {
		$this->categoryName = $categoryName;
		return $this;
	}
    /** @return string|null Additional scope */
	public function getAdditionalScopeName(): ?string {
		return $this->additionalScopeName;
	}
    /** @param string|null $additionalScopeName Additional scope */
	public function setAdditionalScopeName(?string $additionalScopeName) {
		$this->additionalScopeName = $additionalScopeName;
	}
    /**
     * @param string|null $additionalScopeName Additional scope
     * @return CalcRankingRequest
     */
	public function withAdditionalScopeName(?string $additionalScopeName): CalcRankingRequest {
		$this->additionalScopeName = $additionalScopeName;
		return $this;
	}

    public static function fromJson(?array $data): ?CalcRankingRequest {
        if ($data === null) {
            return null;
        }
        return (new CalcRankingRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withAdditionalScopeName(array_key_exists('additionalScopeName', $data) && $data['additionalScopeName'] !== null ? $data['additionalScopeName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "additionalScopeName" => $this->getAdditionalScopeName(),
        );
    }
}