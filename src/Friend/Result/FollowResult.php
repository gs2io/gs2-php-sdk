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
 * フォロー のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class FollowResult implements IResult {
	/** @var FollowUser フォローしたユーザ */
	private $item;

	/**
	 * フォローしたユーザを取得
	 *
	 * @return FollowUser|null フォロー
	 */
	public function getItem(): ?FollowUser {
		return $this->item;
	}

	/**
	 * フォローしたユーザを設定
	 *
	 * @param FollowUser|null $item フォロー
	 */
	public function setItem(?FollowUser $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): FollowResult {
        $result = new FollowResult();
        $result->setItem(isset($data["item"]) ? FollowUser::fromJson($data["item"]) : null);
        return $result;
    }
}