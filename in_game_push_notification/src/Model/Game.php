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

namespace Gs2\InGamePushNotification\Model;

/**
 * ゲーム
 *
 * @author Game Server Services, Inc.
 *
 */
class Game {

	/** @var string ゲームID */
	private $gameId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string ゲーム名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string 対象がオフライン時使用する転送方式 */
	private $offlineTransfer;

	/** @var string http/https を選択した際の転送先URL */
	private $notificationUrl;

	/** @var string fcm を選択した際の Firebase サーバーキー */
	private $notificationFirebaseServerKey;

	/** @var string クライアント証明書発行時 に実行されるGS2-Script */
	private $createCertificateTriggerScript;

	/** @var string クライアント証明書発行完了時 に実行されるGS2-Script */
	private $createCertificateDoneTriggerScript;

	/** @var string クライアント証明書削除時 に実行されるGS2-Script */
	private $deleteCertificateTriggerScript;

	/** @var string クライアント証明書削除完了時 に実行されるGS2-Script */
	private $deleteCertificateDoneTriggerScript;

	/** @var string 通知送信時 に実行されるGS2-Script */
	private $publishTriggerScript;

	/** @var string 通知送信完了時 に実行されるGS2-Script */
	private $publishDoneTriggerScript;

	/** @var string Firebaseデバイストークン登録時 に実行されるGS2-Script */
	private $setFirebaseTokenTriggerScript;

	/** @var string Firebaseデバイストークン登録完了時 に実行されるGS2-Script */
	private $setFirebaseTokenDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ゲームIDを取得
	 *
	 * @return string ゲームID
	 */
	public function getGameId() {
		return $this->gameId;
	}

	/**
	 * ゲームIDを設定
	 *
	 * @param string $gameId ゲームID
	 */
	public function setGameId($gameId) {
		$this->gameId = $gameId;
	}

	/**
	 * ゲームIDを設定
	 *
	 * @param string $gameId ゲームID
	 * @return self
	 */
	public function withGameId($gameId): self {
		$this->setGameId($gameId);
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
	 * 対象がオフライン時使用する転送方式を取得
	 *
	 * @return string 対象がオフライン時使用する転送方式
	 */
	public function getOfflineTransfer() {
		return $this->offlineTransfer;
	}

	/**
	 * 対象がオフライン時使用する転送方式を設定
	 *
	 * @param string $offlineTransfer 対象がオフライン時使用する転送方式
	 */
	public function setOfflineTransfer($offlineTransfer) {
		$this->offlineTransfer = $offlineTransfer;
	}

	/**
	 * 対象がオフライン時使用する転送方式を設定
	 *
	 * @param string $offlineTransfer 対象がオフライン時使用する転送方式
	 * @return self
	 */
	public function withOfflineTransfer($offlineTransfer): self {
		$this->setOfflineTransfer($offlineTransfer);
		return $this;
	}

	/**
	 * http/https を選択した際の転送先URLを取得
	 *
	 * @return string http/https を選択した際の転送先URL
	 */
	public function getNotificationUrl() {
		return $this->notificationUrl;
	}

	/**
	 * http/https を選択した際の転送先URLを設定
	 *
	 * @param string $notificationUrl http/https を選択した際の転送先URL
	 */
	public function setNotificationUrl($notificationUrl) {
		$this->notificationUrl = $notificationUrl;
	}

	/**
	 * http/https を選択した際の転送先URLを設定
	 *
	 * @param string $notificationUrl http/https を選択した際の転送先URL
	 * @return self
	 */
	public function withNotificationUrl($notificationUrl): self {
		$this->setNotificationUrl($notificationUrl);
		return $this;
	}

	/**
	 * fcm を選択した際の Firebase サーバーキーを取得
	 *
	 * @return string fcm を選択した際の Firebase サーバーキー
	 */
	public function getNotificationFirebaseServerKey() {
		return $this->notificationFirebaseServerKey;
	}

	/**
	 * fcm を選択した際の Firebase サーバーキーを設定
	 *
	 * @param string $notificationFirebaseServerKey fcm を選択した際の Firebase サーバーキー
	 */
	public function setNotificationFirebaseServerKey($notificationFirebaseServerKey) {
		$this->notificationFirebaseServerKey = $notificationFirebaseServerKey;
	}

	/**
	 * fcm を選択した際の Firebase サーバーキーを設定
	 *
	 * @param string $notificationFirebaseServerKey fcm を選択した際の Firebase サーバーキー
	 * @return self
	 */
	public function withNotificationFirebaseServerKey($notificationFirebaseServerKey): self {
		$this->setNotificationFirebaseServerKey($notificationFirebaseServerKey);
		return $this;
	}

	/**
	 * クライアント証明書発行時 に実行されるGS2-Scriptを取得
	 *
	 * @return string クライアント証明書発行時 に実行されるGS2-Script
	 */
	public function getCreateCertificateTriggerScript() {
		return $this->createCertificateTriggerScript;
	}

	/**
	 * クライアント証明書発行時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createCertificateTriggerScript クライアント証明書発行時 に実行されるGS2-Script
	 */
	public function setCreateCertificateTriggerScript($createCertificateTriggerScript) {
		$this->createCertificateTriggerScript = $createCertificateTriggerScript;
	}

	/**
	 * クライアント証明書発行時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createCertificateTriggerScript クライアント証明書発行時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateCertificateTriggerScript($createCertificateTriggerScript): self {
		$this->setCreateCertificateTriggerScript($createCertificateTriggerScript);
		return $this;
	}

	/**
	 * クライアント証明書発行完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string クライアント証明書発行完了時 に実行されるGS2-Script
	 */
	public function getCreateCertificateDoneTriggerScript() {
		return $this->createCertificateDoneTriggerScript;
	}

	/**
	 * クライアント証明書発行完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createCertificateDoneTriggerScript クライアント証明書発行完了時 に実行されるGS2-Script
	 */
	public function setCreateCertificateDoneTriggerScript($createCertificateDoneTriggerScript) {
		$this->createCertificateDoneTriggerScript = $createCertificateDoneTriggerScript;
	}

	/**
	 * クライアント証明書発行完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createCertificateDoneTriggerScript クライアント証明書発行完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateCertificateDoneTriggerScript($createCertificateDoneTriggerScript): self {
		$this->setCreateCertificateDoneTriggerScript($createCertificateDoneTriggerScript);
		return $this;
	}

	/**
	 * クライアント証明書削除時 に実行されるGS2-Scriptを取得
	 *
	 * @return string クライアント証明書削除時 に実行されるGS2-Script
	 */
	public function getDeleteCertificateTriggerScript() {
		return $this->deleteCertificateTriggerScript;
	}

	/**
	 * クライアント証明書削除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteCertificateTriggerScript クライアント証明書削除時 に実行されるGS2-Script
	 */
	public function setDeleteCertificateTriggerScript($deleteCertificateTriggerScript) {
		$this->deleteCertificateTriggerScript = $deleteCertificateTriggerScript;
	}

	/**
	 * クライアント証明書削除時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteCertificateTriggerScript クライアント証明書削除時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDeleteCertificateTriggerScript($deleteCertificateTriggerScript): self {
		$this->setDeleteCertificateTriggerScript($deleteCertificateTriggerScript);
		return $this;
	}

	/**
	 * クライアント証明書削除完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string クライアント証明書削除完了時 に実行されるGS2-Script
	 */
	public function getDeleteCertificateDoneTriggerScript() {
		return $this->deleteCertificateDoneTriggerScript;
	}

	/**
	 * クライアント証明書削除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteCertificateDoneTriggerScript クライアント証明書削除完了時 に実行されるGS2-Script
	 */
	public function setDeleteCertificateDoneTriggerScript($deleteCertificateDoneTriggerScript) {
		$this->deleteCertificateDoneTriggerScript = $deleteCertificateDoneTriggerScript;
	}

	/**
	 * クライアント証明書削除完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $deleteCertificateDoneTriggerScript クライアント証明書削除完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withDeleteCertificateDoneTriggerScript($deleteCertificateDoneTriggerScript): self {
		$this->setDeleteCertificateDoneTriggerScript($deleteCertificateDoneTriggerScript);
		return $this;
	}

	/**
	 * 通知送信時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 通知送信時 に実行されるGS2-Script
	 */
	public function getPublishTriggerScript() {
		return $this->publishTriggerScript;
	}

	/**
	 * 通知送信時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $publishTriggerScript 通知送信時 に実行されるGS2-Script
	 */
	public function setPublishTriggerScript($publishTriggerScript) {
		$this->publishTriggerScript = $publishTriggerScript;
	}

	/**
	 * 通知送信時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $publishTriggerScript 通知送信時 に実行されるGS2-Script
	 * @return self
	 */
	public function withPublishTriggerScript($publishTriggerScript): self {
		$this->setPublishTriggerScript($publishTriggerScript);
		return $this;
	}

	/**
	 * 通知送信完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string 通知送信完了時 に実行されるGS2-Script
	 */
	public function getPublishDoneTriggerScript() {
		return $this->publishDoneTriggerScript;
	}

	/**
	 * 通知送信完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $publishDoneTriggerScript 通知送信完了時 に実行されるGS2-Script
	 */
	public function setPublishDoneTriggerScript($publishDoneTriggerScript) {
		$this->publishDoneTriggerScript = $publishDoneTriggerScript;
	}

	/**
	 * 通知送信完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $publishDoneTriggerScript 通知送信完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withPublishDoneTriggerScript($publishDoneTriggerScript): self {
		$this->setPublishDoneTriggerScript($publishDoneTriggerScript);
		return $this;
	}

	/**
	 * Firebaseデバイストークン登録時 に実行されるGS2-Scriptを取得
	 *
	 * @return string Firebaseデバイストークン登録時 に実行されるGS2-Script
	 */
	public function getSetFirebaseTokenTriggerScript() {
		return $this->setFirebaseTokenTriggerScript;
	}

	/**
	 * Firebaseデバイストークン登録時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $setFirebaseTokenTriggerScript Firebaseデバイストークン登録時 に実行されるGS2-Script
	 */
	public function setSetFirebaseTokenTriggerScript($setFirebaseTokenTriggerScript) {
		$this->setFirebaseTokenTriggerScript = $setFirebaseTokenTriggerScript;
	}

	/**
	 * Firebaseデバイストークン登録時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $setFirebaseTokenTriggerScript Firebaseデバイストークン登録時 に実行されるGS2-Script
	 * @return self
	 */
	public function withSetFirebaseTokenTriggerScript($setFirebaseTokenTriggerScript): self {
		$this->setSetFirebaseTokenTriggerScript($setFirebaseTokenTriggerScript);
		return $this;
	}

	/**
	 * Firebaseデバイストークン登録完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string Firebaseデバイストークン登録完了時 に実行されるGS2-Script
	 */
	public function getSetFirebaseTokenDoneTriggerScript() {
		return $this->setFirebaseTokenDoneTriggerScript;
	}

	/**
	 * Firebaseデバイストークン登録完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $setFirebaseTokenDoneTriggerScript Firebaseデバイストークン登録完了時 に実行されるGS2-Script
	 */
	public function setSetFirebaseTokenDoneTriggerScript($setFirebaseTokenDoneTriggerScript) {
		$this->setFirebaseTokenDoneTriggerScript = $setFirebaseTokenDoneTriggerScript;
	}

	/**
	 * Firebaseデバイストークン登録完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $setFirebaseTokenDoneTriggerScript Firebaseデバイストークン登録完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withSetFirebaseTokenDoneTriggerScript($setFirebaseTokenDoneTriggerScript): self {
		$this->setSetFirebaseTokenDoneTriggerScript($setFirebaseTokenDoneTriggerScript);
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
	 * @return Game
	 */
    static function build(array $array)
    {
        $item = new Game();
        $item->setGameId(isset($array['gameId']) ? $array['gameId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setServiceClass(isset($array['serviceClass']) ? $array['serviceClass'] : null);
        $item->setOfflineTransfer(isset($array['offlineTransfer']) ? $array['offlineTransfer'] : null);
        $item->setNotificationUrl(isset($array['notificationUrl']) ? $array['notificationUrl'] : null);
        $item->setNotificationFirebaseServerKey(isset($array['notificationFirebaseServerKey']) ? $array['notificationFirebaseServerKey'] : null);
        $item->setCreateCertificateTriggerScript(isset($array['createCertificateTriggerScript']) ? $array['createCertificateTriggerScript'] : null);
        $item->setCreateCertificateDoneTriggerScript(isset($array['createCertificateDoneTriggerScript']) ? $array['createCertificateDoneTriggerScript'] : null);
        $item->setDeleteCertificateTriggerScript(isset($array['deleteCertificateTriggerScript']) ? $array['deleteCertificateTriggerScript'] : null);
        $item->setDeleteCertificateDoneTriggerScript(isset($array['deleteCertificateDoneTriggerScript']) ? $array['deleteCertificateDoneTriggerScript'] : null);
        $item->setPublishTriggerScript(isset($array['publishTriggerScript']) ? $array['publishTriggerScript'] : null);
        $item->setPublishDoneTriggerScript(isset($array['publishDoneTriggerScript']) ? $array['publishDoneTriggerScript'] : null);
        $item->setSetFirebaseTokenTriggerScript(isset($array['setFirebaseTokenTriggerScript']) ? $array['setFirebaseTokenTriggerScript'] : null);
        $item->setSetFirebaseTokenDoneTriggerScript(isset($array['setFirebaseTokenDoneTriggerScript']) ? $array['setFirebaseTokenDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}