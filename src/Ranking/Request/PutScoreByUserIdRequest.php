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

class PutScoreByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $categoryName;
    /** @var string */
    private $userId;
    /** @var int */
    private $score;
    /** @var string */
    private $metadata;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): PutScoreByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	public function withCategoryName(?string $categoryName): PutScoreByUserIdRequest {
		$this->categoryName = $categoryName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): PutScoreByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getScore(): ?int {
		return $this->score;
	}

	public function setScore(?int $score) {
		$this->score = $score;
	}

	public function withScore(?int $score): PutScoreByUserIdRequest {
		$this->score = $score;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): PutScoreByUserIdRequest {
		$this->metadata = $metadata;
		return $this;
	}

    public static function fromJson(?array $data): ?PutScoreByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new PutScoreByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withCategoryName(empty($data['categoryName']) ? null : $data['categoryName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withScore(empty($data['score']) ? null : $data['score'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
        );
    }
}