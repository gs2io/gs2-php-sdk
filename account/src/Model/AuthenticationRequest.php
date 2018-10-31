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

namespace Gs2\Account\Model;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class AuthenticationRequest extends Gs2BasicRequest {

    const FUNCTION = "Authentication";

	/** @var string ゲームの名前を指定します。 */
	private $gameName;

	/** @var string 認証する対象アカウントのユーザIDを指定します。 */
	private $userId;

	/** @var string 認証結果の暗号化に利用する GS2-Key の暗号鍵名 */
	private $keyName;

	/** @var string 認証に利用するパスワード */
	private $password;


	/**
	 * ゲームの名前を指定します。を取得
	 *
	 * @return string ゲームの名前を指定します。
	 */
	public function getGameName(): string {
		return $this->gameName;
	}

	/**
	 * ゲームの名前を指定します。を設定
	 *
	 * @param string $gameName ゲームの名前を指定します。
	 */
	public function setGameName(string $gameName) {
		$this->gameName = $gameName;
	}

	/**
	 * ゲームの名前を指定します。を設定
	 *
	 * @param string $gameName ゲームの名前を指定します。
	 * @return AuthenticationRequest
	 */
	public function withGameName(string $gameName): AuthenticationRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * 認証する対象アカウントのユーザIDを指定します。を取得
	 *
	 * @return string 認証する対象アカウントのユーザIDを指定します。
	 */
	public function getUserId(): string {
		return $this->userId;
	}

	/**
	 * 認証する対象アカウントのユーザIDを指定します。を設定
	 *
	 * @param string $userId 認証する対象アカウントのユーザIDを指定します。
	 */
	public function setUserId(string $userId) {
		$this->userId = $userId;
	}

	/**
	 * 認証する対象アカウントのユーザIDを指定します。を設定
	 *
	 * @param string $userId 認証する対象アカウントのユーザIDを指定します。
	 * @return AuthenticationRequest
	 */
	public function withUserId(string $userId): AuthenticationRequest {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * 認証結果の暗号化に利用する GS2-Key の暗号鍵名を取得
	 *
	 * @return string 認証結果の暗号化に利用する GS2-Key の暗号鍵名
	 */
	public function getKeyName(): string {
		return $this->keyName;
	}

	/**
	 * 認証結果の暗号化に利用する GS2-Key の暗号鍵名を設定
	 *
	 * @param string $keyName 認証結果の暗号化に利用する GS2-Key の暗号鍵名
	 */
	public function setKeyName(string $keyName) {
		$this->keyName = $keyName;
	}

	/**
	 * 認証結果の暗号化に利用する GS2-Key の暗号鍵名を設定
	 *
	 * @param string $keyName 認証結果の暗号化に利用する GS2-Key の暗号鍵名
	 * @return AuthenticationRequest
	 */
	public function withKeyName(string $keyName): AuthenticationRequest {
		$this->setKeyName($keyName);
		return $this;
	}

	/**
	 * 認証に利用するパスワードを取得
	 *
	 * @return string 認証に利用するパスワード
	 */
	public function getPassword(): string {
		return $this->password;
	}

	/**
	 * 認証に利用するパスワードを設定
	 *
	 * @param string $password 認証に利用するパスワード
	 */
	public function setPassword(string $password) {
		$this->password = $password;
	}

	/**
	 * 認証に利用するパスワードを設定
	 *
	 * @param string $password 認証に利用するパスワード
	 * @return AuthenticationRequest
	 */
	public function withPassword(string $password): AuthenticationRequest {
		$this->setPassword($password);
		return $this;
	}

}