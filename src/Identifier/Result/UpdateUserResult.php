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
use Gs2\Identifier\Model\User;

/**
 * ユーザを更新します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateUserResult implements IResult {
	/** @var User 更新後のユーザ */
	private $item;

	/**
	 * 更新後のユーザを取得
	 *
	 * @return User|null ユーザを更新します
	 */
	public function getItem(): ?User {
		return $this->item;
	}

	/**
	 * 更新後のユーザを設定
	 *
	 * @param User|null $item ユーザを更新します
	 */
	public function setItem(?User $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UpdateUserResult {
        $result = new UpdateUserResult();
        $result->setItem(isset($data["item"]) ? User::fromJson($data["item"]) : null);
        return $result;
    }
}