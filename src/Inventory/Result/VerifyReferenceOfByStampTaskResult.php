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
 * スタンプシートでインベントリのアイテムを検証 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class VerifyReferenceOfByStampTaskResult implements IResult {
	/** @var string[] この所持品の参照元のリスト */
	private $item;
	/** @var ItemSet 有効期限ごとのアイテム所持数量 */
	private $itemSet;
	/** @var ItemModel アイテムモデル */
	private $itemModel;
	/** @var Inventory インベントリ */
	private $inventory;
	/** @var string スタンプタスクの実行結果を記録したコンテキスト */
	private $newContextStack;

	/**
	 * この所持品の参照元のリストを取得
	 *
	 * @return string[]|null スタンプシートでインベントリのアイテムを検証
	 */
	public function getItem(): ?array {
		return $this->item;
	}

	/**
	 * この所持品の参照元のリストを設定
	 *
	 * @param string[]|null $item スタンプシートでインベントリのアイテムを検証
	 */
	public function setItem(?array $item) {
		$this->item = $item;
	}

	/**
	 * 有効期限ごとのアイテム所持数量を取得
	 *
	 * @return ItemSet|null スタンプシートでインベントリのアイテムを検証
	 */
	public function getItemSet(): ?ItemSet {
		return $this->itemSet;
	}

	/**
	 * 有効期限ごとのアイテム所持数量を設定
	 *
	 * @param ItemSet|null $itemSet スタンプシートでインベントリのアイテムを検証
	 */
	public function setItemSet(?ItemSet $itemSet) {
		$this->itemSet = $itemSet;
	}

	/**
	 * アイテムモデルを取得
	 *
	 * @return ItemModel|null スタンプシートでインベントリのアイテムを検証
	 */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

	/**
	 * アイテムモデルを設定
	 *
	 * @param ItemModel|null $itemModel スタンプシートでインベントリのアイテムを検証
	 */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	/**
	 * インベントリを取得
	 *
	 * @return Inventory|null スタンプシートでインベントリのアイテムを検証
	 */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

	/**
	 * インベントリを設定
	 *
	 * @param Inventory|null $inventory スタンプシートでインベントリのアイテムを検証
	 */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを取得
	 *
	 * @return string|null スタンプシートでインベントリのアイテムを検証
	 */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを設定
	 *
	 * @param string|null $newContextStack スタンプシートでインベントリのアイテムを検証
	 */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    public static function fromJson(array $data): VerifyReferenceOfByStampTaskResult {
        $result = new VerifyReferenceOfByStampTaskResult();
        $result->setItem(isset($data["item"]) ? $data["item"] : null);
        $result->setItemSet(isset($data["itemSet"]) ? ItemSet::fromJson($data["itemSet"]) : null);
        $result->setItemModel(isset($data["itemModel"]) ? ItemModel::fromJson($data["itemModel"]) : null);
        $result->setInventory(isset($data["inventory"]) ? Inventory::fromJson($data["inventory"]) : null);
        $result->setNewContextStack(isset($data["newContextStack"]) ? $data["newContextStack"] : null);
        return $result;
    }
}