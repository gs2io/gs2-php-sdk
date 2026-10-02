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
 * Cluster Ranking Reward Received History
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#clusterrankingreceivedreward
 */
class ClusterRankingReceivedReward implements IModel {
	/**
     * @var string Cluster Ranking Received Reward GRN
	 */
	private $clusterRankingReceivedRewardId;
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
     * @var int Creation Timestamp
	 */
	private $receivedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Cluster Ranking Received Reward GRN */
	public function getClusterRankingReceivedRewardId(): ?string {
		return $this->clusterRankingReceivedRewardId;
	}
    /** @param string|null $clusterRankingReceivedRewardId Cluster Ranking Received Reward GRN */
	public function setClusterRankingReceivedRewardId(?string $clusterRankingReceivedRewardId) {
		$this->clusterRankingReceivedRewardId = $clusterRankingReceivedRewardId;
	}
    /**
     * @param string|null $clusterRankingReceivedRewardId Cluster Ranking Received Reward GRN
     * @return ClusterRankingReceivedReward
     */
	public function withClusterRankingReceivedRewardId(?string $clusterRankingReceivedRewardId): ClusterRankingReceivedReward {
		$this->clusterRankingReceivedRewardId = $clusterRankingReceivedRewardId;
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
     * @return ClusterRankingReceivedReward
     */
	public function withRankingName(?string $rankingName): ClusterRankingReceivedReward {
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
     * @return ClusterRankingReceivedReward
     */
	public function withClusterName(?string $clusterName): ClusterRankingReceivedReward {
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
     * @return ClusterRankingReceivedReward
     */
	public function withSeason(?int $season): ClusterRankingReceivedReward {
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
     * @return ClusterRankingReceivedReward
     */
	public function withUserId(?string $userId): ClusterRankingReceivedReward {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getReceivedAt(): ?int {
		return $this->receivedAt;
	}
    /** @param int|null $receivedAt Creation Timestamp */
	public function setReceivedAt(?int $receivedAt) {
		$this->receivedAt = $receivedAt;
	}
    /**
     * @param int|null $receivedAt Creation Timestamp
     * @return ClusterRankingReceivedReward
     */
	public function withReceivedAt(?int $receivedAt): ClusterRankingReceivedReward {
		$this->receivedAt = $receivedAt;
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
     * @return ClusterRankingReceivedReward
     */
	public function withRevision(?int $revision): ClusterRankingReceivedReward {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ClusterRankingReceivedReward {
        if ($data === null) {
            return null;
        }
        return (new ClusterRankingReceivedReward())
            ->withClusterRankingReceivedRewardId(array_key_exists('clusterRankingReceivedRewardId', $data) && $data['clusterRankingReceivedRewardId'] !== null ? $data['clusterRankingReceivedRewardId'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withClusterName(array_key_exists('clusterName', $data) && $data['clusterName'] !== null ? $data['clusterName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withReceivedAt(array_key_exists('receivedAt', $data) && $data['receivedAt'] !== null ? $data['receivedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "clusterRankingReceivedRewardId" => $this->getClusterRankingReceivedRewardId(),
            "rankingName" => $this->getRankingName(),
            "clusterName" => $this->getClusterName(),
            "season" => $this->getSeason(),
            "userId" => $this->getUserId(),
            "receivedAt" => $this->getReceivedAt(),
            "revision" => $this->getRevision(),
        );
    }
}