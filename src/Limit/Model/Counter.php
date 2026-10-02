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

namespace Gs2\Limit\Model;

use Gs2\Core\Model\IModel;


/**
 * Current Counter Value
 *
 * @see https://docs.gs2.io/api_reference/limit/sdk/#counter
 */
class Counter implements IModel {
	/**
     * @var string Counter GRN
	 */
	private $counterId;
	/**
     * @var string Usage Limit Model Name
	 */
	private $limitName;
	/**
     * @var string Counter Name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Count Value
	 */
	private $count;
	/**
     * @var int Next Reset Timing
	 */
	private $nextResetAt;
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
    /** @return string|null Counter GRN */
	public function getCounterId(): ?string {
		return $this->counterId;
	}
    /** @param string|null $counterId Counter GRN */
	public function setCounterId(?string $counterId) {
		$this->counterId = $counterId;
	}
    /**
     * @param string|null $counterId Counter GRN
     * @return Counter
     */
	public function withCounterId(?string $counterId): Counter {
		$this->counterId = $counterId;
		return $this;
	}
    /** @return string|null Usage Limit Model Name */
	public function getLimitName(): ?string {
		return $this->limitName;
	}
    /** @param string|null $limitName Usage Limit Model Name */
	public function setLimitName(?string $limitName) {
		$this->limitName = $limitName;
	}
    /**
     * @param string|null $limitName Usage Limit Model Name
     * @return Counter
     */
	public function withLimitName(?string $limitName): Counter {
		$this->limitName = $limitName;
		return $this;
	}
    /** @return string|null Counter Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Counter Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Counter Name
     * @return Counter
     */
	public function withName(?string $name): Counter {
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
     * @return Counter
     */
	public function withUserId(?string $userId): Counter {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Count Value */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Count Value */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Count Value
     * @return Counter
     */
	public function withCount(?int $count): Counter {
		$this->count = $count;
		return $this;
	}
    /** @return int|null Next Reset Timing */
	public function getNextResetAt(): ?int {
		return $this->nextResetAt;
	}
    /** @param int|null $nextResetAt Next Reset Timing */
	public function setNextResetAt(?int $nextResetAt) {
		$this->nextResetAt = $nextResetAt;
	}
    /**
     * @param int|null $nextResetAt Next Reset Timing
     * @return Counter
     */
	public function withNextResetAt(?int $nextResetAt): Counter {
		$this->nextResetAt = $nextResetAt;
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
     * @return Counter
     */
	public function withCreatedAt(?int $createdAt): Counter {
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
     * @return Counter
     */
	public function withUpdatedAt(?int $updatedAt): Counter {
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
     * @return Counter
     */
	public function withRevision(?int $revision): Counter {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Counter {
        if ($data === null) {
            return null;
        }
        return (new Counter())
            ->withCounterId(array_key_exists('counterId', $data) && $data['counterId'] !== null ? $data['counterId'] : null)
            ->withLimitName(array_key_exists('limitName', $data) && $data['limitName'] !== null ? $data['limitName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withNextResetAt(array_key_exists('nextResetAt', $data) && $data['nextResetAt'] !== null ? $data['nextResetAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "counterId" => $this->getCounterId(),
            "limitName" => $this->getLimitName(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "count" => $this->getCount(),
            "nextResetAt" => $this->getNextResetAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}