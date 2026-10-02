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

namespace Gs2\Inventory\Model;

use Gs2\Core\Model\IModel;


/**
 * Quantity of Simple Items in possession
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#heldcount
 */
class HeldCount implements IModel {
	/**
     * @var string Simple Item Model Name
	 */
	private $itemName;
	/**
     * @var int Number of items held
	 */
	private $count;
    /** @return string|null Simple Item Model Name */
	public function getItemName(): ?string {
		return $this->itemName;
	}
    /** @param string|null $itemName Simple Item Model Name */
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
    /**
     * @param string|null $itemName Simple Item Model Name
     * @return HeldCount
     */
	public function withItemName(?string $itemName): HeldCount {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return int|null Number of items held */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Number of items held */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Number of items held
     * @return HeldCount
     */
	public function withCount(?int $count): HeldCount {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?HeldCount {
        if ($data === null) {
            return null;
        }
        return (new HeldCount())
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "itemName" => $this->getItemName(),
            "count" => $this->getCount(),
        );
    }
}