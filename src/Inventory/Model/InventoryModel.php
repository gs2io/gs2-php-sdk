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


class InventoryModel implements IModel {
	/**
     * @var string
	 */
	private $inventoryModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $initialCapacity;
	/**
     * @var int
	 */
	private $maxCapacity;
	/**
     * @var bool
	 */
	private $protectReferencedItem;
	/**
     * @var array
	 */
	private $itemModels;
	public function getInventoryModelId(): ?string {
		return $this->inventoryModelId;
	}
	public function setInventoryModelId(?string $inventoryModelId) {
		$this->inventoryModelId = $inventoryModelId;
	}
	public function withInventoryModelId(?string $inventoryModelId): InventoryModel {
		$this->inventoryModelId = $inventoryModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): InventoryModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): InventoryModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}
	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}
	public function withInitialCapacity(?int $initialCapacity): InventoryModel {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
	public function withMaxCapacity(?int $maxCapacity): InventoryModel {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	public function getProtectReferencedItem(): ?bool {
		return $this->protectReferencedItem;
	}
	public function setProtectReferencedItem(?bool $protectReferencedItem) {
		$this->protectReferencedItem = $protectReferencedItem;
	}
	public function withProtectReferencedItem(?bool $protectReferencedItem): InventoryModel {
		$this->protectReferencedItem = $protectReferencedItem;
		return $this;
	}
	public function getItemModels(): ?array {
		return $this->itemModels;
	}
	public function setItemModels(?array $itemModels) {
		$this->itemModels = $itemModels;
	}
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
            ->withItemModels(array_map(
                function ($item) {
                    return ItemModel::fromJson($item);
                },
                array_key_exists('itemModels', $data) && $data['itemModels'] !== null ? $data['itemModels'] : []
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
            "itemModels" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItemModels() !== null && $this->getItemModels() !== null ? $this->getItemModels() : []
            ),
        );
    }
}