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

namespace Gs2\Identifier\Result;

use Gs2\Core\Model\IResult;
use Gs2\Identifier\Model\Password;

/**
 * パスワードを新規作成します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class CreatePasswordResult implements IResult {
	/** @var Password 作成したパスワード */
	private $item;

	/**
	 * 作成したパスワードを取得
	 *
	 * @return Password|null パスワードを新規作成します
	 */
	public function getItem(): ?Password {
		return $this->item;
	}

	/**
	 * 作成したパスワードを設定
	 *
	 * @param Password|null $item パスワードを新規作成します
	 */
	public function setItem(?Password $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): CreatePasswordResult {
        $result = new CreatePasswordResult();
        $result->setItem(isset($data["item"]) ? Password::fromJson($data["item"]) : null);
        return $result;
    }
}