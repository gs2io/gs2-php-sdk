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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class ConsumeWalletRequest extends Gs2UserRequest {

    const FUNCTION = "ConsumeWallet";

	/** @var string 取得する課金通貨の名前 */
	private $moneyName;

	/** @var int 取得するウォレットのスロット番号 */
	private $slot;

	/** @var int 課金通貨消費量 */
	private $count;

	/** @var int 用途ID */
	private $use;

	/** @var bool 有償課金通貨のみ消費対象としたい場合に true を指定します */
	private $paidOnly;


	/**
	 * 取得する課金通貨の名前を取得
	 *
	 * @return string 取得する課金通貨の名前
	 */
	public function getMoneyName() {
		return $this->moneyName;
	}

	/**
	 * 取得する課金通貨の名前を設定
	 *
	 * @param string $moneyName 取得する課金通貨の名前
	 */
	public function setMoneyName($moneyName) {
		$this->moneyName = $moneyName;
	}

	/**
	 * 取得する課金通貨の名前を設定
	 *
	 * @param string $moneyName 取得する課金通貨の名前
	 * @return ConsumeWalletRequest
	 */
	public function withMoneyName($moneyName): ConsumeWalletRequest {
		$this->setMoneyName($moneyName);
		return $this;
	}

	/**
	 * 取得するウォレットのスロット番号を取得
	 *
	 * @return int 取得するウォレットのスロット番号
	 */
	public function getSlot() {
		return $this->slot;
	}

	/**
	 * 取得するウォレットのスロット番号を設定
	 *
	 * @param int $slot 取得するウォレットのスロット番号
	 */
	public function setSlot($slot) {
		$this->slot = $slot;
	}

	/**
	 * 取得するウォレットのスロット番号を設定
	 *
	 * @param int $slot 取得するウォレットのスロット番号
	 * @return ConsumeWalletRequest
	 */
	public function withSlot($slot): ConsumeWalletRequest {
		$this->setSlot($slot);
		return $this;
	}

	/**
	 * 課金通貨消費量を取得
	 *
	 * @return int 課金通貨消費量
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * 課金通貨消費量を設定
	 *
	 * @param int $count 課金通貨消費量
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * 課金通貨消費量を設定
	 *
	 * @param int $count 課金通貨消費量
	 * @return ConsumeWalletRequest
	 */
	public function withCount($count): ConsumeWalletRequest {
		$this->setCount($count);
		return $this;
	}

	/**
	 * 用途IDを取得
	 *
	 * @return int 用途ID
	 */
	public function getUse() {
		return $this->use;
	}

	/**
	 * 用途IDを設定
	 *
	 * @param int $use 用途ID
	 */
	public function setUse($use) {
		$this->use = $use;
	}

	/**
	 * 用途IDを設定
	 *
	 * @param int $use 用途ID
	 * @return ConsumeWalletRequest
	 */
	public function withUse($use): ConsumeWalletRequest {
		$this->setUse($use);
		return $this;
	}

	/**
	 * 有償課金通貨のみ消費対象としたい場合に true を指定しますを取得
	 *
	 * @return bool 有償課金通貨のみ消費対象としたい場合に true を指定します
	 */
	public function getPaidOnly() {
		return $this->paidOnly;
	}

	/**
	 * 有償課金通貨のみ消費対象としたい場合に true を指定しますを設定
	 *
	 * @param bool $paidOnly 有償課金通貨のみ消費対象としたい場合に true を指定します
	 */
	public function setPaidOnly($paidOnly) {
		$this->paidOnly = $paidOnly;
	}

	/**
	 * 有償課金通貨のみ消費対象としたい場合に true を指定しますを設定
	 *
	 * @param bool $paidOnly 有償課金通貨のみ消費対象としたい場合に true を指定します
	 * @return ConsumeWalletRequest
	 */
	public function withPaidOnly($paidOnly): ConsumeWalletRequest {
		$this->setPaidOnly($paidOnly);
		return $this;
	}

}