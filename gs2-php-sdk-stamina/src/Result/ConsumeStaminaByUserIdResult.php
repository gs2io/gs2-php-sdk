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
 * ユーザIDを指定してスタミナを消費 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ConsumeStaminaByUserIdResult implements IResult {
	/** @var Stamina スタミナ */
	private $item;

	/**
	 * スタミナを取得
	 *
	 * @return Stamina|null ユーザIDを指定してスタミナを消費
	 */
	public function getItem(): ?Stamina {
		return $this->item;
	}

	/**
	 * スタミナを設定
	 *
	 * @param Stamina|null $item ユーザIDを指定してスタミナを消費
	 */
	public function setItem(?Stamina $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): ConsumeStaminaByUserIdResult {
        $result = new ConsumeStaminaByUserIdResult();
        $result->setItem(isset($data["item"]) ? Stamina::fromJson($data["item"]) : null);
        return $result;
    }
}