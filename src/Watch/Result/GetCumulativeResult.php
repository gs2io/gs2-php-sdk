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
use Gs2\Watch\Model\Cumulative;

/**
 * 累積値を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCumulativeResult implements IResult {
	/** @var Cumulative 累積値 */
	private $item;

	/**
	 * 累積値を取得
	 *
	 * @return Cumulative|null 累積値を取得
	 */
	public function getItem(): ?Cumulative {
		return $this->item;
	}

	/**
	 * 累積値を設定
	 *
	 * @param Cumulative|null $item 累積値を取得
	 */
	public function setItem(?Cumulative $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCumulativeResult {
        $result = new GetCumulativeResult();
        $result->setItem(isset($data["item"]) ? Cumulative::fromJson($data["item"]) : null);
        return $result;
    }
}