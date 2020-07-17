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

namespace Gs2\Chat\Result;

use Gs2\Core\Model\IResult;
use Gs2\Chat\Model\Message;

/**
 * メッセージを削除 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteMessageResult implements IResult {
	/** @var Message 削除したメッセージ */
	private $item;

	/**
	 * 削除したメッセージを取得
	 *
	 * @return Message|null メッセージを削除
	 */
	public function getItem(): ?Message {
		return $this->item;
	}

	/**
	 * 削除したメッセージを設定
	 *
	 * @param Message|null $item メッセージを削除
	 */
	public function setItem(?Message $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): DeleteMessageResult {
        $result = new DeleteMessageResult();
        $result->setItem(isset($data["item"]) ? Message::fromJson($data["item"]) : null);
        return $result;
    }
}