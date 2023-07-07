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


class SimpleInventoryModel implements IModel {
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
     * @var array
	 */
	private $simpleItemModels;
	public function getInventoryModelId(): ?string {
		return $this->inventoryModelId;
	}
	public function setInventoryModelId(?string $inventoryModelId) {
		$this->inventoryModelId = $inventoryModelId;
	}
	public function withInventoryModelId(?string $inventoryModelId): SimpleInventoryModel {
		$this->inventoryModelId = $inventoryModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): SimpleInventoryModel {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): SimpleInventoryModel {
		$this->metadata = $metadata;
		return $this;
	}
	public function getSimpleItemModels(): ?array {
		return $this->simpleItemModels;
	}
	public function setSimpleItemModels(?array $simpleItemModels) {
		$this->simpleItemModels = $simpleItemModels;
	}
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
            ->withSimpleItemModels(array_map(
                function ($item) {
                    return SimpleItemModel::fromJson($item);
                },
                array_key_exists('simpleItemModels', $data) && $data['simpleItemModels'] !== null ? $data['simpleItemModels'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "inventoryModelId" => $this->getInventoryModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "simpleItemModels" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSimpleItemModels() !== null && $this->getSimpleItemModels() !== null ? $this->getSimpleItemModels() : []
            ),
        );
    }
}