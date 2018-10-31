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

namespace Gs2\InGamePushNotification\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class SetFirebaseTokenRequest extends Gs2UserRequest {

    const FUNCTION = "SetFirebaseCloudMessagingToken";

	/** @var string ゲームの名前 */
	private $gameName;

	/** @var string デバイストークン */
	private $token;


	/**
	 * ゲームの名前を取得
	 *
	 * @return string ゲームの名前
	 */
	public function getGameName() {
		return $this->gameName;
	}

	/**
	 * ゲームの名前を設定
	 *
	 * @param string $gameName ゲームの名前
	 */
	public function setGameName($gameName) {
		$this->gameName = $gameName;
	}

	/**
	 * ゲームの名前を設定
	 *
	 * @param string $gameName ゲームの名前
	 * @return SetFirebaseTokenRequest
	 */
	public function withGameName($gameName): SetFirebaseTokenRequest {
		$this->setGameName($gameName);
		return $this;
	}

	/**
	 * デバイストークンを取得
	 *
	 * @return string デバイストークン
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * デバイストークンを設定
	 *
	 * @param string $token デバイストークン
	 */
	public function setToken($token) {
		$this->token = $token;
	}

	/**
	 * デバイストークンを設定
	 *
	 * @param string $token デバイストークン
	 * @return SetFirebaseTokenRequest
	 */
	public function withToken($token): SetFirebaseTokenRequest {
		$this->setToken($token);
		return $this;
	}

}