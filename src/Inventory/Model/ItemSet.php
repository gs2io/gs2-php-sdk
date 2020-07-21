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
 * 有効期限ごとのアイテム所持数量
 *
 * @author Game Server Services, Inc.
 *
 */
class ItemSet implements IModel {
	/**
     * @var string 有効期限ごとのアイテム所持数量
	 */
	protected $itemSetId;

	/**
	 * 有効期限ごとのアイテム所持数量を取得
	 *
	 * @return string|null 有効期限ごとのアイテム所持数量
	 */
	public function getItemSetId(): ?string {
		return $this->itemSetId;
	}

	/**
	 * 有効期限ごとのアイテム所持数量を設定
	 *
	 * @param string|null $itemSetId 有効期限ごとのアイテム所持数量
	 */
	public function setItemSetId(?string $itemSetId) {
		$this->itemSetId = $itemSetId;
	}

	/**
	 * 有効期限ごとのアイテム所持数量を設定
	 *
	 * @param string|null $itemSetId 有効期限ごとのアイテム所持数量
	 * @return ItemSet $this
	 */
	public function withItemSetId(?string $itemSetId): ItemSet {
		$this->itemSetId = $itemSetId;
		return $this;
	}
	/**
     * @var string アイテムセットを識別する名前
	 */
	protected $name;

	/**
	 * アイテムセットを識別する名前を取得
	 *
	 * @return string|null アイテムセットを識別する名前
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * アイテムセットを識別する名前を設定
	 *
	 * @param string|null $name アイテムセットを識別する名前
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * アイテムセットを識別する名前を設定
	 *
	 * @param string|null $name アイテムセットを識別する名前
	 * @return ItemSet $this
	 */
	public function withName(?string $name): ItemSet {
		$this->name = $name;
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
	 * @return ItemSet $this
	 */
	public function withInventoryName(?string $inventoryName): ItemSet {
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
	 * @return ItemSet $this
	 */
	public function withUserId(?string $userId): ItemSet {
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
	 * @return ItemSet $this
	 */
	public function withItemName(?string $itemName): ItemSet {
		$this->itemName = $itemName;
		return $this;
	}
	/**
     * @var int 所持数量
	 */
	protected $count;

	/**
	 * 所持数量を取得
	 *
	 * @return int|null 所持数量
	 */
	public function getCount(): ?int {
		return $this->count;
	}

	/**
	 * 所持数量を設定
	 *
	 * @param int|null $count 所持数量
	 */
	public function setCount(?int $count) {
		$this->count = $count;
	}

	/**
	 * 所持数量を設定
	 *
	 * @param int|null $count 所持数量
	 * @return ItemSet $this
	 */
	public function withCount(?int $count): ItemSet {
		$this->count = $count;
		return $this;
	}
	/**
     * @var string[] この所持品の参照元リスト
	 */
	protected $referenceOf;

	/**
	 * この所持品の参照元リストを取得
	 *
	 * @return string[]|null この所持品の参照元リスト
	 */
	public function getReferenceOf(): ?array {
		return $this->referenceOf;
	}

	/**
	 * この所持品の参照元リストを設定
	 *
	 * @param string[]|null $referenceOf この所持品の参照元リスト
	 */
	public function setReferenceOf(?array $referenceOf) {
		$this->referenceOf = $referenceOf;
	}

	/**
	 * この所持品の参照元リストを設定
	 *
	 * @param string[]|null $referenceOf この所持品の参照元リスト
	 * @return ItemSet $this
	 */
	public function withReferenceOf(?array $referenceOf): ItemSet {
		$this->referenceOf = $referenceOf;
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
	 * @return ItemSet $this
	 */
	public function withSortValue(?int $sortValue): ItemSet {
		$this->sortValue = $sortValue;
		return $this;
	}
	/**
     * @var int 有効期限
	 */
	protected $expiresAt;

	/**
	 * 有効期限を取得
	 *
	 * @return int|null 有効期限
	 */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	/**
	 * 有効期限を設定
	 *
	 * @param int|null $expiresAt 有効期限
	 */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	/**
	 * 有効期限を設定
	 *
	 * @param int|null $expiresAt 有効期限
	 * @return ItemSet $this
	 */
	public function withExpiresAt(?int $expiresAt): ItemSet {
		$this->expiresAt = $expiresAt;
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
	 * @return ItemSet $this
	 */
	public function withCreatedAt(?int $createdAt): ItemSet {
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
	 * @return ItemSet $this
	 */
	public function withUpdatedAt(?int $updatedAt): ItemSet {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "itemSetId" => $this->itemSetId,
            "name" => $this->name,
            "inventoryName" => $this->inventoryName,
            "userId" => $this->userId,
            "itemName" => $this->itemName,
            "count" => $this->count,
            "referenceOf" => $this->referenceOf,
            "sortValue" => $this->sortValue,
            "expiresAt" => $this->expiresAt,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): ItemSet {
        $model = new ItemSet();
        $model->setItemSetId(isset($data["itemSetId"]) ? $data["itemSetId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setInventoryName(isset($data["inventoryName"]) ? $data["inventoryName"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setItemName(isset($data["itemName"]) ? $data["itemName"] : null);
        $model->setCount(isset($data["count"]) ? $data["count"] : null);
        $model->setReferenceOf(isset($data["referenceOf"]) ? $data["referenceOf"] : null);
        $model->setSortValue(isset($data["sortValue"]) ? $data["sortValue"] : null);
        $model->setExpiresAt(isset($data["expiresAt"]) ? $data["expiresAt"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}