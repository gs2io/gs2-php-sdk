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

namespace Gs2\Limit\Result;

use Gs2\Core\Model\IResult;
use Gs2\Limit\Model\Counter;

/**
 * カウンターを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCounterResult implements IResult {
	/** @var Counter カウンター */
	private $item;

	/**
	 * カウンターを取得
	 *
	 * @return Counter|null カウンターを取得
	 */
	public function getItem(): ?Counter {
		return $this->item;
	}

	/**
	 * カウンターを設定
	 *
	 * @param Counter|null $item カウンターを取得
	 */
	public function setItem(?Counter $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCounterResult {
        $result = new GetCounterResult();
        $result->setItem(isset($data["item"]) ? Counter::fromJson($data["item"]) : null);
        return $result;
    }
}