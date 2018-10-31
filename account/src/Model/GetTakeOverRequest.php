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
class GetTakeOverRequest extends Gs2UserRequest {

    const FUNCTION = "GetTakeOver";

	/** @var string ゲームの名前を指定します。 */
	private $gameName;

	/** @var int 取得する引き継ぎ情報の種類を指定します。 */
	private $type;

	/** @var string 取得する引き継ぎ情報のユーザ固有IDを指定します。 */
	private $userIdentifier;


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
	 * @return GetTakeOverRequest
	 */
	public function withGameName(string $gameName): GetTakeOverRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * 取得する引き継ぎ情報の種類を指定します。を取得
	 *
	 * @return int 取得する引き継ぎ情報の種類を指定します。
	 */
	public function getType(): int {
		return $this->type;
	}

	/**
	 * 取得する引き継ぎ情報の種類を指定します。を設定
	 *
	 * @param int $type 取得する引き継ぎ情報の種類を指定します。
	 */
	public function setType(int $type) {
		$this->type = $type;
	}

	/**
	 * 取得する引き継ぎ情報の種類を指定します。を設定
	 *
	 * @param int $type 取得する引き継ぎ情報の種類を指定します。
	 * @return GetTakeOverRequest
	 */
	public function withType(int $type): GetTakeOverRequest {
		$this->setType($type);
		return $this;
	}

	/**
	 * 取得する引き継ぎ情報のユーザ固有IDを指定します。を取得
	 *
	 * @return string 取得する引き継ぎ情報のユーザ固有IDを指定します。
	 */
	public function getUserIdentifier(): string {
		return $this->userIdentifier;
	}

	/**
	 * 取得する引き継ぎ情報のユーザ固有IDを指定します。を設定
	 *
	 * @param string $userIdentifier 取得する引き継ぎ情報のユーザ固有IDを指定します。
	 */
	public function setUserIdentifier(string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}

	/**
	 * 取得する引き継ぎ情報のユーザ固有IDを指定します。を設定
	 *
	 * @param string $userIdentifier 取得する引き継ぎ情報のユーザ固有IDを指定します。
	 * @return GetTakeOverRequest
	 */
	public function withUserIdentifier(string $userIdentifier): GetTakeOverRequest {
		$this->setUserIdentifier($userIdentifier);
		return $this;
	}

}