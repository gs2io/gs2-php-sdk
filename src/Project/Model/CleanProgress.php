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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;


/** Clean User Data Progress */
class CleanProgress implements IModel {
	/**
     * @var string Clean User Data Progress GRN
	 */
	private $cleanProgressId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Number of cleaned microservices
	 */
	private $cleaned;
	/**
     * @var int Number of microservices
	 */
	private $microserviceCount;
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
    /** @return string|null Clean User Data Progress GRN */
	public function getCleanProgressId(): ?string {
		return $this->cleanProgressId;
	}
    /** @param string|null $cleanProgressId Clean User Data Progress GRN */
	public function setCleanProgressId(?string $cleanProgressId) {
		$this->cleanProgressId = $cleanProgressId;
	}
    /**
     * @param string|null $cleanProgressId Clean User Data Progress GRN
     * @return CleanProgress
     */
	public function withCleanProgressId(?string $cleanProgressId): CleanProgress {
		$this->cleanProgressId = $cleanProgressId;
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
     * @return CleanProgress
     */
	public function withTransactionId(?string $transactionId): CleanProgress {
		$this->transactionId = $transactionId;
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
     * @return CleanProgress
     */
	public function withUserId(?string $userId): CleanProgress {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Number of cleaned microservices */
	public function getCleaned(): ?int {
		return $this->cleaned;
	}
    /** @param int|null $cleaned Number of cleaned microservices */
	public function setCleaned(?int $cleaned) {
		$this->cleaned = $cleaned;
	}
    /**
     * @param int|null $cleaned Number of cleaned microservices
     * @return CleanProgress
     */
	public function withCleaned(?int $cleaned): CleanProgress {
		$this->cleaned = $cleaned;
		return $this;
	}
    /** @return int|null Number of microservices */
	public function getMicroserviceCount(): ?int {
		return $this->microserviceCount;
	}
    /** @param int|null $microserviceCount Number of microservices */
	public function setMicroserviceCount(?int $microserviceCount) {
		$this->microserviceCount = $microserviceCount;
	}
    /**
     * @param int|null $microserviceCount Number of microservices
     * @return CleanProgress
     */
	public function withMicroserviceCount(?int $microserviceCount): CleanProgress {
		$this->microserviceCount = $microserviceCount;
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
     * @return CleanProgress
     */
	public function withCreatedAt(?int $createdAt): CleanProgress {
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
     * @return CleanProgress
     */
	public function withUpdatedAt(?int $updatedAt): CleanProgress {
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
     * @return CleanProgress
     */
	public function withRevision(?int $revision): CleanProgress {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?CleanProgress {
        if ($data === null) {
            return null;
        }
        return (new CleanProgress())
            ->withCleanProgressId(array_key_exists('cleanProgressId', $data) && $data['cleanProgressId'] !== null ? $data['cleanProgressId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCleaned(array_key_exists('cleaned', $data) && $data['cleaned'] !== null ? $data['cleaned'] : null)
            ->withMicroserviceCount(array_key_exists('microserviceCount', $data) && $data['microserviceCount'] !== null ? $data['microserviceCount'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "cleanProgressId" => $this->getCleanProgressId(),
            "transactionId" => $this->getTransactionId(),
            "userId" => $this->getUserId(),
            "cleaned" => $this->getCleaned(),
            "microserviceCount" => $this->getMicroserviceCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}