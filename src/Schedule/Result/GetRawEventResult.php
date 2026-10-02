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
use Gs2\Schedule\Model\RepeatSetting;
use Gs2\Schedule\Model\Event;

/**
 * Result of getRawEvent: Get Event
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#getrawevent
 */
class GetRawEventResult implements IResult {
    /** @var Event Event */
    private $item;

    /** @return Event|null Event */
	public function getItem(): ?Event {
		return $this->item;
	}

    /** @param Event|null $item Event */
	public function setItem(?Event $item) {
		$this->item = $item;
	}

    /**
     * @param Event|null $item Event
     * @return GetRawEventResult
     */
	public function withItem(?Event $item): GetRawEventResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetRawEventResult {
        if ($data === null) {
            return null;
        }
        return (new GetRawEventResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Event::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}