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

namespace Gs2\Dictionary\Result;

use Gs2\Core\Model\IResult;
use Gs2\Dictionary\Model\Entry;

/**
 * エントリーを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEntryResult implements IResult {
	/** @var Entry エントリー */
	private $item;

	/**
	 * エントリーを取得
	 *
	 * @return Entry|null エントリーを取得
	 */
	public function getItem(): ?Entry {
		return $this->item;
	}

	/**
	 * エントリーを設定
	 *
	 * @param Entry|null $item エントリーを取得
	 */
	public function setItem(?Entry $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetEntryResult {
        $result = new GetEntryResult();
        $result->setItem(isset($data["item"]) ? Entry::fromJson($data["item"]) : null);
        return $result;
    }
}