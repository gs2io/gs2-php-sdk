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
class GetWalletByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "GetWalletByUserId";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var int ウォレットのスロット番号 */
	private $slot;

	/** @var string ユーザID */
	private $userId;


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
	 * @return GetWalletByUserIdRequest
	 */
	public function withMoneyName($moneyName): GetWalletByUserIdRequest {
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
	 * @return GetWalletByUserIdRequest
	 */
	public function withSlot($slot): GetWalletByUserIdRequest {
		$this->setSlot($slot);
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
	 * @return GetWalletByUserIdRequest
	 */
	public function withUserId($userId): GetWalletByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

}