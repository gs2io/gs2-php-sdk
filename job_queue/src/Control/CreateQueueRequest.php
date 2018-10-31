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

namespace Gs2\JobQueue\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateQueueRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateQueue";

	/** @var string 名前 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string ジョブが追加されたときの通知方式 */
	private $notificationType;

	/** @var string http/https を選択した際の通知先URL */
	private $notificationUrl;

	/** @var string gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名 */
	private $notificationGameName;


	/**
	 * 名前を取得
	 *
	 * @return string 名前
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string $name 名前
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 名前を設定
	 *
	 * @param string $name 名前
	 * @return CreateQueueRequest
	 */
	public function withName($name): CreateQueueRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return CreateQueueRequest
	 */
	public function withDescription($description): CreateQueueRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * ジョブが追加されたときの通知方式を取得
	 *
	 * @return string ジョブが追加されたときの通知方式
	 */
	public function getNotificationType() {
		return $this->notificationType;
	}

	/**
	 * ジョブが追加されたときの通知方式を設定
	 *
	 * @param string $notificationType ジョブが追加されたときの通知方式
	 */
	public function setNotificationType($notificationType) {
		$this->notificationType = $notificationType;
	}

	/**
	 * ジョブが追加されたときの通知方式を設定
	 *
	 * @param string $notificationType ジョブが追加されたときの通知方式
	 * @return CreateQueueRequest
	 */
	public function withNotificationType($notificationType): CreateQueueRequest {
		$this->setNotificationType($notificationType);
		return $this;
	}

	/**
	 * http/https を選択した際の通知先URLを取得
	 *
	 * @return string http/https を選択した際の通知先URL
	 */
	public function getNotificationUrl() {
		return $this->notificationUrl;
	}

	/**
	 * http/https を選択した際の通知先URLを設定
	 *
	 * @param string $notificationUrl http/https を選択した際の通知先URL
	 */
	public function setNotificationUrl($notificationUrl) {
		$this->notificationUrl = $notificationUrl;
	}

	/**
	 * http/https を選択した際の通知先URLを設定
	 *
	 * @param string $notificationUrl http/https を選択した際の通知先URL
	 * @return CreateQueueRequest
	 */
	public function withNotificationUrl($notificationUrl): CreateQueueRequest {
		$this->setNotificationUrl($notificationUrl);
		return $this;
	}

	/**
	 * gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名を取得
	 *
	 * @return string gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名
	 */
	public function getNotificationGameName() {
		return $this->notificationGameName;
	}

	/**
	 * gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名を設定
	 *
	 * @param string $notificationGameName gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名
	 */
	public function setNotificationGameName($notificationGameName) {
		$this->notificationGameName = $notificationGameName;
	}

	/**
	 * gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名を設定
	 *
	 * @param string $notificationGameName gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名
	 * @return CreateQueueRequest
	 */
	public function withNotificationGameName($notificationGameName): CreateQueueRequest {
		$this->setNotificationGameName($notificationGameName);
		return $this;
	}

}