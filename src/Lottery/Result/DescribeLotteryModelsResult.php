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

namespace Gs2\Lottery\Result;

use Gs2\Core\Model\IResult;
use Gs2\Lottery\Model\LotteryModel;

/**
 * 抽選の種類の一覧を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeLotteryModelsResult implements IResult {
	/** @var LotteryModel[] 抽選の種類のリスト */
	private $items;

	/**
	 * 抽選の種類のリストを取得
	 *
	 * @return LotteryModel[]|null 抽選の種類の一覧を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 抽選の種類のリストを設定
	 *
	 * @param LotteryModel[]|null $items 抽選の種類の一覧を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeLotteryModelsResult {
        $result = new DescribeLotteryModelsResult();
        $result->setItems(array_map(
                function ($v) {
                    return LotteryModel::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}