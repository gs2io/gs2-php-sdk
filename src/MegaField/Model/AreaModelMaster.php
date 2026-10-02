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

namespace Gs2\MegaField\Model;

use Gs2\Core\Model\IModel;


/**
 * Area divides space, and different areas can be treated as different spaces even if they have the same coordinates.
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#areamodelmaster
 */
class AreaModelMaster implements IModel {
	/**
     * @var string Area Model Master GRN
	 */
	private $areaModelMasterId;
	/**
     * @var string Area Model name
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
    /** @return string|null Area Model Master GRN */
	public function getAreaModelMasterId(): ?string {
		return $this->areaModelMasterId;
	}
    /** @param string|null $areaModelMasterId Area Model Master GRN */
	public function setAreaModelMasterId(?string $areaModelMasterId) {
		$this->areaModelMasterId = $areaModelMasterId;
	}
    /**
     * @param string|null $areaModelMasterId Area Model Master GRN
     * @return AreaModelMaster
     */
	public function withAreaModelMasterId(?string $areaModelMasterId): AreaModelMaster {
		$this->areaModelMasterId = $areaModelMasterId;
		return $this;
	}
    /** @return string|null Area Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Area Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Area Model name
     * @return AreaModelMaster
     */
	public function withName(?string $name): AreaModelMaster {
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
     * @return AreaModelMaster
     */
	public function withDescription(?string $description): AreaModelMaster {
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
     * @return AreaModelMaster
     */
	public function withMetadata(?string $metadata): AreaModelMaster {
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
     * @return AreaModelMaster
     */
	public function withCreatedAt(?int $createdAt): AreaModelMaster {
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
     * @return AreaModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): AreaModelMaster {
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
     * @return AreaModelMaster
     */
	public function withRevision(?int $revision): AreaModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?AreaModelMaster {
        if ($data === null) {
            return null;
        }
        return (new AreaModelMaster())
            ->withAreaModelMasterId(array_key_exists('areaModelMasterId', $data) && $data['areaModelMasterId'] !== null ? $data['areaModelMasterId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "areaModelMasterId" => $this->getAreaModelMasterId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}