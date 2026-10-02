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


/**
 * Joined Season Gathering
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#joinedseasongathering
 */
class JoinedSeasonGathering implements IModel {
	/**
     * @var string Joined Season Gathering GRN
	 */
	private $joinedSeasonGatheringId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Season Model name
	 */
	private $seasonName;
	/**
     * @var int Season
	 */
	private $season;
	/**
     * @var int Tier
	 */
	private $tier;
	/**
     * @var string Season Gathering Name
	 */
	private $seasonGatheringName;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
    /** @return string|null Joined Season Gathering GRN */
	public function getJoinedSeasonGatheringId(): ?string {
		return $this->joinedSeasonGatheringId;
	}
    /** @param string|null $joinedSeasonGatheringId Joined Season Gathering GRN */
	public function setJoinedSeasonGatheringId(?string $joinedSeasonGatheringId) {
		$this->joinedSeasonGatheringId = $joinedSeasonGatheringId;
	}
    /**
     * @param string|null $joinedSeasonGatheringId Joined Season Gathering GRN
     * @return JoinedSeasonGathering
     */
	public function withJoinedSeasonGatheringId(?string $joinedSeasonGatheringId): JoinedSeasonGathering {
		$this->joinedSeasonGatheringId = $joinedSeasonGatheringId;
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
     * @return JoinedSeasonGathering
     */
	public function withUserId(?string $userId): JoinedSeasonGathering {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Season Model name */
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
    /** @param string|null $seasonName Season Model name */
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
    /**
     * @param string|null $seasonName Season Model name
     * @return JoinedSeasonGathering
     */
	public function withSeasonName(?string $seasonName): JoinedSeasonGathering {
		$this->seasonName = $seasonName;
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
     * @return JoinedSeasonGathering
     */
	public function withSeason(?int $season): JoinedSeasonGathering {
		$this->season = $season;
		return $this;
	}
    /** @return int|null Tier */
	public function getTier(): ?int {
		return $this->tier;
	}
    /** @param int|null $tier Tier */
	public function setTier(?int $tier) {
		$this->tier = $tier;
	}
    /**
     * @param int|null $tier Tier
     * @return JoinedSeasonGathering
     */
	public function withTier(?int $tier): JoinedSeasonGathering {
		$this->tier = $tier;
		return $this;
	}
    /** @return string|null Season Gathering Name */
	public function getSeasonGatheringName(): ?string {
		return $this->seasonGatheringName;
	}
    /** @param string|null $seasonGatheringName Season Gathering Name */
	public function setSeasonGatheringName(?string $seasonGatheringName) {
		$this->seasonGatheringName = $seasonGatheringName;
	}
    /**
     * @param string|null $seasonGatheringName Season Gathering Name
     * @return JoinedSeasonGathering
     */
	public function withSeasonGatheringName(?string $seasonGatheringName): JoinedSeasonGathering {
		$this->seasonGatheringName = $seasonGatheringName;
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
     * @return JoinedSeasonGathering
     */
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