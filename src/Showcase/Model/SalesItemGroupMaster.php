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


class SalesItemGroupMaster implements IModel {
	/**
     * @var string
	 */
	private $salesItemGroupId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $salesItemNames;
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
	public function getSalesItemGroupId(): ?string {
		return $this->salesItemGroupId;
	}
	public function setSalesItemGroupId(?string $salesItemGroupId) {
		$this->salesItemGroupId = $salesItemGroupId;
	}
	public function withSalesItemGroupId(?string $salesItemGroupId): SalesItemGroupMaster {
		$this->salesItemGroupId = $salesItemGroupId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): SalesItemGroupMaster {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): SalesItemGroupMaster {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): SalesItemGroupMaster {
		$this->metadata = $metadata;
		return $this;
	}
	public function getSalesItemNames(): ?array {
		return $this->salesItemNames;
	}
	public function setSalesItemNames(?array $salesItemNames) {
		$this->salesItemNames = $salesItemNames;
	}
	public function withSalesItemNames(?array $salesItemNames): SalesItemGroupMaster {
		$this->salesItemNames = $salesItemNames;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): SalesItemGroupMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): SalesItemGroupMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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