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
use Gs2\Friend\Model\FollowUser;

/**
 * ユーザーIDを指定してアンフォロー のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class UnfollowByUserIdResult implements IResult {
	/** @var FollowUser アンフォローしたユーザ */
	private $item;

	/**
	 * アンフォローしたユーザを取得
	 *
	 * @return FollowUser|null ユーザーIDを指定してアンフォロー
	 */
	public function getItem(): ?FollowUser {
		return $this->item;
	}

	/**
	 * アンフォローしたユーザを設定
	 *
	 * @param FollowUser|null $item ユーザーIDを指定してアンフォロー
	 */
	public function setItem(?FollowUser $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): UnfollowByUserIdResult {
        $result = new UnfollowByUserIdResult();
        $result->setItem(isset($data["item"]) ? FollowUser::fromJson($data["item"]) : null);
        return $result;
    }
}