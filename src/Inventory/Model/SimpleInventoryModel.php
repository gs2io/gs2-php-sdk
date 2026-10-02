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
 * Simple Inventory Model
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#simpleinventorymodel
 */
class SimpleInventoryModel implements IModel {
	/**
     * @var string Simple Inventory Model GRN
	 */
	private $inventoryModelId;
	/**
     * @var string Simple Inventory Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Simple Item Models
	 */
	private $simpleItemModels;
    /** @return string|null Simple Inventory Model GRN */
	public function getInventoryModelId(): ?string {
		return $this->inventoryModelId;
	}
    /** @param string|null $inventoryModelId Simple Inventory Model GRN */
	public function setInventoryModelId(?string $inventoryModelId) {
		$this->inventoryModelId = $inventoryModelId;
	}
    /**
     * @param string|null $inventoryModelId Simple Inventory Model GRN
     * @return SimpleInventoryModel
     */
	public function withInventoryModelId(?string $inventoryModelId): SimpleInventoryModel {
		$this->inventoryModelId = $inventoryModelId;
		return $this;
	}
    /** @return string|null Simple Inventory Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Simple Inventory Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Simple Inventory Model name
     * @return SimpleInventoryModel
     */
	public function withName(?string $name): SimpleInventoryModel {
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
     * @return SimpleInventoryModel
     */
	public function withMetadata(?string $metadata): SimpleInventoryModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Simple Item Models */
	public function getSimpleItemModels(): ?array {
		return $this->simpleItemModels;
	}
    /** @param array|null $simpleItemModels List of Simple Item Models */
	public function setSimpleItemModels(?array $simpleItemModels) {
		$this->simpleItemModels = $simpleItemModels;
	}
    /**
     * @param array|null $simpleItemModels List of Simple Item Models
     * @return SimpleInventoryModel
     */
	public function withSimpleItemModels(?array $simpleItemModels): SimpleInventoryModel {
		$this->simpleItemModels = $simpleItemModels;
		return $this;
	}

    public static function fromJson(?array $data): ?SimpleInventoryModel {
        if ($data === null) {
            return null;
        }
        return (new SimpleInventoryModel())
            ->withInventoryModelId(array_key_exists('inventoryModelId', $data) && $data['inventoryModelId'] !== null ? $data['inventoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSimpleItemModels(!array_key_exists('simpleItemModels', $data) || $data['simpleItemModels'] === null ? null : array_map(
                function ($item) {
                    return SimpleItemModel::fromJson($item);
                },
                $data['simpleItemModels']
            ));
    }

    public function toJson(): array {
        return array(
            "inventoryModelId" => $this->getInventoryModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "simpleItemModels" => $this->getSimpleItemModels() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSimpleItemModels()
            ),
        );
    }
}