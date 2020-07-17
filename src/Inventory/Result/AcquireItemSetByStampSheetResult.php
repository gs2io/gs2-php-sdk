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
use Gs2\Inventory\Model\ItemModel;
use Gs2\Inventory\Model\Inventory;
use Gs2\Inventory\Model\ItemSet;

/**
 * スタンプシートでアイテムをインベントリに追加 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AcquireItemSetByStampSheetResult implements IResult {
	/** @var ItemSet[] 加算後の有効期限ごとのアイテム所持数量のリスト */
	private $items;
	/** @var ItemModel アイテムモデル */
	private $itemModel;
	/** @var Inventory インベントリ */
	private $inventory;
	/** @var int 所持数量の上限を超えて受け取れずに GS2-Inbox に転送したアイテムの数量 */
	private $overflowCount;

	/**
	 * 加算後の有効期限ごとのアイテム所持数量のリストを取得
	 *
	 * @return ItemSet[]|null スタンプシートでアイテムをインベントリに追加
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 加算後の有効期限ごとのアイテム所持数量のリストを設定
	 *
	 * @param ItemSet[]|null $items スタンプシートでアイテムをインベントリに追加
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * アイテムモデルを取得
	 *
	 * @return ItemModel|null スタンプシートでアイテムをインベントリに追加
	 */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

	/**
	 * アイテムモデルを設定
	 *
	 * @param ItemModel|null $itemModel スタンプシートでアイテムをインベントリに追加
	 */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	/**
	 * インベントリを取得
	 *
	 * @return Inventory|null スタンプシートでアイテムをインベントリに追加
	 */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

	/**
	 * インベントリを設定
	 *
	 * @param Inventory|null $inventory スタンプシートでアイテムをインベントリに追加
	 */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

	/**
	 * 所持数量の上限を超えて受け取れずに GS2-Inbox に転送したアイテムの数量を取得
	 *
	 * @return int|null スタンプシートでアイテムをインベントリに追加
	 */
	public function getOverflowCount(): ?int {
		return $this->overflowCount;
	}

	/**
	 * 所持数量の上限を超えて受け取れずに GS2-Inbox に転送したアイテムの数量を設定
	 *
	 * @param int|null $overflowCount スタンプシートでアイテムをインベントリに追加
	 */
	public function setOverflowCount(?int $overflowCount) {
		$this->overflowCount = $overflowCount;
	}

    public static function fromJson(array $data): AcquireItemSetByStampSheetResult {
        $result = new AcquireItemSetByStampSheetResult();
        $result->setItems(array_map(
                function ($v) {
                    return ItemSet::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setItemModel(isset($data["itemModel"]) ? ItemModel::fromJson($data["itemModel"]) : null);
        $result->setInventory(isset($data["inventory"]) ? Inventory::fromJson($data["inventory"]) : null);
        $result->setOverflowCount(isset($data["overflowCount"]) ? $data["overflowCount"] : null);
        return $result;
    }
}