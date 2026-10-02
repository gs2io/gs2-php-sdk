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


/**
 * Gathering
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#gathering
 */
class Gathering implements IModel {
	/**
     * @var string Gathering GRN
	 */
	private $gatheringId;
	/**
     * @var string Gathering name
	 */
	private $name;
	/**
     * @var array Recruitment Requirements
	 */
	private $attributeRanges;
	/**
     * @var array List of Role Capacities
	 */
	private $capacityOfRoles;
	/**
     * @var array Allowed User IDs
	 */
	private $allowUserIds;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Gathering Expiration Time
	 */
	private $expiresAt;
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
    /** @return string|null Gathering GRN */
	public function getGatheringId(): ?string {
		return $this->gatheringId;
	}
    /** @param string|null $gatheringId Gathering GRN */
	public function setGatheringId(?string $gatheringId) {
		$this->gatheringId = $gatheringId;
	}
    /**
     * @param string|null $gatheringId Gathering GRN
     * @return Gathering
     */
	public function withGatheringId(?string $gatheringId): Gathering {
		$this->gatheringId = $gatheringId;
		return $this;
	}
    /** @return string|null Gathering name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Gathering name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Gathering name
     * @return Gathering
     */
	public function withName(?string $name): Gathering {
		$this->name = $name;
		return $this;
	}
    /** @return array|null Recruitment Requirements */
	public function getAttributeRanges(): ?array {
		return $this->attributeRanges;
	}
    /** @param array|null $attributeRanges Recruitment Requirements */
	public function setAttributeRanges(?array $attributeRanges) {
		$this->attributeRanges = $attributeRanges;
	}
    /**
     * @param array|null $attributeRanges Recruitment Requirements
     * @return Gathering
     */
	public function withAttributeRanges(?array $attributeRanges): Gathering {
		$this->attributeRanges = $attributeRanges;
		return $this;
	}
    /** @return array|null List of Role Capacities */
	public function getCapacityOfRoles(): ?array {
		return $this->capacityOfRoles;
	}
    /** @param array|null $capacityOfRoles List of Role Capacities */
	public function setCapacityOfRoles(?array $capacityOfRoles) {
		$this->capacityOfRoles = $capacityOfRoles;
	}
    /**
     * @param array|null $capacityOfRoles List of Role Capacities
     * @return Gathering
     */
	public function withCapacityOfRoles(?array $capacityOfRoles): Gathering {
		$this->capacityOfRoles = $capacityOfRoles;
		return $this;
	}
    /** @return array|null Allowed User IDs */
	public function getAllowUserIds(): ?array {
		return $this->allowUserIds;
	}
    /** @param array|null $allowUserIds Allowed User IDs */
	public function setAllowUserIds(?array $allowUserIds) {
		$this->allowUserIds = $allowUserIds;
	}
    /**
     * @param array|null $allowUserIds Allowed User IDs
     * @return Gathering
     */
	public function withAllowUserIds(?array $allowUserIds): Gathering {
		$this->allowUserIds = $allowUserIds;
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
     * @return Gathering
     */
	public function withMetadata(?string $metadata): Gathering {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return int|null Gathering Expiration Time */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Gathering Expiration Time */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Gathering Expiration Time
     * @return Gathering
     */
	public function withExpiresAt(?int $expiresAt): Gathering {
		$this->expiresAt = $expiresAt;
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
     * @return Gathering
     */
	public function withCreatedAt(?int $createdAt): Gathering {
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
     * @return Gathering
     */
	public function withUpdatedAt(?int $updatedAt): Gathering {
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
     * @return Gathering
     */
	public function withRevision(?int $revision): Gathering {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Gathering {
        if ($data === null) {
            return null;
        }
        return (new Gathering())
            ->withGatheringId(array_key_exists('gatheringId', $data) && $data['gatheringId'] !== null ? $data['gatheringId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withAttributeRanges(!array_key_exists('attributeRanges', $data) || $data['attributeRanges'] === null ? null : array_map(
                function ($item) {
                    return AttributeRange::fromJson($item);
                },
                $data['attributeRanges']
            ))
            ->withCapacityOfRoles(!array_key_exists('capacityOfRoles', $data) || $data['capacityOfRoles'] === null ? null : array_map(
                function ($item) {
                    return CapacityOfRole::fromJson($item);
                },
                $data['capacityOfRoles']
            ))
            ->withAllowUserIds(!array_key_exists('allowUserIds', $data) || $data['allowUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['allowUserIds']
            ))
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "gatheringId" => $this->getGatheringId(),
            "name" => $this->getName(),
            "attributeRanges" => $this->getAttributeRanges() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAttributeRanges()
            ),
            "capacityOfRoles" => $this->getCapacityOfRoles() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getCapacityOfRoles()
            ),
            "allowUserIds" => $this->getAllowUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAllowUserIds()
            ),
            "metadata" => $this->getMetadata(),
            "expiresAt" => $this->getExpiresAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}