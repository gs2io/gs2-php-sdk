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
 * Enhancement Rate Model Master
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#ratemodelmaster
 */
class RateModelMaster implements IModel {
	/**
     * @var string Enhancement Rate Model Master GRN
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
    /** @return string|null Enhancement Rate Model Master GRN */
	public function getRateModelId(): ?string {
		return $this->rateModelId;
	}
    /** @param string|null $rateModelId Enhancement Rate Model Master GRN */
	public function setRateModelId(?string $rateModelId) {
		$this->rateModelId = $rateModelId;
	}
    /**
     * @param string|null $rateModelId Enhancement Rate Model Master GRN
     * @return RateModelMaster
     */
	public function withRateModelId(?string $rateModelId): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withName(?string $name): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withDescription(?string $description): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withMetadata(?string $metadata): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withTargetInventoryModelId(?string $targetInventoryModelId): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withAcquireExperienceSuffix(?string $acquireExperienceSuffix): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withMaterialInventoryModelId(?string $materialInventoryModelId): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withAcquireExperienceHierarchy(?array $acquireExperienceHierarchy): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withExperienceModelId(?string $experienceModelId): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withBonusRates(?array $bonusRates): RateModelMaster {
		$this->bonusRates = $bonusRates;
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
     * @return RateModelMaster
     */
	public function withCreatedAt(?int $createdAt): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): RateModelMaster {
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
     * @return RateModelMaster
     */
	public function withRevision(?int $revision): RateModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?RateModelMaster {
        if ($data === null) {
            return null;
        }
        return (new RateModelMaster())
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
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}