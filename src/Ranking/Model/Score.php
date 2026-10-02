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
 * Score
 *
 * @see https://docs.gs2.io/api_reference/ranking/sdk/#score
 */
class Score implements IModel {
	/**
     * @var string Score GRN
	 */
	private $scoreId;
	/**
     * @var string Category Name
	 */
	private $categoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Unique ID
	 */
	private $uniqueId;
	/**
     * @var string User ID of the user who earned the score
	 */
	private $scorerUserId;
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
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Score GRN */
	public function getScoreId(): ?string {
		return $this->scoreId;
	}
    /** @param string|null $scoreId Score GRN */
	public function setScoreId(?string $scoreId) {
		$this->scoreId = $scoreId;
	}
    /**
     * @param string|null $scoreId Score GRN
     * @return Score
     */
	public function withScoreId(?string $scoreId): Score {
		$this->scoreId = $scoreId;
		return $this;
	}
    /** @return string|null Category Name */
	public function getCategoryName(): ?string {
		return $this->categoryName;
	}
    /** @param string|null $categoryName Category Name */
	public function setCategoryName(?string $categoryName) {
		$this->categoryName = $categoryName;
	}
    /**
     * @param string|null $categoryName Category Name
     * @return Score
     */
	public function withCategoryName(?string $categoryName): Score {
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
     * @return Score
     */
	public function withUserId(?string $userId): Score {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Unique ID */
	public function getUniqueId(): ?string {
		return $this->uniqueId;
	}
    /** @param string|null $uniqueId Unique ID */
	public function setUniqueId(?string $uniqueId) {
		$this->uniqueId = $uniqueId;
	}
    /**
     * @param string|null $uniqueId Unique ID
     * @return Score
     */
	public function withUniqueId(?string $uniqueId): Score {
		$this->uniqueId = $uniqueId;
		return $this;
	}
    /** @return string|null User ID of the user who earned the score */
	public function getScorerUserId(): ?string {
		return $this->scorerUserId;
	}
    /** @param string|null $scorerUserId User ID of the user who earned the score */
	public function setScorerUserId(?string $scorerUserId) {
		$this->scorerUserId = $scorerUserId;
	}
    /**
     * @param string|null $scorerUserId User ID of the user who earned the score
     * @return Score
     */
	public function withScorerUserId(?string $scorerUserId): Score {
		$this->scorerUserId = $scorerUserId;
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
     * @return Score
     */
	public function withScore(?int $score): Score {
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
     * @return Score
     */
	public function withMetadata(?string $metadata): Score {
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
     * @return Score
     */
	public function withCreatedAt(?int $createdAt): Score {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Score
     */
	public function withRevision(?int $revision): Score {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Score {
        if ($data === null) {
            return null;
        }
        return (new Score())
            ->withScoreId(array_key_exists('scoreId', $data) && $data['scoreId'] !== null ? $data['scoreId'] : null)
            ->withCategoryName(array_key_exists('categoryName', $data) && $data['categoryName'] !== null ? $data['categoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withUniqueId(array_key_exists('uniqueId', $data) && $data['uniqueId'] !== null ? $data['uniqueId'] : null)
            ->withScorerUserId(array_key_exists('scorerUserId', $data) && $data['scorerUserId'] !== null ? $data['scorerUserId'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "revision" => $this->getRevision(),
        );
    }
}