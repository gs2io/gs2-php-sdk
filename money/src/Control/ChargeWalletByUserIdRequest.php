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

namespace Gs2\Money\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class ChargeWalletByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "ChargeWalletByUserId";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var int ウォレットのスロット番号 */
	private $slot;

	/** @var string ウォレットのユーザID */
	private $userId;

	/** @var double 支払金額 */
	private $price;

	/** @var int 課金通貨付与量 */
	private $count;

	/** @var string トランザクションID */
	private $transactionId;


	/**
	 * 課金通貨の名前を取得
	 *
	 * @return string 課金通貨の名前
	 */
	public function getMoneyName() {
		return $this->moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 */
	public function setMoneyName($moneyName) {
		$this->moneyName = $moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 * @return ChargeWalletByUserIdRequest
	 */
	public function withMoneyName($moneyName): ChargeWalletByUserIdRequest {
		$this->setMoneyName($moneyName);
		return $this;
	}

	/**
	 * ウォレットのスロット番号を取得
	 *
	 * @return int ウォレットのスロット番号
	 */
	public function getSlot() {
		return $this->slot;
	}

	/**
	 * ウォレットのスロット番号を設定
	 *
	 * @param int $slot ウォレットのスロット番号
	 */
	public function setSlot($slot) {
		$this->slot = $slot;
	}

	/**
	 * ウォレットのスロット番号を設定
	 *
	 * @param int $slot ウォレットのスロット番号
	 * @return ChargeWalletByUserIdRequest
	 */
	public function withSlot($slot): ChargeWalletByUserIdRequest {
		$this->setSlot($slot);
		return $this;
	}

	/**
	 * ウォレットのユーザIDを取得
	 *
	 * @return string ウォレットのユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ウォレットのユーザIDを設定
	 *
	 * @param string $userId ウォレットのユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ウォレットのユーザIDを設定
	 *
	 * @param string $userId ウォレットのユーザID
	 * @return ChargeWalletByUserIdRequest
	 */
	public function withUserId($userId): ChargeWalletByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 支払金額を取得
	 *
	 * @return double 支払金額
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * 支払金額を設定
	 *
	 * @param double $price 支払金額
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * 支払金額を設定
	 *
	 * @param double $price 支払金額
	 * @return ChargeWalletByUserIdRequest
	 */
	public function withPrice($price): ChargeWalletByUserIdRequest {
		$this->setPrice($price);
		return $this;
	}

	/**
	 * 課金通貨付与量を取得
	 *
	 * @return int 課金通貨付与量
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * 課金通貨付与量を設定
	 *
	 * @param int $count 課金通貨付与量
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * 課金通貨付与量を設定
	 *
	 * @param int $count 課金通貨付与量
	 * @return ChargeWalletByUserIdRequest
	 */
	public function withCount($count): ChargeWalletByUserIdRequest {
		$this->setCount($count);
		return $this;
	}

	/**
	 * トランザクションIDを取得
	 *
	 * @return string トランザクションID
	 */
	public function getTransactionId() {
		return $this->transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string $transactionId トランザクションID
	 */
	public function setTransactionId($transactionId) {
		$this->transactionId = $transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string $transactionId トランザクションID
	 * @return ChargeWalletByUserIdRequest
	 */
	public function withTransactionId($transactionId): ChargeWalletByUserIdRequest {
		$this->setTransactionId($transactionId);
		return $this;
	}

}