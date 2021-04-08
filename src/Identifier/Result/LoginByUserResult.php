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
use Gs2\Identifier\Model\ProjectToken;

/**
 * プロジェクトトークン を取得します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class LoginByUserResult implements IResult {
	/** @var ProjectToken プロジェクトトークン */
	private $item;

	/**
	 * プロジェクトトークンを取得
	 *
	 * @return ProjectToken|null プロジェクトトークン を取得します
	 */
	public function getItem(): ?ProjectToken {
		return $this->item;
	}

	/**
	 * プロジェクトトークンを設定
	 *
	 * @param ProjectToken|null $item プロジェクトトークン を取得します
	 */
	public function setItem(?ProjectToken $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): LoginByUserResult {
        $result = new LoginByUserResult();
        $result->setItem(isset($data["item"]) ? ProjectToken::fromJson($data["item"]) : null);
        return $result;
    }
}