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

namespace Gs2\InGamePushNotification\Model;

/**
 * Firebase 通知トークン
 *
 * @author Game Server Services, Inc.
 *
 */
class FirebaseToken {

	/** @var string ユーザID */
	private $userId;

	/** @var string トークン */
	private $token;

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
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * トークンを取得
	 *
	 * @return string トークン
	 */
	public function getToken() {
		return $this->token;
	}

	/**
	 * トークンを設定
	 *
	 * @param string $token トークン
	 */
	public function setToken($token) {
		$this->token = $token;
	}

	/**
	 * トークンを設定
	 *
	 * @param string $token トークン
	 * @return self
	 */
	public function withToken($token): self {
		$this->setToken($token);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return FirebaseToken
	 */
    static function build(array $array)
    {
        $item = new FirebaseToken();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setToken(isset($array['token']) ? $array['token'] : null);
        return $item;
    }

}