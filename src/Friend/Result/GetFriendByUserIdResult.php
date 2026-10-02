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
use Gs2\Friend\Model\FriendUser;

/**
 * Result of getFriendByUserId: Get a friend by User ID
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#getfriendbyuserid
 */
class GetFriendByUserIdResult implements IResult {
    /** @var FriendUser Friend */
    private $item;

    /** @return FriendUser|null Friend */
	public function getItem(): ?FriendUser {
		return $this->item;
	}

    /** @param FriendUser|null $item Friend */
	public function setItem(?FriendUser $item) {
		$this->item = $item;
	}

    /**
     * @param FriendUser|null $item Friend
     * @return GetFriendByUserIdResult
     */
	public function withItem(?FriendUser $item): GetFriendByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetFriendByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetFriendByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? FriendUser::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}