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
class UpdateNotificationRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateNotification";

	/** @var string 通知の名前を指定します。 */
	private $notificationName;

	/** @var string 通知の説明 */
	private $description;


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
	 * @return UpdateNotificationRequest
	 */
	public function withNotificationName($notificationName): UpdateNotificationRequest {
		$this->setNotificationName($notificationName);
		return $this;
	}

	/**
	 * 通知の説明を取得
	 *
	 * @return string 通知の説明
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 通知の説明を設定
	 *
	 * @param string $description 通知の説明
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 通知の説明を設定
	 *
	 * @param string $description 通知の説明
	 * @return UpdateNotificationRequest
	 */
	public function withDescription($description): UpdateNotificationRequest {
		$this->setDescription($description);
		return $this;
	}

}