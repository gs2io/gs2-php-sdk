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
use Gs2\Enhance\Model\BonusRate;

/**
 * Request for updateRateModelMaster: Update Enhancement Rate Master
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#updateratemodelmaster
 */
class UpdateRateModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Enhancement Rate Model name */
    private $rateName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string GS2-Inventory Inventory Model GRN usable for enhancement targets */
    private $targetInventoryModelId;
    /** @var string Suffix to be assigned to the property ID that stores the experience value obtained from GS2-Experience */
    private $acquireExperienceSuffix;
    /** @var string GS2-Inventory Inventory Model GRN usable as enhancement material */
    private $materialInventoryModelId;
    /** @var array Hierarchical structure of JSON data defining acquisition experience values to be stored in ItemModel metadata */
    private $acquireExperienceHierarchy;
    /** @var string GS2-Experience Experience Model GRN gained as a result of enhancement */
    private $experienceModelId;
    /** @var array Experience gain bonus */
    private $bonusRates;
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
     * @return UpdateRateModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateRateModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Enhancement Rate Model name */
	public function getRateName(): ?string {
		return $this->rateName;
	}
    /** @param string|null $rateName Enhancement Rate Model name */
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
    /**
     * @param string|null $rateName Enhancement Rate Model name
     * @return UpdateRateModelMasterRequest
     */
	public function withRateName(?string $rateName): UpdateRateModelMasterRequest {
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
     * @return UpdateRateModelMasterRequest
     */
	public function withDescription(?string $description): UpdateRateModelMasterRequest {
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
     * @return UpdateRateModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateRateModelMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null GS2-Inventory Inventory Model GRN usable for enhancement targets */
	public function getTargetInventoryModelId(): ?string {
		return $this->targetInventoryModelId;
	}
    /** @param string|null $targetInventoryModelId GS2-Inventory Inventory Model GRN usable for enhancement targets */
	public function setTargetInventoryModelId(?string $targetInventoryModelId) {
		$this->targetInventoryModelId = $targetInventoryModelId;
	}
    /**
     * @param string|null $targetInventoryModelId GS2-Inventory Inventory Model GRN usable for enhancement targets
     * @return UpdateRateModelMasterRequest
     */
	public function withTargetInventoryModelId(?string $targetInventoryModelId): UpdateRateModelMasterRequest {
		$this->targetInventoryModelId = $targetInventoryModelId;
		return $this;
	}
    /** @return string|null Suffix to be assigned to the property ID that stores the experience value obtained from GS2-Experience */
	public function getAcquireExperienceSuffix(): ?string {
		return $this->acquireExperienceSuffix;
	}
    /** @param string|null $acquireExperienceSuffix Suffix to be assigned to the property ID that stores the experience value obtained from GS2-Experience */
	public function setAcquireExperienceSuffix(?string $acquireExperienceSuffix) {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
	}
    /**
     * @param string|null $acquireExperienceSuffix Suffix to be assigned to the property ID that stores the experience value obtained from GS2-Experience
     * @return UpdateRateModelMasterRequest
     */
	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): UpdateRateModelMasterRequest {
		$this->acquireExperienceSuffix = $acquireExperienceSuffix;
		return $this;
	}
    /** @return string|null GS2-Inventory Inventory Model GRN usable as enhancement material */
	public function getMaterialInventoryModelId(): ?string {
		return $this->materialInventoryModelId;
	}
    /** @param string|null $materialInventoryModelId GS2-Inventory Inventory Model GRN usable as enhancement material */
	public function setMaterialInventoryModelId(?string $materialInventoryModelId) {
		$this->materialInventoryModelId = $materialInventoryModelId;
	}
    /**
     * @param string|null $materialInventoryModelId GS2-Inventory Inventory Model GRN usable as enhancement material
     * @return UpdateRateModelMasterRequest
     */
	public function withMaterialInventoryModelId(?string $materialInventoryModelId): UpdateRateModelMasterRequest {
		$this->materialInventoryModelId = $materialInventoryModelId;
		return $this;
	}
    /** @return array|null Hierarchical structure of JSON data defining acquisition experience values to be stored in ItemModel metadata */
	public function getAcquireExperienceHierarchy(): ?array {
		return $this->acquireExperienceHierarchy;
	}
    /** @param array|null $acquireExperienceHierarchy Hierarchical structure of JSON data defining acquisition experience values to be stored in ItemModel metadata */
	public function setAcquireExperienceHierarchy(?array $acquireExperienceHierarchy) {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
	}
    /**
     * @param array|null $acquireExperienceHierarchy Hierarchical structure of JSON data defining acquisition experience values to be stored in ItemModel metadata
     * @return UpdateRateModelMasterRequest
     */
	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): UpdateRateModelMasterRequest {
		$this->acquireExperienceHierarchy = $acquireExperienceHierarchy;
		return $this;
	}
    /** @return string|null GS2-Experience Experience Model GRN gained as a result of enhancement */
	public function getExperienceModelId(): ?string {
		return $this->experienceModelId;
	}
    /** @param string|null $experienceModelId GS2-Experience Experience Model GRN gained as a result of enhancement */
	public function setExperienceModelId(?string $experienceModelId) {
		$this->experienceModelId = $experienceModelId;
	}
    /**
     * @param string|null $experienceModelId GS2-Experience Experience Model GRN gained as a result of enhancement
     * @return UpdateRateModelMasterRequest
     */
	public function withExperienceModelId(?string $experienceModelId): UpdateRateModelMasterRequest {
		$this->experienceModelId = $experienceModelId;
		return $this;
	}
    /** @return array|null Experience gain bonus */
	public function getBonusRates(): ?array {
		return $this->bonusRates;
	}
    /** @param array|null $bonusRates Experience gain bonus */
	public function setBonusRates(?array $bonusRates) {
		$this->bonusRates = $bonusRates;
	}
    /**
     * @param array|null $bonusRates Experience gain bonus
     * @return UpdateRateModelMasterRequest
     */
	public function withBonusRates(?array $bonusRates): UpdateRateModelMasterRequest {
		$this->bonusRates = $bonusRates;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateRateModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateRateModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetInventoryModelId(array_key_exists('targetInventoryModelId', $data) && $data['targetInventoryModelId'] !== null ? $data['targetInventoryModelId'] : null)
            ->withAcquireExperienceSuffix(array_key_exists('acquireExperienceSuffix', $data) && $data['acquireExperienceSuffix'] !== null ? $data['acquireExperienceSuffix'] : null)
            ->withMaterialInventoryModelId(array_key_exists('materialInventoryModelId', $data) && $data['materialInventoryModelId'] !== null ? $data['materialInventoryModelId'] : null)
            ->withAcquireExperienceHierarchy(!array_key_exists('acquireExperienceHierarchy', $data) || $data['acquireExperienceHierarchy'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['acquireExperienceHierarchy']
            ))
            ->withExperienceModelId(array_key_exists('experienceModelId', $data) && $data['experienceModelId'] !== null ? $data['experienceModelId'] : null)
            ->withBonusRates(!array_key_exists('bonusRates', $data) || $data['bonusRates'] === null ? null : array_map(
                function ($item) {
                    return BonusRate::fromJson($item);
                },
                $data['bonusRates']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "acquireExperienceSuffix" => $this->getAcquireExperienceSuffix(),
            "materialInventoryModelId" => $this->getMaterialInventoryModelId(),
            "acquireExperienceHierarchy" => $this->getAcquireExperienceHierarchy() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAcquireExperienceHierarchy()
            ),
            "experienceModelId" => $this->getExperienceModelId(),
            "bonusRates" => $this->getBonusRates() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBonusRates()
            ),
        );
    }
}