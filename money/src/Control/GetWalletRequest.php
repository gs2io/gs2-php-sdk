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
class GetWalletRequest extends Gs2UserRequest {

    const FUNCTION = "GetWallet";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var int ウォレットのスロット番号 */
	private $slot;


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
	 * @return GetWalletRequest
	 */
	public function withMoneyName($moneyName): GetWalletRequest {
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
	 * @return GetWalletRequest
	 */
	public function withSlot($slot): GetWalletRequest {
		$this->setSlot($slot);
		return $this;
	}

}