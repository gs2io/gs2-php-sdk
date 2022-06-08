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


class Mutex implements IModel {
	/**
     * @var string
	 */
	private $mutexId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $propertyId;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var int
	 */
	private $createdAt;
	public function getMutexId(): ?string {
		return $this->mutexId;
	}
	public function setMutexId(?string $mutexId) {
		$this->mutexId = $mutexId;
	}
	public function withMutexId(?string $mutexId): Mutex {
		$this->mutexId = $mutexId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Mutex {
		$this->userId = $userId;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): Mutex {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): Mutex {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Mutex {
		$this->createdAt = $createdAt;
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
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "mutexId" => $this->getMutexId(),
            "userId" => $this->getUserId(),
            "propertyId" => $this->getPropertyId(),
            "transactionId" => $this->getTransactionId(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}