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
class CreateRoomRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateRoom";

	/** @var string ロビーの名前 */
	private $lobbyName;

	/** @var string ルームID（指定しない場合は自動的に採番されます） */
	private $roomId;

	/** @var string[] ルームへのアクセスを許可するユーザIDリストを指定 */
	private $allowUserIds;

	/** @var string ルームにアクセスする際にパスワードを要求する場合は文字列を指定 */
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
	 * @return CreateRoomRequest
	 */
	public function withLobbyName($lobbyName): CreateRoomRequest {
		$this->setLobbyName($lobbyName);
		return $this;
	}

	/**
	 * ルームID（指定しない場合は自動的に採番されます）を取得
	 *
	 * @return string ルームID（指定しない場合は自動的に採番されます）
	 */
	public function getRoomId() {
		return $this->roomId;
	}

	/**
	 * ルームID（指定しない場合は自動的に採番されます）を設定
	 *
	 * @param string $roomId ルームID（指定しない場合は自動的に採番されます）
	 */
	public function setRoomId($roomId) {
		$this->roomId = $roomId;
	}

	/**
	 * ルームID（指定しない場合は自動的に採番されます）を設定
	 *
	 * @param string $roomId ルームID（指定しない場合は自動的に採番されます）
	 * @return CreateRoomRequest
	 */
	public function withRoomId($roomId): CreateRoomRequest {
		$this->setRoomId($roomId);
		return $this;
	}

	/**
	 * ルームへのアクセスを許可するユーザIDリストを指定を取得
	 *
	 * @return string[] ルームへのアクセスを許可するユーザIDリストを指定
	 */
	public function getAllowUserIds() {
		return $this->allowUserIds;
	}

	/**
	 * ルームへのアクセスを許可するユーザIDリストを指定を設定
	 *
	 * @param string[] $allowUserIds ルームへのアクセスを許可するユーザIDリストを指定
	 */
	public function setAllowUserIds($allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}

	/**
	 * ルームへのアクセスを許可するユーザIDリストを指定を設定
	 *
	 * @param string[] $allowUserIds ルームへのアクセスを許可するユーザIDリストを指定
	 * @return CreateRoomRequest
	 */
	public function withAllowUserIds($allowUserIds): CreateRoomRequest {
		$this->setAllowUserIds($allowUserIds);
		return $this;
	}

	/**
	 * ルームにアクセスする際にパスワードを要求する場合は文字列を指定を取得
	 *
	 * @return string ルームにアクセスする際にパスワードを要求する場合は文字列を指定
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * ルームにアクセスする際にパスワードを要求する場合は文字列を指定を設定
	 *
	 * @param string $password ルームにアクセスする際にパスワードを要求する場合は文字列を指定
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * ルームにアクセスする際にパスワードを要求する場合は文字列を指定を設定
	 *
	 * @param string $password ルームにアクセスする際にパスワードを要求する場合は文字列を指定
	 * @return CreateRoomRequest
	 */
	public function withPassword($password): CreateRoomRequest {
		$this->setPassword($password);
		return $this;
	}

}