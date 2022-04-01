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

class DeleteItemSetByUserIdResult implements IResult {
    /** @var array */
    private $items;
    /** @var ItemModel */
    private $itemModel;
    /** @var Inventory */
    private $inventory;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): DeleteItemSetByUserIdResult {
		$this->items = $items;
		return $this;
	}

	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	public function withItemModel(?ItemModel $itemModel): DeleteItemSetByUserIdResult {
		$this->itemModel = $itemModel;
		return $this;
	}

	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

	public function withInventory(?Inventory $inventory): DeleteItemSetByUserIdResult {
		$this->inventory = $inventory;
		return $this;
	}

    public static function fromJson(?array $data): ?DeleteItemSetByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new DeleteItemSetByUserIdResult())
            ->withItems(array_map(
                function ($item) {
                    return ItemSet::fromJson($item);
                },
                array_key_exists('items', $data) && $data['items'] !== null ? $data['items'] : []
            ))
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? ItemModel::fromJson($data['itemModel']) : null)
            ->withInventory(array_key_exists('inventory', $data) && $data['inventory'] !== null ? Inventory::fromJson($data['inventory']) : null);
    }

    public function toJson(): array {
        return array(
            "items" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems() !== null && $this->getItems() !== null ? $this->getItems() : []
            ),
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
            "inventory" => $this->getInventory() !== null ? $this->getInventory()->toJson() : null,
        );
    }
}