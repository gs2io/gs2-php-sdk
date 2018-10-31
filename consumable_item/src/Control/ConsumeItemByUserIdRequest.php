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

namespace Gs2\ConsumableItem\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class ConsumeItemByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "ConsumeItemByUserId";

	/** @var string 消費型アイテムプールの名前 */
	private $itemPoolName;

	/** @var string 消費型アイテムの名前 */
	private $itemName;

	/** @var string ユーザID */
	private $userId;

	/** @var int 消費数量 */
	private $count;

	/** @var int 有効期限(エポック秒) */
	private $expireAt;


	/**
	 * 消費型アイテムプールの名前を取得
	 *
	 * @return string 消費型アイテムプールの名前
	 */
	public function getItemPoolName() {
		return $this->itemPoolName;
	}

	/**
	 * 消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 消費型アイテムプールの名前
	 */
	public function setItemPoolName($itemPoolName) {
		$this->itemPoolName = $itemPoolName;
	}

	/**
	 * 消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 消費型アイテムプールの名前
	 * @return ConsumeItemByUserIdRequest
	 */
	public function withItemPoolName($itemPoolName): ConsumeItemByUserIdRequest {
		$this->setItemPoolName($itemPoolName);
		return $this;
	}

	/**
	 * 消費型アイテムの名前を取得
	 *
	 * @return string 消費型アイテムの名前
	 */
	public function getItemName() {
		return $this->itemName;
	}

	/**
	 * 消費型アイテムの名前を設定
	 *
	 * @param string $itemName 消費型アイテムの名前
	 */
	public function setItemName($itemName) {
		$this->itemName = $itemName;
	}

	/**
	 * 消費型アイテムの名前を設定
	 *
	 * @param string $itemName 消費型アイテムの名前
	 * @return ConsumeItemByUserIdRequest
	 */
	public function withItemName($itemName): ConsumeItemByUserIdRequest {
		$this->setItemName($itemName);
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
	 * @return ConsumeItemByUserIdRequest
	 */
	public function withUserId($userId): ConsumeItemByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 消費数量を取得
	 *
	 * @return int 消費数量
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * 消費数量を設定
	 *
	 * @param int $count 消費数量
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * 消費数量を設定
	 *
	 * @param int $count 消費数量
	 * @return ConsumeItemByUserIdRequest
	 */
	public function withCount($count): ConsumeItemByUserIdRequest {
		$this->setCount($count);
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
	 * @return ConsumeItemByUserIdRequest
	 */
	public function withExpireAt($expireAt): ConsumeItemByUserIdRequest {
		$this->setExpireAt($expireAt);
		return $this;
	}

}