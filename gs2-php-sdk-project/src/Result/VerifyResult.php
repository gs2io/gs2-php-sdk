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
 * GS2アカウントを有効化します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class VerifyResult implements IResult {
	/** @var Account 有効化したGS2アカウント */
	private $item;

	/**
	 * 有効化したGS2アカウントを取得
	 *
	 * @return Account|null GS2アカウントを有効化します
	 */
	public function getItem(): ?Account {
		return $this->item;
	}

	/**
	 * 有効化したGS2アカウントを設定
	 *
	 * @param Account|null $item GS2アカウントを有効化します
	 */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): VerifyResult {
        $result = new VerifyResult();
        $result->setItem(isset($data["item"]) ? Account::fromJson($data["item"]) : null);
        return $result;
    }
}