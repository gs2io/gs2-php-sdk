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

class GetEventResult implements IResult {
    /** @var Event */
    private $item;
    /** @var int */
    private $repeatCount;

	public function getItem(): ?Event {
		return $this->item;
	}

	public function setItem(?Event $item) {
		$this->item = $item;
	}

	public function withItem(?Event $item): GetEventResult {
		$this->item = $item;
		return $this;
	}

	public function getRepeatCount(): ?int {
		return $this->repeatCount;
	}

	public function setRepeatCount(?int $repeatCount) {
		$this->repeatCount = $repeatCount;
	}

	public function withRepeatCount(?int $repeatCount): GetEventResult {
		$this->repeatCount = $repeatCount;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventResult {
        if ($data === null) {
            return null;
        }
        return (new GetEventResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Event::fromJson($data['item']) : null)
            ->withRepeatCount(array_key_exists('repeatCount', $data) && $data['repeatCount'] !== null ? $data['repeatCount'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "repeatCount" => $this->getRepeatCount(),
        );
    }
}