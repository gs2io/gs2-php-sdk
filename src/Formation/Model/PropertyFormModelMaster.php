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

namespace Gs2\Formation\Model;

use Gs2\Core\Model\IModel;


/**
 * Property Form Model Master
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#propertyformmodelmaster
 */
class PropertyFormModelMaster implements IModel {
	/**
     * @var string Property Form Model Master GRN
	 */
	private $propertyFormModelId;
	/**
     * @var string Property Form Model name
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
     * @var array List of Slot Model
	 */
	private $slots;
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
    /** @return string|null Property Form Model Master GRN */
	public function getPropertyFormModelId(): ?string {
		return $this->propertyFormModelId;
	}
    /** @param string|null $propertyFormModelId Property Form Model Master GRN */
	public function setPropertyFormModelId(?string $propertyFormModelId) {
		$this->propertyFormModelId = $propertyFormModelId;
	}
    /**
     * @param string|null $propertyFormModelId Property Form Model Master GRN
     * @return PropertyFormModelMaster
     */
	public function withPropertyFormModelId(?string $propertyFormModelId): PropertyFormModelMaster {
		$this->propertyFormModelId = $propertyFormModelId;
		return $this;
	}
    /** @return string|null Property Form Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Property Form Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Property Form Model name
     * @return PropertyFormModelMaster
     */
	public function withName(?string $name): PropertyFormModelMaster {
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
     * @return PropertyFormModelMaster
     */
	public function withDescription(?string $description): PropertyFormModelMaster {
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
     * @return PropertyFormModelMaster
     */
	public function withMetadata(?string $metadata): PropertyFormModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Slot Model */
	public function getSlots(): ?array {
		return $this->slots;
	}
    /** @param array|null $slots List of Slot Model */
	public function setSlots(?array $slots) {
		$this->slots = $slots;
	}
    /**
     * @param array|null $slots List of Slot Model
     * @return PropertyFormModelMaster
     */
	public function withSlots(?array $slots): PropertyFormModelMaster {
		$this->slots = $slots;
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
     * @return PropertyFormModelMaster
     */
	public function withCreatedAt(?int $createdAt): PropertyFormModelMaster {
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
     * @return PropertyFormModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): PropertyFormModelMaster {
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
     * @return PropertyFormModelMaster
     */
	public function withRevision(?int $revision): PropertyFormModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?PropertyFormModelMaster {
        if ($data === null) {
            return null;
        }
        return (new PropertyFormModelMaster())
            ->withPropertyFormModelId(array_key_exists('propertyFormModelId', $data) && $data['propertyFormModelId'] !== null ? $data['propertyFormModelId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSlots(!array_key_exists('slots', $data) || $data['slots'] === null ? null : array_map(
                function ($item) {
                    return SlotModel::fromJson($item);
                },
                $data['slots']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "propertyFormModelId" => $this->getPropertyFormModelId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "slots" => $this->getSlots() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSlots()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}