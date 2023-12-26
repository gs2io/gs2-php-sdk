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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Grade\Model\DefaultGradeModel;
use Gs2\Grade\Model\GradeEntryModel;
use Gs2\Grade\Model\AcquireActionRate;

class CreateGradeModelMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var array */
    private $defaultGrades;
    /** @var string */
    private $experienceModelId;
    /** @var array */
    private $gradeEntries;
    /** @var array */
    private $acquireActionRates;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateGradeModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateGradeModelMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateGradeModelMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateGradeModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getDefaultGrades(): ?array {
		return $this->defaultGrades;
	}
	public function setDefaultGrades(?array $defaultGrades) {
		$this->defaultGrades = $defaultGrades;
	}
	public function withDefaultGrades(?array $defaultGrades): CreateGradeModelMasterRequest {
		$this->defaultGrades = $defaultGrades;
		return $this;
	}
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
	public function withExperienceModelId(?string $experienceModelId): CreateGradeModelMasterRequest {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
	public function getGradeEntries(): ?array {
		return $this->gradeEntries;
	}
	public function setGradeEntries(?array $gradeEntries) {
		$this->gradeEntries = $gradeEntries;
	}
	public function withGradeEntries(?array $gradeEntries): CreateGradeModelMasterRequest {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}
	public function getAcquireActionRates(): ?array {
		return $this->acquireActionRates;
	}
	public function setAcquireActionRates(?array $acquireActionRates) {
		$this->acquireActionRates = $acquireActionRates;
	}
	public function withAcquireActionRates(?array $acquireActionRates): CreateGradeModelMasterRequest {
		$this->acquireActionRates = $acquireActionRates;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateGradeModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateGradeModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
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
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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