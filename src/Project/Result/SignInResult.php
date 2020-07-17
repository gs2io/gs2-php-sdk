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

namespace Gs2\Project\Result;

use Gs2\Core\Model\IResult;
use Gs2\Project\Model\Account;

/**
 * サインインします のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class SignInResult implements IResult {
	/** @var Account サインインしたGS2アカウント */
	private $item;
	/** @var string GS2-Console にアクセスするのに使用するトークン */
	private $accountToken;

	/**
	 * サインインしたGS2アカウントを取得
	 *
	 * @return Account|null サインインします
	 */
	public function getItem(): ?Account {
		return $this->item;
	}

	/**
	 * サインインしたGS2アカウントを設定
	 *
	 * @param Account|null $item サインインします
	 */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

	/**
	 * GS2-Console にアクセスするのに使用するトークンを取得
	 *
	 * @return string|null サインインします
	 */
	public function getAccountToken(): ?string {
		return $this->accountToken;
	}

	/**
	 * GS2-Console にアクセスするのに使用するトークンを設定
	 *
	 * @param string|null $accountToken サインインします
	 */
	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}

    public static function fromJson(array $data): SignInResult {
        $result = new SignInResult();
        $result->setItem(isset($data["item"]) ? Account::fromJson($data["item"]) : null);
        $result->setAccountToken(isset($data["accountToken"]) ? $data["accountToken"] : null);
        return $result;
    }
}