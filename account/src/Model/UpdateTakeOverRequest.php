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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateTakeOverRequest extends Gs2UserRequest {

    const FUNCTION = "UpdateTakeOver";

	/** @var string ゲームの名前を指定します。 */
	private $gameName;

	/** @var int 更新する引き継ぎ情報の種類を指定します。 */
	private $type;

	/** @var string 更新する引き継ぎ情報のユーザ固有IDを指定します。 */
	private $userIdentifier;

	/** @var string 引き継ぎ時に利用する現在設定されているパスワード */
	private $oldPassword;

	/** @var string 引き継ぎ時に利用する新しいパスワード */
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
	 * @return UpdateTakeOverRequest
	 */
	public function withGameName(string $gameName): UpdateTakeOverRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * 更新する引き継ぎ情報の種類を指定します。を取得
	 *
	 * @return int 更新する引き継ぎ情報の種類を指定します。
	 */
	public function getType(): int {
		return $this->type;
	}

	/**
	 * 更新する引き継ぎ情報の種類を指定します。を設定
	 *
	 * @param int $type 更新する引き継ぎ情報の種類を指定します。
	 */
	public function setType(int $type) {
		$this->type = $type;
	}

	/**
	 * 更新する引き継ぎ情報の種類を指定します。を設定
	 *
	 * @param int $type 更新する引き継ぎ情報の種類を指定します。
	 * @return UpdateTakeOverRequest
	 */
	public function withType(int $type): UpdateTakeOverRequest {
		$this->setType($type);
		return $this;
	}

	/**
	 * 更新する引き継ぎ情報のユーザ固有IDを指定します。を取得
	 *
	 * @return string 更新する引き継ぎ情報のユーザ固有IDを指定します。
	 */
	public function getUserIdentifier(): string {
		return $this->userIdentifier;
	}

	/**
	 * 更新する引き継ぎ情報のユーザ固有IDを指定します。を設定
	 *
	 * @param string $userIdentifier 更新する引き継ぎ情報のユーザ固有IDを指定します。
	 */
	public function setUserIdentifier(string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	/**
	 * 更新する引き継ぎ情報のユーザ固有IDを指定します。を設定
	 *
	 * @param string $userIdentifier 更新する引き継ぎ情報のユーザ固有IDを指定します。
	 * @return UpdateTakeOverRequest
	 */
	public function withUserIdentifier(string $userIdentifier): UpdateTakeOverRequest {
		$this->setUserIdentifier($userIdentifier);
		return $this;
	}

	/**
	 * 引き継ぎ時に利用する現在設定されているパスワードを取得
	 *
	 * @return string 引き継ぎ時に利用する現在設定されているパスワード
	 */
	public function getOldPassword(): string {
		return $this->oldPassword;
	}

	/**
	 * 引き継ぎ時に利用する現在設定されているパスワードを設定
	 *
	 * @param string $oldPassword 引き継ぎ時に利用する現在設定されているパスワード
	 */
	public function setOldPassword(string $oldPassword) {
		$this->oldPassword = $oldPassword;
	}

	/**
	 * 引き継ぎ時に利用する現在設定されているパスワードを設定
	 *
	 * @param string $oldPassword 引き継ぎ時に利用する現在設定されているパスワード
	 * @return UpdateTakeOverRequest
	 */
	public function withOldPassword(string $oldPassword): UpdateTakeOverRequest {
		$this->setOldPassword($oldPassword);
		return $this;
	}

	/**
	 * 引き継ぎ時に利用する新しいパスワードを取得
	 *
	 * @return string 引き継ぎ時に利用する新しいパスワード
	 */
	public function getPassword(): string {
		return $this->password;
	}

	/**
	 * 引き継ぎ時に利用する新しいパスワードを設定
	 *
	 * @param string $password 引き継ぎ時に利用する新しいパスワード
	 */
	public function setPassword(string $password) {
		$this->password = $password;
	}

	/**
	 * 引き継ぎ時に利用する新しいパスワードを設定
	 *
	 * @param string $password 引き継ぎ時に利用する新しいパスワード
	 * @return UpdateTakeOverRequest
	 */
	public function withPassword(string $password): UpdateTakeOverRequest {
		$this->setPassword($password);
		return $this;
	}

}