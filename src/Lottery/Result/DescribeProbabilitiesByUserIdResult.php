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
use Gs2\Lottery\Model\Probability;

/**
 * 排出確率を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeProbabilitiesByUserIdResult implements IResult {
	/** @var Probability[] 景品の当選確率リスト */
	private $items;

	/**
	 * 景品の当選確率リストを取得
	 *
	 * @return Probability[]|null 排出確率を取得
	 */
	public function getItems(): ?array {
		return $this->items;
	}

	/**
	 * 景品の当選確率リストを設定
	 *
	 * @param Probability[]|null $items 排出確率を取得
	 */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    public static function fromJson(array $data): DescribeProbabilitiesByUserIdResult {
        $result = new DescribeProbabilitiesByUserIdResult();
        $result->setItems(array_map(
                function ($v) {
                    return Probability::fromJson($v);
                },
                isset($data["items"]) ? $data["items"] : []
            )
        );
        return $result;
    }
}