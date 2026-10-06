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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\UnleashIndividualMaterialSetting;
use Gs2\Enhance\Model\UnleashQuantityMaterialSetting;
use Gs2\Enhance\Model\UnleashMaterial;
use Gs2\Enhance\Model\UnleashRecipe;
use Gs2\Enhance\Model\UnleashRateEntryModel;

/**
 * Request for updateUnleashRateModelMaster: Update Unleash Rate Model Master
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#updateunleashratemodelmaster
 */
class UpdateUnleashRateModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Unleash Rate Model name */
    private $rateName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string GS2-Inventory Inventory Model GRN usable for unleash targets */
    private $targetInventoryModelId;
    /** @var string Grade Model GRN */
    private $gradeModelId;
    /** @var array Hierarchy of the JSON data that stores the group key in the ItemModel metadata */
    private $groupKeyHierarchy;
    /** @var array List of Grade Entry */
    private $gradeEntries;
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
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateUnleashRateModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Unleash Rate Model name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Unleash Rate Model name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Unleash Rate Model name
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withRateName(?string $rateName): UpdateUnleashRateModelMasterRequest {
		$this->rateName = $rateName;
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
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withDescription(?string $description): UpdateUnleashRateModelMasterRequest {
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
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateUnleashRateModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null GS2-Inventory Inventory Model GRN usable for unleash targets */
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}
    /** @param string|null $targetInventoryModelId GS2-Inventory Inventory Model GRN usable for unleash targets */
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}
    /**
     * @param string|null $targetInventoryModelId GS2-Inventory Inventory Model GRN usable for unleash targets
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withTargetInventoryModelId(?string $targetInventoryModelId): UpdateUnleashRateModelMasterRequest {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
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
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withGradeModelId(?string $gradeModelId): UpdateUnleashRateModelMasterRequest {
		$this->gradeModelId = $gradeModelId;
		return $this;
	}
    /** @return array|null Hierarchy of the JSON data that stores the group key in the ItemModel metadata */
	public function getGroupKeyHierarchy(): ?array {
		return $this->groupKeyHierarchy;
	}
    /** @param array|null $groupKeyHierarchy Hierarchy of the JSON data that stores the group key in the ItemModel metadata */
	public function setGroupKeyHierarchy(?array $groupKeyHierarchy) {
		$this->groupKeyHierarchy = $groupKeyHierarchy;
	}
    /**
     * @param array|null $groupKeyHierarchy Hierarchy of the JSON data that stores the group key in the ItemModel metadata
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withGroupKeyHierarchy(?array $groupKeyHierarchy): UpdateUnleashRateModelMasterRequest {
		$this->groupKeyHierarchy = $groupKeyHierarchy;
		return $this;
	}
    /** @return array|null List of Grade Entry */
	public function getGradeEntries(): ?array {
		return $this->gradeEntries;
	}
    /** @param array|null $gradeEntries List of Grade Entry */
	public function setGradeEntries(?array $gradeEntries) {
		$this->gradeEntries = $gradeEntries;
	}
    /**
     * @param array|null $gradeEntries List of Grade Entry
     * @return UpdateUnleashRateModelMasterRequest
     */
	public function withGradeEntries(?array $gradeEntries): UpdateUnleashRateModelMasterRequest {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateUnleashRateModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateUnleashRateModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetInventoryModelId(array_key_exists('targetInventoryModelId', $data) && $data['targetInventoryModelId'] !== null ? $data['targetInventoryModelId'] : null)
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withGroupKeyHierarchy(!array_key_exists('groupKeyHierarchy', $data) || $data['groupKeyHierarchy'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['groupKeyHierarchy']
            ))
            ->withGradeEntries(!array_key_exists('gradeEntries', $data) || $data['gradeEntries'] === null ? null : array_map(
                function ($item) {
                    return UnleashRateEntryModel::fromJson($item);
                },
                $data['gradeEntries']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "gradeModelId" => $this->getGradeModelId(),
            "groupKeyHierarchy" => $this->getGroupKeyHierarchy() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getGroupKeyHierarchy()
            ),
            "gradeEntries" => $this->getGradeEntries() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGradeEntries()
            ),
        );
    }
}