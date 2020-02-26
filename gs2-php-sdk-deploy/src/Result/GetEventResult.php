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

namespace Gs2\Deploy\Result;

use Gs2\Core\Model\IResult;
use Gs2\Deploy\Model\Event;

/**
 * 発生したイベントを取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEventResult implements IResult {
	/** @var Event 発生したイベント */
	private $item;

	/**
	 * 発生したイベントを取得
	 *
	 * @return Event|null 発生したイベントを取得
	 */
	public function getItem(): ?Event {
		return $this->item;
	}

	/**
	 * 発生したイベントを設定
	 *
	 * @param Event|null $item 発生したイベントを取得
	 */
	public function setItem(?Event $item) {
		$this->item = $item;
	}

    public static function fromJson(array $data): GetEventResult {
        $result = new GetEventResult();
        $result->setItem(isset($data["item"]) ? Event::fromJson($data["item"]) : null);
        return $result;
    }
}