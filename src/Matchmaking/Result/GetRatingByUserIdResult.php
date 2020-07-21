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
use Gs2\Matchmaking\Model\Rating;

/**
 * レーティングを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRatingByUserIdResult implements IResult {
	/** @var Rating レーティング */
	private $item;

	/**
	 * レーティングを取得
	 *
	 * @return Rating|null レーティングを取得
	 */
	public function getItem(): ?Rating {
		return $this->item;
	}

	/**
	 * レーティングを設定
	 *
	 * @param Rating|null $item レーティングを取得
	 */
	public function setItem(?Rating $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRatingByUserIdResult {
        $result = new GetRatingByUserIdResult();
        $result->setItem(isset($data["item"]) ? Rating::fromJson($data["item"]) : null);
        return $result;
    }
}