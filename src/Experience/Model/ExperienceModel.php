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
 * Experience Model
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#experiencemodel
 */
class ExperienceModel implements IModel {
	/**
     * @var string Experience Model GRN
	 */
	private $experienceModelId;
	/**
     * @var string Experience Model name
	 */
	private $name;
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
     * @var Threshold Rank Up Threshold
	 */
	private $rankThreshold;
	/**
     * @var array List of Reward addition tables
	 */
	private $acquireActionRates;
    /** @return string|null Experience Model GRN */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId Experience Model GRN */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId Experience Model GRN
     * @return ExperienceModel
     */
	public function withExperienceModelId(?string $experienceModelId): ExperienceModel {
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
     * @return ExperienceModel
     */
	public function withName(?string $name): ExperienceModel {
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
     * @return ExperienceModel
     */
	public function withMetadata(?string $metadata): ExperienceModel {
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
     * @return ExperienceModel
     */
	public function withDefaultExperience(?int $defaultExperience): ExperienceModel {
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
     * @return ExperienceModel
     */
	public function withDefaultRankCap(?int $defaultRankCap): ExperienceModel {
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
     * @return ExperienceModel
     */
	public function withMaxRankCap(?int $maxRankCap): ExperienceModel {
		$this->maxRankCap = $maxRankCap;
		return $this;
	}
    /** @return Threshold|null Rank Up Threshold */
	public function getRankThreshold(): ?Threshold {
		return $this->rankThreshold;
	}
    /** @param Threshold|null $rankThreshold Rank Up Threshold */
	public function setRankThreshold(?Threshold $rankThreshold) {
		$this->rankThreshold = $rankThreshold;
	}
    /**
     * @param Threshold|null $rankThreshold Rank Up Threshold
     * @return ExperienceModel
     */
	public function withRankThreshold(?Threshold $rankThreshold): ExperienceModel {
		$this->rankThreshold = $rankThreshold;
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
     * @return ExperienceModel
     */
	public function withAcquireActionRates(?array $acquireActionRates): ExperienceModel {
		$this->acquireActionRates = $acquireActionRates;
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
            ->withRankThreshold(array_key_exists('rankThreshold', $data) && $data['rankThreshold'] !== null ? Threshold::fromJson($data['rankThreshold']) : null)
            ->withAcquireActionRates(!array_key_exists('acquireActionRates', $data) || $data['acquireActionRates'] === null ? null : array_map(
                function ($item) {
                    return AcquireActionRate::fromJson($item);
                },
                $data['acquireActionRates']
            ));
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
            "acquireActionRates" => $this->getAcquireActionRates() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActionRates()
            ),
        );
    }
}