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

class GetSimpleItemByUserIdResult implements IResult {
    /** @var SimpleItem */
    private $item;
    /** @var SimpleItemModel */
    private $itemModel;

	public function getItem(): ?SimpleItem {
		return $this->item;
	}

	public function setItem(?SimpleItem $item) {
		$this->item = $item;
	}

	public function withItem(?SimpleItem $item): GetSimpleItemByUserIdResult {
		$this->item = $item;
		return $this;
	}

	public function getItemModel(): ?SimpleItemModel {
		return $this->itemModel;
	}

	public function setItemModel(?SimpleItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	public function withItemModel(?SimpleItemModel $itemModel): GetSimpleItemByUserIdResult {
		$this->itemModel = $itemModel;
		return $this;
	}

    public static function fromJson(?array $data): ?GetSimpleItemByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetSimpleItemByUserIdResult())
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