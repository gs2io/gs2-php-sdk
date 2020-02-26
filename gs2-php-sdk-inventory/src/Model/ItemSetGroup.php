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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;

/**
 * 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)
 *
 * @author Game Server Services, Inc.
 *
 */
class ItemSetGroup implements IModel {
	/**
     * @var string 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)
	 */
	protected $itemSetGroupId;

	/**
	 * 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)を取得
	 *
	 * @return string|null 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)
	 */
	public function getItemSetGroupId(): ?string {
		return $this->itemSetGroupId;
	}

	/**
	 * 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)を設定
	 *
	 * @param string|null $itemSetGroupId 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)
	 */
	public function setItemSetGroupId(?string $itemSetGroupId) {
		$this->itemSetGroupId = $itemSetGroupId;
	}

	/**
	 * 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)を設定
	 *
	 * @param string|null $itemSetGroupId 有効期限ごとのアイテム所持数量 (このモデルは SDK では使用されません)
	 * @return ItemSetGroup $this
	 */
	public function withItemSetGroupId(?string $itemSetGroupId): ItemSetGroup {
		$this->itemSetGroupId = $itemSetGroupId;
		return $this;
	}
	/**
     * @var string インベントリの名前
	 */
	protected $inventoryName;

	/**
	 * インベントリの名前を取得
	 *
	 * @return string|null インベントリの名前
	 */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}

	/**
	 * インベントリの名前を設定
	 *
	 * @param string|null $inventoryName インベントリの名前
	 */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}

	/**
	 * インベントリの名前を設定
	 *
	 * @param string|null $inventoryName インベントリの名前
	 * @return ItemSetGroup $this
	 */
	public function withInventoryName(?string $inventoryName): ItemSetGroup {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return ItemSetGroup $this
	 */
	public function withUserId(?string $userId): ItemSetGroup {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string アイテムマスターの名前
	 */
	protected $itemName;

	/**
	 * アイテムマスターの名前を取得
	 *
	 * @return string|null アイテムマスターの名前
	 */
	public function getItemName(): ?string {
		return $this->itemName;
	}

	/**
	 * アイテムマスターの名前を設定
	 *
	 * @param string|null $itemName アイテムマスターの名前
	 */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}

	/**
	 * アイテムマスターの名前を設定
	 *
	 * @param string|null $itemName アイテムマスターの名前
	 * @return ItemSetGroup $this
	 */
	public function withItemName(?string $itemName): ItemSetGroup {
		$this->itemName = $itemName;
		return $this;
	}
	/**
     * @var int 表示順番
	 */
	protected $sortValue;

	/**
	 * 表示順番を取得
	 *
	 * @return int|null 表示順番
	 */
	public function getSortValue(): ?int {
		return $this->sortValue;
	}

	/**
	 * 表示順番を設定
	 *
	 * @param int|null $sortValue 表示順番
	 */
	public function setSortValue(?int $sortValue) {
		$this->sortValue = $sortValue;
	}

	/**
	 * 表示順番を設定
	 *
	 * @param int|null $sortValue 表示順番
	 * @return ItemSetGroup $this
	 */
	public function withSortValue(?int $sortValue): ItemSetGroup {
		$this->sortValue = $sortValue;
		return $this;
	}
	/**
     * @var string[] アイテムセットIDのリスト
	 */
	protected $itemSetItemSetIdList;

	/**
	 * アイテムセットIDのリストを取得
	 *
	 * @return string[]|null アイテムセットIDのリスト
	 */
	public function getItemSetItemSetIdList(): ?array {
		return $this->itemSetItemSetIdList;
	}

	/**
	 * アイテムセットIDのリストを設定
	 *
	 * @param string[]|null $itemSetItemSetIdList アイテムセットIDのリスト
	 */
	public function setItemSetItemSetIdList(?array $itemSetItemSetIdList) {
		$this->itemSetItemSetIdList = $itemSetItemSetIdList;
	}

	/**
	 * アイテムセットIDのリストを設定
	 *
	 * @param string[]|null $itemSetItemSetIdList アイテムセットIDのリスト
	 * @return ItemSetGroup $this
	 */
	public function withItemSetItemSetIdList(?array $itemSetItemSetIdList): ItemSetGroup {
		$this->itemSetItemSetIdList = $itemSetItemSetIdList;
		return $this;
	}
	/**
     * @var string[] アイテムセットを識別する名前のリスト
	 */
	protected $itemSetNameList;

	/**
	 * アイテムセットを識別する名前のリストを取得
	 *
	 * @return string[]|null アイテムセットを識別する名前のリスト
	 */
	public function getItemSetNameList(): ?array {
		return $this->itemSetNameList;
	}

	/**
	 * アイテムセットを識別する名前のリストを設定
	 *
	 * @param string[]|null $itemSetNameList アイテムセットを識別する名前のリスト
	 */
	public function setItemSetNameList(?array $itemSetNameList) {
		$this->itemSetNameList = $itemSetNameList;
	}

	/**
	 * アイテムセットを識別する名前のリストを設定
	 *
	 * @param string[]|null $itemSetNameList アイテムセットを識別する名前のリスト
	 * @return ItemSetGroup $this
	 */
	public function withItemSetNameList(?array $itemSetNameList): ItemSetGroup {
		$this->itemSetNameList = $itemSetNameList;
		return $this;
	}
	/**
     * @var int[] 所持数量のリスト
	 */
	protected $itemSetCountList;

	/**
	 * 所持数量のリストを取得
	 *
	 * @return int[]|null 所持数量のリスト
	 */
	public function getItemSetCountList(): ?array {
		return $this->itemSetCountList;
	}

	/**
	 * 所持数量のリストを設定
	 *
	 * @param int[]|null $itemSetCountList 所持数量のリスト
	 */
	public function setItemSetCountList(?array $itemSetCountList) {
		$this->itemSetCountList = $itemSetCountList;
	}

	/**
	 * 所持数量のリストを設定
	 *
	 * @param int[]|null $itemSetCountList 所持数量のリスト
	 * @return ItemSetGroup $this
	 */
	public function withItemSetCountList(?array $itemSetCountList): ItemSetGroup {
		$this->itemSetCountList = $itemSetCountList;
		return $this;
	}
	/**
     * @var int[] 有効期限のリスト
	 */
	protected $itemSetExpiresAtList;

	/**
	 * 有効期限のリストを取得
	 *
	 * @return int[]|null 有効期限のリスト
	 */
	public function getItemSetExpiresAtList(): ?array {
		return $this->itemSetExpiresAtList;
	}

	/**
	 * 有効期限のリストを設定
	 *
	 * @param int[]|null $itemSetExpiresAtList 有効期限のリスト
	 */
	public function setItemSetExpiresAtList(?array $itemSetExpiresAtList) {
		$this->itemSetExpiresAtList = $itemSetExpiresAtList;
	}

	/**
	 * 有効期限のリストを設定
	 *
	 * @param int[]|null $itemSetExpiresAtList 有効期限のリスト
	 * @return ItemSetGroup $this
	 */
	public function withItemSetExpiresAtList(?array $itemSetExpiresAtList): ItemSetGroup {
		$this->itemSetExpiresAtList = $itemSetExpiresAtList;
		return $this;
	}
	/**
     * @var int[] 作成日時のリスト
	 */
	protected $itemSetCreatedAtList;

	/**
	 * 作成日時のリストを取得
	 *
	 * @return int[]|null 作成日時のリスト
	 */
	public function getItemSetCreatedAtList(): ?array {
		return $this->itemSetCreatedAtList;
	}

	/**
	 * 作成日時のリストを設定
	 *
	 * @param int[]|null $itemSetCreatedAtList 作成日時のリスト
	 */
	public function setItemSetCreatedAtList(?array $itemSetCreatedAtList) {
		$this->itemSetCreatedAtList = $itemSetCreatedAtList;
	}

	/**
	 * 作成日時のリストを設定
	 *
	 * @param int[]|null $itemSetCreatedAtList 作成日時のリスト
	 * @return ItemSetGroup $this
	 */
	public function withItemSetCreatedAtList(?array $itemSetCreatedAtList): ItemSetGroup {
		$this->itemSetCreatedAtList = $itemSetCreatedAtList;
		return $this;
	}
	/**
     * @var int[] 更新日時のリスト
	 */
	protected $itemSetUpdatedAtList;

	/**
	 * 更新日時のリストを取得
	 *
	 * @return int[]|null 更新日時のリスト
	 */
	public function getItemSetUpdatedAtList(): ?array {
		return $this->itemSetUpdatedAtList;
	}

	/**
	 * 更新日時のリストを設定
	 *
	 * @param int[]|null $itemSetUpdatedAtList 更新日時のリスト
	 */
	public function setItemSetUpdatedAtList(?array $itemSetUpdatedAtList) {
		$this->itemSetUpdatedAtList = $itemSetUpdatedAtList;
	}

	/**
	 * 更新日時のリストを設定
	 *
	 * @param int[]|null $itemSetUpdatedAtList 更新日時のリスト
	 * @return ItemSetGroup $this
	 */
	public function withItemSetUpdatedAtList(?array $itemSetUpdatedAtList): ItemSetGroup {
		$this->itemSetUpdatedAtList = $itemSetUpdatedAtList;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return ItemSetGroup $this
	 */
	public function withCreatedAt(?int $createdAt): ItemSetGroup {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return ItemSetGroup $this
	 */
	public function withUpdatedAt(?int $updatedAt): ItemSetGroup {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "itemSetGroupId" => $this->itemSetGroupId,
            "inventoryName" => $this->inventoryName,
            "userId" => $this->userId,
            "itemName" => $this->itemName,
            "sortValue" => $this->sortValue,
            "itemSetItemSetIdList" => $this->itemSetItemSetIdList,
            "itemSetNameList" => $this->itemSetNameList,
            "itemSetCountList" => $this->itemSetCountList,
            "itemSetExpiresAtList" => $this->itemSetExpiresAtList,
            "itemSetCreatedAtList" => $this->itemSetCreatedAtList,
            "itemSetUpdatedAtList" => $this->itemSetUpdatedAtList,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): ItemSetGroup {
        $model = new ItemSetGroup();
        $model->setItemSetGroupId(isset($data["itemSetGroupId"]) ? $data["itemSetGroupId"] : null);
        $model->setInventoryName(isset($data["inventoryName"]) ? $data["inventoryName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setItemName(isset($data["itemName"]) ? $data["itemName"] : null);
        $model->setSortValue(isset($data["sortValue"]) ? $data["sortValue"] : null);
        $model->setItemSetItemSetIdList(isset($data["itemSetItemSetIdList"]) ? $data["itemSetItemSetIdList"] : null);
        $model->setItemSetNameList(isset($data["itemSetNameList"]) ? $data["itemSetNameList"] : null);
        $model->setItemSetCountList(isset($data["itemSetCountList"]) ? $data["itemSetCountList"] : null);
        $model->setItemSetExpiresAtList(isset($data["itemSetExpiresAtList"]) ? $data["itemSetExpiresAtList"] : null);
        $model->setItemSetCreatedAtList(isset($data["itemSetCreatedAtList"]) ? $data["itemSetCreatedAtList"] : null);
        $model->setItemSetUpdatedAtList(isset($data["itemSetUpdatedAtList"]) ? $data["itemSetUpdatedAtList"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}