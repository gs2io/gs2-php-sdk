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

namespace Gs2\Account\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class DeleteAccountRequest extends Gs2BasicRequest {

    const FUNCTION = "DeleteAccount";

	/** @var string ゲームの名前を指定します。 */
	private $gameName;

	/** @var string 削除する対象アカウントのユーザIDを指定します。 */
	private $userId;


	/**
	 * ゲームの名前を指定します。を取得
	 *
	 * @return string ゲームの名前を指定します。
	 */
	public function getGameName() {
		return $this->gameName;
	}

	/**
	 * ゲームの名前を指定します。を設定
	 *
	 * @param string $gameName ゲームの名前を指定します。
	 */
	public function setGameName($gameName) {
		$this->gameName = $gameName;
	}

	/**
	 * ゲームの名前を指定します。を設定
	 *
	 * @param string $gameName ゲームの名前を指定します。
	 * @return DeleteAccountRequest
	 */
	public function withGameName($gameName): DeleteAccountRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * 削除する対象アカウントのユーザIDを指定します。を取得
	 *
	 * @return string 削除する対象アカウントのユーザIDを指定します。
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * 削除する対象アカウントのユーザIDを指定します。を設定
	 *
	 * @param string $userId 削除する対象アカウントのユーザIDを指定します。
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * 削除する対象アカウントのユーザIDを指定します。を設定
	 *
	 * @param string $userId 削除する対象アカウントのユーザIDを指定します。
	 * @return DeleteAccountRequest
	 */
	public function withUserId($userId): DeleteAccountRequest {
		$this->setUserId($userId);
		return $this;
	}

}