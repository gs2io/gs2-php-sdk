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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;


class Gathering implements IModel {
	/**
     * @var string
	 */
	private $gatheringId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var array
	 */
	private $attributeRanges;
	/**
     * @var array
	 */
	private $capacityOfRoles;
	/**
     * @var array
	 */
	private $allowUserIds;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $expiresAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getGatheringId(): ?string {
		return $this->gatheringId;
	}

	public function setGatheringId(?string $gatheringId) {
		$this->gatheringId = $gatheringId;
	}

	public function withGatheringId(?string $gatheringId): Gathering {
		$this->gatheringId = $gatheringId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Gathering {
		$this->name = $name;
		return $this;
	}

	public function getAttributeRanges(): ?array {
		return $this->attributeRanges;
	}

	public function setAttributeRanges(?array $attributeRanges) {
		$this->attributeRanges = $attributeRanges;
	}

	public function withAttributeRanges(?array $attributeRanges): Gathering {
		$this->attributeRanges = $attributeRanges;
		return $this;
	}

	public function getCapacityOfRoles(): ?array {
		return $this->capacityOfRoles;
	}

	public function setCapacityOfRoles(?array $capacityOfRoles) {
		$this->capacityOfRoles = $capacityOfRoles;
	}

	public function withCapacityOfRoles(?array $capacityOfRoles): Gathering {
		$this->capacityOfRoles = $capacityOfRoles;
		return $this;
	}

	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}

	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}

	public function withAllowUserIds(?array $allowUserIds): Gathering {
		$this->allowUserIds = $allowUserIds;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Gathering {
		$this->metadata = $metadata;
		return $this;
	}

	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}

	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}

	public function withExpiresAt(?int $expiresAt): Gathering {
		$this->expiresAt = $expiresAt;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Gathering {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Gathering {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Gathering {
        if ($data === null) {
            return null;
        }
        return (new Gathering())
            ->withGatheringId(array_key_exists('gatheringId', $data) && $data['gatheringId'] !== null ? $data['gatheringId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withAttributeRanges(array_map(
                function ($item) {
                    return AttributeRange::fromJson($item);
                },
                array_key_exists('attributeRanges', $data) && $data['attributeRanges'] !== null ? $data['attributeRanges'] : []
            ))
            ->withCapacityOfRoles(array_map(
                function ($item) {
                    return CapacityOfRole::fromJson($item);
                },
                array_key_exists('capacityOfRoles', $data) && $data['capacityOfRoles'] !== null ? $data['capacityOfRoles'] : []
            ))
            ->withAllowUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('allowUserIds', $data) && $data['allowUserIds'] !== null ? $data['allowUserIds'] : []
            ))
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "gatheringId" => $this->getGatheringId(),
            "name" => $this->getName(),
            "attributeRanges" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAttributeRanges() !== null && $this->getAttributeRanges() !== null ? $this->getAttributeRanges() : []
            ),
            "capacityOfRoles" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCapacityOfRoles() !== null && $this->getCapacityOfRoles() !== null ? $this->getCapacityOfRoles() : []
            ),
            "allowUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds() !== null && $this->getAllowUserIds() !== null ? $this->getAllowUserIds() : []
            ),
            "metadata" => $this->getMetadata(),
            "expiresAt" => $this->getExpiresAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}