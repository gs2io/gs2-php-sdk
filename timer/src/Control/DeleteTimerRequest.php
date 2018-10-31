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

namespace Gs2\Timer\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DeleteTimerRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteTimer";

	/** @var string タイマープールの名前を指定します。 */
	private $timerPoolName;

	/** @var string タイマーIDを指定します。 */
	private $timerId;


	/**
	 * タイマープールの名前を指定します。を取得
	 *
	 * @return string タイマープールの名前を指定します。
	 */
	public function getTimerPoolName() {
		return $this->timerPoolName;
	}

	/**
	 * タイマープールの名前を指定します。を設定
	 *
	 * @param string $timerPoolName タイマープールの名前を指定します。
	 */
	public function setTimerPoolName($timerPoolName) {
		$this->timerPoolName = $timerPoolName;
	}

	/**
	 * タイマープールの名前を指定します。を設定
	 *
	 * @param string $timerPoolName タイマープールの名前を指定します。
	 * @return DeleteTimerRequest
	 */
	public function withTimerPoolName($timerPoolName): DeleteTimerRequest {
		$this->setTimerPoolName($timerPoolName);
		return $this;
	}

	/**
	 * タイマーIDを指定します。を取得
	 *
	 * @return string タイマーIDを指定します。
	 */
	public function getTimerId() {
		return $this->timerId;
	}

	/**
	 * タイマーIDを指定します。を設定
	 *
	 * @param string $timerId タイマーIDを指定します。
	 */
	public function setTimerId($timerId) {
		$this->timerId = $timerId;
	}

	/**
	 * タイマーIDを指定します。を設定
	 *
	 * @param string $timerId タイマーIDを指定します。
	 * @return DeleteTimerRequest
	 */
	public function withTimerId($timerId): DeleteTimerRequest {
		$this->setTimerId($timerId);
		return $this;
	}

}