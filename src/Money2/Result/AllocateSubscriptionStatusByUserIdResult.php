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

namespace Gs2\Money2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money2\Model\SubscribeTransaction;
use Gs2\Money2\Model\SubscriptionStatus;

/**
 * Result of allocateSubscriptionStatusByUserId: Allocate subscription status by User ID from receipt
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#allocatesubscriptionstatusbyuserid
 */
class AllocateSubscriptionStatusByUserIdResult implements IResult {
    /** @var SubscriptionStatus Subscription status */
    private $item;

    /** @return SubscriptionStatus|null Subscription status */
	public function getItem(): ?SubscriptionStatus {
		return $this->item;
	}

    /** @param SubscriptionStatus|null $item Subscription status */
	public function setItem(?SubscriptionStatus $item) {
		$this->item = $item;
	}

    /**
     * @param SubscriptionStatus|null $item Subscription status
     * @return AllocateSubscriptionStatusByUserIdResult
     */
	public function withItem(?SubscriptionStatus $item): AllocateSubscriptionStatusByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?AllocateSubscriptionStatusByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new AllocateSubscriptionStatusByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? SubscriptionStatus::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}