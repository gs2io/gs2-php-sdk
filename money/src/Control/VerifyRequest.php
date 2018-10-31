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
class VerifyRequest extends Gs2UserRequest {

    const FUNCTION = "Verify";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var int スロット番号 */
	private $slot;

	/** @var string レシートデータ */
	private $receipt;


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
	 * @return VerifyRequest
	 */
	public function withMoneyName($moneyName): VerifyRequest {
		$this->setMoneyName($moneyName);
		return $this;
	}

	/**
	 * スロット番号を取得
	 *
	 * @return int スロット番号
	 */
	public function getSlot() {
		return $this->slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 */
	public function setSlot($slot) {
		$this->slot = $slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 * @return VerifyRequest
	 */
	public function withSlot($slot): VerifyRequest {
		$this->setSlot($slot);
		return $this;
	}

	/**
	 * レシートデータを取得
	 *
	 * @return string レシートデータ
	 */
	public function getReceipt() {
		return $this->receipt;
	}

	/**
	 * レシートデータを設定
	 *
	 * @param string $receipt レシートデータ
	 */
	public function setReceipt($receipt) {
		$this->receipt = $receipt;
	}

	/**
	 * レシートデータを設定
	 *
	 * @param string $receipt レシートデータ
	 * @return VerifyRequest
	 */
	public function withReceipt($receipt): VerifyRequest {
		$this->setReceipt($receipt);
		return $this;
	}

}