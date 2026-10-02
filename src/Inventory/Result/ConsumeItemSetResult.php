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

namespace Gs2\Inventory\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inventory\Model\ItemSet;
use Gs2\Inventory\Model\ItemModel;
use Gs2\Inventory\Model\Inventory;

/**
 * Result of consumeItemSet: Consume Item Sets
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#consumeitemset
 */
class ConsumeItemSetResult implements IResult {
    /** @var array List of Item Sets per post-consumption */
    private $items;
    /** @var ItemModel Item Model */
    private $itemModel;
    /** @var Inventory Inventory */
    private $inventory;

    /** @return array|null List of Item Sets per post-consumption */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Item Sets per post-consumption */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Item Sets per post-consumption
     * @return ConsumeItemSetResult
     */
	public function withItems(?array $items): ConsumeItemSetResult {
		$this->items = $items;
		return $this;
	}

    /** @return ItemModel|null Item Model */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

    /** @param ItemModel|null $itemModel Item Model */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

    /**
     * @param ItemModel|null $itemModel Item Model
     * @return ConsumeItemSetResult
     */
	public function withItemModel(?ItemModel $itemModel): ConsumeItemSetResult {
		$this->itemModel = $itemModel;
		return $this;
	}

    /** @return Inventory|null Inventory */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

    /** @param Inventory|null $inventory Inventory */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

    /**
     * @param Inventory|null $inventory Inventory
     * @return ConsumeItemSetResult
     */
	public function withInventory(?Inventory $inventory): ConsumeItemSetResult {
		$this->inventory = $inventory;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeItemSetResult {
        if ($data === null) {
            return null;
        }
        return (new ConsumeItemSetResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return ItemSet::fromJson($item);
                },
                $data['items']
            ))
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? ItemModel::fromJson($data['itemModel']) : null)
            ->withInventory(array_key_exists('inventory', $data) && $data['inventory'] !== null ? Inventory::fromJson($data['inventory']) : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
            "inventory" => $this->getInventory() !== null ? $this->getInventory()->toJson() : null,
        );
    }
}