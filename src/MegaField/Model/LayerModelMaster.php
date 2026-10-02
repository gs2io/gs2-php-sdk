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
 * Layers allow for multiple logical hierarchies within a single space.
 *
 * @see https://docs.gs2.io/api_reference/mega_field/sdk/#layermodelmaster
 */
class LayerModelMaster implements IModel {
	/**
     * @var string Layer Model Master GRN
	 */
	private $layerModelMasterId;
	/**
     * @var string Layer Model name
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
    /** @return string|null Layer Model Master GRN */
	public function getLayerModelMasterId(): ?string {
		return $this->layerModelMasterId;
	}
    /** @param string|null $layerModelMasterId Layer Model Master GRN */
	public function setLayerModelMasterId(?string $layerModelMasterId) {
		$this->layerModelMasterId = $layerModelMasterId;
	}
    /**
     * @param string|null $layerModelMasterId Layer Model Master GRN
     * @return LayerModelMaster
     */
	public function withLayerModelMasterId(?string $layerModelMasterId): LayerModelMaster {
		$this->layerModelMasterId = $layerModelMasterId;
		return $this;
	}
    /** @return string|null Layer Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Layer Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Layer Model name
     * @return LayerModelMaster
     */
	public function withName(?string $name): LayerModelMaster {
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
     * @return LayerModelMaster
     */
	public function withDescription(?string $description): LayerModelMaster {
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
     * @return LayerModelMaster
     */
	public function withMetadata(?string $metadata): LayerModelMaster {
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
     * @return LayerModelMaster
     */
	public function withCreatedAt(?int $createdAt): LayerModelMaster {
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
     * @return LayerModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): LayerModelMaster {
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
     * @return LayerModelMaster
     */
	public function withRevision(?int $revision): LayerModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?LayerModelMaster {
        if ($data === null) {
            return null;
        }
        return (new LayerModelMaster())
            ->withLayerModelMasterId(array_key_exists('layerModelMasterId', $data) && $data['layerModelMasterId'] !== null ? $data['layerModelMasterId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "layerModelMasterId" => $this->getLayerModelMasterId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}