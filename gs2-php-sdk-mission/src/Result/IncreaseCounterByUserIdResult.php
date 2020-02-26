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
use Gs2\Mission\Model\Counter;

/**
 * カウンターに加算 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class IncreaseCounterByUserIdResult implements IResult {
	/** @var Counter 作成したカウンター */
	private $item;

	/**
	 * 作成したカウンターを取得
	 *
	 * @return Counter|null カウンターに加算
	 */
	public function getItem(): ?Counter {
		return $this->item;
	}

	/**
	 * 作成したカウンターを設定
	 *
	 * @param Counter|null $item カウンターに加算
	 */
	public function setItem(?Counter $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): IncreaseCounterByUserIdResult {
        $result = new IncreaseCounterByUserIdResult();
        $result->setItem(isset($data["item"]) ? Counter::fromJson($data["item"]) : null);
        return $result;
    }
}