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

namespace Gs2\Stamina\Result;

use Gs2\Core\Model\IResult;
use Gs2\Stamina\Model\Stamina;

/**
 * ユーザIDを指定してスタミナを回復 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class RecoverStaminaByUserIdResult implements IResult {
	/** @var Stamina スタミナ */
	private $item;
	/** @var int スタミナ値の上限を超えて受け取れずに GS2-Inbox に転送したスタミナ値 */
	private $overflowValue;

	/**
	 * スタミナを取得
	 *
	 * @return Stamina|null ユーザIDを指定してスタミナを回復
	 */
	public function getItem(): ?Stamina {
		return $this->item;
	}

	/**
	 * スタミナを設定
	 *
	 * @param Stamina|null $item ユーザIDを指定してスタミナを回復
	 */
	public function setItem(?Stamina $item) {
		$this->item = $item;
	}

	/**
	 * スタミナ値の上限を超えて受け取れずに GS2-Inbox に転送したスタミナ値を取得
	 *
	 * @return int|null ユーザIDを指定してスタミナを回復
	 */
	public function getOverflowValue(): ?int {
		return $this->overflowValue;
	}

	/**
	 * スタミナ値の上限を超えて受け取れずに GS2-Inbox に転送したスタミナ値を設定
	 *
	 * @param int|null $overflowValue ユーザIDを指定してスタミナを回復
	 */
	public function setOverflowValue(?int $overflowValue) {
		$this->overflowValue = $overflowValue;
	}

    public static function fromJson(array $data): RecoverStaminaByUserIdResult {
        $result = new RecoverStaminaByUserIdResult();
        $result->setItem(isset($data["item"]) ? Stamina::fromJson($data["item"]) : null);
        $result->setOverflowValue(isset($data["overflowValue"]) ? $data["overflowValue"] : null);
        return $result;
    }
}