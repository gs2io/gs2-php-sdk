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
 * 有効期限ごとのアイテム所持数量を削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteItemSetByUserIdResult implements IResult {
	/** @var ItemSet[] 削除した有効期限ごとのアイテム所持数量のリスト */
	private $items;
	/** @var ItemModel アイテムモデル */
	private $itemModel;
	/** @var Inventory インベントリ */
	private $inventory;

	/**
	 * 削除した有効期限ごとのアイテム所持数量のリストを取得
	 *
	 * @return ItemSet[]|null 有効期限ごとのアイテム所持数量を削除
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 削除した有効期限ごとのアイテム所持数量のリストを設定
	 *
	 * @param ItemSet[]|null $items 有効期限ごとのアイテム所持数量を削除
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * アイテムモデルを取得
	 *
	 * @return ItemModel|null 有効期限ごとのアイテム所持数量を削除
	 */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

	/**
	 * アイテムモデルを設定
	 *
	 * @param ItemModel|null $itemModel 有効期限ごとのアイテム所持数量を削除
	 */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	/**
	 * インベントリを取得
	 *
	 * @return Inventory|null 有効期限ごとのアイテム所持数量を削除
	 */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

	/**
	 * インベントリを設定
	 *
	 * @param Inventory|null $inventory 有効期限ごとのアイテム所持数量を削除
	 */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

    public static function fromJson(array $data): DeleteItemSetByUserIdResult {
        $result = new DeleteItemSetByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return ItemSet::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setItemModel(isset($data["itemModel"]) ? ItemModel::fromJson($data["itemModel"]) : null);
        $result->setInventory(isset($data["inventory"]) ? Inventory::fromJson($data["inventory"]) : null);
        return $result;
    }
}