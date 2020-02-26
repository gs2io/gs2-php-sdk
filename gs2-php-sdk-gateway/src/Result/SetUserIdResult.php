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

namespace Gs2\Gateway\Result;

use Gs2\Core\Model\IResult;
use Gs2\Gateway\Model\WebSocketSession;

/**
 * WebsocketセッションにユーザIDを設定 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class SetUserIdResult implements IResult {
	/** @var WebSocketSession 更新したWebsocketセッション */
	private $item;

	/**
	 * 更新したWebsocketセッションを取得
	 *
	 * @return WebSocketSession|null WebsocketセッションにユーザIDを設定
	 */
	public function getItem(): ?WebSocketSession {
		return $this->item;
	}

	/**
	 * 更新したWebsocketセッションを設定
	 *
	 * @param WebSocketSession|null $item WebsocketセッションにユーザIDを設定
	 */
	public function setItem(?WebSocketSession $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): SetUserIdResult {
        $result = new SetUserIdResult();
        $result->setItem(isset($data["item"]) ? WebSocketSession::fromJson($data["item"]) : null);
        return $result;
    }
}