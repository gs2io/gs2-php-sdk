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

namespace Gs2\Friend\Result;

use Gs2\Core\Model\IResult;
use Gs2\Friend\Model\FriendRequest;

/**
 * Result of sendRequestByUserId: Send a friend request by User ID
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#sendrequestbyuserid
 */
class SendRequestByUserIdResult implements IResult {
    /** @var FriendRequest Sent Friend Request */
    private $item;

    /** @return FriendRequest|null Sent Friend Request */
	public function getItem(): ?FriendRequest {
		return $this->item;
	}

    /** @param FriendRequest|null $item Sent Friend Request */
	public function setItem(?FriendRequest $item) {
		$this->item = $item;
	}

    /**
     * @param FriendRequest|null $item Sent Friend Request
     * @return SendRequestByUserIdResult
     */
	public function withItem(?FriendRequest $item): SendRequestByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?SendRequestByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SendRequestByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? FriendRequest::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}