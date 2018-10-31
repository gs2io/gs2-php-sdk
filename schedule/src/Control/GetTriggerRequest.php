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
class GetTriggerRequest extends Gs2BasicRequest {

    const FUNCTION = "GetTrigger";

	/** @var string スケジュールの名前を指定します。 */
	private $scheduleName;

	/** @var string ユーザIDを指定します。 */
	private $userId;

	/** @var string トリガー名を指定します。 */
	private $triggerName;


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
	 * @return GetTriggerRequest
	 */
	public function withScheduleName($scheduleName): GetTriggerRequest {
		$this->setScheduleName($scheduleName);
		return $this;
	}

	/**
	 * ユーザIDを指定します。を取得
	 *
	 * @return string ユーザIDを指定します。
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを指定します。を設定
	 *
	 * @param string $userId ユーザIDを指定します。
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを指定します。を設定
	 *
	 * @param string $userId ユーザIDを指定します。
	 * @return GetTriggerRequest
	 */
	public function withUserId($userId): GetTriggerRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * トリガー名を指定します。を取得
	 *
	 * @return string トリガー名を指定します。
	 */
	public function getTriggerName() {
		return $this->triggerName;
	}

	/**
	 * トリガー名を指定します。を設定
	 *
	 * @param string $triggerName トリガー名を指定します。
	 */
	public function setTriggerName($triggerName) {
		$this->triggerName = $triggerName;
	}

	/**
	 * トリガー名を指定します。を設定
	 *
	 * @param string $triggerName トリガー名を指定します。
	 * @return GetTriggerRequest
	 */
	public function withTriggerName($triggerName): GetTriggerRequest {
		$this->setTriggerName($triggerName);
		return $this;
	}

}