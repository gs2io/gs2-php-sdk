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
use Gs2\Friend\Model\FriendUser;

/**
 * ユーザーIDを指定してフレンドを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteFriendByUserIdResult implements IResult {
	/** @var FriendUser フレンドのユーザー */
	private $item;

	/**
	 * フレンドのユーザーを取得
	 *
	 * @return FriendUser|null ユーザーIDを指定してフレンドを取得
	 */
	public function getItem(): ?FriendUser {
		return $this->item;
	}

	/**
	 * フレンドのユーザーを設定
	 *
	 * @param FriendUser|null $item ユーザーIDを指定してフレンドを取得
	 */
	public function setItem(?FriendUser $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteFriendByUserIdResult {
        $result = new DeleteFriendByUserIdResult();
        $result->setItem(isset($data["item"]) ? FriendUser::fromJson($data["item"]) : null);
        return $result;
    }
}