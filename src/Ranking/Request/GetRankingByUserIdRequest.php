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

class GetRankingByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $categoryName;
    /** @var string */
    private $userId;
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

	public function withNamespaceName(?string $namespaceName): GetRankingByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	public function withCategoryName(?string $categoryName): GetRankingByUserIdRequest {
		$this->categoryName = $categoryName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): GetRankingByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getScorerUserId(): ?string {
		return $this->scorerUserId;
	}

	public function setScorerUserId(?string $scorerUserId) {
		$this->scorerUserId = $scorerUserId;
	}

	public function withScorerUserId(?string $scorerUserId): GetRankingByUserIdRequest {
		$this->scorerUserId = $scorerUserId;
		return $this;
	}

	public function getUniqueId(): ?string {
		return $this->uniqueId;
	}

	public function setUniqueId(?string $uniqueId) {
		$this->uniqueId = $uniqueId;
	}

	public function withUniqueId(?string $uniqueId): GetRankingByUserIdRequest {
		$this->uniqueId = $uniqueId;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRankingByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new GetRankingByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScorerUserId(array_key_exists('scorerUserId', $data) && $data['scorerUserId'] !== null ? $data['scorerUserId'] : null)
            ->withUniqueId(array_key_exists('uniqueId', $data) && $data['uniqueId'] !== null ? $data['uniqueId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "scorerUserId" => $this->getScorerUserId(),
            "uniqueId" => $this->getUniqueId(),
        );
    }
}