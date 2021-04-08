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

namespace Gs2\Exchange\Result;

use Gs2\Core\Model\IResult;
use Gs2\Exchange\Model\Await;

/**
 * 交換待機を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetAwaitByUserIdResult implements IResult {
	/** @var Await 交換待機 */
	private $item;

	/**
	 * 交換待機を取得
	 *
	 * @return Await|null 交換待機を取得
	 */
	public function getItem(): ?Await {
		return $this->item;
	}

	/**
	 * 交換待機を設定
	 *
	 * @param Await|null $item 交換待機を取得
	 */
	public function setItem(?Await $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetAwaitByUserIdResult {
        $result = new GetAwaitByUserIdResult();
        $result->setItem(isset($data["item"]) ? Await::fromJson($data["item"]) : null);
        return $result;
    }
}