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


class GradeModel implements IModel {
	/**
     * @var string
	 */
	private $gradeModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $defaultGrades;
	/**
     * @var string
	 */
	private $experienceModelId;
	/**
     * @var array
	 */
	private $gradeEntries;
	/**
     * @var array
	 */
	private $acquireActionRates;
	public function getGradeModelId(): ?string {
		return $this->gradeModelId;
	}
	public function setGradeModelId(?string $gradeModelId) {
		$this->gradeModelId = $gradeModelId;
	}
	public function withGradeModelId(?string $gradeModelId): GradeModel {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): GradeModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): GradeModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getDefaultGrades(): ?array {
		return $this->defaultGrades;
	}
	public function setDefaultGrades(?array $defaultGrades) {
		$this->defaultGrades = $defaultGrades;
	}
	public function withDefaultGrades(?array $defaultGrades): GradeModel {
		$this->defaultGrades = $defaultGrades;
		return $this;
	}
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
	public function withExperienceModelId(?string $experienceModelId): GradeModel {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	public function getGradeEntries(): ?array {
		return $this->gradeEntries;
	}
	public function setGradeEntries(?array $gradeEntries) {
		$this->gradeEntries = $gradeEntries;
	}
	public function withGradeEntries(?array $gradeEntries): GradeModel {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}
	public function getAcquireActionRates(): ?array {
		return $this->acquireActionRates;
	}
	public function setAcquireActionRates(?array $acquireActionRates) {
		$this->acquireActionRates = $acquireActionRates;
	}
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
            ->withDefaultGrades(array_map(
                function ($item) {
                    return DefaultGradeModel::fromJson($item);
                },
                array_key_exists('defaultGrades', $data) && $data['defaultGrades'] !== null ? $data['defaultGrades'] : []
            ))
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withGradeEntries(array_map(
                function ($item) {
                    return GradeEntryModel::fromJson($item);
                },
                array_key_exists('gradeEntries', $data) && $data['gradeEntries'] !== null ? $data['gradeEntries'] : []
            ))
            ->withAcquireActionRates(array_map(
                function ($item) {
                    return AcquireActionRate::fromJson($item);
                },
                array_key_exists('acquireActionRates', $data) && $data['acquireActionRates'] !== null ? $data['acquireActionRates'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "gradeModelId" => $this->getGradeModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "defaultGrades" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDefaultGrades() !== null && $this->getDefaultGrades() !== null ? $this->getDefaultGrades() : []
            ),
            "experienceModelId" => $this->getExperienceModelId(),
            "gradeEntries" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGradeEntries() !== null && $this->getGradeEntries() !== null ? $this->getGradeEntries() : []
            ),
            "acquireActionRates" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActionRates() !== null && $this->getAcquireActionRates() !== null ? $this->getAcquireActionRates() : []
            ),
        );
    }
}