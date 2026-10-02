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

namespace Gs2\Showcase\Model;

use Gs2\Core\Model\IModel;


/**
 * Sales Item Group Master
 *
 * @see https://docs.gs2.io/api_reference/showcase/sdk/#salesitemgroupmaster
 */
class SalesItemGroupMaster implements IModel {
	/**
     * @var string Sales Item Group Master GRN
	 */
	private $salesItemGroupId;
	/**
     * @var string Sales Item Group name
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
     * @var array List of Sales Items included in the Sales Item Group
	 */
	private $salesItemNames;
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
    /** @return string|null Sales Item Group Master GRN */
	public function getSalesItemGroupId(): ?string {
		return $this->salesItemGroupId;
	}
    /** @param string|null $salesItemGroupId Sales Item Group Master GRN */
	public function setSalesItemGroupId(?string $salesItemGroupId) {
		$this->salesItemGroupId = $salesItemGroupId;
	}
    /**
     * @param string|null $salesItemGroupId Sales Item Group Master GRN
     * @return SalesItemGroupMaster
     */
	public function withSalesItemGroupId(?string $salesItemGroupId): SalesItemGroupMaster {
		$this->salesItemGroupId = $salesItemGroupId;
		return $this;
	}
    /** @return string|null Sales Item Group name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Sales Item Group name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Sales Item Group name
     * @return SalesItemGroupMaster
     */
	public function withName(?string $name): SalesItemGroupMaster {
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
     * @return SalesItemGroupMaster
     */
	public function withDescription(?string $description): SalesItemGroupMaster {
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
     * @return SalesItemGroupMaster
     */
	public function withMetadata(?string $metadata): SalesItemGroupMaster {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Sales Items included in the Sales Item Group */
	public function getSalesItemNames(): ?array {
		return $this->salesItemNames;
	}
    /** @param array|null $salesItemNames List of Sales Items included in the Sales Item Group */
	public function setSalesItemNames(?array $salesItemNames) {
		$this->salesItemNames = $salesItemNames;
	}
    /**
     * @param array|null $salesItemNames List of Sales Items included in the Sales Item Group
     * @return SalesItemGroupMaster
     */
	public function withSalesItemNames(?array $salesItemNames): SalesItemGroupMaster {
		$this->salesItemNames = $salesItemNames;
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
     * @return SalesItemGroupMaster
     */
	public function withCreatedAt(?int $createdAt): SalesItemGroupMaster {
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
     * @return SalesItemGroupMaster
     */
	public function withUpdatedAt(?int $updatedAt): SalesItemGroupMaster {
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
     * @return SalesItemGroupMaster
     */
	public function withRevision(?int $revision): SalesItemGroupMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SalesItemGroupMaster {
        if ($data === null) {
            return null;
        }
        return (new SalesItemGroupMaster())
            ->withSalesItemGroupId(array_key_exists('salesItemGroupId', $data) && $data['salesItemGroupId'] !== null ? $data['salesItemGroupId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withSalesItemNames(!array_key_exists('salesItemNames', $data) || $data['salesItemNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['salesItemNames']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "salesItemGroupId" => $this->getSalesItemGroupId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "salesItemNames" => $this->getSalesItemNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getSalesItemNames()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}