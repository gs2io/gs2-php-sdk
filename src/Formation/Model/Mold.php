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
 * Form Storage Area
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#mold
 */
class Mold implements IModel {
	/**
     * @var string Form Storage Area GRN
	 */
	private $moldId;
	/**
     * @var string Form Storage Area Model name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Current Capacity
	 */
	private $capacity;
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
    /** @return string|null Form Storage Area GRN */
	public function getMoldId(): ?string {
		return $this->moldId;
	}
    /** @param string|null $moldId Form Storage Area GRN */
	public function setMoldId(?string $moldId) {
		$this->moldId = $moldId;
	}
    /**
     * @param string|null $moldId Form Storage Area GRN
     * @return Mold
     */
	public function withMoldId(?string $moldId): Mold {
		$this->moldId = $moldId;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Form Storage Area Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Form Storage Area Model name
     * @return Mold
     */
	public function withName(?string $name): Mold {
		$this->name = $name;
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
     * @return Mold
     */
	public function withUserId(?string $userId): Mold {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Current Capacity */
	public function getCapacity(): ?int {
		return $this->capacity;
	}
    /** @param int|null $capacity Current Capacity */
	public function setCapacity(?int $capacity) {
		$this->capacity = $capacity;
	}
    /**
     * @param int|null $capacity Current Capacity
     * @return Mold
     */
	public function withCapacity(?int $capacity): Mold {
		$this->capacity = $capacity;
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
     * @return Mold
     */
	public function withCreatedAt(?int $createdAt): Mold {
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
     * @return Mold
     */
	public function withUpdatedAt(?int $updatedAt): Mold {
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
     * @return Mold
     */
	public function withRevision(?int $revision): Mold {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Mold {
        if ($data === null) {
            return null;
        }
        return (new Mold())
            ->withMoldId(array_key_exists('moldId', $data) && $data['moldId'] !== null ? $data['moldId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCapacity(array_key_exists('capacity', $data) && $data['capacity'] !== null ? $data['capacity'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "moldId" => $this->getMoldId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "capacity" => $this->getCapacity(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}