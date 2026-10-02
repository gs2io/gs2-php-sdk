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
use Gs2\Inbox\Model\AcquireAction;
use Gs2\Inbox\Model\TimeSpan;
use Gs2\Inbox\Model\GlobalMessage;

/**
 * Result of getGlobalMessage: Get a message for all users
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#getglobalmessage
 */
class GetGlobalMessageResult implements IResult {
    /** @var GlobalMessage Message to all users */
    private $item;

    /** @return GlobalMessage|null Message to all users */
	public function getItem(): ?GlobalMessage {
		return $this->item;
	}

    /** @param GlobalMessage|null $item Message to all users */
	public function setItem(?GlobalMessage $item) {
		$this->item = $item;
	}

    /**
     * @param GlobalMessage|null $item Message to all users
     * @return GetGlobalMessageResult
     */
	public function withItem(?GlobalMessage $item): GetGlobalMessageResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetGlobalMessageResult {
        if ($data === null) {
            return null;
        }
        return (new GetGlobalMessageResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? GlobalMessage::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}