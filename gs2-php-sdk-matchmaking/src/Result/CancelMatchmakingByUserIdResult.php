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

namespace Gs2\Matchmaking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Matchmaking\Model\Gathering;

/**
 * ユーザIDを指定してマッチメイキングをキャンセルする のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CancelMatchmakingByUserIdResult implements IResult {
	/** @var Gathering ギャザリング */
	private $item;

	/**
	 * ギャザリングを取得
	 *
	 * @return Gathering|null ユーザIDを指定してマッチメイキングをキャンセルする
	 */
	public function getItem(): ?Gathering {
		return $this->item;
	}

	/**
	 * ギャザリングを設定
	 *
	 * @param Gathering|null $item ユーザIDを指定してマッチメイキングをキャンセルする
	 */
	public function setItem(?Gathering $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CancelMatchmakingByUserIdResult {
        $result = new CancelMatchmakingByUserIdResult();
        $result->setItem(isset($data["item"]) ? Gathering::fromJson($data["item"]) : null);
        return $result;
    }
}