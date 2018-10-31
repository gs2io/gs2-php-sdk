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

namespace Gs2\Chat\Model;

/**
 * ロビー
 *
 * @author Game Server Services, Inc.
 *
 */
class Lobby {

	/** @var string ロビーGRN */
	private $lobbyId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ゲーム名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string 通知方式 */
	private $notificationType;

	/** @var string http/https を選択した際の通知先URL */
	private $notificationUrl;

	/** @var string gs2-in-game-push-notification を選択した際の GS2-InGamePushNotification のゲーム名 */
	private $notificationGameName;

	/** @var bool ログを記録するか */
	private $logging;

	/** @var int ログを記録する日数 */
	private $loggingDate;

	/** @var string ルーム作成時 に実行されるGS2-Script */
	private $createRoomTriggerScript;

	/** @var string ルーム作成完了時 に実行されるGS2-Script */
	private $createRoomDoneTriggerScript;

	/** @var string ルーム削除時 に実行されるGS2-Script */
	private $deleteRoomTriggerScript;

	/** @var string ルーム削除完了時 に実行されるGS2-Script */
	private $deleteRoomDoneTriggerScript;

	/** @var string ルーム購読時 に実行されるGS2-Script */
	private $createSubscribeTriggerScript;

	/** @var string ルーム購読完了時 に実行されるGS2-Script */
	private $createSubscribeDoneTriggerScript;

	/** @var string ルーム購読解除時 に実行されるGS2-Script */
	private $deleteSubscribeTriggerScript;

	/** @var string ルーム購読解除完了時 に実行されるGS2-Script */
	private $deleteSubscribeDoneTriggerScript;

	/** @var string メッセージ送信時 に実行されるGS2-Script */
	private $sendMessageTriggerScript;

	/** @var string メッセージ送信完了時 に実行されるGS2-Script */
	private $sendMessageDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ロビーGRNを取得
	 *
	 * @return string ロビーGRN
	 */
	public function getLobbyId() {
		return $this->lobbyId;
	}

	/**
	 * ロビーGRNを設定
	 *
	 * @param string $lobbyId ロビーGRN
	 */
	public function setLobbyId($lobbyId) {
		$this->lobbyId = $lobbyId;
	}

	/**
	 * ロビーGRNを設定
	 *
	 * @param string $lobbyId ロビーGRN
	 * @return self
	 */
	public function withLobbyId($lobbyId): self {
		$this->setLobbyId($lobbyId);
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
	 * ゲーム名を取得
	 *
	 * @return string ゲーム名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ゲーム名を設定
	 *
	 * @param string $name ゲーム名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ゲーム名を設定
	 *
	 * @param string $name ゲーム名
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
	 * サービスクラスを取得
	 *
	 * @return string サービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 * @return self
	 */
	public function withServiceClass($serviceClass): self {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * 通知方式を取得
	 *
	 * @return string 通知方式
	 */
	public function getNotificationType() {
		return $this->notificationType;
	}

	/**
	 * 通知方式を設定
	 *
	 * @param string $notificationType 通知方式
	 */
	public function setNotificationType($notificationType) {
		$this->notificationType = $notificationType;
	}

	/**
	 * 通知方式を設定
	 *
	 * @param string $notificationType 通知方式
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
	 * ログを記録するかを取得
	 *
	 * @return bool ログを記録するか
	 */
	public function getLogging() {
		return $this->logging;
	}

	/**
	 * ログを記録するかを設定
	 *
	 * @param bool $logging ログを記録するか
	 */
	public function setLogging($logging) {
		$this->logging = $logging;
	}

	/**
	 * ログを記録するかを設定
	 *
	 * @param bool $logging ログを記録するか
	 * @return self
	 */
	public function withLogging($logging): self {
		$this->setLogging($logging);
		return $this;
	}

	/**
	 * ログを記録する日数を取得
	 *
	 * @return int ログを記録する日数
	 */
	public function getLoggingDate() {
		return $this->loggingDate;
	}

	/**
	 * ログを記録する日数を設定
	 *
	 * @param int $loggingDate ログを記録する日数
	 */
	public function setLoggingDate($loggingDate) {
		$this->loggingDate = $loggingDate;
	}

	/**
	 * ログを記録する日数を設定
	 *
	 * @param int $loggingDate ログを記録する日数
	 * @return self
	 */
	public function withLoggingDate($loggingDate): self {
		$this->setLoggingDate($loggingDate);
		return $this;
	}

	/**
	 * ルーム作成時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム作成時 に実行されるGS2-Script
	 */
	public function getCreateRoomTriggerScript() {
		return $this->createRoomTriggerScript;
	}

	/**
	 * ルーム作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createRoomTriggerScript ルーム作成時 に実行されるGS2-Script
	 */
	public function setCreateRoomTriggerScript($createRoomTriggerScript) {
		$this->createRoomTriggerScript = $createRoomTriggerScript;
	}

	/**
	 * ルーム作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createRoomTriggerScript ルーム作成時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateRoomTriggerScript($createRoomTriggerScript): self {
		$this->setCreateRoomTriggerScript($createRoomTriggerScript);
		return $this;
	}

	/**
	 * ルーム作成完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム作成完了時 に実行されるGS2-Script
	 */
	public function getCreateRoomDoneTriggerScript() {
		return $this->createRoomDoneTriggerScript;
	}

	/**
	 * ルーム作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createRoomDoneTriggerScript ルーム作成完了時 に実行されるGS2-Script
	 */
	public function setCreateRoomDoneTriggerScript($createRoomDoneTriggerScript) {
		$this->createRoomDoneTriggerScript = $createRoomDoneTriggerScript;
	}

	/**
	 * ルーム作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createRoomDoneTriggerScript ルーム作成完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateRoomDoneTriggerScript($createRoomDoneTriggerScript): self {
		$this->setCreateRoomDoneTriggerScript($createRoomDoneTriggerScript);
		return $this;
	}

	/**
	 * ルーム削除時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム削除時 に実行されるGS2-Script
	 */
	public function getDeleteRoomTriggerScript() {
		return $this->deleteRoomTriggerScript;
	}

	/**
	 * ルーム削除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteRoomTriggerScript ルーム削除時 に実行されるGS2-Script
	 */
	public function setDeleteRoomTriggerScript($deleteRoomTriggerScript) {
		$this->deleteRoomTriggerScript = $deleteRoomTriggerScript;
	}

	/**
	 * ルーム削除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteRoomTriggerScript ルーム削除時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDeleteRoomTriggerScript($deleteRoomTriggerScript): self {
		$this->setDeleteRoomTriggerScript($deleteRoomTriggerScript);
		return $this;
	}

	/**
	 * ルーム削除完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム削除完了時 に実行されるGS2-Script
	 */
	public function getDeleteRoomDoneTriggerScript() {
		return $this->deleteRoomDoneTriggerScript;
	}

	/**
	 * ルーム削除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteRoomDoneTriggerScript ルーム削除完了時 に実行されるGS2-Script
	 */
	public function setDeleteRoomDoneTriggerScript($deleteRoomDoneTriggerScript) {
		$this->deleteRoomDoneTriggerScript = $deleteRoomDoneTriggerScript;
	}

	/**
	 * ルーム削除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteRoomDoneTriggerScript ルーム削除完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDeleteRoomDoneTriggerScript($deleteRoomDoneTriggerScript): self {
		$this->setDeleteRoomDoneTriggerScript($deleteRoomDoneTriggerScript);
		return $this;
	}

	/**
	 * ルーム購読時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム購読時 に実行されるGS2-Script
	 */
	public function getCreateSubscribeTriggerScript() {
		return $this->createSubscribeTriggerScript;
	}

	/**
	 * ルーム購読時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createSubscribeTriggerScript ルーム購読時 に実行されるGS2-Script
	 */
	public function setCreateSubscribeTriggerScript($createSubscribeTriggerScript) {
		$this->createSubscribeTriggerScript = $createSubscribeTriggerScript;
	}

	/**
	 * ルーム購読時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createSubscribeTriggerScript ルーム購読時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateSubscribeTriggerScript($createSubscribeTriggerScript): self {
		$this->setCreateSubscribeTriggerScript($createSubscribeTriggerScript);
		return $this;
	}

	/**
	 * ルーム購読完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム購読完了時 に実行されるGS2-Script
	 */
	public function getCreateSubscribeDoneTriggerScript() {
		return $this->createSubscribeDoneTriggerScript;
	}

	/**
	 * ルーム購読完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createSubscribeDoneTriggerScript ルーム購読完了時 に実行されるGS2-Script
	 */
	public function setCreateSubscribeDoneTriggerScript($createSubscribeDoneTriggerScript) {
		$this->createSubscribeDoneTriggerScript = $createSubscribeDoneTriggerScript;
	}

	/**
	 * ルーム購読完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createSubscribeDoneTriggerScript ルーム購読完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateSubscribeDoneTriggerScript($createSubscribeDoneTriggerScript): self {
		$this->setCreateSubscribeDoneTriggerScript($createSubscribeDoneTriggerScript);
		return $this;
	}

	/**
	 * ルーム購読解除時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム購読解除時 に実行されるGS2-Script
	 */
	public function getDeleteSubscribeTriggerScript() {
		return $this->deleteSubscribeTriggerScript;
	}

	/**
	 * ルーム購読解除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteSubscribeTriggerScript ルーム購読解除時 に実行されるGS2-Script
	 */
	public function setDeleteSubscribeTriggerScript($deleteSubscribeTriggerScript) {
		$this->deleteSubscribeTriggerScript = $deleteSubscribeTriggerScript;
	}

	/**
	 * ルーム購読解除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteSubscribeTriggerScript ルーム購読解除時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDeleteSubscribeTriggerScript($deleteSubscribeTriggerScript): self {
		$this->setDeleteSubscribeTriggerScript($deleteSubscribeTriggerScript);
		return $this;
	}

	/**
	 * ルーム購読解除完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ルーム購読解除完了時 に実行されるGS2-Script
	 */
	public function getDeleteSubscribeDoneTriggerScript() {
		return $this->deleteSubscribeDoneTriggerScript;
	}

	/**
	 * ルーム購読解除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteSubscribeDoneTriggerScript ルーム購読解除完了時 に実行されるGS2-Script
	 */
	public function setDeleteSubscribeDoneTriggerScript($deleteSubscribeDoneTriggerScript) {
		$this->deleteSubscribeDoneTriggerScript = $deleteSubscribeDoneTriggerScript;
	}

	/**
	 * ルーム購読解除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteSubscribeDoneTriggerScript ルーム購読解除完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDeleteSubscribeDoneTriggerScript($deleteSubscribeDoneTriggerScript): self {
		$this->setDeleteSubscribeDoneTriggerScript($deleteSubscribeDoneTriggerScript);
		return $this;
	}

	/**
	 * メッセージ送信時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ送信時 に実行されるGS2-Script
	 */
	public function getSendMessageTriggerScript() {
		return $this->sendMessageTriggerScript;
	}

	/**
	 * メッセージ送信時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $sendMessageTriggerScript メッセージ送信時 に実行されるGS2-Script
	 */
	public function setSendMessageTriggerScript($sendMessageTriggerScript) {
		$this->sendMessageTriggerScript = $sendMessageTriggerScript;
	}

	/**
	 * メッセージ送信時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $sendMessageTriggerScript メッセージ送信時 に実行されるGS2-Script
	 * @return self
	 */
	public function withSendMessageTriggerScript($sendMessageTriggerScript): self {
		$this->setSendMessageTriggerScript($sendMessageTriggerScript);
		return $this;
	}

	/**
	 * メッセージ送信完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string メッセージ送信完了時 に実行されるGS2-Script
	 */
	public function getSendMessageDoneTriggerScript() {
		return $this->sendMessageDoneTriggerScript;
	}

	/**
	 * メッセージ送信完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $sendMessageDoneTriggerScript メッセージ送信完了時 に実行されるGS2-Script
	 */
	public function setSendMessageDoneTriggerScript($sendMessageDoneTriggerScript) {
		$this->sendMessageDoneTriggerScript = $sendMessageDoneTriggerScript;
	}

	/**
	 * メッセージ送信完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $sendMessageDoneTriggerScript メッセージ送信完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withSendMessageDoneTriggerScript($sendMessageDoneTriggerScript): self {
		$this->setSendMessageDoneTriggerScript($sendMessageDoneTriggerScript);
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
	 * @return Lobby
	 */
    static function build(array $array)
    {
        $item = new Lobby();
        $item->setLobbyId(isset($array['lobbyId']) ? $array['lobbyId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setNotificationType(isset($array['notificationType']) ? $array['notificationType'] : null);
        $item->setNotificationUrl(isset($array['notificationUrl']) ? $array['notificationUrl'] : null);
        $item->setNotificationGameName(isset($array['notificationGameName']) ? $array['notificationGameName'] : null);
        $item->setLogging(isset($array['logging']) ? $array['logging'] : null);
        $item->setLoggingDate(isset($array['loggingDate']) ? $array['loggingDate'] : null);
        $item->setCreateRoomTriggerScript(isset($array['createRoomTriggerScript']) ? $array['createRoomTriggerScript'] : null);
        $item->setCreateRoomDoneTriggerScript(isset($array['createRoomDoneTriggerScript']) ? $array['createRoomDoneTriggerScript'] : null);
        $item->setDeleteRoomTriggerScript(isset($array['deleteRoomTriggerScript']) ? $array['deleteRoomTriggerScript'] : null);
        $item->setDeleteRoomDoneTriggerScript(isset($array['deleteRoomDoneTriggerScript']) ? $array['deleteRoomDoneTriggerScript'] : null);
        $item->setCreateSubscribeTriggerScript(isset($array['createSubscribeTriggerScript']) ? $array['createSubscribeTriggerScript'] : null);
        $item->setCreateSubscribeDoneTriggerScript(isset($array['createSubscribeDoneTriggerScript']) ? $array['createSubscribeDoneTriggerScript'] : null);
        $item->setDeleteSubscribeTriggerScript(isset($array['deleteSubscribeTriggerScript']) ? $array['deleteSubscribeTriggerScript'] : null);
        $item->setDeleteSubscribeDoneTriggerScript(isset($array['deleteSubscribeDoneTriggerScript']) ? $array['deleteSubscribeDoneTriggerScript'] : null);
        $item->setSendMessageTriggerScript(isset($array['sendMessageTriggerScript']) ? $array['sendMessageTriggerScript'] : null);
        $item->setSendMessageDoneTriggerScript(isset($array['sendMessageDoneTriggerScript']) ? $array['sendMessageDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}