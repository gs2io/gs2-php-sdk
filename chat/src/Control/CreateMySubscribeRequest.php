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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateMySubscribeRequest extends Gs2UserRequest {

    const FUNCTION = "CreateMySubscribe";

	/** @var string ロビーの名前 */
	private $lobbyName;

	/** @var string ルームID */
	private $roomId;

	/** @var bool GS2-InGamePushNotification 使用時にオフライン転送を使用するか */
	private $enableOfflineTransfer;

	/** @var string GS2-InGamePushNotification 使用時のモバイルプッシュ通知で使用する通知音 */
	private $offlineTransferSound;

	/** @var string パスワード */
	private $password;


	/**
	 * ロビーの名前を取得
	 *
	 * @return string ロビーの名前
	 */
	public function getLobbyName() {
		return $this->lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 */
	public function setLobbyName($lobbyName) {
		$this->lobbyName = $lobbyName;
	}

	/**
	 * ロビーの名前を設定
	 *
	 * @param string $lobbyName ロビーの名前
	 * @return CreateMySubscribeRequest
	 */
	public function withLobbyName($lobbyName): CreateMySubscribeRequest {
		$this->setLobbyName($lobbyName);
		return $this;
	}

	/**
	 * ルームIDを取得
	 *
	 * @return string ルームID
	 */
	public function getRoomId() {
		return $this->roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 */
	public function setRoomId($roomId) {
		$this->roomId = $roomId;
	}

	/**
	 * ルームIDを設定
	 *
	 * @param string $roomId ルームID
	 * @return CreateMySubscribeRequest
	 */
	public function withRoomId($roomId): CreateMySubscribeRequest {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * GS2-InGamePushNotification 使用時にオフライン転送を使用するかを取得
	 *
	 * @return bool GS2-InGamePushNotification 使用時にオフライン転送を使用するか
	 */
	public function getEnableOfflineTransfer() {
		return $this->enableOfflineTransfer;
	}

	/**
	 * GS2-InGamePushNotification 使用時にオフライン転送を使用するかを設定
	 *
	 * @param bool $enableOfflineTransfer GS2-InGamePushNotification 使用時にオフライン転送を使用するか
	 */
	public function setEnableOfflineTransfer($enableOfflineTransfer) {
		$this->enableOfflineTransfer = $enableOfflineTransfer;
	}

	/**
	 * GS2-InGamePushNotification 使用時にオフライン転送を使用するかを設定
	 *
	 * @param bool $enableOfflineTransfer GS2-InGamePushNotification 使用時にオフライン転送を使用するか
	 * @return CreateMySubscribeRequest
	 */
	public function withEnableOfflineTransfer($enableOfflineTransfer): CreateMySubscribeRequest {
		$this->setEnableOfflineTransfer($enableOfflineTransfer);
		return $this;
	}

	/**
	 * GS2-InGamePushNotification 使用時のモバイルプッシュ通知で使用する通知音を取得
	 *
	 * @return string GS2-InGamePushNotification 使用時のモバイルプッシュ通知で使用する通知音
	 */
	public function getOfflineTransferSound() {
		return $this->offlineTransferSound;
	}

	/**
	 * GS2-InGamePushNotification 使用時のモバイルプッシュ通知で使用する通知音を設定
	 *
	 * @param string $offlineTransferSound GS2-InGamePushNotification 使用時のモバイルプッシュ通知で使用する通知音
	 */
	public function setOfflineTransferSound($offlineTransferSound) {
		$this->offlineTransferSound = $offlineTransferSound;
	}

	/**
	 * GS2-InGamePushNotification 使用時のモバイルプッシュ通知で使用する通知音を設定
	 *
	 * @param string $offlineTransferSound GS2-InGamePushNotification 使用時のモバイルプッシュ通知で使用する通知音
	 * @return CreateMySubscribeRequest
	 */
	public function withOfflineTransferSound($offlineTransferSound): CreateMySubscribeRequest {
		$this->setOfflineTransferSound($offlineTransferSound);
		return $this;
	}

	/**
	 * パスワードを取得
	 *
	 * @return string パスワード
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string $password パスワード
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * パスワードを設定
	 *
	 * @param string $password パスワード
	 * @return CreateMySubscribeRequest
	 */
	public function withPassword($password): CreateMySubscribeRequest {
		$this->setPassword($password);
		return $this;
	}

}