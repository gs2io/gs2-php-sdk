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
use Gs2\Inventory\Model\SimpleItem;
use Gs2\Inventory\Model\SimpleItemModel;

/**
 * Result of getSimpleItem: Get a Simple Item
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#getsimpleitem
 */
class GetSimpleItemResult implements IResult {
    /** @var SimpleItem Simple Item */
    private $item;
    /** @var SimpleItemModel Simple Item Model */
    private $itemModel;

    /** @return SimpleItem|null Simple Item */
	public function getItem(): ?SimpleItem {
		return $this->item;
	}

    /** @param SimpleItem|null $item Simple Item */
	public function setItem(?SimpleItem $item) {
		$this->item = $item;
	}

    /**
     * @param SimpleItem|null $item Simple Item
     * @return GetSimpleItemResult
     */
	public function withItem(?SimpleItem $item): GetSimpleItemResult {
		$this->item = $item;
		return $this;
	}

    /** @return SimpleItemModel|null Simple Item Model */
	public function getItemModel(): ?SimpleItemModel {
		return $this->itemModel;
	}

    /** @param SimpleItemModel|null $itemModel Simple Item Model */
	public function setItemModel(?SimpleItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

    /**
     * @param SimpleItemModel|null $itemModel Simple Item Model
     * @return GetSimpleItemResult
     */
	public function withItemModel(?SimpleItemModel $itemModel): GetSimpleItemResult {
		$this->itemModel = $itemModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSimpleItemResult {
        if ($data === null) {
            return null;
        }
        return (new GetSimpleItemResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SimpleItem::fromJson($data['item']) : null)
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? SimpleItemModel::fromJson($data['itemModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
        );
    }
}