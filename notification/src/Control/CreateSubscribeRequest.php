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

namespace Gs2\Notification\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateSubscribeRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateSubscribe";

	/** @var string 通知の名前を指定します。 */
	private $notificationName;

	/** @var string 通知に利用する方式 */
	private $type;

	/** @var string 通知先 */
	private $endpoint;


	/**
	 * 通知の名前を指定します。を取得
	 *
	 * @return string 通知の名前を指定します。
	 */
	public function getNotificationName() {
		return $this->notificationName;
	}

	/**
	 * 通知の名前を指定します。を設定
	 *
	 * @param string $notificationName 通知の名前を指定します。
	 */
	public function setNotificationName($notificationName) {
		$this->notificationName = $notificationName;
	}

	/**
	 * 通知の名前を指定します。を設定
	 *
	 * @param string $notificationName 通知の名前を指定します。
	 * @return CreateSubscribeRequest
	 */
	public function withNotificationName($notificationName): CreateSubscribeRequest {
		$this->setNotificationName($notificationName);
		return $this;
	}

	/**
	 * 通知に利用する方式を取得
	 *
	 * @return string 通知に利用する方式
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * 通知に利用する方式を設定
	 *
	 * @param string $type 通知に利用する方式
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * 通知に利用する方式を設定
	 *
	 * @param string $type 通知に利用する方式
	 * @return CreateSubscribeRequest
	 */
	public function withType($type): CreateSubscribeRequest {
		$this->setType($type);
		return $this;
	}

	/**
	 * 通知先を取得
	 *
	 * @return string 通知先
	 */
	public function getEndpoint() {
		return $this->endpoint;
	}

	/**
	 * 通知先を設定
	 *
	 * @param string $endpoint 通知先
	 */
	public function setEndpoint($endpoint) {
		$this->endpoint = $endpoint;
	}

	/**
	 * 通知先を設定
	 *
	 * @param string $endpoint 通知先
	 * @return CreateSubscribeRequest
	 */
	public function withEndpoint($endpoint): CreateSubscribeRequest {
		$this->setEndpoint($endpoint);
		return $this;
	}

}