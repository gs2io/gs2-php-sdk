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
 * レーティングモデルの一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeRatingModelsResult implements IResult {
	/** @var RatingModel[] レーティングモデルのリスト */
	private $items;

	/**
	 * レーティングモデルのリストを取得
	 *
	 * @return RatingModel[]|null レーティングモデルの一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * レーティングモデルのリストを設定
	 *
	 * @param RatingModel[]|null $items レーティングモデルの一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeRatingModelsResult {
        $result = new DescribeRatingModelsResult();
        $result->setItems(array_map(
                function ($v) {
                    return RatingModel::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}