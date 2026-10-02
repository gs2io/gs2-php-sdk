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
 * Season Model Master
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#seasonmodelmaster
 */
class SeasonModelMaster implements IModel {
	/**
     * @var string Season Model Master GRN
	 */
	private $seasonModelId;
	/**
     * @var string Season Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var int Maximum Number of Participants
	 */
	private $maximumParticipants;
	/**
     * @var string Experience Model GRN for Tier Management
	 */
	private $experienceModelId;
	/**
     * @var string Challenge Period Event GRN
	 */
	private $challengePeriodEventId;
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
    /** @return string|null Season Model Master GRN */
	public function getSeasonModelId(): ?string {
		return $this->seasonModelId;
	}
    /** @param string|null $seasonModelId Season Model Master GRN */
	public function setSeasonModelId(?string $seasonModelId) {
		$this->seasonModelId = $seasonModelId;
	}
    /**
     * @param string|null $seasonModelId Season Model Master GRN
     * @return SeasonModelMaster
     */
	public function withSeasonModelId(?string $seasonModelId): SeasonModelMaster {
		$this->seasonModelId = $seasonModelId;
		return $this;
	}
    /** @return string|null Season Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Season Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Season Model name
     * @return SeasonModelMaster
     */
	public function withName(?string $name): SeasonModelMaster {
		$this->name = $name;
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
     * @return SeasonModelMaster
     */
	public function withMetadata(?string $metadata): SeasonModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return SeasonModelMaster
     */
	public function withDescription(?string $description): SeasonModelMaster {
		$this->description = $description;
		return $this;
	}
    /** @return int|null Maximum Number of Participants */
	public function getMaximumParticipants(): ?int {
		return $this->maximumParticipants;
	}
    /** @param int|null $maximumParticipants Maximum Number of Participants */
	public function setMaximumParticipants(?int $maximumParticipants) {
		$this->maximumParticipants = $maximumParticipants;
	}
    /**
     * @param int|null $maximumParticipants Maximum Number of Participants
     * @return SeasonModelMaster
     */
	public function withMaximumParticipants(?int $maximumParticipants): SeasonModelMaster {
		$this->maximumParticipants = $maximumParticipants;
		return $this;
	}
    /** @return string|null Experience Model GRN for Tier Management */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId Experience Model GRN for Tier Management */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId Experience Model GRN for Tier Management
     * @return SeasonModelMaster
     */
	public function withExperienceModelId(?string $experienceModelId): SeasonModelMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return string|null Challenge Period Event GRN */
	public function getChallengePeriodEventId(): ?string {
		return $this->challengePeriodEventId;
	}
    /** @param string|null $challengePeriodEventId Challenge Period Event GRN */
	public function setChallengePeriodEventId(?string $challengePeriodEventId) {
		$this->challengePeriodEventId = $challengePeriodEventId;
	}
    /**
     * @param string|null $challengePeriodEventId Challenge Period Event GRN
     * @return SeasonModelMaster
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): SeasonModelMaster {
		$this->challengePeriodEventId = $challengePeriodEventId;
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
     * @return SeasonModelMaster
     */
	public function withCreatedAt(?int $createdAt): SeasonModelMaster {
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
     * @return SeasonModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): SeasonModelMaster {
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
     * @return SeasonModelMaster
     */
	public function withRevision(?int $revision): SeasonModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SeasonModelMaster {
        if ($data === null) {
            return null;
        }
        return (new SeasonModelMaster())
            ->withSeasonModelId(array_key_exists('seasonModelId', $data) && $data['seasonModelId'] !== null ? $data['seasonModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMaximumParticipants(array_key_exists('maximumParticipants', $data) && $data['maximumParticipants'] !== null ? $data['maximumParticipants'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "seasonModelId" => $this->getSeasonModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "maximumParticipants" => $this->getMaximumParticipants(),
            "experienceModelId" => $this->getExperienceModelId(),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}