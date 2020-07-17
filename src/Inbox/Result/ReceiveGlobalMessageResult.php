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
 * グローバルメッセージのうちまだ受け取っていないメッセージを受信 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class ReceiveGlobalMessageResult implements IResult {
	/** @var Message[] 受信したメッセージ一覧 */
	private $item;

	/**
	 * 受信したメッセージ一覧を取得
	 *
	 * @return Message[]|null グローバルメッセージのうちまだ受け取っていないメッセージを受信
	 */
	public function getItem(): ?array {
		return $this->item;
	}

	/**
	 * 受信したメッセージ一覧を設定
	 *
	 * @param Message[]|null $item グローバルメッセージのうちまだ受け取っていないメッセージを受信
	 */
	public function setItem(?array $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): ReceiveGlobalMessageResult {
        $result = new ReceiveGlobalMessageResult();
        $result->setItem(array_map(
                function ($v) {
                    return Message::fromJson($v);
                },
                isset($data["item"]) ? $data["item"] : []
            )
        );
        return $result;
    }
}