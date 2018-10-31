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
class PublishRequest extends Gs2BasicRequest {

    const FUNCTION = "Publish";

	/** @var string ゲームの名前 */
	private $gameName;

	/** @var string 通知の送信先ユーザID */
	private $userId;

	/** @var string 件名 */
	private $subject;

	/** @var string 本文 */
	private $body;

	/** @var bool 対象ユーザがオフラインの場合に転送を実行するか */
	private $enableOfflineTransfer;

	/** @var string Firebaseへの転送時に使用する通知音ファイル名 */
	private $offlineTransferSound;


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
	 * @return PublishRequest
	 */
	public function withGameName($gameName): PublishRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * 通知の送信先ユーザIDを取得
	 *
	 * @return string 通知の送信先ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * 通知の送信先ユーザIDを設定
	 *
	 * @param string $userId 通知の送信先ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * 通知の送信先ユーザIDを設定
	 *
	 * @param string $userId 通知の送信先ユーザID
	 * @return PublishRequest
	 */
	public function withUserId($userId): PublishRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 件名を取得
	 *
	 * @return string 件名
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * 件名を設定
	 *
	 * @param string $subject 件名
	 */
	public function setSubject($subject) {
		$this->subject = $subject;
	}

	/**
	 * 件名を設定
	 *
	 * @param string $subject 件名
	 * @return PublishRequest
	 */
	public function withSubject($subject): PublishRequest {
		$this->setSubject($subject);
		return $this;
	}

	/**
	 * 本文を取得
	 *
	 * @return string 本文
	 */
	public function getBody() {
		return $this->body;
	}

	/**
	 * 本文を設定
	 *
	 * @param string $body 本文
	 */
	public function setBody($body) {
		$this->body = $body;
	}

	/**
	 * 本文を設定
	 *
	 * @param string $body 本文
	 * @return PublishRequest
	 */
	public function withBody($body): PublishRequest {
		$this->setBody($body);
		return $this;
	}

	/**
	 * 対象ユーザがオフラインの場合に転送を実行するかを取得
	 *
	 * @return bool 対象ユーザがオフラインの場合に転送を実行するか
	 */
	public function getEnableOfflineTransfer() {
		return $this->enableOfflineTransfer;
	}

	/**
	 * 対象ユーザがオフラインの場合に転送を実行するかを設定
	 *
	 * @param bool $enableOfflineTransfer 対象ユーザがオフラインの場合に転送を実行するか
	 */
	public function setEnableOfflineTransfer($enableOfflineTransfer) {
		$this->enableOfflineTransfer = $enableOfflineTransfer;
	}

	/**
	 * 対象ユーザがオフラインの場合に転送を実行するかを設定
	 *
	 * @param bool $enableOfflineTransfer 対象ユーザがオフラインの場合に転送を実行するか
	 * @return PublishRequest
	 */
	public function withEnableOfflineTransfer($enableOfflineTransfer): PublishRequest {
		$this->setEnableOfflineTransfer($enableOfflineTransfer);
		return $this;
	}

	/**
	 * Firebaseへの転送時に使用する通知音ファイル名を取得
	 *
	 * @return string Firebaseへの転送時に使用する通知音ファイル名
	 */
	public function getOfflineTransferSound() {
		return $this->offlineTransferSound;
	}

	/**
	 * Firebaseへの転送時に使用する通知音ファイル名を設定
	 *
	 * @param string $offlineTransferSound Firebaseへの転送時に使用する通知音ファイル名
	 */
	public function setOfflineTransferSound($offlineTransferSound) {
		$this->offlineTransferSound = $offlineTransferSound;
	}

	/**
	 * Firebaseへの転送時に使用する通知音ファイル名を設定
	 *
	 * @param string $offlineTransferSound Firebaseへの転送時に使用する通知音ファイル名
	 * @return PublishRequest
	 */
	public function withOfflineTransferSound($offlineTransferSound): PublishRequest {
		$this->setOfflineTransferSound($offlineTransferSound);
		return $this;
	}

}