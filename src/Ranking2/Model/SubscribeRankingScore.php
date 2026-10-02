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
 * Subscribe Ranking Score
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#subscriberankingscore
 */
class SubscribeRankingScore implements IModel {
	/**
     * @var string Subscribe Ranking Score GRN
	 */
	private $subscribeRankingScoreId;
	/**
     * @var string Subscribe Ranking Model name
	 */
	private $rankingName;
	/**
     * @var int Season
	 */
	private $season;
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
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Subscribe Ranking Score GRN */
	public function getSubscribeRankingScoreId(): ?string {
		return $this->subscribeRankingScoreId;
	}
    /** @param string|null $subscribeRankingScoreId Subscribe Ranking Score GRN */
	public function setSubscribeRankingScoreId(?string $subscribeRankingScoreId) {
		$this->subscribeRankingScoreId = $subscribeRankingScoreId;
	}
    /**
     * @param string|null $subscribeRankingScoreId Subscribe Ranking Score GRN
     * @return SubscribeRankingScore
     */
	public function withSubscribeRankingScoreId(?string $subscribeRankingScoreId): SubscribeRankingScore {
		$this->subscribeRankingScoreId = $subscribeRankingScoreId;
		return $this;
	}
    /** @return string|null Subscribe Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Subscribe Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Subscribe Ranking Model name
     * @return SubscribeRankingScore
     */
	public function withRankingName(?string $rankingName): SubscribeRankingScore {
		$this->rankingName = $rankingName;
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
     * @return SubscribeRankingScore
     */
	public function withSeason(?int $season): SubscribeRankingScore {
		$this->season = $season;
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
     * @return SubscribeRankingScore
     */
	public function withUserId(?string $userId): SubscribeRankingScore {
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
     * @return SubscribeRankingScore
     */
	public function withScore(?int $score): SubscribeRankingScore {
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
     * @return SubscribeRankingScore
     */
	public function withMetadata(?string $metadata): SubscribeRankingScore {
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
     * @return SubscribeRankingScore
     */
	public function withCreatedAt(?int $createdAt): SubscribeRankingScore {
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
     * @return SubscribeRankingScore
     */
	public function withUpdatedAt(?int $updatedAt): SubscribeRankingScore {
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
     * @return SubscribeRankingScore
     */
	public function withRevision(?int $revision): SubscribeRankingScore {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeRankingScore {
        if ($data === null) {
            return null;
        }
        return (new SubscribeRankingScore())
            ->withSubscribeRankingScoreId(array_key_exists('subscribeRankingScoreId', $data) && $data['subscribeRankingScoreId'] !== null ? $data['subscribeRankingScoreId'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeRankingScoreId" => $this->getSubscribeRankingScoreId(),
            "rankingName" => $this->getRankingName(),
            "season" => $this->getSeason(),
            "userId" => $this->getUserId(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}