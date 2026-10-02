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

namespace Gs2\Lock\Model;

use Gs2\Core\Model\IModel;


/**
 * Mutex
 *
 * @see https://docs.gs2.io/api_reference/lock/sdk/#mutex
 */
class Mutex implements IModel {
	/**
     * @var string Mutex GRN
	 */
	private $mutexId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Property ID
	 */
	private $propertyId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Expiration datetime
	 */
	private $ttlAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Mutex GRN */
	public function getMutexId(): ?string {
		return $this->mutexId;
	}
    /** @param string|null $mutexId Mutex GRN */
	public function setMutexId(?string $mutexId) {
		$this->mutexId = $mutexId;
	}
    /**
     * @param string|null $mutexId Mutex GRN
     * @return Mutex
     */
	public function withMutexId(?string $mutexId): Mutex {
		$this->mutexId = $mutexId;
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
     * @return Mutex
     */
	public function withUserId(?string $userId): Mutex {
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
     * @return Mutex
     */
	public function withPropertyId(?string $propertyId): Mutex {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
    /** @param string|null $transactionId Transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
    /**
     * @param string|null $transactionId Transaction ID
     * @return Mutex
     */
	public function withTransactionId(?string $transactionId): Mutex {
		$this->transactionId = $transactionId;
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
     * @return Mutex
     */
	public function withCreatedAt(?int $createdAt): Mutex {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Expiration datetime */
	public function getTtlAt(): ?int {
		return $this->ttlAt;
	}
    /** @param int|null $ttlAt Expiration datetime */
	public function setTtlAt(?int $ttlAt) {
		$this->ttlAt = $ttlAt;
	}
    /**
     * @param int|null $ttlAt Expiration datetime
     * @return Mutex
     */
	public function withTtlAt(?int $ttlAt): Mutex {
		$this->ttlAt = $ttlAt;
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
     * @return Mutex
     */
	public function withRevision(?int $revision): Mutex {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Mutex {
        if ($data === null) {
            return null;
        }
        return (new Mutex())
            ->withMutexId(array_key_exists('mutexId', $data) && $data['mutexId'] !== null ? $data['mutexId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withTtlAt(array_key_exists('ttlAt', $data) && $data['ttlAt'] !== null ? $data['ttlAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "mutexId" => $this->getMutexId(),
            "userId" => $this->getUserId(),
            "propertyId" => $this->getPropertyId(),
            "transactionId" => $this->getTransactionId(),
            "createdAt" => $this->getCreatedAt(),
            "ttlAt" => $this->getTtlAt(),
            "revision" => $this->getRevision(),
        );
    }
}