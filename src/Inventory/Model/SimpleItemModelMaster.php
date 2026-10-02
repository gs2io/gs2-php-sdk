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
 * Simple Item Model Master
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#simpleitemmodelmaster
 */
class SimpleItemModelMaster implements IModel {
	/**
     * @var string Simple Item Model Master GRN
	 */
	private $itemModelId;
	/**
     * @var string Simple Item Model name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Metadata
	 */
	private $metadata;
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
    /** @return string|null Simple Item Model Master GRN */
	public function getItemModelId(): ?string {
		return $this->itemModelId;
	}
    /** @param string|null $itemModelId Simple Item Model Master GRN */
	public function setItemModelId(?string $itemModelId) {
		$this->itemModelId = $itemModelId;
	}
    /**
     * @param string|null $itemModelId Simple Item Model Master GRN
     * @return SimpleItemModelMaster
     */
	public function withItemModelId(?string $itemModelId): SimpleItemModelMaster {
		$this->itemModelId = $itemModelId;
		return $this;
	}
    /** @return string|null Simple Item Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Simple Item Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Simple Item Model name
     * @return SimpleItemModelMaster
     */
	public function withName(?string $name): SimpleItemModelMaster {
		$this->name = $name;
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
     * @return SimpleItemModelMaster
     */
	public function withDescription(?string $description): SimpleItemModelMaster {
		$this->description = $description;
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
     * @return SimpleItemModelMaster
     */
	public function withMetadata(?string $metadata): SimpleItemModelMaster {
		$this->metadata = $metadata;
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
     * @return SimpleItemModelMaster
     */
	public function withCreatedAt(?int $createdAt): SimpleItemModelMaster {
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
     * @return SimpleItemModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): SimpleItemModelMaster {
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
     * @return SimpleItemModelMaster
     */
	public function withRevision(?int $revision): SimpleItemModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SimpleItemModelMaster {
        if ($data === null) {
            return null;
        }
        return (new SimpleItemModelMaster())
            ->withItemModelId(array_key_exists('itemModelId', $data) && $data['itemModelId'] !== null ? $data['itemModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "itemModelId" => $this->getItemModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}