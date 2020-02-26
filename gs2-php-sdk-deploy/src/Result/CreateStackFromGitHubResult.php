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
 * スタックを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateStackFromGitHubResult implements IResult {
	/** @var Stack 作成したスタック */
	private $item;

	/**
	 * 作成したスタックを取得
	 *
	 * @return Stack|null スタックを新規作成
	 */
	public function getItem(): ?Stack {
		return $this->item;
	}

	/**
	 * 作成したスタックを設定
	 *
	 * @param Stack|null $item スタックを新規作成
	 */
	public function setItem(?Stack $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreateStackFromGitHubResult {
        $result = new CreateStackFromGitHubResult();
        $result->setItem(isset($data["item"]) ? Stack::fromJson($data["item"]) : null);
        return $result;
    }
}