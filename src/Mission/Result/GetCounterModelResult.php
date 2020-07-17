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

namespace Gs2\Mission\Result;

use Gs2\Core\Model\IResult;
use Gs2\Mission\Model\CounterModel;

/**
 * カウンターの種類を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCounterModelResult implements IResult {
	/** @var CounterModel カウンターの種類 */
	private $item;

	/**
	 * カウンターの種類を取得
	 *
	 * @return CounterModel|null カウンターの種類を取得
	 */
	public function getItem(): ?CounterModel {
		return $this->item;
	}

	/**
	 * カウンターの種類を設定
	 *
	 * @param CounterModel|null $item カウンターの種類を取得
	 */
	public function setItem(?CounterModel $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCounterModelResult {
        $result = new GetCounterModelResult();
        $result->setItem(isset($data["item"]) ? CounterModel::fromJson($data["item"]) : null);
        return $result;
    }
}