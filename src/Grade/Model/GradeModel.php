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

namespace Gs2\Grade\Model;

use Gs2\Core\Model\IModel;


/**
 * Grade Model
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#grademodel
 */
class GradeModel implements IModel {
	/**
     * @var string Grade Model GRN
	 */
	private $gradeModelId;
	/**
     * @var string Grade Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Default Grade Models
	 */
	private $defaultGrades;
	/**
     * @var string GS2-Experience Experience Model GRN
	 */
	private $experienceModelId;
	/**
     * @var array List of Grade Entry Models
	 */
	private $gradeEntries;
	/**
     * @var array List of Reward Addition Tables
	 */
	private $acquireActionRates;
    /** @return string|null Grade Model GRN */
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
    /** @param string|null $gradeModelId Grade Model GRN */
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
    /**
     * @param string|null $gradeModelId Grade Model GRN
     * @return GradeModel
     */
	public function withGradeModelId(?string $gradeModelId): GradeModel {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
    /** @return string|null Grade Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Grade Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Grade Model name
     * @return GradeModel
     */
	public function withName(?string $name): GradeModel {
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
     * @return GradeModel
     */
	public function withMetadata(?string $metadata): GradeModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Default Grade Models */
	public function getDefaultGrades(): ?array {
		return $this->defaultGrades;
	}
    /** @param array|null $defaultGrades List of Default Grade Models */
	public function setDefaultGrades(?array $defaultGrades) {
		$this->defaultGrades = $defaultGrades;
	}
    /**
     * @param array|null $defaultGrades List of Default Grade Models
     * @return GradeModel
     */
	public function withDefaultGrades(?array $defaultGrades): GradeModel {
		$this->defaultGrades = $defaultGrades;
		return $this;
	}
    /** @return string|null GS2-Experience Experience Model GRN */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId GS2-Experience Experience Model GRN */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId GS2-Experience Experience Model GRN
     * @return GradeModel
     */
	public function withExperienceModelId(?string $experienceModelId): GradeModel {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return array|null List of Grade Entry Models */
	public function getGradeEntries(): ?array {
		return $this->gradeEntries;
	}
    /** @param array|null $gradeEntries List of Grade Entry Models */
	public function setGradeEntries(?array $gradeEntries) {
		$this->gradeEntries = $gradeEntries;
	}
    /**
     * @param array|null $gradeEntries List of Grade Entry Models
     * @return GradeModel
     */
	public function withGradeEntries(?array $gradeEntries): GradeModel {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}
    /** @return array|null List of Reward Addition Tables */
	public function getAcquireActionRates(): ?array {
		return $this->acquireActionRates;
	}
    /** @param array|null $acquireActionRates List of Reward Addition Tables */
	public function setAcquireActionRates(?array $acquireActionRates) {
		$this->acquireActionRates = $acquireActionRates;
	}
    /**
     * @param array|null $acquireActionRates List of Reward Addition Tables
     * @return GradeModel
     */
	public function withAcquireActionRates(?array $acquireActionRates): GradeModel {
		$this->acquireActionRates = $acquireActionRates;
		return $this;
	}

    public static function fromJson(?array $data): ?GradeModel {
        if ($data === null) {
            return null;
        }
        return (new GradeModel())
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDefaultGrades(!array_key_exists('defaultGrades', $data) || $data['defaultGrades'] === null ? null : array_map(
                function ($item) {
                    return DefaultGradeModel::fromJson($item);
                },
                $data['defaultGrades']
            ))
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withGradeEntries(!array_key_exists('gradeEntries', $data) || $data['gradeEntries'] === null ? null : array_map(
                function ($item) {
                    return GradeEntryModel::fromJson($item);
                },
                $data['gradeEntries']
            ))
            ->withAcquireActionRates(!array_key_exists('acquireActionRates', $data) || $data['acquireActionRates'] === null ? null : array_map(
                function ($item) {
                    return AcquireActionRate::fromJson($item);
                },
                $data['acquireActionRates']
            ));
    }

    public function toJson(): array {
        return array(
            "gradeModelId" => $this->getGradeModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "defaultGrades" => $this->getDefaultGrades() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDefaultGrades()
            ),
            "experienceModelId" => $this->getExperienceModelId(),
            "gradeEntries" => $this->getGradeEntries() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGradeEntries()
            ),
            "acquireActionRates" => $this->getAcquireActionRates() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActionRates()
            ),
        );
    }
}