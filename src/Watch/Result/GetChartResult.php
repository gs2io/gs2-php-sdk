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

namespace Gs2\Watch\Result;

use Gs2\Core\Model\IResult;
use Gs2\Watch\Model\Chart;

/**
 * チャートを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetChartResult implements IResult {
	/** @var Chart チャート */
	private $item;

	/**
	 * チャートを取得
	 *
	 * @return Chart|null チャートを取得
	 */
	public function getItem(): ?Chart {
		return $this->item;
	}

	/**
	 * チャートを設定
	 *
	 * @param Chart|null $item チャートを取得
	 */
	public function setItem(?Chart $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetChartResult {
        $result = new GetChartResult();
        $result->setItem(isset($data["item"]) ? Chart::fromJson($data["item"]) : null);
        return $result;
    }
}