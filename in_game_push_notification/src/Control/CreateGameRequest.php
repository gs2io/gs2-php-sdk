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
class CreateGameRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGame";

	/** @var string ゲーム名 */
	private $name;

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
	 * @return CreateGameRequest
	 */
	public function withName($name): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withDescription($description): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withServiceClass($serviceClass): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withOfflineTransfer($offlineTransfer): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withNotificationUrl($notificationUrl): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withNotificationFirebaseServerKey($notificationFirebaseServerKey): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withCreateCertificateTriggerScript($createCertificateTriggerScript): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withCreateCertificateDoneTriggerScript($createCertificateDoneTriggerScript): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withDeleteCertificateTriggerScript($deleteCertificateTriggerScript): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withDeleteCertificateDoneTriggerScript($deleteCertificateDoneTriggerScript): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withPublishTriggerScript($publishTriggerScript): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withPublishDoneTriggerScript($publishDoneTriggerScript): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withSetFirebaseTokenTriggerScript($setFirebaseTokenTriggerScript): CreateGameRequest {
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
	 * @return CreateGameRequest
	 */
	public function withSetFirebaseTokenDoneTriggerScript($setFirebaseTokenDoneTriggerScript): CreateGameRequest {
		$this->setSetFirebaseTokenDoneTriggerScript($setFirebaseTokenDoneTriggerScript);
		return $this;
	}

}