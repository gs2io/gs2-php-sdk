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
use Gs2\Inbox\Model\GlobalMessage;

/**
 * 全ユーザに向けたメッセージを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetGlobalMessageResult implements IResult {
	/** @var GlobalMessage 全ユーザに向けたメッセージ */
	private $item;

	/**
	 * 全ユーザに向けたメッセージを取得
	 *
	 * @return GlobalMessage|null 全ユーザに向けたメッセージを取得
	 */
	public function getItem(): ?GlobalMessage {
		return $this->item;
	}

	/**
	 * 全ユーザに向けたメッセージを設定
	 *
	 * @param GlobalMessage|null $item 全ユーザに向けたメッセージを取得
	 */
	public function setItem(?GlobalMessage $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetGlobalMessageResult {
        $result = new GetGlobalMessageResult();
        $result->setItem(isset($data["item"]) ? GlobalMessage::fromJson($data["item"]) : null);
        return $result;
    }
}