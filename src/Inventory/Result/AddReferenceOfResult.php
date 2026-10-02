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
 * Result of addReferenceOf: Add a reference
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#addreferenceof
 */
class AddReferenceOfResult implements IResult {
    /** @var string References for this possession */
    private $item;
    /** @var ItemSet Item Set after addition of reference source */
    private $itemSet;
    /** @var ItemModel Item Model */
    private $itemModel;
    /** @var Inventory Inventory */
    private $inventory;

    /** @return string|null References for this possession */
	public function getItem(): ?string {
		return $this->item;
	}

    /** @param string|null $item References for this possession */
	public function setItem(?string $item) {
		$this->item = $item;
	}

    /**
     * @param string|null $item References for this possession
     * @return AddReferenceOfResult
     */
	public function withItem(?string $item): AddReferenceOfResult {
		$this->item = $item;
		return $this;
	}

    /** @return ItemSet|null Item Set after addition of reference source */
	public function getItemSet(): ?ItemSet {
		return $this->itemSet;
	}

    /** @param ItemSet|null $itemSet Item Set after addition of reference source */
	public function setItemSet(?ItemSet $itemSet) {
		$this->itemSet = $itemSet;
	}

    /**
     * @param ItemSet|null $itemSet Item Set after addition of reference source
     * @return AddReferenceOfResult
     */
	public function withItemSet(?ItemSet $itemSet): AddReferenceOfResult {
		$this->itemSet = $itemSet;
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
     * @return AddReferenceOfResult
     */
	public function withItemModel(?ItemModel $itemModel): AddReferenceOfResult {
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
     * @return AddReferenceOfResult
     */
	public function withInventory(?Inventory $inventory): AddReferenceOfResult {
		$this->inventory = $inventory;
		return $this;
	}

    public static function fromJson(?array $data): ?AddReferenceOfResult {
        if ($data === null) {
            return null;
        }
        return (new AddReferenceOfResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? $data['item'] : null)
            ->withItemSet(array_key_exists('itemSet', $data) && $data['itemSet'] !== null ? ItemSet::fromJson($data['itemSet']) : null)
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? ItemModel::fromJson($data['itemModel']) : null)
            ->withInventory(array_key_exists('inventory', $data) && $data['inventory'] !== null ? Inventory::fromJson($data['inventory']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem(),
            "itemSet" => $this->getItemSet() !== null ? $this->getItemSet()->toJson() : null,
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
            "inventory" => $this->getInventory() !== null ? $this->getInventory()->toJson() : null,
        );
    }
}