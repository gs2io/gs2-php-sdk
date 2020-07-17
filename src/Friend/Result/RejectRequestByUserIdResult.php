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
use Gs2\Friend\Model\FriendRequest;

/**
 * ユーザーIDを指定してフレンドリクエストを拒否 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class RejectRequestByUserIdResult implements IResult {
	/** @var FriendRequest 拒否したフレンドリクエスト */
	private $item;

	/**
	 * 拒否したフレンドリクエストを取得
	 *
	 * @return FriendRequest|null ユーザーIDを指定してフレンドリクエストを拒否
	 */
	public function getItem(): ?FriendRequest {
		return $this->item;
	}

	/**
	 * 拒否したフレンドリクエストを設定
	 *
	 * @param FriendRequest|null $item ユーザーIDを指定してフレンドリクエストを拒否
	 */
	public function setItem(?FriendRequest $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): RejectRequestByUserIdResult {
        $result = new RejectRequestByUserIdResult();
        $result->setItem(isset($data["item"]) ? FriendRequest::fromJson($data["item"]) : null);
        return $result;
    }
}