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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;


/**
 * Inventory Model
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#inventorymodel
 */
class InventoryModel implements IModel {
	/**
     * @var string Inventory Model GRN
	 */
	private $inventoryModelId;
	/**
     * @var string Inventory Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Initial Capacity
	 */
	private $initialCapacity;
	/**
     * @var int Maximum Capacity
	 */
	private $maxCapacity;
	/**
     * @var bool Protect Referenced Items
	 */
	private $protectReferencedItem;
	/**
     * @var array List of Item Models
	 */
	private $itemModels;
    /** @return string|null Inventory Model GRN */
	public function getInventoryModelId(): ?string {
		return $this->inventoryModelId;
	}
    /** @param string|null $inventoryModelId Inventory Model GRN */
	public function setInventoryModelId(?string $inventoryModelId) {
		$this->inventoryModelId = $inventoryModelId;
	}
    /**
     * @param string|null $inventoryModelId Inventory Model GRN
     * @return InventoryModel
     */
	public function withInventoryModelId(?string $inventoryModelId): InventoryModel {
		$this->inventoryModelId = $inventoryModelId;
		return $this;
	}
    /** @return string|null Inventory Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Inventory Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Inventory Model name
     * @return InventoryModel
     */
	public function withName(?string $name): InventoryModel {
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
     * @return InventoryModel
     */
	public function withMetadata(?string $metadata): InventoryModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Initial Capacity */
	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}
    /** @param int|null $initialCapacity Initial Capacity */
	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}
    /**
     * @param int|null $initialCapacity Initial Capacity
     * @return InventoryModel
     */
	public function withInitialCapacity(?int $initialCapacity): InventoryModel {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}
    /** @return int|null Maximum Capacity */
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
    /** @param int|null $maxCapacity Maximum Capacity */
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
    /**
     * @param int|null $maxCapacity Maximum Capacity
     * @return InventoryModel
     */
	public function withMaxCapacity(?int $maxCapacity): InventoryModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
    /** @return bool|null Protect Referenced Items */
	public function getProtectReferencedItem(): ?bool {
		return $this->protectReferencedItem;
	}
    /** @param bool|null $protectReferencedItem Protect Referenced Items */
	public function setProtectReferencedItem(?bool $protectReferencedItem) {
		$this->protectReferencedItem = $protectReferencedItem;
	}
    /**
     * @param bool|null $protectReferencedItem Protect Referenced Items
     * @return InventoryModel
     */
	public function withProtectReferencedItem(?bool $protectReferencedItem): InventoryModel {
		$this->protectReferencedItem = $protectReferencedItem;
		return $this;
	}
    /** @return array|null List of Item Models */
	public function getItemModels(): ?array {
		return $this->itemModels;
	}
    /** @param array|null $itemModels List of Item Models */
	public function setItemModels(?array $itemModels) {
		$this->itemModels = $itemModels;
	}
    /**
     * @param array|null $itemModels List of Item Models
     * @return InventoryModel
     */
	public function withItemModels(?array $itemModels): InventoryModel {
		$this->itemModels = $itemModels;
		return $this;
	}

    public static function fromJson(?array $data): ?InventoryModel {
        if ($data === null) {
            return null;
        }
        return (new InventoryModel())
            ->withInventoryModelId(array_key_exists('inventoryModelId', $data) && $data['inventoryModelId'] !== null ? $data['inventoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withProtectReferencedItem(array_key_exists('protectReferencedItem', $data) ? $data['protectReferencedItem'] : null)
            ->withItemModels(!array_key_exists('itemModels', $data) || $data['itemModels'] === null ? null : array_map(
                function ($item) {
                    return ItemModel::fromJson($item);
                },
                $data['itemModels']
            ));
    }

    public function toJson(): array {
        return array(
            "inventoryModelId" => $this->getInventoryModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "initialCapacity" => $this->getInitialCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
            "protectReferencedItem" => $this->getProtectReferencedItem(),
            "itemModels" => $this->getItemModels() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItemModels()
            ),
        );
    }
}