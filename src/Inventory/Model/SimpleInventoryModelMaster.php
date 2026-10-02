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
 * Simple Inventory Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#simpleinventorymodelmaster
 */
class SimpleInventoryModelMaster implements IModel {
	/**
     * @var string Simple Inventory Model Master GRN
	 */
	private $inventoryModelId;
	/**
     * @var string Simple Inventory Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Description
	 */
	private $description;
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
    /** @return string|null Simple Inventory Model Master GRN */
	public function getInventoryModelId(): ?string {
		return $this->inventoryModelId;
	}
    /** @param string|null $inventoryModelId Simple Inventory Model Master GRN */
	public function setInventoryModelId(?string $inventoryModelId) {
		$this->inventoryModelId = $inventoryModelId;
	}
    /**
     * @param string|null $inventoryModelId Simple Inventory Model Master GRN
     * @return SimpleInventoryModelMaster
     */
	public function withInventoryModelId(?string $inventoryModelId): SimpleInventoryModelMaster {
		$this->inventoryModelId = $inventoryModelId;
		return $this;
	}
    /** @return string|null Simple Inventory Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Simple Inventory Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Simple Inventory Model name
     * @return SimpleInventoryModelMaster
     */
	public function withName(?string $name): SimpleInventoryModelMaster {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return SimpleInventoryModelMaster
     */
	public function withMetadata(?string $metadata): SimpleInventoryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return SimpleInventoryModelMaster
     */
	public function withDescription(?string $description): SimpleInventoryModelMaster {
		$this->description = $description;
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
     * @return SimpleInventoryModelMaster
     */
	public function withCreatedAt(?int $createdAt): SimpleInventoryModelMaster {
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
     * @return SimpleInventoryModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): SimpleInventoryModelMaster {
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
     * @return SimpleInventoryModelMaster
     */
	public function withRevision(?int $revision): SimpleInventoryModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SimpleInventoryModelMaster {
        if ($data === null) {
            return null;
        }
        return (new SimpleInventoryModelMaster())
            ->withInventoryModelId(array_key_exists('inventoryModelId', $data) && $data['inventoryModelId'] !== null ? $data['inventoryModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}