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
 * Global Ranking Reward Received History
 *
 * @see https://docs.gs2.io/api_reference/ranking2/sdk/#globalrankingreceivedreward
 */
class GlobalRankingReceivedReward implements IModel {
	/**
     * @var string Global Ranking Received Reward GRN
	 */
	private $globalRankingReceivedRewardId;
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
     * @var int Creation Timestamp
	 */
	private $receivedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Global Ranking Received Reward GRN */
	public function getGlobalRankingReceivedRewardId(): ?string {
		return $this->globalRankingReceivedRewardId;
	}
    /** @param string|null $globalRankingReceivedRewardId Global Ranking Received Reward GRN */
	public function setGlobalRankingReceivedRewardId(?string $globalRankingReceivedRewardId) {
		$this->globalRankingReceivedRewardId = $globalRankingReceivedRewardId;
	}
    /**
     * @param string|null $globalRankingReceivedRewardId Global Ranking Received Reward GRN
     * @return GlobalRankingReceivedReward
     */
	public function withGlobalRankingReceivedRewardId(?string $globalRankingReceivedRewardId): GlobalRankingReceivedReward {
		$this->globalRankingReceivedRewardId = $globalRankingReceivedRewardId;
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
     * @return GlobalRankingReceivedReward
     */
	public function withRankingName(?string $rankingName): GlobalRankingReceivedReward {
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
     * @return GlobalRankingReceivedReward
     */
	public function withUserId(?string $userId): GlobalRankingReceivedReward {
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
     * @return GlobalRankingReceivedReward
     */
	public function withSeason(?int $season): GlobalRankingReceivedReward {
		$this->season = $season;
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
     * @return GlobalRankingReceivedReward
     */
	public function withReceivedAt(?int $receivedAt): GlobalRankingReceivedReward {
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
     * @return GlobalRankingReceivedReward
     */
	public function withRevision(?int $revision): GlobalRankingReceivedReward {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?GlobalRankingReceivedReward {
        if ($data === null) {
            return null;
        }
        return (new GlobalRankingReceivedReward())
            ->withGlobalRankingReceivedRewardId(array_key_exists('globalRankingReceivedRewardId', $data) && $data['globalRankingReceivedRewardId'] !== null ? $data['globalRankingReceivedRewardId'] : null)
            ->withRankingName(array_key_exists('rankingName', $data) && $data['rankingName'] !== null ? $data['rankingName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withReceivedAt(array_key_exists('receivedAt', $data) && $data['receivedAt'] !== null ? $data['receivedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "globalRankingReceivedRewardId" => $this->getGlobalRankingReceivedRewardId(),
            "rankingName" => $this->getRankingName(),
            "userId" => $this->getUserId(),
            "season" => $this->getSeason(),
            "receivedAt" => $this->getReceivedAt(),
            "revision" => $this->getRevision(),
        );
    }
}