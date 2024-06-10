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


class GlobalRankingReceivedReward implements IModel {
	/**
     * @var string
	 */
	private $globalRankingReceivedRewardId;
	/**
     * @var string
	 */
	private $rankingName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $season;
	/**
     * @var int
	 */
	private $receivedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getGlobalRankingReceivedRewardId(): ?string {
		return $this->globalRankingReceivedRewardId;
	}
	public function setGlobalRankingReceivedRewardId(?string $globalRankingReceivedRewardId) {
		$this->globalRankingReceivedRewardId = $globalRankingReceivedRewardId;
	}
	public function withGlobalRankingReceivedRewardId(?string $globalRankingReceivedRewardId): GlobalRankingReceivedReward {
		$this->globalRankingReceivedRewardId = $globalRankingReceivedRewardId;
		return $this;
	}
	public function getRankingName(): ?string {
		return $this->rankingName;
	}
	public function setRankingName(?string $rankingName) {
		$this->rankingName = $rankingName;
	}
	public function withRankingName(?string $rankingName): GlobalRankingReceivedReward {
		$this->rankingName = $rankingName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GlobalRankingReceivedReward {
		$this->userId = $userId;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): GlobalRankingReceivedReward {
		$this->season = $season;
		return $this;
	}
	public function getReceivedAt(): ?int {
		return $this->receivedAt;
	}
	public function setReceivedAt(?int $receivedAt) {
		$this->receivedAt = $receivedAt;
	}
	public function withReceivedAt(?int $receivedAt): GlobalRankingReceivedReward {
		$this->receivedAt = $receivedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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