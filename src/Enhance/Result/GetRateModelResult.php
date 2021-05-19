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

namespace Gs2\Enhance\Result;

use Gs2\Core\Model\IResult;
use Gs2\Enhance\Model\RateModel;

/**
 * 強化レートモデルを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRateModelResult implements IResult {
	/** @var RateModel 強化レートモデル */
	private $item;

	/**
	 * 強化レートモデルを取得
	 *
	 * @return RateModel|null 強化レートモデルを取得
	 */
	public function getItem(): ?RateModel {
		return $this->item;
	}

	/**
	 * 強化レートモデルを設定
	 *
	 * @param RateModel|null $item 強化レートモデルを取得
	 */
	public function setItem(?RateModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRateModelResult {
        $result = new GetRateModelResult();
        $result->setItem(isset($data["item"]) ? RateModel::fromJson($data["item"]) : null);
        return $result;
    }
}