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
 * Result of verifyReferenceOfByStampTask: Execute verification of reference source as verify action
 *
 * @see https://docs.gs2.io/api_reference/inventory/stamp_sheet/#gs2inventoryverifyreferenceofbyuserid
 */
class VerifyReferenceOfByStampTaskResult implements IResult {
    /** @var string References for this possession */
    private $item;
    /** @var ItemSet Item Set */
    private $itemSet;
    /** @var ItemModel Item Model */
    private $itemModel;
    /** @var Inventory Inventory */
    private $inventory;
    /** @var string Context recording the execution results of verification actions */
    private $newContextStack;

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
     * @return VerifyReferenceOfByStampTaskResult
     */
	public function withItem(?string $item): VerifyReferenceOfByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return ItemSet|null Item Set */
	public function getItemSet(): ?ItemSet {
		return $this->itemSet;
	}

    /** @param ItemSet|null $itemSet Item Set */
	public function setItemSet(?ItemSet $itemSet) {
		$this->itemSet = $itemSet;
	}

    /**
     * @param ItemSet|null $itemSet Item Set
     * @return VerifyReferenceOfByStampTaskResult
     */
	public function withItemSet(?ItemSet $itemSet): VerifyReferenceOfByStampTaskResult {
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
     * @return VerifyReferenceOfByStampTaskResult
     */
	public function withItemModel(?ItemModel $itemModel): VerifyReferenceOfByStampTaskResult {
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
     * @return VerifyReferenceOfByStampTaskResult
     */
	public function withInventory(?Inventory $inventory): VerifyReferenceOfByStampTaskResult {
		$this->inventory = $inventory;
		return $this;
	}

    /** @return string|null Context recording the execution results of verification actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of verification actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of verification actions
     * @return VerifyReferenceOfByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): VerifyReferenceOfByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyReferenceOfByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new VerifyReferenceOfByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? $data['item'] : null)
            ->withItemSet(array_key_exists('itemSet', $data) && $data['itemSet'] !== null ? ItemSet::fromJson($data['itemSet']) : null)
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? ItemModel::fromJson($data['itemModel']) : null)
            ->withInventory(array_key_exists('inventory', $data) && $data['inventory'] !== null ? Inventory::fromJson($data['inventory']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem(),
            "itemSet" => $this->getItemSet() !== null ? $this->getItemSet()->toJson() : null,
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
            "inventory" => $this->getInventory() !== null ? $this->getInventory()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}