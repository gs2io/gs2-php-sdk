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
 * Result of setCapacityByUserId: Set inventory capacity size by User ID
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#setcapacitybyuserid
 */
class SetCapacityByUserIdResult implements IResult {
    /** @var Inventory Inventory after update */
    private $item;
    /** @var Inventory Inventory before update */
    private $old;

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
     * @return SetCapacityByUserIdResult
     */
	public function withItem(?Inventory $item): SetCapacityByUserIdResult {
		$this->item = $item;
		return $this;
	}

    /** @return Inventory|null Inventory before update */
	public function getOld(): ?Inventory {
		return $this->old;
	}

    /** @param Inventory|null $old Inventory before update */
	public function setOld(?Inventory $old) {
		$this->old = $old;
	}

    /**
     * @param Inventory|null $old Inventory before update
     * @return SetCapacityByUserIdResult
     */
	public function withOld(?Inventory $old): SetCapacityByUserIdResult {
		$this->old = $old;
		return $this;
	}

    public static function fromJson(?array $data): ?SetCapacityByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new SetCapacityByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Inventory::fromJson($data['item']) : null)
            ->withOld(array_key_exists('old', $data) && $data['old'] !== null ? Inventory::fromJson($data['old']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "old" => $this->getOld() !== null ? $this->getOld()->toJson() : null,
        );
    }
}