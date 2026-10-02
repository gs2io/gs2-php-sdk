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

namespace Gs2\Ranking2\Model;

use Gs2\Core\Model\IModel;


/**
 * Global Ranking Score
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#globalrankingscore
 */
class GlobalRankingScore implements IModel {
	/**
     * @var string Global Ranking Score GRN
	 */
	private $globalRankingScoreId;
	/**
     * @var string Global Ranking Model name
	 */
	private $rankingName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Season
	 */
	private $season;
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
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Global Ranking Score GRN */
	public function getGlobalRankingScoreId(): ?string {
		return $this->globalRankingScoreId;
	}
    /** @param string|null $globalRankingScoreId Global Ranking Score GRN */
	public function setGlobalRankingScoreId(?string $globalRankingScoreId) {
		$this->globalRankingScoreId = $globalRankingScoreId;
	}
    /**
     * @param string|null $globalRankingScoreId Global Ranking Score GRN
     * @return GlobalRankingScore
     */
	public function withGlobalRankingScoreId(?string $globalRankingScoreId): GlobalRankingScore {
		$this->globalRankingScoreId = $globalRankingScoreId;
		return $this;
	}
    /** @return string|null Global Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Global Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Global Ranking Model name
     * @return GlobalRankingScore
     */
	public function withRankingName(?string $rankingName): GlobalRankingScore {
		$this->rankingName = $rankingName;
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
     * @return GlobalRankingScore
     */
	public function withUserId(?string $userId): GlobalRankingScore {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Season */
	public function getSeason(): ?int {
		return $this->season;
	}
    /** @param int|null $season Season */
	public function setSeason(?int $season) {
		$this->season = $season;
	}
    /**
     * @param int|null $season Season
     * @return GlobalRankingScore
     */
	public function withSeason(?int $season): GlobalRankingScore {
		$this->season = $season;
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
     * @return GlobalRankingScore
     */
	public function withScore(?int $score): GlobalRankingScore {
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
     * @return GlobalRankingScore
     */
	public function withMetadata(?string $metadata): GlobalRankingScore {
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
     * @return GlobalRankingScore
     */
	public function withCreatedAt(?int $createdAt): GlobalRankingScore {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return GlobalRankingScore
     */
	public function withUpdatedAt(?int $updatedAt): GlobalRankingScore {
		$this->updatedAt = $updatedAt;
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
     * @return GlobalRankingScore
     */
	public function withRevision(?int $revision): GlobalRankingScore {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?GlobalRankingScore {
        if ($data === null) {
            return null;
        }
        return (new GlobalRankingScore())
            ->withGlobalRankingScoreId(array_key_exists('globalRankingScoreId', $data) && $data['globalRankingScoreId'] !== null ? $data['globalRankingScoreId'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "globalRankingScoreId" => $this->getGlobalRankingScoreId(),
            "rankingName" => $this->getRankingName(),
            "userId" => $this->getUserId(),
            "season" => $this->getSeason(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}