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

namespace Gs2\SkillTree\Model;

use Gs2\Core\Model\IModel;


/**
 * Status
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#status
 */
class Status implements IModel {
	/**
     * @var string Status GRN
	 */
	private $statusId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Property ID
	 */
	private $propertyId;
	/**
     * @var array Released Node Names
	 */
	private $releasedNodeNames;
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
    /** @return string|null Status GRN */
	public function getStatusId(): ?string {
		return $this->statusId;
	}
    /** @param string|null $statusId Status GRN */
	public function setStatusId(?string $statusId) {
		$this->statusId = $statusId;
	}
    /**
     * @param string|null $statusId Status GRN
     * @return Status
     */
	public function withStatusId(?string $statusId): Status {
		$this->statusId = $statusId;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Status
     */
	public function withUserId(?string $userId): Status {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return Status
     */
	public function withPropertyId(?string $propertyId): Status {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return array|null Released Node Names */
	public function getReleasedNodeNames(): ?array {
		return $this->releasedNodeNames;
	}
    /** @param array|null $releasedNodeNames Released Node Names */
	public function setReleasedNodeNames(?array $releasedNodeNames) {
		$this->releasedNodeNames = $releasedNodeNames;
	}
    /**
     * @param array|null $releasedNodeNames Released Node Names
     * @return Status
     */
	public function withReleasedNodeNames(?array $releasedNodeNames): Status {
		$this->releasedNodeNames = $releasedNodeNames;
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
     * @return Status
     */
	public function withCreatedAt(?int $createdAt): Status {
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
     * @return Status
     */
	public function withUpdatedAt(?int $updatedAt): Status {
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
     * @return Status
     */
	public function withRevision(?int $revision): Status {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Status {
        if ($data === null) {
            return null;
        }
        return (new Status())
            ->withStatusId(array_key_exists('statusId', $data) && $data['statusId'] !== null ? $data['statusId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withReleasedNodeNames(!array_key_exists('releasedNodeNames', $data) || $data['releasedNodeNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['releasedNodeNames']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "statusId" => $this->getStatusId(),
            "userId" => $this->getUserId(),
            "propertyId" => $this->getPropertyId(),
            "releasedNodeNames" => $this->getReleasedNodeNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getReleasedNodeNames()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}