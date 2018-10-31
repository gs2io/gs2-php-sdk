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

namespace Gs2\Gacha\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class DoGachaByStampSheetRequest extends Gs2UserRequest {

    const FUNCTION = "DoGachaByStampSheet";

	/** @var string スタンプシート */
	private $sheet;

	/** @var string スタンプの暗号鍵 */
	private $keyName;


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
	 * @return DoGachaByStampSheetRequest
	 */
	public function withSheet($sheet): DoGachaByStampSheetRequest {
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
	 * @return DoGachaByStampSheetRequest
	 */
	public function withKeyName($keyName): DoGachaByStampSheetRequest {
		$this->setKeyName($keyName);
		return $this;
	}

}