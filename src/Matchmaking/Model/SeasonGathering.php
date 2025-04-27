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


class SeasonGathering implements IModel {
	/**
     * @var string
	 */
	private $seasonGatheringId;
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
	private $name;
	/**
     * @var array
	 */
	private $participants;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getSeasonGatheringId(): ?string {
		return $this->seasonGatheringId;
	}
	public function setSeasonGatheringId(?string $seasonGatheringId) {
		$this->seasonGatheringId = $seasonGatheringId;
	}
	public function withSeasonGatheringId(?string $seasonGatheringId): SeasonGathering {
		$this->seasonGatheringId = $seasonGatheringId;
		return $this;
	}
	public function getSeasonName(): ?string {
		return $this->seasonName;
	}
	public function setSeasonName(?string $seasonName) {
		$this->seasonName = $seasonName;
	}
	public function withSeasonName(?string $seasonName): SeasonGathering {
		$this->seasonName = $seasonName;
		return $this;
	}
	public function getSeason(): ?int {
		return $this->season;
	}
	public function setSeason(?int $season) {
		$this->season = $season;
	}
	public function withSeason(?int $season): SeasonGathering {
		$this->season = $season;
		return $this;
	}
	public function getTier(): ?int {
		return $this->tier;
	}
	public function setTier(?int $tier) {
		$this->tier = $tier;
	}
	public function withTier(?int $tier): SeasonGathering {
		$this->tier = $tier;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): SeasonGathering {
		$this->name = $name;
		return $this;
	}
	public function getParticipants(): ?array {
		return $this->participants;
	}
	public function setParticipants(?array $participants) {
		$this->participants = $participants;
	}
	public function withParticipants(?array $participants): SeasonGathering {
		$this->participants = $participants;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): SeasonGathering {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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