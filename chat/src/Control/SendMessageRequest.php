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
class SendMessageRequest extends Gs2UserRequest {

    const FUNCTION = "SendMessage";

	/** @var string ロビーの名前 */
	private $lobbyName;

	/** @var string ルームID */
	private $roomId;

	/** @var string メッセージテキスト */
	private $message;

	/** @var string メッセージメタデータ */
	private $meta;

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
	 * @return SendMessageRequest
	 */
	public function withLobbyName($lobbyName): SendMessageRequest {
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
	 * @return SendMessageRequest
	 */
	public function withRoomId($roomId): SendMessageRequest {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * メッセージテキストを取得
	 *
	 * @return string メッセージテキスト
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * メッセージテキストを設定
	 *
	 * @param string $message メッセージテキスト
	 */
	public function setMessage($message) {
		$this->message = $message;
	}

	/**
	 * メッセージテキストを設定
	 *
	 * @param string $message メッセージテキスト
	 * @return SendMessageRequest
	 */
	public function withMessage($message): SendMessageRequest {
		$this->setMessage($message);
		return $this;
	}

	/**
	 * メッセージメタデータを取得
	 *
	 * @return string メッセージメタデータ
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * メッセージメタデータを設定
	 *
	 * @param string $meta メッセージメタデータ
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * メッセージメタデータを設定
	 *
	 * @param string $meta メッセージメタデータ
	 * @return SendMessageRequest
	 */
	public function withMeta($meta): SendMessageRequest {
		$this->setMeta($meta);
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
	 * @return SendMessageRequest
	 */
	public function withPassword($password): SendMessageRequest {
		$this->setPassword($password);
		return $this;
	}

}