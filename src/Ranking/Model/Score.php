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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;


class Score implements IModel {
	/**
     * @var string
	 */
	private $scoreId;
	/**
     * @var string
	 */
	private $categoryName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $uniqueId;
	/**
     * @var string
	 */
	private $scorerUserId;
	/**
     * @var int
	 */
	private $score;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $createdAt;

	public function getScoreId(): ?string {
		return $this->scoreId;
	}

	public function setScoreId(?string $scoreId) {
		$this->scoreId = $scoreId;
	}

	public function withScoreId(?string $scoreId): Score {
		$this->scoreId = $scoreId;
		return $this;
	}

	public function getCategoryName(): ?string {
		return $this->categoryName;
	}

	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}

	public function withCategoryName(?string $categoryName): Score {
		$this->categoryName = $categoryName;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Score {
		$this->userId = $userId;
		return $this;
	}

	public function getUniqueId(): ?string {
		return $this->uniqueId;
	}

	public function setUniqueId(?string $uniqueId) {
		$this->uniqueId = $uniqueId;
	}

	public function withUniqueId(?string $uniqueId): Score {
		$this->uniqueId = $uniqueId;
		return $this;
	}

	public function getScorerUserId(): ?string {
		return $this->scorerUserId;
	}

	public function setScorerUserId(?string $scorerUserId) {
		$this->scorerUserId = $scorerUserId;
	}

	public function withScorerUserId(?string $scorerUserId): Score {
		$this->scorerUserId = $scorerUserId;
		return $this;
	}

	public function getScore(): ?int {
		return $this->score;
	}

	public function setScore(?int $score) {
		$this->score = $score;
	}

	public function withScore(?int $score): Score {
		$this->score = $score;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Score {
		$this->metadata = $metadata;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Score {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Score {
        if ($data === null) {
            return null;
        }
        return (new Score())
            ->withScoreId(empty($data['scoreId']) ? null : $data['scoreId'])
            ->withCategoryName(empty($data['categoryName']) ? null : $data['categoryName'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withUniqueId(empty($data['uniqueId']) ? null : $data['uniqueId'])
            ->withScorerUserId(empty($data['scorerUserId']) ? null : $data['scorerUserId'])
            ->withScore(empty($data['score']) ? null : $data['score'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt']);
    }

    public function toJson(): array {
        return array(
            "scoreId" => $this->getScoreId(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "uniqueId" => $this->getUniqueId(),
            "scorerUserId" => $this->getScorerUserId(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}