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

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateTakeOverRequest extends Gs2UserRequest {

    const FUNCTION = "CreateTakeOver";

	/** @var string ゲームの名前を指定します。 */
	private $gameName;

	/** @var int 引き継ぎ情報の種類を表す数値 */
	private $type;

	/** @var string 引き継ぎに使用するユーザ固有のID */
	private $userIdentifier;

	/** @var string 引き継ぎ時に利用するパスワード */
	private $password;


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
	 * @return CreateTakeOverRequest
	 */
	public function withGameName($gameName): CreateTakeOverRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * 引き継ぎ情報の種類を表す数値を取得
	 *
	 * @return int 引き継ぎ情報の種類を表す数値
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * 引き継ぎ情報の種類を表す数値を設定
	 *
	 * @param int $type 引き継ぎ情報の種類を表す数値
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * 引き継ぎ情報の種類を表す数値を設定
	 *
	 * @param int $type 引き継ぎ情報の種類を表す数値
	 * @return CreateTakeOverRequest
	 */
	public function withType($type): CreateTakeOverRequest {
		$this->setType($type);
		return $this;
	}

	/**
	 * 引き継ぎに使用するユーザ固有のIDを取得
	 *
	 * @return string 引き継ぎに使用するユーザ固有のID
	 */
	public function getUserIdentifier() {
		return $this->userIdentifier;
	}

	/**
	 * 引き継ぎに使用するユーザ固有のIDを設定
	 *
	 * @param string $userIdentifier 引き継ぎに使用するユーザ固有のID
	 */
	public function setUserIdentifier($userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	/**
	 * 引き継ぎに使用するユーザ固有のIDを設定
	 *
	 * @param string $userIdentifier 引き継ぎに使用するユーザ固有のID
	 * @return CreateTakeOverRequest
	 */
	public function withUserIdentifier($userIdentifier): CreateTakeOverRequest {
		$this->setUserIdentifier($userIdentifier);
		return $this;
	}

	/**
	 * 引き継ぎ時に利用するパスワードを取得
	 *
	 * @return string 引き継ぎ時に利用するパスワード
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * 引き継ぎ時に利用するパスワードを設定
	 *
	 * @param string $password 引き継ぎ時に利用するパスワード
	 */
	public function setPassword($password) {
		$this->password = $password;
	}

	/**
	 * 引き継ぎ時に利用するパスワードを設定
	 *
	 * @param string $password 引き継ぎ時に利用するパスワード
	 * @return CreateTakeOverRequest
	 */
	public function withPassword($password): CreateTakeOverRequest {
		$this->setPassword($password);
		return $this;
	}

}