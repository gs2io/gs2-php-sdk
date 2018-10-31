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

namespace Gs2\InGamePushNotification\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateGameRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateGame";

	/** @var string ゲームの名前 */
	private $gameName;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string オフライン転送方式 */
	private $offlineTransfer;

	/** @var string オフライン転送先URL */
	private $notificationUrl;

	/** @var string Firebaseのサーバーキー */
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


	/**
	 * ゲームの名前を取得
	 *
	 * @return string ゲームの名前
	 */
	public function getGameName() {
		return $this->gameName;
	}

	/**
	 * ゲームの名前を設定
	 *
	 * @param string $gameName ゲームの名前
	 */
	public function setGameName($gameName) {
		$this->gameName = $gameName;
	}

	/**
	 * ゲームの名前を設定
	 *
	 * @param string $gameName ゲームの名前
	 * @return UpdateGameRequest
	 */
	public function withGameName($gameName): UpdateGameRequest {
		$this->setGameName($gameName);
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
	 * @return UpdateGameRequest
	 */
	public function withDescription($description): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withServiceClass($serviceClass): UpdateGameRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * オフライン転送方式を取得
	 *
	 * @return string オフライン転送方式
	 */
	public function getOfflineTransfer() {
		return $this->offlineTransfer;
	}

	/**
	 * オフライン転送方式を設定
	 *
	 * @param string $offlineTransfer オフライン転送方式
	 */
	public function setOfflineTransfer($offlineTransfer) {
		$this->offlineTransfer = $offlineTransfer;
	}

	/**
	 * オフライン転送方式を設定
	 *
	 * @param string $offlineTransfer オフライン転送方式
	 * @return UpdateGameRequest
	 */
	public function withOfflineTransfer($offlineTransfer): UpdateGameRequest {
		$this->setOfflineTransfer($offlineTransfer);
		return $this;
	}

	/**
	 * オフライン転送先URLを取得
	 *
	 * @return string オフライン転送先URL
	 */
	public function getNotificationUrl() {
		return $this->notificationUrl;
	}

	/**
	 * オフライン転送先URLを設定
	 *
	 * @param string $notificationUrl オフライン転送先URL
	 */
	public function setNotificationUrl($notificationUrl) {
		$this->notificationUrl = $notificationUrl;
	}

	/**
	 * オフライン転送先URLを設定
	 *
	 * @param string $notificationUrl オフライン転送先URL
	 * @return UpdateGameRequest
	 */
	public function withNotificationUrl($notificationUrl): UpdateGameRequest {
		$this->setNotificationUrl($notificationUrl);
		return $this;
	}

	/**
	 * Firebaseのサーバーキーを取得
	 *
	 * @return string Firebaseのサーバーキー
	 */
	public function getNotificationFirebaseServerKey() {
		return $this->notificationFirebaseServerKey;
	}

	/**
	 * Firebaseのサーバーキーを設定
	 *
	 * @param string $notificationFirebaseServerKey Firebaseのサーバーキー
	 */
	public function setNotificationFirebaseServerKey($notificationFirebaseServerKey) {
		$this->notificationFirebaseServerKey = $notificationFirebaseServerKey;
	}

	/**
	 * Firebaseのサーバーキーを設定
	 *
	 * @param string $notificationFirebaseServerKey Firebaseのサーバーキー
	 * @return UpdateGameRequest
	 */
	public function withNotificationFirebaseServerKey($notificationFirebaseServerKey): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withCreateCertificateTriggerScript($createCertificateTriggerScript): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withCreateCertificateDoneTriggerScript($createCertificateDoneTriggerScript): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withDeleteCertificateTriggerScript($deleteCertificateTriggerScript): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withDeleteCertificateDoneTriggerScript($deleteCertificateDoneTriggerScript): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withPublishTriggerScript($publishTriggerScript): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withPublishDoneTriggerScript($publishDoneTriggerScript): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withSetFirebaseTokenTriggerScript($setFirebaseTokenTriggerScript): UpdateGameRequest {
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
	 * @return UpdateGameRequest
	 */
	public function withSetFirebaseTokenDoneTriggerScript($setFirebaseTokenDoneTriggerScript): UpdateGameRequest {
		$this->setSetFirebaseTokenDoneTriggerScript($setFirebaseTokenDoneTriggerScript);
		return $this;
	}

}