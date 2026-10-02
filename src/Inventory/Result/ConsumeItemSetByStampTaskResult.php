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
 * Result of consumeItemSetByStampTask: As a Consume Action, execute the consumption of the Item Set
 *
 * @see https://docs.gs2.io/api_reference/inventory/stamp_sheet/#gs2inventoryconsumeitemsetbyuserid
 */
class ConsumeItemSetByStampTaskResult implements IResult {
    /** @var array List of Item Set per post-consumption */
    private $items;
    /** @var ItemModel Item Model */
    private $itemModel;
    /** @var Inventory Inventory */
    private $inventory;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return array|null List of Item Set per post-consumption */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Item Set per post-consumption */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Item Set per post-consumption
     * @return ConsumeItemSetByStampTaskResult
     */
	public function withItems(?array $items): ConsumeItemSetByStampTaskResult {
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
     * @return ConsumeItemSetByStampTaskResult
     */
	public function withItemModel(?ItemModel $itemModel): ConsumeItemSetByStampTaskResult {
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
     * @return ConsumeItemSetByStampTaskResult
     */
	public function withInventory(?Inventory $inventory): ConsumeItemSetByStampTaskResult {
		$this->inventory = $inventory;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return ConsumeItemSetByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): ConsumeItemSetByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeItemSetByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new ConsumeItemSetByStampTaskResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return ItemSet::fromJson($item);
                },
                $data['items']
            ))
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? ItemModel::fromJson($data['itemModel']) : null)
            ->withInventory(array_key_exists('inventory', $data) && $data['inventory'] !== null ? Inventory::fromJson($data['inventory']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
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
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}