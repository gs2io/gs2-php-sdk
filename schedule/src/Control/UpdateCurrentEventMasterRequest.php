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

namespace Gs2\Schedule\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateCurrentEventMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateCurrentEventMaster";

	/** @var string スケジュールの名前を指定します。 */
	private $scheduleName;

	/** @var string イベントマスターデータ */
	private $settings;


	/**
	 * スケジュールの名前を指定します。を取得
	 *
	 * @return string スケジュールの名前を指定します。
	 */
	public function getScheduleName() {
		return $this->scheduleName;
	}

	/**
	 * スケジュールの名前を指定します。を設定
	 *
	 * @param string $scheduleName スケジュールの名前を指定します。
	 */
	public function setScheduleName($scheduleName) {
		$this->scheduleName = $scheduleName;
	}

	/**
	 * スケジュールの名前を指定します。を設定
	 *
	 * @param string $scheduleName スケジュールの名前を指定します。
	 * @return UpdateCurrentEventMasterRequest
	 */
	public function withScheduleName($scheduleName): UpdateCurrentEventMasterRequest {
		$this->setScheduleName($scheduleName);
		return $this;
	}

	/**
	 * イベントマスターデータを取得
	 *
	 * @return string イベントマスターデータ
	 */
	public function getSettings() {
		return $this->settings;
	}

	/**
	 * イベントマスターデータを設定
	 *
	 * @param string $settings イベントマスターデータ
	 */
	public function setSettings($settings) {
		$this->settings = $settings;
	}

	/**
	 * イベントマスターデータを設定
	 *
	 * @param string $settings イベントマスターデータ
	 * @return UpdateCurrentEventMasterRequest
	 */
	public function withSettings($settings): UpdateCurrentEventMasterRequest {
		$this->setSettings($settings);
		return $this;
	}

}