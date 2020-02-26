<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Auth\Result;

use Gs2\Core\Model\IResult;

/**
 * 指定したユーザIDでGS2にログインし、アクセストークンを取得します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class LoginBySignatureResult implements IResult {
	/** @var string アクセストークン */
	private $token;
	/** @var string ユーザーID */
	private $userId;
	/** @var int 有効期限 */
	private $expire;

	/**
	 * アクセストークンを取得
	 *
	 * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
	 */
	public function getToken(): ?string {
		return $this->token;
	}

	/**
	 * アクセストークンを設定
	 *
	 * @param string|null $token 指定したユーザIDでGS2にログインし、アクセストークンを取得します
	 */
	public function setToken(?string $token) {
		$this->token = $token;
	}

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId 指定したユーザIDでGS2にログインし、アクセストークンを取得します
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * 有効期限を取得
	 *
	 * @return int|null 指定したユーザIDでGS2にログインし、アクセストークンを取得します
	 */
	public function getExpire(): ?int {
		return $this->expire;
	}

	/**
	 * 有効期限を設定
	 *
	 * @param int|null $expire 指定したユーザIDでGS2にログインし、アクセストークンを取得します
	 */
	public function setExpire(?int $expire) {
		$this->expire = $expire;
	}

    public static function fromJson(array $data): LoginBySignatureResult {
        $result = new LoginBySignatureResult();
        $result->setToken(isset($data["token"]) ? $data["token"] : null);
        $result->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $result->setExpire(isset($data["expire"]) ? $data["expire"] : null);
        return $result;
    }
}