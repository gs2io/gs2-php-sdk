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
use Gs2\Inbox\Model\Message;

/**
 * Result of openByStampTask: Execute opening a message as a consume action
 *
 * @see https://docs.gs2.io/api_reference/inbox/stamp_sheet/#gs2inboxopenmessagebyuserid
 */
class OpenByStampTaskResult implements IResult {
    /** @var Message Message */
    private $item;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Message|null Message */
	public function getItem(): ?Message {
		return $this->item;
	}

    /** @param Message|null $item Message */
	public function setItem(?Message $item) {
		$this->item = $item;
	}

    /**
     * @param Message|null $item Message
     * @return OpenByStampTaskResult
     */
	public function withItem(?Message $item): OpenByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return OpenByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): OpenByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?OpenByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new OpenByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Message::fromJson($data['item']) : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}