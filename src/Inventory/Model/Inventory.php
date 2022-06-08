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


class Inventory implements IModel {
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
     * @var int
	 */
	private $currentInventoryCapacityUsage;
	/**
     * @var int
	 */
	private $currentInventoryMaxCapacity;
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
	public function withInventoryId(?string $inventoryId): Inventory {
		$this->inventoryId = $inventoryId;
		return $this;
	}
	public function getInventoryName(): ?string {
		return $this->inventoryName;
	}
	public function setInventoryName(?string $inventoryName) {
		$this->inventoryName = $inventoryName;
	}
	public function withInventoryName(?string $inventoryName): Inventory {
		$this->inventoryName = $inventoryName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Inventory {
		$this->userId = $userId;
		return $this;
	}
	public function getCurrentInventoryCapacityUsage(): ?int {
		return $this->currentInventoryCapacityUsage;
	}
	public function setCurrentInventoryCapacityUsage(?int $currentInventoryCapacityUsage) {
		$this->currentInventoryCapacityUsage = $currentInventoryCapacityUsage;
	}
	public function withCurrentInventoryCapacityUsage(?int $currentInventoryCapacityUsage): Inventory {
		$this->currentInventoryCapacityUsage = $currentInventoryCapacityUsage;
		return $this;
	}
	public function getCurrentInventoryMaxCapacity(): ?int {
		return $this->currentInventoryMaxCapacity;
	}
	public function setCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity) {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
	}
	public function withCurrentInventoryMaxCapacity(?int $currentInventoryMaxCapacity): Inventory {
		$this->currentInventoryMaxCapacity = $currentInventoryMaxCapacity;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Inventory {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Inventory {
		$this->updatedAt = $updatedAt;
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
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
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
        );
    }
}