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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;


class JoinedSeasonGathering implements IModel {
	/**
     * @var string
	 */
	private $joinedSeasonGatheringId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $seasonName;
	/**
     * @var int
	 */
	private $season;
	/**
     * @var int
	 */
	private $tier;
	/**
     * @var string
	 */
	private $seasonGatheringName;
	/**
     * @var int
	 */
	private $createdAt;
	public function getJoinedSeasonGatheringId(): ?string {
		return $this->joinedSeasonGatheringId;
	}
	public function setJoinedSeasonGatheringId(?string $joinedSeasonGatheringId) {
		$this->joinedSeasonGatheringId = $joinedSeasonGatheringId;
	}
	public function withJoinedSeasonGatheringId(?string $joinedSeasonGatheringId): JoinedSeasonGathering {
		$this->joinedSeasonGatheringId = $joinedSeasonGatheringId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): JoinedSeasonGathering {
		$this->userId = $userId;
		return $this;
	}
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
	public function withSeasonName(?string $seasonName): JoinedSeasonGathering {
		$this->seasonName = $seasonName;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): JoinedSeasonGathering {
		$this->season = $season;
		return $this;
	}
	public function getTier(): ?int {
		return $this->tier;
	}
	public function setTier(?int $tier) {
		$this->tier = $tier;
	}
	public function withTier(?int $tier): JoinedSeasonGathering {
		$this->tier = $tier;
		return $this;
	}
	public function getSeasonGatheringName(): ?string {
		return $this->seasonGatheringName;
	}
	public function setSeasonGatheringName(?string $seasonGatheringName) {
		$this->seasonGatheringName = $seasonGatheringName;
	}
	public function withSeasonGatheringName(?string $seasonGatheringName): JoinedSeasonGathering {
		$this->seasonGatheringName = $seasonGatheringName;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): JoinedSeasonGathering {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?JoinedSeasonGathering {
        if ($data === null) {
            return null;
        }
        return (new JoinedSeasonGathering())
            ->withJoinedSeasonGatheringId(array_key_exists('joinedSeasonGatheringId', $data) && $data['joinedSeasonGatheringId'] !== null ? $data['joinedSeasonGatheringId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTier(array_key_exists('tier', $data) && $data['tier'] !== null ? $data['tier'] : null)
            ->withSeasonGatheringName(array_key_exists('seasonGatheringName', $data) && $data['seasonGatheringName'] !== null ? $data['seasonGatheringName'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "joinedSeasonGatheringId" => $this->getJoinedSeasonGatheringId(),
            "userId" => $this->getUserId(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
            "tier" => $this->getTier(),
            "seasonGatheringName" => $this->getSeasonGatheringName(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}