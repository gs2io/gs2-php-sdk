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


class SimpleItem implements IModel {
	/**
     * @var string
	 */
	private $itemId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $itemName;
	/**
     * @var int
	 */
	private $count;
	public function getItemId(): ?string {
		return $this->itemId;
	}
	public function setItemId(?string $itemId) {
		$this->itemId = $itemId;
	}
	public function withItemId(?string $itemId): SimpleItem {
		$this->itemId = $itemId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SimpleItem {
		$this->userId = $userId;
		return $this;
	}
	public function getItemName(): ?string {
		return $this->itemName;
	}
	public function setItemName(?string $itemName) {
		$this->itemName = $itemName;
	}
	public function withItemName(?string $itemName): SimpleItem {
		$this->itemName = $itemName;
		return $this;
	}
	public function getCount(): ?int {
		return $this->count;
	}
	public function setCount(?int $count) {
		$this->count = $count;
	}
	public function withCount(?int $count): SimpleItem {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?SimpleItem {
        if ($data === null) {
            return null;
        }
        return (new SimpleItem())
            ->withItemId(array_key_exists('itemId', $data) && $data['itemId'] !== null ? $data['itemId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withItemName(array_key_exists('itemName', $data) && $data['itemName'] !== null ? $data['itemName'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "itemId" => $this->getItemId(),
            "userId" => $this->getUserId(),
            "itemName" => $this->getItemName(),
            "count" => $this->getCount(),
        );
    }
}