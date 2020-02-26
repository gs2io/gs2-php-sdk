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

namespace Gs2\Friend\Result;

use Gs2\Core\Model\IResult;
use Gs2\Friend\Model\BlackList;

/**
 * ユーザーIDを指定してブラックリストからユーザを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UnregisterBlackListByUserIdResult implements IResult {
	/** @var BlackList ブラックリスト */
	private $item;

	/**
	 * ブラックリストを取得
	 *
	 * @return BlackList|null ユーザーIDを指定してブラックリストからユーザを削除
	 */
	public function getItem(): ?BlackList {
		return $this->item;
	}

	/**
	 * ブラックリストを設定
	 *
	 * @param BlackList|null $item ユーザーIDを指定してブラックリストからユーザを削除
	 */
	public function setItem(?BlackList $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UnregisterBlackListByUserIdResult {
        $result = new UnregisterBlackListByUserIdResult();
        $result->setItem(isset($data["item"]) ? BlackList::fromJson($data["item"]) : null);
        return $result;
    }
}