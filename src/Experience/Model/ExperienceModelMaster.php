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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;


/**
 * Experience Model Master
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#experiencemodelmaster
 */
class ExperienceModelMaster implements IModel {
	/**
     * @var string Experience Model Master GRN
	 */
	private $experienceModelId;
	/**
     * @var string Experience Model name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Initial Experience Value
	 */
	private $defaultExperience;
	/**
     * @var int Initial value of rank cap
	 */
	private $defaultRankCap;
	/**
     * @var int Maximum rank cap
	 */
	private $maxRankCap;
	/**
     * @var string Rank Up Threshold name
	 */
	private $rankThresholdName;
	/**
     * @var array List of Reward addition tables
	 */
	private $acquireActionRates;
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
    /** @return string|null Experience Model Master GRN */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId Experience Model Master GRN */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId Experience Model Master GRN
     * @return ExperienceModelMaster
     */
	public function withExperienceModelId(?string $experienceModelId): ExperienceModelMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return string|null Experience Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Experience Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Experience Model name
     * @return ExperienceModelMaster
     */
	public function withName(?string $name): ExperienceModelMaster {
		$this->name = $name;
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
     * @return ExperienceModelMaster
     */
	public function withDescription(?string $description): ExperienceModelMaster {
		$this->description = $description;
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
     * @return ExperienceModelMaster
     */
	public function withMetadata(?string $metadata): ExperienceModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Initial Experience Value */
	public function getDefaultExperience(): ?int {
		return $this->defaultExperience;
	}
    /** @param int|null $defaultExperience Initial Experience Value */
	public function setDefaultExperience(?int $defaultExperience) {
		$this->defaultExperience = $defaultExperience;
	}
    /**
     * @param int|null $defaultExperience Initial Experience Value
     * @return ExperienceModelMaster
     */
	public function withDefaultExperience(?int $defaultExperience): ExperienceModelMaster {
		$this->defaultExperience = $defaultExperience;
		return $this;
	}
    /** @return int|null Initial value of rank cap */
	public function getDefaultRankCap(): ?int {
		return $this->defaultRankCap;
	}
    /** @param int|null $defaultRankCap Initial value of rank cap */
	public function setDefaultRankCap(?int $defaultRankCap) {
		$this->defaultRankCap = $defaultRankCap;
	}
    /**
     * @param int|null $defaultRankCap Initial value of rank cap
     * @return ExperienceModelMaster
     */
	public function withDefaultRankCap(?int $defaultRankCap): ExperienceModelMaster {
		$this->defaultRankCap = $defaultRankCap;
		return $this;
	}
    /** @return int|null Maximum rank cap */
	public function getMaxRankCap(): ?int {
		return $this->maxRankCap;
	}
    /** @param int|null $maxRankCap Maximum rank cap */
	public function setMaxRankCap(?int $maxRankCap) {
		$this->maxRankCap = $maxRankCap;
	}
    /**
     * @param int|null $maxRankCap Maximum rank cap
     * @return ExperienceModelMaster
     */
	public function withMaxRankCap(?int $maxRankCap): ExperienceModelMaster {
		$this->maxRankCap = $maxRankCap;
		return $this;
	}
    /** @return string|null Rank Up Threshold name */
	public function getRankThresholdName(): ?string {
		return $this->rankThresholdName;
	}
    /** @param string|null $rankThresholdName Rank Up Threshold name */
	public function setRankThresholdName(?string $rankThresholdName) {
		$this->rankThresholdName = $rankThresholdName;
	}
    /**
     * @param string|null $rankThresholdName Rank Up Threshold name
     * @return ExperienceModelMaster
     */
	public function withRankThresholdName(?string $rankThresholdName): ExperienceModelMaster {
		$this->rankThresholdName = $rankThresholdName;
		return $this;
	}
    /** @return array|null List of Reward addition tables */
	public function getAcquireActionRates(): ?array {
		return $this->acquireActionRates;
	}
    /** @param array|null $acquireActionRates List of Reward addition tables */
	public function setAcquireActionRates(?array $acquireActionRates) {
		$this->acquireActionRates = $acquireActionRates;
	}
    /**
     * @param array|null $acquireActionRates List of Reward addition tables
     * @return ExperienceModelMaster
     */
	public function withAcquireActionRates(?array $acquireActionRates): ExperienceModelMaster {
		$this->acquireActionRates = $acquireActionRates;
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
     * @return ExperienceModelMaster
     */
	public function withCreatedAt(?int $createdAt): ExperienceModelMaster {
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
     * @return ExperienceModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): ExperienceModelMaster {
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
     * @return ExperienceModelMaster
     */
	public function withRevision(?int $revision): ExperienceModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ExperienceModelMaster {
        if ($data === null) {
            return null;
        }
        return (new ExperienceModelMaster())
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDefaultExperience(array_key_exists('defaultExperience', $data) && $data['defaultExperience'] !== null ? $data['defaultExperience'] : null)
            ->withDefaultRankCap(array_key_exists('defaultRankCap', $data) && $data['defaultRankCap'] !== null ? $data['defaultRankCap'] : null)
            ->withMaxRankCap(array_key_exists('maxRankCap', $data) && $data['maxRankCap'] !== null ? $data['maxRankCap'] : null)
            ->withRankThresholdName(array_key_exists('rankThresholdName', $data) && $data['rankThresholdName'] !== null ? $data['rankThresholdName'] : null)
            ->withAcquireActionRates(!array_key_exists('acquireActionRates', $data) || $data['acquireActionRates'] === null ? null : array_map(
                function ($item) {
                    return AcquireActionRate::fromJson($item);
                },
                $data['acquireActionRates']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "experienceModelId" => $this->getExperienceModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "defaultExperience" => $this->getDefaultExperience(),
            "defaultRankCap" => $this->getDefaultRankCap(),
            "maxRankCap" => $this->getMaxRankCap(),
            "rankThresholdName" => $this->getRankThresholdName(),
            "acquireActionRates" => $this->getAcquireActionRates() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActionRates()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}