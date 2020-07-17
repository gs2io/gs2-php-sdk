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
use Gs2\Lottery\Model\BoxItems;

/**
 * ボックスを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetBoxResult implements IResult {
	/** @var BoxItems ボックスから取り出したアイテムのリスト */
	private $item;

	/**
	 * ボックスから取り出したアイテムのリストを取得
	 *
	 * @return BoxItems|null ボックスを取得
	 */
	public function getItem(): ?BoxItems {
		return $this->item;
	}

	/**
	 * ボックスから取り出したアイテムのリストを設定
	 *
	 * @param BoxItems|null $item ボックスを取得
	 */
	public function setItem(?BoxItems $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetBoxResult {
        $result = new GetBoxResult();
        $result->setItem(isset($data["item"]) ? BoxItems::fromJson($data["item"]) : null);
        return $result;
    }
}