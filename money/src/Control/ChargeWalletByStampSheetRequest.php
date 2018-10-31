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
class ChargeWalletByStampSheetRequest extends Gs2UserRequest {

    const FUNCTION = "ChargeWalletByStampSheet";

	/** @var int 取得するウォレットのスロット番号 */
	private $slot;

	/** @var string スタンプシート */
	private $sheet;

	/** @var string スタンプの暗号鍵 */
	private $keyName;


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
	 * @return ChargeWalletByStampSheetRequest
	 */
	public function withSlot($slot): ChargeWalletByStampSheetRequest {
		$this->setSlot($slot);
		return $this;
	}

	/**
	 * スタンプシートを取得
	 *
	 * @return string スタンプシート
	 */
	public function getSheet() {
		return $this->sheet;
	}

	/**
	 * スタンプシートを設定
	 *
	 * @param string $sheet スタンプシート
	 */
	public function setSheet($sheet) {
		$this->sheet = $sheet;
	}

	/**
	 * スタンプシートを設定
	 *
	 * @param string $sheet スタンプシート
	 * @return ChargeWalletByStampSheetRequest
	 */
	public function withSheet($sheet): ChargeWalletByStampSheetRequest {
		$this->setSheet($sheet);
		return $this;
	}

	/**
	 * スタンプの暗号鍵を取得
	 *
	 * @return string スタンプの暗号鍵
	 */
	public function getKeyName() {
		return $this->keyName;
	}

	/**
	 * スタンプの暗号鍵を設定
	 *
	 * @param string $keyName スタンプの暗号鍵
	 */
	public function setKeyName($keyName) {
		$this->keyName = $keyName;
	}

	/**
	 * スタンプの暗号鍵を設定
	 *
	 * @param string $keyName スタンプの暗号鍵
	 * @return ChargeWalletByStampSheetRequest
	 */
	public function withKeyName($keyName): ChargeWalletByStampSheetRequest {
		$this->setKeyName($keyName);
		return $this;
	}

}