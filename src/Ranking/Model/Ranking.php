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


/**
 * Ranking
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#ranking
 */
class Ranking implements IModel {
	/**
     * @var int Rank
	 */
	private $rank;
	/**
     * @var int Index
	 */
	private $index;
	/**
     * @var string Category Model name
	 */
	private $categoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Score
	 */
	private $score;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
    /** @return int|null Rank */
	public function getRank(): ?int {
		return $this->rank;
	}
    /** @param int|null $rank Rank */
	public function setRank(?int $rank) {
		$this->rank = $rank;
	}
    /**
     * @param int|null $rank Rank
     * @return Ranking
     */
	public function withRank(?int $rank): Ranking {
		$this->rank = $rank;
		return $this;
	}
    /** @return int|null Index */
	public function getIndex(): ?int {
		return $this->index;
	}
    /** @param int|null $index Index */
	public function setIndex(?int $index) {
		$this->index = $index;
	}
    /**
     * @param int|null $index Index
     * @return Ranking
     */
	public function withIndex(?int $index): Ranking {
		$this->index = $index;
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
     * @return Ranking
     */
	public function withCategoryName(?string $categoryName): Ranking {
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
     * @return Ranking
     */
	public function withUserId(?string $userId): Ranking {
		$this->userId = $userId;
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
     * @return Ranking
     */
	public function withScore(?int $score): Ranking {
		$this->score = $score;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return Ranking
     */
	public function withMetadata(?string $metadata): Ranking {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Ranking
     */
	public function withCreatedAt(?int $createdAt): Ranking {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Ranking {
        if ($data === null) {
            return null;
        }
        return (new Ranking())
            ->withRank(array_key_exists('rank', $data) && $data['rank'] !== null ? $data['rank'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "rank" => $this->getRank(),
            "index" => $this->getIndex(),
            "categoryName" => $this->getCategoryName(),
            "userId" => $this->getUserId(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}