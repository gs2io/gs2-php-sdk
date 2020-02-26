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
 * ゲームプレイヤーアカウントの現在時刻に対する補正値を更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateTimeOffsetResult implements IResult {
	/** @var Account 更新したゲームプレイヤーアカウント */
	private $item;

	/**
	 * 更新したゲームプレイヤーアカウントを取得
	 *
	 * @return Account|null ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
	 */
	public function getItem(): ?Account {
		return $this->item;
	}

	/**
	 * 更新したゲームプレイヤーアカウントを設定
	 *
	 * @param Account|null $item ゲームプレイヤーアカウントの現在時刻に対する補正値を更新
	 */
	public function setItem(?Account $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateTimeOffsetResult {
        $result = new UpdateTimeOffsetResult();
        $result->setItem(isset($data["item"]) ? Account::fromJson($data["item"]) : null);
        return $result;
    }
}