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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\VerifyAction;
use Gs2\Showcase\Model\ConsumeAction;
use Gs2\Showcase\Model\AcquireAction;
use Gs2\Showcase\Model\RandomDisplayItem;

/**
 * Result of decrementPurchaseCountByUserId: Decrement the number of times a Random Displayed Item has been purchased by specifying the user ID
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#decrementpurchasecountbyuserid
 */
class DecrementPurchaseCountByUserIdResult implements IResult {
    /** @var RandomDisplayItem Random Displayed Item after purchase counts are subtracted */
    private $item;

    /** @return RandomDisplayItem|null Random Displayed Item after purchase counts are subtracted */
	public function getItem(): ?RandomDisplayItem {
		return $this->item;
	}

    /** @param RandomDisplayItem|null $item Random Displayed Item after purchase counts are subtracted */
	public function setItem(?RandomDisplayItem $item) {
		$this->item = $item;
	}

    /**
     * @param RandomDisplayItem|null $item Random Displayed Item after purchase counts are subtracted
     * @return DecrementPurchaseCountByUserIdResult
     */
	public function withItem(?RandomDisplayItem $item): DecrementPurchaseCountByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DecrementPurchaseCountByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new DecrementPurchaseCountByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RandomDisplayItem::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}