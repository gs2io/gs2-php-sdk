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
class DescribeEventByUserIdRequest extends Gs2BasicRequest {

    const FUNCTION = "DescribeEventByUserId";

	/** @var string スケジュールの名前を指定します。 */
	private $scheduleName;

	/** @var string ユーザIDを指定します。 */
	private $userId;

	/** @var string[] 取得するイベント名のリスト */
	private $eventNames;


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
	 * @return DescribeEventByUserIdRequest
	 */
	public function withScheduleName($scheduleName): DescribeEventByUserIdRequest {
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
	 * @return DescribeEventByUserIdRequest
	 */
	public function withUserId($userId): DescribeEventByUserIdRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 取得するイベント名のリストを取得
	 *
	 * @return string[] 取得するイベント名のリスト
	 */
	public function getEventNames() {
		return $this->eventNames;
	}

	/**
	 * 取得するイベント名のリストを設定
	 *
	 * @param string[] $eventNames 取得するイベント名のリスト
	 */
	public function setEventNames($eventNames) {
		$this->eventNames = $eventNames;
	}

	/**
	 * 取得するイベント名のリストを設定
	 *
	 * @param string[] $eventNames 取得するイベント名のリスト
	 * @return DescribeEventByUserIdRequest
	 */
	public function withEventNames($eventNames): DescribeEventByUserIdRequest {
		$this->setEventNames($eventNames);
		return $this;
	}

}