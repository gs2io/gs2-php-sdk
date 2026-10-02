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
 * Inventory
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#inventory
 */
class Inventory implements IModel {
	/**
     * @var string Inventory GRN
	 */
	private $inventoryId;
	/**
     * @var string Inventory Model Name
	 */
	private $inventoryName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Capacity Usage
	 */
	private $currentInventoryCapacityUsage;
	/**
     * @var int Maximum Capacity
	 */
	private $currentInventoryMaxCapacity;
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
    /** @return string|null Inventory GRN */
	public function getInventoryId(): ?string {
		return $this->inventoryId;
	}
    /** @param string|null $inventoryId Inventory GRN */
	public function setInventoryId(?string $inventoryId) {
		$this->inventoryId = $inventoryId;
	}
    /**
     * @param string|null $inventoryId Inventory GRN
     * @return Inventory
     */
	public function withInventoryId(?string $inventoryId): Inventory {
		$this->inventoryId = $inventoryId;
		return $this;
	}
    /** @return string|null Inventory Model Name */
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
    /** @param string|null $inventoryName Inventory Model Name */
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
    /**
     * @param string|null $inventoryName Inventory Model Name
     * @return Inventory
     */
	public function withInventoryName(?string $inventoryName): Inventory {
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
     * @return Inventory
     */
	public function withUserId(?string $userId): Inventory {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Capacity Usage */
	public function getCurrentInventoryCapacityUsage(): ?int {
		return $this->currentInventoryCapacityUsage;
	}
    /** @param int|null $currentInventoryCapacityUsage Capacity Usage */
	public function setCurrentInventoryCapacityUsage(?int $currentInventoryCapacityUsage) {
		$this->currentInventoryCapacityUsage = $currentInventoryCapacityUsage;
	}
    /**
     * @param int|null $currentInventoryCapacityUsage Capacity Usage
     * @return Inventory
     */
	public function withCurrentInventoryCapacityUsage(?int $currentInventoryCapacityUsage): Inventory {
		$this->currentInventoryCapacityUsage = $currentInventoryCapacityUsage;
		return $this;
	}
    /** @return int|null Maximum Capacity */
	public function getCurrentInventoryMaxCapacity(): ?int {
		return $this->currentInventoryMaxCapacity;
	}
    /** @param int|null $currentInventoryMaxCapacity Maximum Capacity */
	public function setCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity) {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
	}
    /**
     * @param int|null $currentInventoryMaxCapacity Maximum Capacity
     * @return Inventory
     */
	public function withCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity): Inventory {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
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
     * @return Inventory
     */
	public function withCreatedAt(?int $createdAt): Inventory {
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
     * @return Inventory
     */
	public function withUpdatedAt(?int $updatedAt): Inventory {
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
     * @return Inventory
     */
	public function withRevision(?int $revision): Inventory {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Inventory {
        if ($data === null) {
            return null;
        }
        return (new Inventory())
            ->withInventoryId(array_key_exists('inventoryId', $data) && $data['inventoryId'] !== null ? $data['inventoryId'] : null)
            ->withInventoryName(array_key_exists('inventoryName', $data) && $data['inventoryName'] !== null ? $data['inventoryName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCurrentInventoryCapacityUsage(array_key_exists('currentInventoryCapacityUsage', $data) && $data['currentInventoryCapacityUsage'] !== null ? $data['currentInventoryCapacityUsage'] : null)
            ->withCurrentInventoryMaxCapacity(array_key_exists('currentInventoryMaxCapacity', $data) && $data['currentInventoryMaxCapacity'] !== null ? $data['currentInventoryMaxCapacity'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "inventoryId" => $this->getInventoryId(),
            "inventoryName" => $this->getInventoryName(),
            "userId" => $this->getUserId(),
            "currentInventoryCapacityUsage" => $this->getCurrentInventoryCapacityUsage(),
            "currentInventoryMaxCapacity" => $this->getCurrentInventoryMaxCapacity(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}