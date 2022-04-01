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


class ExperienceModel implements IModel {
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
     * @var Threshold
	 */
	private $rankThreshold;

	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}

	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}

	public function withExperienceModelId(?string $experienceModelId): ExperienceModel {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): ExperienceModel {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): ExperienceModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDefaultExperience(): ?int {
		return $this->defaultExperience;
	}

	public function setDefaultExperience(?int $defaultExperience) {
		$this->defaultExperience = $defaultExperience;
	}

	public function withDefaultExperience(?int $defaultExperience): ExperienceModel {
		$this->defaultExperience = $defaultExperience;
		return $this;
	}

	public function getDefaultRankCap(): ?int {
		return $this->defaultRankCap;
	}

	public function setDefaultRankCap(?int $defaultRankCap) {
		$this->defaultRankCap = $defaultRankCap;
	}

	public function withDefaultRankCap(?int $defaultRankCap): ExperienceModel {
		$this->defaultRankCap = $defaultRankCap;
		return $this;
	}

	public function getMaxRankCap(): ?int {
		return $this->maxRankCap;
	}

	public function setMaxRankCap(?int $maxRankCap) {
		$this->maxRankCap = $maxRankCap;
	}

	public function withMaxRankCap(?int $maxRankCap): ExperienceModel {
		$this->maxRankCap = $maxRankCap;
		return $this;
	}

	public function getRankThreshold(): ?Threshold {
		return $this->rankThreshold;
	}

	public function setRankThreshold(?Threshold $rankThreshold) {
		$this->rankThreshold = $rankThreshold;
	}

	public function withRankThreshold(?Threshold $rankThreshold): ExperienceModel {
		$this->rankThreshold = $rankThreshold;
		return $this;
	}

    public static function fromJson(?array $data): ?ExperienceModel {
        if ($data === null) {
            return null;
        }
        return (new ExperienceModel())
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDefaultExperience(array_key_exists('defaultExperience', $data) && $data['defaultExperience'] !== null ? $data['defaultExperience'] : null)
            ->withDefaultRankCap(array_key_exists('defaultRankCap', $data) && $data['defaultRankCap'] !== null ? $data['defaultRankCap'] : null)
            ->withMaxRankCap(array_key_exists('maxRankCap', $data) && $data['maxRankCap'] !== null ? $data['maxRankCap'] : null)
            ->withRankThreshold(array_key_exists('rankThreshold', $data) && $data['rankThreshold'] !== null ? Threshold::fromJson($data['rankThreshold']) : null);
    }

    public function toJson(): array {
        return array(
            "experienceModelId" => $this->getExperienceModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "defaultExperience" => $this->getDefaultExperience(),
            "defaultRankCap" => $this->getDefaultRankCap(),
            "maxRankCap" => $this->getMaxRankCap(),
            "rankThreshold" => $this->getRankThreshold() !== null ? $this->getRankThreshold()->toJson() : null,
        );
    }
}