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
class DeleteEventMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteEventMaster";

	/** @var string スケジュールの名前を指定します。 */
	private $scheduleName;

	/** @var string イベント名を指定します。 */
	private $eventName;


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
	 * @return DeleteEventMasterRequest
	 */
	public function withScheduleName($scheduleName): DeleteEventMasterRequest {
		$this->setScheduleName($scheduleName);
		return $this;
	}

	/**
	 * イベント名を指定します。を取得
	 *
	 * @return string イベント名を指定します。
	 */
	public function getEventName() {
		return $this->eventName;
	}

	/**
	 * イベント名を指定します。を設定
	 *
	 * @param string $eventName イベント名を指定します。
	 */
	public function setEventName($eventName) {
		$this->eventName = $eventName;
	}

	/**
	 * イベント名を指定します。を設定
	 *
	 * @param string $eventName イベント名を指定します。
	 * @return DeleteEventMasterRequest
	 */
	public function withEventName($eventName): DeleteEventMasterRequest {
		$this->setEventName($eventName);
		return $this;
	}

}