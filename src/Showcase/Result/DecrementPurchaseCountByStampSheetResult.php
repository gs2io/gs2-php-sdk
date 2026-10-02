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
 * Result of decrementPurchaseCountByStampSheet: Execute the subtraction of the number of purchases as an acquire action
 *
 * @see https://docs.gs2.io/api_reference/showcase/stamp_sheet/#gs2showcasedecrementpurchasecountbyuserid
 */
class DecrementPurchaseCountByStampSheetResult implements IResult {
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
     * @return DecrementPurchaseCountByStampSheetResult
     */
	public function withItem(?RandomDisplayItem $item): DecrementPurchaseCountByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?DecrementPurchaseCountByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new DecrementPurchaseCountByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? RandomDisplayItem::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}