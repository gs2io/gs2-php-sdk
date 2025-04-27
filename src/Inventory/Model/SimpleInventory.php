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


class SimpleInventory implements IModel {
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
	private $simpleItems;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getInventoryId(): ?string {
		return $this->inventoryId;
	}
	public function setInventoryId(?string $inventoryId) {
		$this->inventoryId = $inventoryId;
	}
	public function withInventoryId(?string $inventoryId): SimpleInventory {
		$this->inventoryId = $inventoryId;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): SimpleInventory {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SimpleInventory {
		$this->userId = $userId;
		return $this;
	}
	public function getSimpleItems(): ?array {
		return $this->simpleItems;
	}
	public function setSimpleItems(?array $simpleItems) {
		$this->simpleItems = $simpleItems;
	}
	public function withSimpleItems(?array $simpleItems): SimpleInventory {
		$this->simpleItems = $simpleItems;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): SimpleInventory {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): SimpleInventory {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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