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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;


/**
 * Property Form Model
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#propertyformmodel
 */
class PropertyFormModel implements IModel {
	/**
     * @var string Property Form Model GRN
	 */
	private $propertyFormModelId;
	/**
     * @var string Property Form Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Slot Model
	 */
	private $slots;
    /** @return string|null Property Form Model GRN */
	public function getPropertyFormModelId(): ?string {
		return $this->propertyFormModelId;
	}
    /** @param string|null $propertyFormModelId Property Form Model GRN */
	public function setPropertyFormModelId(?string $propertyFormModelId) {
		$this->propertyFormModelId = $propertyFormModelId;
	}
    /**
     * @param string|null $propertyFormModelId Property Form Model GRN
     * @return PropertyFormModel
     */
	public function withPropertyFormModelId(?string $propertyFormModelId): PropertyFormModel {
		$this->propertyFormModelId = $propertyFormModelId;
		return $this;
	}
    /** @return string|null Property Form Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Property Form Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Property Form Model name
     * @return PropertyFormModel
     */
	public function withName(?string $name): PropertyFormModel {
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
     * @return PropertyFormModel
     */
	public function withMetadata(?string $metadata): PropertyFormModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Slot Model */
	public function getSlots(): ?array {
		return $this->slots;
	}
    /** @param array|null $slots List of Slot Model */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
    /**
     * @param array|null $slots List of Slot Model
     * @return PropertyFormModel
     */
	public function withSlots(?array $slots): PropertyFormModel {
		$this->slots = $slots;
		return $this;
	}

    public static function fromJson(?array $data): ?PropertyFormModel {
        if ($data === null) {
            return null;
        }
        return (new PropertyFormModel())
            ->withPropertyFormModelId(array_key_exists('propertyFormModelId', $data) && $data['propertyFormModelId'] !== null ? $data['propertyFormModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSlots(!array_key_exists('slots', $data) || $data['slots'] === null ? null : array_map(
                function ($item) {
                    return SlotModel::fromJson($item);
                },
                $data['slots']
            ));
    }

    public function toJson(): array {
        return array(
            "propertyFormModelId" => $this->getPropertyFormModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "slots" => $this->getSlots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots()
            ),
        );
    }
}