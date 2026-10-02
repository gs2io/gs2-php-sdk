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

/**
 * Request for updateGradeModelMaster: Update Grade Model Master
 *
 * @see https://docs.gs2.io/api_reference/grade/sdk/#updategrademodelmaster
 */
class UpdateGradeModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Grade Model name */
    private $gradeName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var array List of Default Grade Models */
    private $defaultGrades;
    /** @var string GS2-Experience Experience Model GRN */
    private $experienceModelId;
    /** @var array List of Grade Entry Models */
    private $gradeEntries;
    /** @var array List of Reward Addition Tables */
    private $acquireActionRates;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateGradeModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateGradeModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Grade Model name */
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
    /** @param string|null $gradeName Grade Model name */
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
    /**
     * @param string|null $gradeName Grade Model name
     * @return UpdateGradeModelMasterRequest
     */
	public function withGradeName(?string $gradeName): UpdateGradeModelMasterRequest {
		$this->gradeName = $gradeName;
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
     * @return UpdateGradeModelMasterRequest
     */
	public function withDescription(?string $description): UpdateGradeModelMasterRequest {
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
     * @return UpdateGradeModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateGradeModelMasterRequest {
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
     * @return UpdateGradeModelMasterRequest
     */
	public function withDefaultGrades(?array $defaultGrades): UpdateGradeModelMasterRequest {
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
     * @return UpdateGradeModelMasterRequest
     */
	public function withExperienceModelId(?string $experienceModelId): UpdateGradeModelMasterRequest {
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
     * @return UpdateGradeModelMasterRequest
     */
	public function withGradeEntries(?array $gradeEntries): UpdateGradeModelMasterRequest {
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
     * @return UpdateGradeModelMasterRequest
     */
	public function withAcquireActionRates(?array $acquireActionRates): UpdateGradeModelMasterRequest {
		$this->acquireActionRates = $acquireActionRates;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateGradeModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateGradeModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
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
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "gradeName" => $this->getGradeName(),
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
        );
    }
}