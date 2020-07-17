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

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;

/**
 * プロジェクトトークン を取得します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class LoginResult implements IResult {
	/** @var string プロジェクトトークン */
	private $access_token;
	/** @var string Bearer */
	private $token_type;
	/** @var int 有効期間(秒) */
	private $expires_in;

	/**
	 * プロジェクトトークンを取得
	 *
	 * @return string|null プロジェクトトークン を取得します
	 */
	public function getAccessToken(): ?string {
		return $this->access_token;
	}

	/**
	 * プロジェクトトークンを設定
	 *
	 * @param string|null $accessToken プロジェクトトークン を取得します
	 */
	public function setAccessToken(?string $accessToken) {
		$this->access_token = $accessToken;
	}

	/**
	 * Bearerを取得
	 *
	 * @return string|null プロジェクトトークン を取得します
	 */
	public function getTokenType(): ?string {
		return $this->token_type;
	}

	/**
	 * Bearerを設定
	 *
	 * @param string|null $tokenType プロジェクトトークン を取得します
	 */
	public function setTokenType(?string $tokenType) {
		$this->token_type = $tokenType;
	}

	/**
	 * 有効期間(秒)を取得
	 *
	 * @return int|null プロジェクトトークン を取得します
	 */
	public function getExpiresIn(): ?int {
		return $this->expires_in;
	}

	/**
	 * 有効期間(秒)を設定
	 *
	 * @param int|null $expiresIn プロジェクトトークン を取得します
	 */
	public function setExpiresIn(?int $expiresIn) {
		$this->expires_in = $expiresIn;
	}

    public static function fromJson(array $data): LoginResult {
        $result = new LoginResult();
        $result->setAccessToken(isset($data["accessToken"]) ? $data["accessToken"] : null);
        $result->setTokenType(isset($data["tokenType"]) ? $data["tokenType"] : null);
        $result->setExpiresIn(isset($data["expiresIn"]) ? $data["expiresIn"] : null);
        return $result;
    }
}