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
 * フレンドリクエストを承諾 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class AcceptRequestResult implements IResult {
	/** @var FriendRequest 承諾したフレンドリクエスト */
	private $item;

	/**
	 * 承諾したフレンドリクエストを取得
	 *
	 * @return FriendRequest|null フレンドリクエストを承諾
	 */
	public function getItem(): ?FriendRequest {
		return $this->item;
	}

	/**
	 * 承諾したフレンドリクエストを設定
	 *
	 * @param FriendRequest|null $item フレンドリクエストを承諾
	 */
	public function setItem(?FriendRequest $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): AcceptRequestResult {
        $result = new AcceptRequestResult();
        $result->setItem(isset($data["item"]) ? FriendRequest::fromJson($data["item"]) : null);
        return $result;
    }
}