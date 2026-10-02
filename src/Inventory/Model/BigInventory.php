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
 * Big Inventory
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#biginventory
 */
class BigInventory implements IModel {
	/**
     * @var string Big Inventory GRN
	 */
	private $inventoryId;
	/**
     * @var string Big Inventory Model Name
	 */
	private $inventoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array List of Big Items
	 */
	private $bigItems;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Big Inventory GRN */
	public function getInventoryId(): ?string {
		return $this->inventoryId;
	}
    /** @param string|null $inventoryId Big Inventory GRN */
	public function setInventoryId(?string $inventoryId) {
		$this->inventoryId = $inventoryId;
	}
    /**
     * @param string|null $inventoryId Big Inventory GRN
     * @return BigInventory
     */
	public function withInventoryId(?string $inventoryId): BigInventory {
		$this->inventoryId = $inventoryId;
		return $this;
	}
    /** @return string|null Big Inventory Model Name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Big Inventory Model Name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Big Inventory Model Name
     * @return BigInventory
     */
	public function withInventoryName(?string $inventoryName): BigInventory {
		$this->inventoryName = $inventoryName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return BigInventory
     */
	public function withUserId(?string $userId): BigInventory {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of Big Items */
	public function getBigItems(): ?array {
		return $this->bigItems;
	}
    /** @param array|null $bigItems List of Big Items */
	public function setBigItems(?array $bigItems) {
		$this->bigItems = $bigItems;
	}
    /**
     * @param array|null $bigItems List of Big Items
     * @return BigInventory
     */
	public function withBigItems(?array $bigItems): BigInventory {
		$this->bigItems = $bigItems;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return BigInventory
     */
	public function withCreatedAt(?int $createdAt): BigInventory {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return BigInventory
     */
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
            ->withBigItems(!array_key_exists('bigItems', $data) || $data['bigItems'] === null ? null : array_map(
                function ($item) {
                    return BigItem::fromJson($item);
                },
                $data['bigItems']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "inventoryId" => $this->getInventoryId(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "bigItems" => $this->getBigItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getBigItems()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}