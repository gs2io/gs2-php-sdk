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

namespace Gs2\Schedule\Result;

use Gs2\Core\Model\IResult;
use Gs2\Schedule\Model\Event;

/**
 * イベントを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRawEventResult implements IResult {
	/** @var Event イベント */
	private $item;

	/**
	 * イベントを取得
	 *
	 * @return Event|null イベントを取得
	 */
	public function getItem(): ?Event {
		return $this->item;
	}

	/**
	 * イベントを設定
	 *
	 * @param Event|null $item イベントを取得
	 */
	public function setItem(?Event $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetRawEventResult {
        $result = new GetRawEventResult();
        $result->setItem(isset($data["item"]) ? Event::fromJson($data["item"]) : null);
        return $result;
    }
}