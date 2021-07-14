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

class GetRankingRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $categoryName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $scorerUserId;
    /** @var string */
    private $uniqueId;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetRankingRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	public function withCategoryName(?string $categoryName): GetRankingRequest {
		$this->categoryName = $categoryName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): GetRankingRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getScorerUserId(): ?string {
		return $this->scorerUserId;
	}

	public function setScorerUserId(?string $scorerUserId) {
		$this->scorerUserId = $scorerUserId;
	}

	public function withScorerUserId(?string $scorerUserId): GetRankingRequest {
		$this->scorerUserId = $scorerUserId;
		return $this;
	}

	public function getUniqueId(): ?string {
		return $this->uniqueId;
	}

	public function setUniqueId(?string $uniqueId) {
		$this->uniqueId = $uniqueId;
	}

	public function withUniqueId(?string $uniqueId): GetRankingRequest {
		$this->uniqueId = $uniqueId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRankingRequest {
        if ($data === null) {
            return null;
        }
        return (new GetRankingRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withCategoryName(empty($data['categoryName']) ? null : $data['categoryName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withScorerUserId(empty($data['scorerUserId']) ? null : $data['scorerUserId'])
            ->withUniqueId(empty($data['uniqueId']) ? null : $data['uniqueId']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "accessToken" => $this->getAccessToken(),
            "scorerUserId" => $this->getScorerUserId(),
            "uniqueId" => $this->getUniqueId(),
        );
    }
}