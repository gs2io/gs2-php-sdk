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

namespace Gs2\Deploy\Result;

use Gs2\Core\Model\IResult;
use Gs2\Deploy\Model\Stack;

/**
 * スタックを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteStackResult implements IResult {
	/** @var Stack 削除したスタック */
	private $item;

	/**
	 * 削除したスタックを取得
	 *
	 * @return Stack|null スタックを削除
	 */
	public function getItem(): ?Stack {
		return $this->item;
	}

	/**
	 * 削除したスタックを設定
	 *
	 * @param Stack|null $item スタックを削除
	 */
	public function setItem(?Stack $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteStackResult {
        $result = new DeleteStackResult();
        $result->setItem(isset($data["item"]) ? Stack::fromJson($data["item"]) : null);
        return $result;
    }
}