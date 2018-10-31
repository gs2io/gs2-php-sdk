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
class SendMessageNoAuthRequest extends Gs2BasicRequest {

    const FUNCTION = "SendMessageNoAuth";

	/** @var string ロビーの名前 */
	private $lobbyName;

	/** @var string ルームID */
	private $roomId;

	/** @var string ユーザID */
	private $userId;

	/** @var string メッセージテキスト */
	private $message;

	/** @var string メッセージメタデータ */
	private $meta;


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
	 * @return SendMessageNoAuthRequest
	 */
	public function withLobbyName($lobbyName): SendMessageNoAuthRequest {
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
	 * @return SendMessageNoAuthRequest
	 */
	public function withRoomId($roomId): SendMessageNoAuthRequest {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * ユーザIDを取得
	 *
	 * @return string ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 * @return SendMessageNoAuthRequest
	 */
	public function withUserId($userId): SendMessageNoAuthRequest {
		$this->setUserId($userId);
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
	 * @return SendMessageNoAuthRequest
	 */
	public function withMessage($message): SendMessageNoAuthRequest {
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
	 * @return SendMessageNoAuthRequest
	 */
	public function withMeta($meta): SendMessageNoAuthRequest {
		$this->setMeta($meta);
		return $this;
	}

}