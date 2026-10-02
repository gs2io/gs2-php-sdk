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
 * Season Model
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#seasonmodel
 */
class SeasonModel implements IModel {
	/**
     * @var string Season Model GRN
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
    /** @return string|null Season Model GRN */
	public function getSeasonModelId(): ?string {
		return $this->seasonModelId;
	}
    /** @param string|null $seasonModelId Season Model GRN */
	public function setSeasonModelId(?string $seasonModelId) {
		$this->seasonModelId = $seasonModelId;
	}
    /**
     * @param string|null $seasonModelId Season Model GRN
     * @return SeasonModel
     */
	public function withSeasonModelId(?string $seasonModelId): SeasonModel {
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
     * @return SeasonModel
     */
	public function withName(?string $name): SeasonModel {
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
     * @return SeasonModel
     */
	public function withMetadata(?string $metadata): SeasonModel {
		$this->metadata = $metadata;
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
     * @return SeasonModel
     */
	public function withMaximumParticipants(?int $maximumParticipants): SeasonModel {
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
     * @return SeasonModel
     */
	public function withExperienceModelId(?string $experienceModelId): SeasonModel {
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
     * @return SeasonModel
     */
	public function withChallengePeriodEventId(?string $challengePeriodEventId): SeasonModel {
		$this->challengePeriodEventId = $challengePeriodEventId;
		return $this;
	}

    public static function fromJson(?array $data): ?SeasonModel {
        if ($data === null) {
            return null;
        }
        return (new SeasonModel())
            ->withSeasonModelId(array_key_exists('seasonModelId', $data) && $data['seasonModelId'] !== null ? $data['seasonModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withMaximumParticipants(array_key_exists('maximumParticipants', $data) && $data['maximumParticipants'] !== null ? $data['maximumParticipants'] : null)
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withChallengePeriodEventId(array_key_exists('challengePeriodEventId', $data) && $data['challengePeriodEventId'] !== null ? $data['challengePeriodEventId'] : null);
    }

    public function toJson(): array {
        return array(
            "seasonModelId" => $this->getSeasonModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "maximumParticipants" => $this->getMaximumParticipants(),
            "experienceModelId" => $this->getExperienceModelId(),
            "challengePeriodEventId" => $this->getChallengePeriodEventId(),
        );
    }
}