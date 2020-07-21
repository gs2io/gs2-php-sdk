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
 * 参照元に関する検証 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class VerifyReferenceOfByUserIdResult implements IResult {
	/** @var string[] この所持品の参照元リスト */
	private $item;
	/** @var ItemSet 有効期限ごとのアイテム所持数量 */
	private $itemSet;
	/** @var ItemModel アイテムモデル */
	private $itemModel;
	/** @var Inventory インベントリ */
	private $inventory;

	/**
	 * この所持品の参照元リストを取得
	 *
	 * @return string[]|null 参照元に関する検証
	 */
	public function getItem(): ?array {
		return $this->item;
	}

	/**
	 * この所持品の参照元リストを設定
	 *
	 * @param string[]|null $item 参照元に関する検証
	 */
	public function setItem(?array $item) {
		$this->item = $item;
	}

	/**
	 * 有効期限ごとのアイテム所持数量を取得
	 *
	 * @return ItemSet|null 参照元に関する検証
	 */
	public function getItemSet(): ?ItemSet {
		return $this->itemSet;
	}

	/**
	 * 有効期限ごとのアイテム所持数量を設定
	 *
	 * @param ItemSet|null $itemSet 参照元に関する検証
	 */
	public function setItemSet(?ItemSet $itemSet) {
		$this->itemSet = $itemSet;
	}

	/**
	 * アイテムモデルを取得
	 *
	 * @return ItemModel|null 参照元に関する検証
	 */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

	/**
	 * アイテムモデルを設定
	 *
	 * @param ItemModel|null $itemModel 参照元に関する検証
	 */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	/**
	 * インベントリを取得
	 *
	 * @return Inventory|null 参照元に関する検証
	 */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

	/**
	 * インベントリを設定
	 *
	 * @param Inventory|null $inventory 参照元に関する検証
	 */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

    public static function fromJson(array $data): VerifyReferenceOfByUserIdResult {
        $result = new VerifyReferenceOfByUserIdResult();
        $result->setItem(isset($data["item"]) ? $data["item"] : null);
        $result->setItemSet(isset($data["itemSet"]) ? ItemSet::fromJson($data["itemSet"]) : null);
        $result->setItemModel(isset($data["itemModel"]) ? ItemModel::fromJson($data["itemModel"]) : null);
        $result->setInventory(isset($data["inventory"]) ? Inventory::fromJson($data["inventory"]) : null);
        return $result;
    }
}