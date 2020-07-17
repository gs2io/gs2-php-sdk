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
 * 有効期限ごとのアイテム所持数量を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetItemWithSignatureByUserIdResult implements IResult {
	/** @var ItemSet[] 有効期限毎の{model_name} */
	private $items;
	/** @var ItemModel アイテムモデル */
	private $itemModel;
	/** @var Inventory インベントリ */
	private $inventory;
	/** @var string 署名対象のアイテムセット情報 */
	private $body;
	/** @var string 署名 */
	private $signature;

	/**
	 * 有効期限毎の{model_name}を取得
	 *
	 * @return ItemSet[]|null 有効期限ごとのアイテム所持数量を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 有効期限毎の{model_name}を設定
	 *
	 * @param ItemSet[]|null $items 有効期限ごとのアイテム所持数量を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

	/**
	 * アイテムモデルを取得
	 *
	 * @return ItemModel|null 有効期限ごとのアイテム所持数量を取得
	 */
	public function getItemModel(): ?ItemModel {
		return $this->itemModel;
	}

	/**
	 * アイテムモデルを設定
	 *
	 * @param ItemModel|null $itemModel 有効期限ごとのアイテム所持数量を取得
	 */
	public function setItemModel(?ItemModel $itemModel) {
		$this->itemModel = $itemModel;
	}

	/**
	 * インベントリを取得
	 *
	 * @return Inventory|null 有効期限ごとのアイテム所持数量を取得
	 */
	public function getInventory(): ?Inventory {
		return $this->inventory;
	}

	/**
	 * インベントリを設定
	 *
	 * @param Inventory|null $inventory 有効期限ごとのアイテム所持数量を取得
	 */
	public function setInventory(?Inventory $inventory) {
		$this->inventory = $inventory;
	}

	/**
	 * 署名対象のアイテムセット情報を取得
	 *
	 * @return string|null 有効期限ごとのアイテム所持数量を取得
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * 署名対象のアイテムセット情報を設定
	 *
	 * @param string|null $body 有効期限ごとのアイテム所持数量を取得
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * 署名を取得
	 *
	 * @return string|null 有効期限ごとのアイテム所持数量を取得
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 署名を設定
	 *
	 * @param string|null $signature 有効期限ごとのアイテム所持数量を取得
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    public static function fromJson(array $data): GetItemWithSignatureByUserIdResult {
        $result = new GetItemWithSignatureByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return ItemSet::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        $result->setItemModel(isset($data["itemModel"]) ? ItemModel::fromJson($data["itemModel"]) : null);
        $result->setInventory(isset($data["inventory"]) ? Inventory::fromJson($data["inventory"]) : null);
        $result->setBody(isset($data["body"]) ? $data["body"] : null);
        $result->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $result;
    }
}