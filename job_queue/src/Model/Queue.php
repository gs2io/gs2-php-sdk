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

namespace Gs2\JobQueue\Model;

/**
 * キュー
 *
 * @author Game Server Services, Inc.
 *
 */
class Queue {

	/** @var string キューGRN */
	private $queueId;

	/** @var string オーナーID */
	private $ownerId;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * キューGRNを取得
	 *
	 * @return string キューGRN
	 */
	public function getQueueId() {
		return $this->queueId;
	}

	/**
	 * キューGRNを設定
	 *
	 * @param string $queueId キューGRN
	 */
	public function setQueueId($queueId) {
		$this->queueId = $queueId;
	}

	/**
	 * キューGRNを設定
	 *
	 * @param string $queueId キューGRN
	 * @return self
	 */
	public function withQueueId($queueId): self {
		$this->setQueueId($queueId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

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
	 * @return self
	 */
	public function withName($name): self {
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
	 * @return self
	 */
	public function withDescription($description): self {
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
	 * @return self
	 */
	public function withNotificationType($notificationType): self {
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
	 * @return self
	 */
	public function withNotificationUrl($notificationUrl): self {
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
	 * @return self
	 */
	public function withNotificationGameName($notificationGameName): self {
		$this->setNotificationGameName($notificationGameName);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Queue
	 */
    static function build(array $array)
    {
        $item = new Queue();
        $item->setQueueId(isset($array['queueId']) ? $array['queueId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setNotificationType(isset($array['notificationType']) ? $array['notificationType'] : null);
        $item->setNotificationUrl(isset($array['notificationUrl']) ? $array['notificationUrl'] : null);
        $item->setNotificationGameName(isset($array['notificationGameName']) ? $array['notificationGameName'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}