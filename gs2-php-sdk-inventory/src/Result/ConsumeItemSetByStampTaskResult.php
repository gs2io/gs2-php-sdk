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
 * スタンプシートでインベントリのアイテムを消費 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ConsumeItemSetByStampTaskResult implements IResult {
	/** @var ItemSet[] 消費後の有効期限ごとのアイテム所持数量のリスト */
	private $items;
	/** @var ItemModel アイテムモデル */
	private $itemModel;
	/** @var Inventory インベントリ */
	private $inventory;
	/** @var string スタンプタスクの実行結果を記録したコンテキスト */
	private $newContextStack;

	/**
	 * 消費後の有効期限ごとのアイテム所持数量のリストを取得
	 *
	 * @return ItemSet[]|null スタンプシートでインベントリのアイテムを消費
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 消費後の有効期限ごとのアイテム所持数量のリストを設定
	 *
	 * @param ItemSet[]|null $items スタンプシートでインベントリのアイテムを消費
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * アイテムモデルを取得
	 *
	 * @return ItemModel|null スタンプシートでインベントリのアイテムを消費
	 */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

	/**
	 * アイテムモデルを設定
	 *
	 * @param ItemModel|null $itemModel スタンプシートでインベントリのアイテムを消費
	 */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	/**
	 * インベントリを取得
	 *
	 * @return Inventory|null スタンプシートでインベントリのアイテムを消費
	 */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

	/**
	 * インベントリを設定
	 *
	 * @param Inventory|null $inventory スタンプシートでインベントリのアイテムを消費
	 */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを取得
	 *
	 * @return string|null スタンプシートでインベントリのアイテムを消費
	 */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

	/**
	 * スタンプタスクの実行結果を記録したコンテキストを設定
	 *
	 * @param string|null $newContextStack スタンプシートでインベントリのアイテムを消費
	 */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    public static function fromJson(array $data): ConsumeItemSetByStampTaskResult {
        $result = new ConsumeItemSetByStampTaskResult();
        $result->setItems(array_map(
                function ($v) {
                    return ItemSet::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setItemModel(isset($data["itemModel"]) ? ItemModel::fromJson($data["itemModel"]) : null);
        $result->setInventory(isset($data["inventory"]) ? Inventory::fromJson($data["inventory"]) : null);
        $result->setNewContextStack(isset($data["newContextStack"]) ? $data["newContextStack"] : null);
        return $result;
    }
}