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


class ClusterRankingData implements IModel {
	/**
     * @var string
	 */
	private $clusterRankingDataId;
	/**
     * @var string
	 */
	private $rankingName;
	/**
     * @var string
	 */
	private $clusterName;
	/**
     * @var int
	 */
	private $season;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $index;
	/**
     * @var int
	 */
	private $rank;
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
	private $invertCreatedAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getClusterRankingDataId(): ?string {
		return $this->clusterRankingDataId;
	}
	public function setClusterRankingDataId(?string $clusterRankingDataId) {
		$this->clusterRankingDataId = $clusterRankingDataId;
	}
	public function withClusterRankingDataId(?string $clusterRankingDataId): ClusterRankingData {
		$this->clusterRankingDataId = $clusterRankingDataId;
		return $this;
	}
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
	public function withRankingName(?string $rankingName): ClusterRankingData {
		$this->rankingName = $rankingName;
		return $this;
	}
	public function getClusterName(): ?string {
		return $this->clusterName;
	}
	public function setClusterName(?string $clusterName) {
		$this->clusterName = $clusterName;
	}
	public function withClusterName(?string $clusterName): ClusterRankingData {
		$this->clusterName = $clusterName;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): ClusterRankingData {
		$this->season = $season;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): ClusterRankingData {
		$this->userId = $userId;
		return $this;
	}
	public function getIndex(): ?int {
		return $this->index;
	}
	public function setIndex(?int $index) {
		$this->index = $index;
	}
	public function withIndex(?int $index): ClusterRankingData {
		$this->index = $index;
		return $this;
	}
	public function getRank(): ?int {
		return $this->rank;
	}
	public function setRank(?int $rank) {
		$this->rank = $rank;
	}
	public function withRank(?int $rank): ClusterRankingData {
		$this->rank = $rank;
		return $this;
	}
	public function getScore(): ?int {
		return $this->score;
	}
	public function setScore(?int $score) {
		$this->score = $score;
	}
	public function withScore(?int $score): ClusterRankingData {
		$this->score = $score;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): ClusterRankingData {
		$this->metadata = $metadata;
		return $this;
	}
	public function getInvertCreatedAt(): ?int {
		return $this->invertCreatedAt;
	}
	public function setInvertCreatedAt(?int $invertCreatedAt) {
		$this->invertCreatedAt = $invertCreatedAt;
	}
	public function withInvertCreatedAt(?int $invertCreatedAt): ClusterRankingData {
		$this->invertCreatedAt = $invertCreatedAt;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): ClusterRankingData {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): ClusterRankingData {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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
            ->withInvertCreatedAt(array_key_exists('invertCreatedAt', $data) && $data['invertCreatedAt'] !== null ? $data['invertCreatedAt'] : null)
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
            "invertCreatedAt" => $this->getInvertCreatedAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}