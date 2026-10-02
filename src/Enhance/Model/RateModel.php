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

namespace Gs2\Enhance\Model;

use Gs2\Core\Model\IModel;


/**
 * Enhancement Rate Model
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#ratemodel
 */
class RateModel implements IModel {
	/**
     * @var string Enhancement Rate Model GRN
	 */
	private $rateModelId;
	/**
     * @var string Enhancement Rate Model name
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
     * @var string GS2-Inventory Inventory Model GRN usable for enhancement targets
	 */
	private $targetInventoryModelId;
	/**
     * @var string Suffix to be assigned to the property ID that stores the experience value obtained from GS2-Experience
	 */
	private $acquireExperienceSuffix;
	/**
     * @var string GS2-Inventory Inventory Model GRN usable as enhancement material
	 */
	private $materialInventoryModelId;
	/**
     * @var array Hierarchical structure of JSON data defining acquisition experience values to be stored in ItemModel metadata
	 */
	private $acquireExperienceHierarchy;
	/**
     * @var string GS2-Experience Experience Model GRN gained as a result of enhancement
	 */
	private $experienceModelId;
	/**
     * @var array Experience gain bonus
	 */
	private $bonusRates;
    /** @return string|null Enhancement Rate Model GRN */
	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}
    /** @param string|null $rateModelId Enhancement Rate Model GRN */
	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}
    /**
     * @param string|null $rateModelId Enhancement Rate Model GRN
     * @return RateModel
     */
	public function withRateModelId(?string $rateModelId): RateModel {
		$this->rateModelId = $rateModelId;
		return $this;
	}
    /** @return string|null Enhancement Rate Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Enhancement Rate Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Enhancement Rate Model name
     * @return RateModel
     */
	public function withName(?string $name): RateModel {
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
     * @return RateModel
     */
	public function withDescription(?string $description): RateModel {
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
     * @return RateModel
     */
	public function withMetadata(?string $metadata): RateModel {
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
     * @return RateModel
     */
	public function withTargetInventoryModelId(?string $targetInventoryModelId): RateModel {
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
     * @return RateModel
     */
	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): RateModel {
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
     * @return RateModel
     */
	public function withMaterialInventoryModelId(?string $materialInventoryModelId): RateModel {
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
     * @return RateModel
     */
	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): RateModel {
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
     * @return RateModel
     */
	public function withExperienceModelId(?string $experienceModelId): RateModel {
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
     * @return RateModel
     */
	public function withBonusRates(?array $bonusRates): RateModel {
		$this->bonusRates = $bonusRates;
		return $this;
	}

    public static function fromJson(?array $data): ?RateModel {
        if ($data === null) {
            return null;
        }
        return (new RateModel())
            ->withRateModelId(array_key_exists('rateModelId', $data) && $data['rateModelId'] !== null ? $data['rateModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            "rateModelId" => $this->getRateModelId(),
            "name" => $this->getName(),
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