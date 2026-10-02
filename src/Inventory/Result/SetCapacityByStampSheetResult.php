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

namespace Gs2\Inventory\Result;

use Gs2\Core\Model\IResult;
use Gs2\Inventory\Model\Inventory;

/**
 * Result of setCapacityByStampSheet: Execute inventory capacity size setting as acquire action
 *
 * @see https://docs.gs2.io/api_reference/inventory/stamp_sheet/#gs2inventorysetcapacitybyuserid
 */
class SetCapacityByStampSheetResult implements IResult {
    /** @var Inventory Inventory after update */
    private $item;

    /** @return Inventory|null Inventory after update */
	public function getItem(): ?Inventory {
		return $this->item;
	}

    /** @param Inventory|null $item Inventory after update */
	public function setItem(?Inventory $item) {
		$this->item = $item;
	}

    /**
     * @param Inventory|null $item Inventory after update
     * @return SetCapacityByStampSheetResult
     */
	public function withItem(?Inventory $item): SetCapacityByStampSheetResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?SetCapacityByStampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new SetCapacityByStampSheetResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Inventory::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}