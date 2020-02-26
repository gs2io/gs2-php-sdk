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
use Gs2\Mission\Model\Complete;

/**
 * 達成状況を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetCompleteResult implements IResult {
	/** @var Complete 達成状況 */
	private $item;

	/**
	 * 達成状況を取得
	 *
	 * @return Complete|null 達成状況を取得
	 */
	public function getItem(): ?Complete {
		return $this->item;
	}

	/**
	 * 達成状況を設定
	 *
	 * @param Complete|null $item 達成状況を取得
	 */
	public function setItem(?Complete $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetCompleteResult {
        $result = new GetCompleteResult();
        $result->setItem(isset($data["item"]) ? Complete::fromJson($data["item"]) : null);
        return $result;
    }
}