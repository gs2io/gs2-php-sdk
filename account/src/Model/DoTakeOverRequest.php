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
class DoTakeOverRequest extends Gs2BasicRequest {

    const FUNCTION = "DoTakeOver";

	/** @var string ゲームの名前を指定します。 */
	private $gameName;

	/** @var int 引き継ぎ情報の種類を指定します。 */
	private $type;

	/** @var string 引き継ぎ情報のユーザ固有ID */
	private $userIdentifier;

	/** @var string 引き継ぎ設定に指定されたパスワード */
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
	 * @return DoTakeOverRequest
	 */
	public function withGameName(string $gameName): DoTakeOverRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * 引き継ぎ情報の種類を指定します。を取得
	 *
	 * @return int 引き継ぎ情報の種類を指定します。
	 */
	public function getType(): int {
		return $this->type;
	}

	/**
	 * 引き継ぎ情報の種類を指定します。を設定
	 *
	 * @param int $type 引き継ぎ情報の種類を指定します。
	 */
	public function setType(int $type) {
		$this->type = $type;
	}

	/**
	 * 引き継ぎ情報の種類を指定します。を設定
	 *
	 * @param int $type 引き継ぎ情報の種類を指定します。
	 * @return DoTakeOverRequest
	 */
	public function withType(int $type): DoTakeOverRequest {
		$this->setType($type);
		return $this;
	}

	/**
	 * 引き継ぎ情報のユーザ固有IDを取得
	 *
	 * @return string 引き継ぎ情報のユーザ固有ID
	 */
	public function getUserIdentifier(): string {
		return $this->userIdentifier;
	}

	/**
	 * 引き継ぎ情報のユーザ固有IDを設定
	 *
	 * @param string $userIdentifier 引き継ぎ情報のユーザ固有ID
	 */
	public function setUserIdentifier(string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	/**
	 * 引き継ぎ情報のユーザ固有IDを設定
	 *
	 * @param string $userIdentifier 引き継ぎ情報のユーザ固有ID
	 * @return DoTakeOverRequest
	 */
	public function withUserIdentifier(string $userIdentifier): DoTakeOverRequest {
		$this->setUserIdentifier($userIdentifier);
		return $this;
	}

	/**
	 * 引き継ぎ設定に指定されたパスワードを取得
	 *
	 * @return string 引き継ぎ設定に指定されたパスワード
	 */
	public function getPassword(): string {
		return $this->password;
	}

	/**
	 * 引き継ぎ設定に指定されたパスワードを設定
	 *
	 * @param string $password 引き継ぎ設定に指定されたパスワード
	 */
	public function setPassword(string $password) {
		$this->password = $password;
	}

	/**
	 * 引き継ぎ設定に指定されたパスワードを設定
	 *
	 * @param string $password 引き継ぎ設定に指定されたパスワード
	 * @return DoTakeOverRequest
	 */
	public function withPassword(string $password): DoTakeOverRequest {
		$this->setPassword($password);
		return $this;
	}

}