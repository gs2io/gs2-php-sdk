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

namespace Gs2\Inbox\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inbox\Model\Received;

/**
 * ユーザーIDを指定して受信済みグローバルメッセージ名を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetReceivedByUserIdResult implements IResult {
	/** @var Received 受信済みグローバルメッセージ名 */
	private $item;

	/**
	 * 受信済みグローバルメッセージ名を取得
	 *
	 * @return Received|null ユーザーIDを指定して受信済みグローバルメッセージ名を取得
	 */
	public function getItem(): ?Received {
		return $this->item;
	}

	/**
	 * 受信済みグローバルメッセージ名を設定
	 *
	 * @param Received|null $item ユーザーIDを指定して受信済みグローバルメッセージ名を取得
	 */
	public function setItem(?Received $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetReceivedByUserIdResult {
        $result = new GetReceivedByUserIdResult();
        $result->setItem(isset($data["item"]) ? Received::fromJson($data["item"]) : null);
        return $result;
    }
}