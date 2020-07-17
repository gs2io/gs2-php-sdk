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

namespace Gs2\Chat\Result;

use Gs2\Core\Model\IResult;
use Gs2\Chat\Model\Subscribe;

/**
 * ユーザIDを指定して購読の購読を解除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UnsubscribeByUserIdResult implements IResult {
	/** @var Subscribe 解除した購読 */
	private $item;

	/**
	 * 解除した購読を取得
	 *
	 * @return Subscribe|null ユーザIDを指定して購読の購読を解除
	 */
	public function getItem(): ?Subscribe {
		return $this->item;
	}

	/**
	 * 解除した購読を設定
	 *
	 * @param Subscribe|null $item ユーザIDを指定して購読の購読を解除
	 */
	public function setItem(?Subscribe $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UnsubscribeByUserIdResult {
        $result = new UnsubscribeByUserIdResult();
        $result->setItem(isset($data["item"]) ? Subscribe::fromJson($data["item"]) : null);
        return $result;
    }
}