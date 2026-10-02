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
use Gs2\Grade\Model\Status as GradeStatus;
use Gs2\Inventory\Model\ItemModel;
use Gs2\Inventory\Model\Inventory;

/**
 * Result of acquireItemSetWithGradeByStampSheet: As an Acquire Action, set the grade to GS2-Grade while acquiring one Item Set
 *
 * @see https://docs.gs2.io/api_reference/inventory/stamp_sheet/#gs2inventoryacquireitemsetwithgradebyuserid
 */
class AcquireItemSetWithGradeByStampSheetResult implements IResult {
    /** @var ItemSet Item Set after addition */
    private $item;
    /** @var GradeStatus Grade status set */
    private $status;
    /** @var ItemModel Item Model */
    private $itemModel;
    /** @var Inventory Inventory */
    private $inventory;
    /** @var int Quantity of items transferred to GS2-Inbox that were not received beyond the possession limit */
    private $overflowCount;

    /** @return ItemSet|null Item Set after addition */
	public function getItem(): ?ItemSet {
		return $this->item;
	}

    /** @param ItemSet|null $item Item Set after addition */
	public function setItem(?ItemSet $item) {
		$this->item = $item;
	}

    /**
     * @param ItemSet|null $item Item Set after addition
     * @return AcquireItemSetWithGradeByStampSheetResult
     */
	public function withItem(?ItemSet $item): AcquireItemSetWithGradeByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    /** @return GradeStatus|null Grade status set */
	public function getStatus(): ?GradeStatus {
		return $this->status;
	}

    /** @param GradeStatus|null $status Grade status set */
	public function setStatus(?GradeStatus $status) {
		$this->status = $status;
	}

    /**
     * @param GradeStatus|null $status Grade status set
     * @return AcquireItemSetWithGradeByStampSheetResult
     */
	public function withStatus(?GradeStatus $status): AcquireItemSetWithGradeByStampSheetResult {
		$this->status = $status;
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
     * @return AcquireItemSetWithGradeByStampSheetResult
     */
	public function withItemModel(?ItemModel $itemModel): AcquireItemSetWithGradeByStampSheetResult {
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
     * @return AcquireItemSetWithGradeByStampSheetResult
     */
	public function withInventory(?Inventory $inventory): AcquireItemSetWithGradeByStampSheetResult {
		$this->inventory = $inventory;
		return $this;
	}

    /** @return int|null Quantity of items transferred to GS2-Inbox that were not received beyond the possession limit */
	public function getOverflowCount(): ?int {
		return $this->overflowCount;
	}

    /** @param int|null $overflowCount Quantity of items transferred to GS2-Inbox that were not received beyond the possession limit */
	public function setOverflowCount(?int $overflowCount) {
		$this->overflowCount = $overflowCount;
	}

    /**
     * @param int|null $overflowCount Quantity of items transferred to GS2-Inbox that were not received beyond the possession limit
     * @return AcquireItemSetWithGradeByStampSheetResult
     */
	public function withOverflowCount(?int $overflowCount): AcquireItemSetWithGradeByStampSheetResult {
		$this->overflowCount = $overflowCount;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireItemSetWithGradeByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new AcquireItemSetWithGradeByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? ItemSet::fromJson($data['item']) : null)
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? GradeStatus::fromJson($data['status']) : null)
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? ItemModel::fromJson($data['itemModel']) : null)
            ->withInventory(array_key_exists('inventory', $data) && $data['inventory'] !== null ? Inventory::fromJson($data['inventory']) : null)
            ->withOverflowCount(array_key_exists('overflowCount', $data) && $data['overflowCount'] !== null ? $data['overflowCount'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "status" => $this->getStatus() !== null ? $this->getStatus()->toJson() : null,
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
            "inventory" => $this->getInventory() !== null ? $this->getInventory()->toJson() : null,
            "overflowCount" => $this->getOverflowCount(),
        );
    }
}