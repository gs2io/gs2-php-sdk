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
 * 抽選の種類を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetLotteryModelResult implements IResult {
	/** @var LotteryModel 抽選の種類 */
	private $item;

	/**
	 * 抽選の種類を取得
	 *
	 * @return LotteryModel|null 抽選の種類を取得
	 */
	public function getItem(): ?LotteryModel {
		return $this->item;
	}

	/**
	 * 抽選の種類を設定
	 *
	 * @param LotteryModel|null $item 抽選の種類を取得
	 */
	public function setItem(?LotteryModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetLotteryModelResult {
        $result = new GetLotteryModelResult();
        $result->setItem(isset($data["item"]) ? LotteryModel::fromJson($data["item"]) : null);
        return $result;
    }
}