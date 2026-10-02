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
 * Consumption quantity of Simple Item
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#consumecount
 */
class ConsumeCount implements IModel {
	/**
     * @var string Simple Item Model Name
	 */
	private $itemName;
	/**
     * @var int Consumption quantity
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
     * @return ConsumeCount
     */
	public function withItemName(?string $itemName): ConsumeCount {
		$this->itemName = $itemName;
		return $this;
	}
    /** @return int|null Consumption quantity */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Consumption quantity */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Consumption quantity
     * @return ConsumeCount
     */
	public function withCount(?int $count): ConsumeCount {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?ConsumeCount {
        if ($data === null) {
            return null;
        }
        return (new ConsumeCount())
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