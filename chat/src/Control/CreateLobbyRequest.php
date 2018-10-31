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

namespace Gs2\Chat\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateLobbyRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateLobby";

	/** @var string ロビー名 */
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


	/**
	 * ロビー名を取得
	 *
	 * @return string ロビー名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ロビー名を設定
	 *
	 * @param string $name ロビー名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ロビー名を設定
	 *
	 * @param string $name ロビー名
	 * @return CreateLobbyRequest
	 */
	public function withName($name): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withDescription($description): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withServiceClass($serviceClass): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withNotificationType($notificationType): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withNotificationUrl($notificationUrl): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withNotificationGameName($notificationGameName): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withLogging($logging): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withLoggingDate($loggingDate): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withCreateRoomTriggerScript($createRoomTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withCreateRoomDoneTriggerScript($createRoomDoneTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withDeleteRoomTriggerScript($deleteRoomTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withDeleteRoomDoneTriggerScript($deleteRoomDoneTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withCreateSubscribeTriggerScript($createSubscribeTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withCreateSubscribeDoneTriggerScript($createSubscribeDoneTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withDeleteSubscribeTriggerScript($deleteSubscribeTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withDeleteSubscribeDoneTriggerScript($deleteSubscribeDoneTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withSendMessageTriggerScript($sendMessageTriggerScript): CreateLobbyRequest {
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
	 * @return CreateLobbyRequest
	 */
	public function withSendMessageDoneTriggerScript($sendMessageDoneTriggerScript): CreateLobbyRequest {
		$this->setSendMessageDoneTriggerScript($sendMessageDoneTriggerScript);
		return $this;
	}

}