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

namespace Gs2\Stamina\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class ChangeStaminaByStampSheetRequest extends Gs2UserRequest {

    const FUNCTION = "ChangeStaminaByStampSheet";

	/** @var string スタンプシート */
	private $sheet;

	/** @var string スタンプの暗号鍵 */
	private $keyName;

	/** @var int スタミナの最大値 */
	private $maxValue;


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
	 * @return ChangeStaminaByStampSheetRequest
	 */
	public function withSheet($sheet): ChangeStaminaByStampSheetRequest {
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
	 * @return ChangeStaminaByStampSheetRequest
	 */
	public function withKeyName($keyName): ChangeStaminaByStampSheetRequest {
		$this->setKeyName($keyName);
		return $this;
	}

	/**
	 * スタミナの最大値を取得
	 *
	 * @return int スタミナの最大値
	 */
	public function getMaxValue() {
		return $this->maxValue;
	}

	/**
	 * スタミナの最大値を設定
	 *
	 * @param int $maxValue スタミナの最大値
	 */
	public function setMaxValue($maxValue) {
		$this->maxValue = $maxValue;
	}

	/**
	 * スタミナの最大値を設定
	 *
	 * @param int $maxValue スタミナの最大値
	 * @return ChangeStaminaByStampSheetRequest
	 */
	public function withMaxValue($maxValue): ChangeStaminaByStampSheetRequest {
		$this->setMaxValue($maxValue);
		return $this;
	}

}