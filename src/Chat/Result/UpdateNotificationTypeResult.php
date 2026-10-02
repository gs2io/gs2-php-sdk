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

namespace Gs2\Chat\Result;

use Gs2\Core\Model\IResult;
use Gs2\Chat\Model\NotificationType;
use Gs2\Chat\Model\Subscribe;

/**
 * Result of updateNotificationType: Update notification methods
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#updatenotificationtype
 */
class UpdateNotificationTypeResult implements IResult {
    /** @var Subscribe Updated Subscription */
    private $item;

    /** @return Subscribe|null Updated Subscription */
	public function getItem(): ?Subscribe {
		return $this->item;
	}

    /** @param Subscribe|null $item Updated Subscription */
	public function setItem(?Subscribe $item) {
		$this->item = $item;
	}

    /**
     * @param Subscribe|null $item Updated Subscription
     * @return UpdateNotificationTypeResult
     */
	public function withItem(?Subscribe $item): UpdateNotificationTypeResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNotificationTypeResult {
        if ($data === null) {
            return null;
        }
        return (new UpdateNotificationTypeResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Subscribe::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}