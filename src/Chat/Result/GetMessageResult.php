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
 * メッセージを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetMessageResult implements IResult {
	/** @var Message メッセージ */
	private $item;

	/**
	 * メッセージを取得
	 *
	 * @return Message|null メッセージを取得
	 */
	public function getItem(): ?Message {
		return $this->item;
	}

	/**
	 * メッセージを設定
	 *
	 * @param Message|null $item メッセージを取得
	 */
	public function setItem(?Message $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetMessageResult {
        $result = new GetMessageResult();
        $result->setItem(isset($data["item"]) ? Message::fromJson($data["item"]) : null);
        return $result;
    }
}