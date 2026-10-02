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
 * Simple Inventory
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#simpleinventory
 */
class SimpleInventory implements IModel {
	/**
     * @var string Simple Inventory GRN
	 */
	private $inventoryId;
	/**
     * @var string Simple Inventory Model Name
	 */
	private $inventoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array List of Simple Items
	 */
	private $simpleItems;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Simple Inventory GRN */
	public function getInventoryId(): ?string {
		return $this->inventoryId;
	}
    /** @param string|null $inventoryId Simple Inventory GRN */
	public function setInventoryId(?string $inventoryId) {
		$this->inventoryId = $inventoryId;
	}
    /**
     * @param string|null $inventoryId Simple Inventory GRN
     * @return SimpleInventory
     */
	public function withInventoryId(?string $inventoryId): SimpleInventory {
		$this->inventoryId = $inventoryId;
		return $this;
	}
    /** @return string|null Simple Inventory Model Name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Simple Inventory Model Name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Simple Inventory Model Name
     * @return SimpleInventory
     */
	public function withInventoryName(?string $inventoryName): SimpleInventory {
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
     * @return SimpleInventory
     */
	public function withUserId(?string $userId): SimpleInventory {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of Simple Items */
	public function getSimpleItems(): ?array {
		return $this->simpleItems;
	}
    /** @param array|null $simpleItems List of Simple Items */
	public function setSimpleItems(?array $simpleItems) {
		$this->simpleItems = $simpleItems;
	}
    /**
     * @param array|null $simpleItems List of Simple Items
     * @return SimpleInventory
     */
	public function withSimpleItems(?array $simpleItems): SimpleInventory {
		$this->simpleItems = $simpleItems;
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
     * @return SimpleInventory
     */
	public function withCreatedAt(?int $createdAt): SimpleInventory {
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
     * @return SimpleInventory
     */
	public function withUpdatedAt(?int $updatedAt): SimpleInventory {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return SimpleInventory
     */
	public function withRevision(?int $revision): SimpleInventory {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SimpleInventory {
        if ($data === null) {
            return null;
        }
        return (new SimpleInventory())
            ->withInventoryId(array_key_exists('inventoryId', $data) && $data['inventoryId'] !== null ? $data['inventoryId'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSimpleItems(!array_key_exists('simpleItems', $data) || $data['simpleItems'] === null ? null : array_map(
                function ($item) {
                    return SimpleItem::fromJson($item);
                },
                $data['simpleItems']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "inventoryId" => $this->getInventoryId(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "simpleItems" => $this->getSimpleItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSimpleItems()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}