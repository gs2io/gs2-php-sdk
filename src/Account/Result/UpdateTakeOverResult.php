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
use Gs2\Account\Model\TakeOver;

/**
 * 引き継ぎ設定を更新 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateTakeOverResult implements IResult {
	/** @var TakeOver 引き継ぎ設定 */
	private $item;

	/**
	 * 引き継ぎ設定を取得
	 *
	 * @return TakeOver|null 引き継ぎ設定を更新
	 */
	public function getItem(): ?TakeOver {
		return $this->item;
	}

	/**
	 * 引き継ぎ設定を設定
	 *
	 * @param TakeOver|null $item 引き継ぎ設定を更新
	 */
	public function setItem(?TakeOver $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateTakeOverResult {
        $result = new UpdateTakeOverResult();
        $result->setItem(isset($data["item"]) ? TakeOver::fromJson($data["item"]) : null);
        return $result;
    }
}