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


class BigInventory implements IModel {
	/**
     * @var string
	 */
	private $inventoryId;
	/**
     * @var string
	 */
	private $inventoryName;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $bigItems;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getInventoryId(): ?string {
		return $this->inventoryId;
	}
	public function setInventoryId(?string $inventoryId) {
		$this->inventoryId = $inventoryId;
	}
	public function withInventoryId(?string $inventoryId): BigInventory {
		$this->inventoryId = $inventoryId;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): BigInventory {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): BigInventory {
		$this->userId = $userId;
		return $this;
	}
	public function getBigItems(): ?array {
		return $this->bigItems;
	}
	public function setBigItems(?array $bigItems) {
		$this->bigItems = $bigItems;
	}
	public function withBigItems(?array $bigItems): BigInventory {
		$this->bigItems = $bigItems;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): BigInventory {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): BigInventory {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?BigInventory {
        if ($data === null) {
            return null;
        }
        return (new BigInventory())
            ->withInventoryId(array_key_exists('inventoryId', $data) && $data['inventoryId'] !== null ? $data['inventoryId'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withBigItems(array_map(
                function ($item) {
                    return BigItem::fromJson($item);
                },
                array_key_exists('bigItems', $data) && $data['bigItems'] !== null ? $data['bigItems'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "inventoryId" => $this->getInventoryId(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "bigItems" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBigItems() !== null && $this->getBigItems() !== null ? $this->getBigItems() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}