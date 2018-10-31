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
class CreateNotificationRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateNotification";

	/** @var string 通知の名前 */
	private $name;

	/** @var string 通知の説明 */
	private $description;


	/**
	 * 通知の名前を取得
	 *
	 * @return string 通知の名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 通知の名前を設定
	 *
	 * @param string $name 通知の名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 通知の名前を設定
	 *
	 * @param string $name 通知の名前
	 * @return CreateNotificationRequest
	 */
	public function withName($name): CreateNotificationRequest {
		$this->setName($name);
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
	 * @return CreateNotificationRequest
	 */
	public function withDescription($description): CreateNotificationRequest {
		$this->setDescription($description);
		return $this;
	}

}