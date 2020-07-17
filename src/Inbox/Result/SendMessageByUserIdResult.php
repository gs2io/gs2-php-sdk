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
use Gs2\Inbox\Model\Message;

/**
 * メッセージを新規作成 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class SendMessageByUserIdResult implements IResult {
	/** @var Message 作成したメッセージ */
	private $item;

	/**
	 * 作成したメッセージを取得
	 *
	 * @return Message|null メッセージを新規作成
	 */
	public function getItem(): ?Message {
		return $this->item;
	}

	/**
	 * 作成したメッセージを設定
	 *
	 * @param Message|null $item メッセージを新規作成
	 */
	public function setItem(?Message $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): SendMessageByUserIdResult {
        $result = new SendMessageByUserIdResult();
        $result->setItem(isset($data["item"]) ? Message::fromJson($data["item"]) : null);
        return $result;
    }
}