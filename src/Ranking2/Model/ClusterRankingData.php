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
 * Cluster Ranking
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#clusterrankingdata
 */
class ClusterRankingData implements IModel {
	/**
     * @var string Cluster Ranking GRN
	 */
	private $clusterRankingDataId;
	/**
     * @var string Cluster Ranking Model name
	 */
	private $rankingName;
	/**
     * @var string Cluster Name
	 */
	private $clusterName;
	/**
     * @var int Season
	 */
	private $season;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Index
	 */
	private $index;
	/**
     * @var int Rank
	 */
	private $rank;
	/**
     * @var int Score
	 */
	private $score;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Inverted value of updatedAt (used for sorting)
	 */
	private $invertUpdatedAt;
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
    /** @return string|null Cluster Ranking GRN */
	public function getClusterRankingDataId(): ?string {
		return $this->clusterRankingDataId;
	}
    /** @param string|null $clusterRankingDataId Cluster Ranking GRN */
	public function setClusterRankingDataId(?string $clusterRankingDataId) {
		$this->clusterRankingDataId = $clusterRankingDataId;
	}
    /**
     * @param string|null $clusterRankingDataId Cluster Ranking GRN
     * @return ClusterRankingData
     */
	public function withClusterRankingDataId(?string $clusterRankingDataId): ClusterRankingData {
		$this->clusterRankingDataId = $clusterRankingDataId;
		return $this;
	}
    /** @return string|null Cluster Ranking Model name */
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
    /** @param string|null $rankingName Cluster Ranking Model name */
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
    /**
     * @param string|null $rankingName Cluster Ranking Model name
     * @return ClusterRankingData
     */
	public function withRankingName(?string $rankingName): ClusterRankingData {
		$this->rankingName = $rankingName;
		return $this;
	}
    /** @return string|null Cluster Name */
	public function getClusterName(): ?string {
		return $this->clusterName;
	}
    /** @param string|null $clusterName Cluster Name */
	public function setClusterName(?string $clusterName) {
		$this->clusterName = $clusterName;
	}
    /**
     * @param string|null $clusterName Cluster Name
     * @return ClusterRankingData
     */
	public function withClusterName(?string $clusterName): ClusterRankingData {
		$this->clusterName = $clusterName;
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
     * @return ClusterRankingData
     */
	public function withSeason(?int $season): ClusterRankingData {
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
     * @return ClusterRankingData
     */
	public function withUserId(?string $userId): ClusterRankingData {
		$this->userId = $userId;
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
     * @return ClusterRankingData
     */
	public function withIndex(?int $index): ClusterRankingData {
		$this->index = $index;
		return $this;
	}
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
     * @return ClusterRankingData
     */
	public function withRank(?int $rank): ClusterRankingData {
		$this->rank = $rank;
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
     * @return ClusterRankingData
     */
	public function withScore(?int $score): ClusterRankingData {
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
     * @return ClusterRankingData
     */
	public function withMetadata(?string $metadata): ClusterRankingData {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Inverted value of updatedAt (used for sorting) */
	public function getInvertUpdatedAt(): ?int {
		return $this->invertUpdatedAt;
	}
    /** @param int|null $invertUpdatedAt Inverted value of updatedAt (used for sorting) */
	public function setInvertUpdatedAt(?int $invertUpdatedAt) {
		$this->invertUpdatedAt = $invertUpdatedAt;
	}
    /**
     * @param int|null $invertUpdatedAt Inverted value of updatedAt (used for sorting)
     * @return ClusterRankingData
     */
	public function withInvertUpdatedAt(?int $invertUpdatedAt): ClusterRankingData {
		$this->invertUpdatedAt = $invertUpdatedAt;
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
     * @return ClusterRankingData
     */
	public function withCreatedAt(?int $createdAt): ClusterRankingData {
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
     * @return ClusterRankingData
     */
	public function withUpdatedAt(?int $updatedAt): ClusterRankingData {
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
     * @return ClusterRankingData
     */
	public function withRevision(?int $revision): ClusterRankingData {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ClusterRankingData {
        if ($data === null) {
            return null;
        }
        return (new ClusterRankingData())
            ->withClusterRankingDataId(array_key_exists('clusterRankingDataId', $data) && $data['clusterRankingDataId'] !== null ? $data['clusterRankingDataId'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withClusterName(array_key_exists('clusterName', $data) && $data['clusterName'] !== null ? $data['clusterName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withRank(array_key_exists('rank', $data) && $data['rank'] !== null ? $data['rank'] : null)
            ->withScore(array_key_exists('score', $data) && $data['score'] !== null ? $data['score'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInvertUpdatedAt(array_key_exists('invertUpdatedAt', $data) && $data['invertUpdatedAt'] !== null ? $data['invertUpdatedAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "clusterRankingDataId" => $this->getClusterRankingDataId(),
            "rankingName" => $this->getRankingName(),
            "clusterName" => $this->getClusterName(),
            "season" => $this->getSeason(),
            "userId" => $this->getUserId(),
            "index" => $this->getIndex(),
            "rank" => $this->getRank(),
            "score" => $this->getScore(),
            "metadata" => $this->getMetadata(),
            "invertUpdatedAt" => $this->getInvertUpdatedAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}