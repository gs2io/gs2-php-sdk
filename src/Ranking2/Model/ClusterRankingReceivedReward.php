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


class ClusterRankingReceivedReward implements IModel {
	/**
     * @var string
	 */
	private $clusterRankingReceivedRewardId;
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
	private $receivedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getClusterRankingReceivedRewardId(): ?string {
		return $this->clusterRankingReceivedRewardId;
	}
	public function setClusterRankingReceivedRewardId(?string $clusterRankingReceivedRewardId) {
		$this->clusterRankingReceivedRewardId = $clusterRankingReceivedRewardId;
	}
	public function withClusterRankingReceivedRewardId(?string $clusterRankingReceivedRewardId): ClusterRankingReceivedReward {
		$this->clusterRankingReceivedRewardId = $clusterRankingReceivedRewardId;
		return $this;
	}
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
	public function withRankingName(?string $rankingName): ClusterRankingReceivedReward {
		$this->rankingName = $rankingName;
		return $this;
	}
	public function getClusterName(): ?string {
		return $this->clusterName;
	}
	public function setClusterName(?string $clusterName) {
		$this->clusterName = $clusterName;
	}
	public function withClusterName(?string $clusterName): ClusterRankingReceivedReward {
		$this->clusterName = $clusterName;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): ClusterRankingReceivedReward {
		$this->season = $season;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): ClusterRankingReceivedReward {
		$this->userId = $userId;
		return $this;
	}
	public function getReceivedAt(): ?int {
		return $this->receivedAt;
	}
	public function setReceivedAt(?int $receivedAt) {
		$this->receivedAt = $receivedAt;
	}
	public function withReceivedAt(?int $receivedAt): ClusterRankingReceivedReward {
		$this->receivedAt = $receivedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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