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
use Gs2\Matchmaking\Model\RatingModel;

/**
 * レーティングモデルを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRatingModelResult implements IResult {
	/** @var RatingModel レーティングモデル */
	private $item;

	/**
	 * レーティングモデルを取得
	 *
	 * @return RatingModel|null レーティングモデルを取得
	 */
	public function getItem(): ?RatingModel {
		return $this->item;
	}

	/**
	 * レーティングモデルを設定
	 *
	 * @param RatingModel|null $item レーティングモデルを取得
	 */
	public function setItem(?RatingModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRatingModelResult {
        $result = new GetRatingModelResult();
        $result->setItem(isset($data["item"]) ? RatingModel::fromJson($data["item"]) : null);
        return $result;
    }
}