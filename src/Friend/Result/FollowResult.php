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
use Gs2\Friend\Model\FollowUser;

/**
 * Result of follow: Follow a user
 *
 * @see https://docs.gs2.io/api_reference/friend/sdk/#follow-1
 */
class FollowResult implements IResult {
    /** @var FollowUser Followed user */
    private $item;

    /** @return FollowUser|null Followed user */
	public function getItem(): ?FollowUser {
		return $this->item;
	}

    /** @param FollowUser|null $item Followed user */
	public function setItem(?FollowUser $item) {
		$this->item = $item;
	}

    /**
     * @param FollowUser|null $item Followed user
     * @return FollowResult
     */
	public function withItem(?FollowUser $item): FollowResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?FollowResult {
        if ($data === null) {
            return null;
        }
        return (new FollowResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? FollowUser::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}