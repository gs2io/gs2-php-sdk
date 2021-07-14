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


class ExperienceModelMaster implements IModel {
	/**
     * @var string
	 */
	private $experienceModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $defaultExperience;
	/**
     * @var int
	 */
	private $defaultRankCap;
	/**
     * @var int
	 */
	private $maxRankCap;
	/**
     * @var string
	 */
	private $rankThresholdName;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	public function withExperienceModelId(?string $experienceModelId): ExperienceModelMaster {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): ExperienceModelMaster {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): ExperienceModelMaster {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): ExperienceModelMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDefaultExperience(): ?int {
		return $this->defaultExperience;
	}

	public function setDefaultExperience(?int $defaultExperience) {
		$this->defaultExperience = $defaultExperience;
	}

	public function withDefaultExperience(?int $defaultExperience): ExperienceModelMaster {
		$this->defaultExperience = $defaultExperience;
		return $this;
	}

	public function getDefaultRankCap(): ?int {
		return $this->defaultRankCap;
	}

	public function setDefaultRankCap(?int $defaultRankCap) {
		$this->defaultRankCap = $defaultRankCap;
	}

	public function withDefaultRankCap(?int $defaultRankCap): ExperienceModelMaster {
		$this->defaultRankCap = $defaultRankCap;
		return $this;
	}

	public function getMaxRankCap(): ?int {
		return $this->maxRankCap;
	}

	public function setMaxRankCap(?int $maxRankCap) {
		$this->maxRankCap = $maxRankCap;
	}

	public function withMaxRankCap(?int $maxRankCap): ExperienceModelMaster {
		$this->maxRankCap = $maxRankCap;
		return $this;
	}

	public function getRankThresholdName(): ?string {
		return $this->rankThresholdName;
	}

	public function setRankThresholdName(?string $rankThresholdName) {
		$this->rankThresholdName = $rankThresholdName;
	}

	public function withRankThresholdName(?string $rankThresholdName): ExperienceModelMaster {
		$this->rankThresholdName = $rankThresholdName;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): ExperienceModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): ExperienceModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?ExperienceModelMaster {
        if ($data === null) {
            return null;
        }
        return (new ExperienceModelMaster())
            ->withExperienceModelId(empty($data['experienceModelId']) ? null : $data['experienceModelId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDefaultExperience(empty($data['defaultExperience']) ? null : $data['defaultExperience'])
            ->withDefaultRankCap(empty($data['defaultRankCap']) ? null : $data['defaultRankCap'])
            ->withMaxRankCap(empty($data['maxRankCap']) ? null : $data['maxRankCap'])
            ->withRankThresholdName(empty($data['rankThresholdName']) ? null : $data['rankThresholdName'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}