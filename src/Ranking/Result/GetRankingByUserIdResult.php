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

namespace Gs2\Ranking\Result;

use Gs2\Core\Model\IResult;
use Gs2\Ranking\Model\Ranking;

/**
 * ランキングを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRankingByUserIdResult implements IResult {
	/** @var Ranking ランキング */
	private $item;

	/**
	 * ランキングを取得
	 *
	 * @return Ranking|null ランキングを取得
	 */
	public function getItem(): ?Ranking {
		return $this->item;
	}

	/**
	 * ランキングを設定
	 *
	 * @param Ranking|null $item ランキングを取得
	 */
	public function setItem(?Ranking $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRankingByUserIdResult {
        $result = new GetRankingByUserIdResult();
        $result->setItem(isset($data["item"]) ? Ranking::fromJson($data["item"]) : null);
        return $result;
    }
}