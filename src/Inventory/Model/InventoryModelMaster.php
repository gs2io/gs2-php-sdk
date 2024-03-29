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


class InventoryModelMaster implements IModel {
	/**
     * @var string
	 */
	private $inventoryModelId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var int
	 */
	private $initialCapacity;
	/**
     * @var int
	 */
	private $maxCapacity;
	/**
     * @var bool
	 */
	private $protectReferencedItem;
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
	public function getInventoryModelId(): ?string {
		return $this->inventoryModelId;
	}
	public function setInventoryModelId(?string $inventoryModelId) {
		$this->inventoryModelId = $inventoryModelId;
	}
	public function withInventoryModelId(?string $inventoryModelId): InventoryModelMaster {
		$this->inventoryModelId = $inventoryModelId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): InventoryModelMaster {
		$this->name = $name;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): InventoryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): InventoryModelMaster {
		$this->description = $description;
		return $this;
	}
	public function getInitialCapacity(): ?int {
		return $this->initialCapacity;
	}
	public function setInitialCapacity(?int $initialCapacity) {
		$this->initialCapacity = $initialCapacity;
	}
	public function withInitialCapacity(?int $initialCapacity): InventoryModelMaster {
		$this->initialCapacity = $initialCapacity;
		return $this;
	}
	public function getMaxCapacity(): ?int {
		return $this->maxCapacity;
	}
	public function setMaxCapacity(?int $maxCapacity) {
		$this->maxCapacity = $maxCapacity;
	}
	public function withMaxCapacity(?int $maxCapacity): InventoryModelMaster {
		$this->maxCapacity = $maxCapacity;
		return $this;
	}
	public function getProtectReferencedItem(): ?bool {
		return $this->protectReferencedItem;
	}
	public function setProtectReferencedItem(?bool $protectReferencedItem) {
		$this->protectReferencedItem = $protectReferencedItem;
	}
	public function withProtectReferencedItem(?bool $protectReferencedItem): InventoryModelMaster {
		$this->protectReferencedItem = $protectReferencedItem;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): InventoryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): InventoryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): InventoryModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?InventoryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new InventoryModelMaster())
            ->withInventoryModelId(array_key_exists('inventoryModelId', $data) && $data['inventoryModelId'] !== null ? $data['inventoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withInitialCapacity(array_key_exists('initialCapacity', $data) && $data['initialCapacity'] !== null ? $data['initialCapacity'] : null)
            ->withMaxCapacity(array_key_exists('maxCapacity', $data) && $data['maxCapacity'] !== null ? $data['maxCapacity'] : null)
            ->withProtectReferencedItem(array_key_exists('protectReferencedItem', $data) ? $data['protectReferencedItem'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "inventoryModelId" => $this->getInventoryModelId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "initialCapacity" => $this->getInitialCapacity(),
            "maxCapacity" => $this->getMaxCapacity(),
            "protectReferencedItem" => $this->getProtectReferencedItem(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}