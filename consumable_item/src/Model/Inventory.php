<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\ConsumableItem\Model;

/**
 * 所持品
 *
 * @author Game Server Services, Inc.
 *
 */
class Inventory {

	/** @var string 所持品ID */
	private $inventoryId;

	/** @var string ユーザID */
	private $userId;

	/** @var string 消費型アイテム名 */
	private $itemName;

	/** @var int 所持数量 */
	private $count;

	/** @var int 最大所持可能数量 */
	private $max;

	/** @var int 有効期限(エポック秒) */
	private $expireAt;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 所持品IDを取得
	 *
	 * @return string 所持品ID
	 */
	public function getInventoryId() {
		return $this->inventoryId;
	}

	/**
	 * 所持品IDを設定
	 *
	 * @param string $inventoryId 所持品ID
	 */
	public function setInventoryId($inventoryId) {
		$this->inventoryId = $inventoryId;
	}

	/**
	 * 所持品IDを設定
	 *
	 * @param string $inventoryId 所持品ID
	 * @return self
	 */
	public function withInventoryId($inventoryId): self {
		$this->setInventoryId($inventoryId);
		return $this;
	}

	/**
	 * ユーザIDを取得
	 *
	 * @return string ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 消費型アイテム名を取得
	 *
	 * @return string 消費型アイテム名
	 */
	public function getItemName() {
		return $this->itemName;
	}

	/**
	 * 消費型アイテム名を設定
	 *
	 * @param string $itemName 消費型アイテム名
	 */
	public function setItemName($itemName) {
		$this->itemName = $itemName;
	}

	/**
	 * 消費型アイテム名を設定
	 *
	 * @param string $itemName 消費型アイテム名
	 * @return self
	 */
	public function withItemName($itemName): self {
		$this->setItemName($itemName);
		return $this;
	}

	/**
	 * 所持数量を取得
	 *
	 * @return int 所持数量
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * 所持数量を設定
	 *
	 * @param int $count 所持数量
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * 所持数量を設定
	 *
	 * @param int $count 所持数量
	 * @return self
	 */
	public function withCount($count): self {
		$this->setCount($count);
		return $this;
	}

	/**
	 * 最大所持可能数量を取得
	 *
	 * @return int 最大所持可能数量
	 */
	public function getMax() {
		return $this->max;
	}

	/**
	 * 最大所持可能数量を設定
	 *
	 * @param int $max 最大所持可能数量
	 */
	public function setMax($max) {
		$this->max = $max;
	}

	/**
	 * 最大所持可能数量を設定
	 *
	 * @param int $max 最大所持可能数量
	 * @return self
	 */
	public function withMax($max): self {
		$this->setMax($max);
		return $this;
	}

	/**
	 * 有効期限(エポック秒)を取得
	 *
	 * @return int 有効期限(エポック秒)
	 */
	public function getExpireAt() {
		return $this->expireAt;
	}

	/**
	 * 有効期限(エポック秒)を設定
	 *
	 * @param int $expireAt 有効期限(エポック秒)
	 */
	public function setExpireAt($expireAt) {
		$this->expireAt = $expireAt;
	}

	/**
	 * 有効期限(エポック秒)を設定
	 *
	 * @param int $expireAt 有効期限(エポック秒)
	 * @return self
	 */
	public function withExpireAt($expireAt): self {
		$this->setExpireAt($expireAt);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Inventory
	 */
    static function build(array $array)
    {
        $item = new Inventory();
        $item->setInventoryId(isset($array['inventoryId']) ? $array['inventoryId'] : null);
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setItemName(isset($array['itemName']) ? $array['itemName'] : null);
        $item->setCount(isset($array['count']) ? $array['count'] : null);
        $item->setMax(isset($array['max']) ? $array['max'] : null);
        $item->setExpireAt(isset($array['expireAt']) ? $array['expireAt'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}