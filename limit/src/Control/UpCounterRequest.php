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
class UpCounterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpCounter";

	/** @var string 回数制限の名前を指定します。 */
	private $limitName;

	/** @var string ユーザIDを指定します。 */
	private $userId;

	/** @var string カウンターの名前を指定します。 */
	private $counterName;


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
	 * @return UpCounterRequest
	 */
	public function withLimitName($limitName): UpCounterRequest {
		$this->setLimitName($limitName);
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
	 * @return UpCounterRequest
	 */
	public function withUserId($userId): UpCounterRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * カウンターの名前を指定します。を取得
	 *
	 * @return string カウンターの名前を指定します。
	 */
	public function getCounterName() {
		return $this->counterName;
	}

	/**
	 * カウンターの名前を指定します。を設定
	 *
	 * @param string $counterName カウンターの名前を指定します。
	 */
	public function setCounterName($counterName) {
		$this->counterName = $counterName;
	}

	/**
	 * カウンターの名前を指定します。を設定
	 *
	 * @param string $counterName カウンターの名前を指定します。
	 * @return UpCounterRequest
	 */
	public function withCounterName($counterName): UpCounterRequest {
		$this->setCounterName($counterName);
		return $this;
	}

}