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
 * Unleash Rate Model
 *
 * @see https://docs.gs2.io/api_reference/enhance/sdk/#unleashratemodel
 */
class UnleashRateModel implements IModel {
	/**
     * @var string Unleash Rate Model GRN
	 */
	private $unleashRateModelId;
	/**
     * @var string Unleash Rate Model name
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
     * @var string GS2-Inventory Inventory Model GRN usable for unleash targets
	 */
	private $targetInventoryModelId;
	/**
     * @var string Grade Model GRN
	 */
	private $gradeModelId;
	/**
     * @var array List of Grade Entry
	 */
	private $gradeEntries;
    /** @return string|null Unleash Rate Model GRN */
	public function getUnleashRateModelId(): ?string {
		return $this->unleashRateModelId;
	}
    /** @param string|null $unleashRateModelId Unleash Rate Model GRN */
	public function setUnleashRateModelId(?string $unleashRateModelId) {
		$this->unleashRateModelId = $unleashRateModelId;
	}
    /**
     * @param string|null $unleashRateModelId Unleash Rate Model GRN
     * @return UnleashRateModel
     */
	public function withUnleashRateModelId(?string $unleashRateModelId): UnleashRateModel {
		$this->unleashRateModelId = $unleashRateModelId;
		return $this;
	}
    /** @return string|null Unleash Rate Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Unleash Rate Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Unleash Rate Model name
     * @return UnleashRateModel
     */
	public function withName(?string $name): UnleashRateModel {
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
     * @return UnleashRateModel
     */
	public function withDescription(?string $description): UnleashRateModel {
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
     * @return UnleashRateModel
     */
	public function withMetadata(?string $metadata): UnleashRateModel {
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
     * @return UnleashRateModel
     */
	public function withTargetInventoryModelId(?string $targetInventoryModelId): UnleashRateModel {
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
     * @return UnleashRateModel
     */
	public function withGradeModelId(?string $gradeModelId): UnleashRateModel {
		$this->gradeModelId = $gradeModelId;
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
     * @return UnleashRateModel
     */
	public function withGradeEntries(?array $gradeEntries): UnleashRateModel {
		$this->gradeEntries = $gradeEntries;
		return $this;
	}

    public static function fromJson(?array $data): ?UnleashRateModel {
        if ($data === null) {
            return null;
        }
        return (new UnleashRateModel())
            ->withUnleashRateModelId(array_key_exists('unleashRateModelId', $data) && $data['unleashRateModelId'] !== null ? $data['unleashRateModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTargetInventoryModelId(array_key_exists('targetInventoryModelId', $data) && $data['targetInventoryModelId'] !== null ? $data['targetInventoryModelId'] : null)
            ->withGradeModelId(array_key_exists('gradeModelId', $data) && $data['gradeModelId'] !== null ? $data['gradeModelId'] : null)
            ->withGradeEntries(!array_key_exists('gradeEntries', $data) || $data['gradeEntries'] === null ? null : array_map(
                function ($item) {
                    return UnleashRateEntryModel::fromJson($item);
                },
                $data['gradeEntries']
            ));
    }

    public function toJson(): array {
        return array(
            "unleashRateModelId" => $this->getUnleashRateModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "targetInventoryModelId" => $this->getTargetInventoryModelId(),
            "gradeModelId" => $this->getGradeModelId(),
            "gradeEntries" => $this->getGradeEntries() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getGradeEntries()
            ),
        );
    }
}