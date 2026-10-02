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
 * Season Gathering
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#seasongathering
 */
class SeasonGathering implements IModel {
	/**
     * @var string Season Gathering GRN
	 */
	private $seasonGatheringId;
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
	private $name;
	/**
     * @var array List of Participant User IDs
	 */
	private $participants;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Season Gathering GRN */
	public function getSeasonGatheringId(): ?string {
		return $this->seasonGatheringId;
	}
    /** @param string|null $seasonGatheringId Season Gathering GRN */
	public function setSeasonGatheringId(?string $seasonGatheringId) {
		$this->seasonGatheringId = $seasonGatheringId;
	}
    /**
     * @param string|null $seasonGatheringId Season Gathering GRN
     * @return SeasonGathering
     */
	public function withSeasonGatheringId(?string $seasonGatheringId): SeasonGathering {
		$this->seasonGatheringId = $seasonGatheringId;
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
     * @return SeasonGathering
     */
	public function withSeasonName(?string $seasonName): SeasonGathering {
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
     * @return SeasonGathering
     */
	public function withSeason(?int $season): SeasonGathering {
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
     * @return SeasonGathering
     */
	public function withTier(?int $tier): SeasonGathering {
		$this->tier = $tier;
		return $this;
	}
    /** @return string|null Season Gathering Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Season Gathering Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Season Gathering Name
     * @return SeasonGathering
     */
	public function withName(?string $name): SeasonGathering {
		$this->name = $name;
		return $this;
	}
    /** @return array|null List of Participant User IDs */
	public function getParticipants(): ?array {
		return $this->participants;
	}
    /** @param array|null $participants List of Participant User IDs */
	public function setParticipants(?array $participants) {
		$this->participants = $participants;
	}
    /**
     * @param array|null $participants List of Participant User IDs
     * @return SeasonGathering
     */
	public function withParticipants(?array $participants): SeasonGathering {
		$this->participants = $participants;
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
     * @return SeasonGathering
     */
	public function withCreatedAt(?int $createdAt): SeasonGathering {
		$this->createdAt = $createdAt;
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
     * @return SeasonGathering
     */
	public function withRevision(?int $revision): SeasonGathering {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SeasonGathering {
        if ($data === null) {
            return null;
        }
        return (new SeasonGathering())
            ->withSeasonGatheringId(array_key_exists('seasonGatheringId', $data) && $data['seasonGatheringId'] !== null ? $data['seasonGatheringId'] : null)
            ->withSeasonName(array_key_exists('seasonName', $data) && $data['seasonName'] !== null ? $data['seasonName'] : null)
            ->withSeason(array_key_exists('season', $data) && $data['season'] !== null ? $data['season'] : null)
            ->withTier(array_key_exists('tier', $data) && $data['tier'] !== null ? $data['tier'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withParticipants(!array_key_exists('participants', $data) || $data['participants'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['participants']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "seasonGatheringId" => $this->getSeasonGatheringId(),
            "seasonName" => $this->getSeasonName(),
            "season" => $this->getSeason(),
            "tier" => $this->getTier(),
            "name" => $this->getName(),
            "participants" => $this->getParticipants() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getParticipants()
            ),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}