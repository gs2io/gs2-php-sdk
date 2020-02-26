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
 * カウンターを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteCounterByUserIdResult implements IResult {
	/** @var Counter 削除したカウンター */
	private $item;

	/**
	 * 削除したカウンターを取得
	 *
	 * @return Counter|null カウンターを削除
	 */
	public function getItem(): ?Counter {
		return $this->item;
	}

	/**
	 * 削除したカウンターを設定
	 *
	 * @param Counter|null $item カウンターを削除
	 */
	public function setItem(?Counter $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteCounterByUserIdResult {
        $result = new DeleteCounterByUserIdResult();
        $result->setItem(isset($data["item"]) ? Counter::fromJson($data["item"]) : null);
        return $result;
    }
}