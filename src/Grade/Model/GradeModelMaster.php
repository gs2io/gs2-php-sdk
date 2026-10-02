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
 * Grade Model Master
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#grademodelmaster
 */
class GradeModelMaster implements IModel {
	/**
     * @var string Grade Model Master GRN
	 */
	private $gradeModelId;
	/**
     * @var string Grade Model name
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
    /** @return string|null Grade Model Master GRN */
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
    /** @param string|null $gradeModelId Grade Model Master GRN */
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
    /**
     * @param string|null $gradeModelId Grade Model Master GRN
     * @return GradeModelMaster
     */
	public function withGradeModelId(?string $gradeModelId): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withName(?string $name): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withDescription(?string $description): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withMetadata(?string $metadata): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withDefaultGrades(?array $defaultGrades): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withExperienceModelId(?string $experienceModelId): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withGradeEntries(?array $gradeEntries): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withAcquireActionRates(?array $acquireActionRates): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withCreatedAt(?int $createdAt): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): GradeModelMaster {
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
     * @return GradeModelMaster
     */
	public function withRevision(?int $revision): GradeModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?GradeModelMaster {
        if ($data === null) {
            return null;
        }
        return (new GradeModelMaster())
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
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
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "gradeModelId" => $this->getGradeModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}