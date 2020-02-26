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

namespace Gs2\Account\Result;

use Gs2\Core\Model\IResult;
use Gs2\Account\Model\Account;

/**
 * ゲームプレイヤーアカウントを認証 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AuthenticationResult implements IResult {
	/** @var Account ゲームプレイヤーアカウント */
	private $item;
	/** @var string 署名対象のアカウント情報 */
	private $body;
	/** @var string 署名 */
	private $signature;

	/**
	 * ゲームプレイヤーアカウントを取得
	 *
	 * @return Account|null ゲームプレイヤーアカウントを認証
	 */
	public function getItem(): ?Account {
		return $this->item;
	}

	/**
	 * ゲームプレイヤーアカウントを設定
	 *
	 * @param Account|null $item ゲームプレイヤーアカウントを認証
	 */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

	/**
	 * 署名対象のアカウント情報を取得
	 *
	 * @return string|null ゲームプレイヤーアカウントを認証
	 */
	public function getBody(): ?string {
		return $this->body;
	}

	/**
	 * 署名対象のアカウント情報を設定
	 *
	 * @param string|null $body ゲームプレイヤーアカウントを認証
	 */
	public function setBody(?string $body) {
		$this->body = $body;
	}

	/**
	 * 署名を取得
	 *
	 * @return string|null ゲームプレイヤーアカウントを認証
	 */
	public function getSignature(): ?string {
		return $this->signature;
	}

	/**
	 * 署名を設定
	 *
	 * @param string|null $signature ゲームプレイヤーアカウントを認証
	 */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}

    public static function fromJson(array $data): AuthenticationResult {
        $result = new AuthenticationResult();
        $result->setItem(isset($data["item"]) ? Account::fromJson($data["item"]) : null);
        $result->setBody(isset($data["body"]) ? $data["body"] : null);
        $result->setSignature(isset($data["signature"]) ? $data["signature"] : null);
        return $result;
    }
}