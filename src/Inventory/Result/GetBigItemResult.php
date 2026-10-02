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
use Gs2\Inventory\Model\BigItem;
use Gs2\Inventory\Model\BigItemModel;

/**
 * Result of getBigItem: Get a Big Item
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#getbigitem
 */
class GetBigItemResult implements IResult {
    /** @var BigItem Big Item */
    private $item;
    /** @var BigItemModel Big Item Model */
    private $itemModel;

    /** @return BigItem|null Big Item */
	public function getItem(): ?BigItem {
		return $this->item;
	}

    /** @param BigItem|null $item Big Item */
	public function setItem(?BigItem $item) {
		$this->item = $item;
	}

    /**
     * @param BigItem|null $item Big Item
     * @return GetBigItemResult
     */
	public function withItem(?BigItem $item): GetBigItemResult {
		$this->item = $item;
		return $this;
	}

    /** @return BigItemModel|null Big Item Model */
	public function getItemModel(): ?BigItemModel {
		return $this->itemModel;
	}

    /** @param BigItemModel|null $itemModel Big Item Model */
	public function setItemModel(?BigItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

    /**
     * @param BigItemModel|null $itemModel Big Item Model
     * @return GetBigItemResult
     */
	public function withItemModel(?BigItemModel $itemModel): GetBigItemResult {
		$this->itemModel = $itemModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBigItemResult {
        if ($data === null) {
            return null;
        }
        return (new GetBigItemResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? BigItem::fromJson($data['item']) : null)
            ->withItemModel(array_key_exists('itemModel', $data) && $data['itemModel'] !== null ? BigItemModel::fromJson($data['itemModel']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "itemModel" => $this->getItemModel() !== null ? $this->getItemModel()->toJson() : null,
        );
    }
}