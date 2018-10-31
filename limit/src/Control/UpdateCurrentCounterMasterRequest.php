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

namespace Gs2\Limit\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateCurrentCounterMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateCurrentCounterMaster";

	/** @var string 回数制限の名前を指定します。 */
	private $limitName;

	/** @var string カウンターマスターデータ */
	private $settings;


	/**
	 * 回数制限の名前を指定します。を取得
	 *
	 * @return string 回数制限の名前を指定します。
	 */
	public function getLimitName() {
		return $this->limitName;
	}

	/**
	 * 回数制限の名前を指定します。を設定
	 *
	 * @param string $limitName 回数制限の名前を指定します。
	 */
	public function setLimitName($limitName) {
		$this->limitName = $limitName;
	}

	/**
	 * 回数制限の名前を指定します。を設定
	 *
	 * @param string $limitName 回数制限の名前を指定します。
	 * @return UpdateCurrentCounterMasterRequest
	 */
	public function withLimitName($limitName): UpdateCurrentCounterMasterRequest {
		$this->setLimitName($limitName);
		return $this;
	}

	/**
	 * カウンターマスターデータを取得
	 *
	 * @return string カウンターマスターデータ
	 */
	public function getSettings() {
		return $this->settings;
	}

	/**
	 * カウンターマスターデータを設定
	 *
	 * @param string $settings カウンターマスターデータ
	 */
	public function setSettings($settings) {
		$this->settings = $settings;
	}

	/**
	 * カウンターマスターデータを設定
	 *
	 * @param string $settings カウンターマスターデータ
	 * @return UpdateCurrentCounterMasterRequest
	 */
	public function withSettings($settings): UpdateCurrentCounterMasterRequest {
		$this->setSettings($settings);
		return $this;
	}

}