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


/** Import User Data Progress */
class ImportProgress implements IModel {
	/**
     * @var string Import User Data Progress GRN
	 */
	private $importProgressId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Number of imported microservices
	 */
	private $imported;
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
    /** @return string|null Import User Data Progress GRN */
	public function getImportProgressId(): ?string {
		return $this->importProgressId;
	}
    /** @param string|null $importProgressId Import User Data Progress GRN */
	public function setImportProgressId(?string $importProgressId) {
		$this->importProgressId = $importProgressId;
	}
    /**
     * @param string|null $importProgressId Import User Data Progress GRN
     * @return ImportProgress
     */
	public function withImportProgressId(?string $importProgressId): ImportProgress {
		$this->importProgressId = $importProgressId;
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
     * @return ImportProgress
     */
	public function withTransactionId(?string $transactionId): ImportProgress {
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
     * @return ImportProgress
     */
	public function withUserId(?string $userId): ImportProgress {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Number of imported microservices */
	public function getImported(): ?int {
		return $this->imported;
	}
    /** @param int|null $imported Number of imported microservices */
	public function setImported(?int $imported) {
		$this->imported = $imported;
	}
    /**
     * @param int|null $imported Number of imported microservices
     * @return ImportProgress
     */
	public function withImported(?int $imported): ImportProgress {
		$this->imported = $imported;
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
     * @return ImportProgress
     */
	public function withMicroserviceCount(?int $microserviceCount): ImportProgress {
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
     * @return ImportProgress
     */
	public function withCreatedAt(?int $createdAt): ImportProgress {
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
     * @return ImportProgress
     */
	public function withUpdatedAt(?int $updatedAt): ImportProgress {
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
     * @return ImportProgress
     */
	public function withRevision(?int $revision): ImportProgress {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?ImportProgress {
        if ($data === null) {
            return null;
        }
        return (new ImportProgress())
            ->withImportProgressId(array_key_exists('importProgressId', $data) && $data['importProgressId'] !== null ? $data['importProgressId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withImported(array_key_exists('imported', $data) && $data['imported'] !== null ? $data['imported'] : null)
            ->withMicroserviceCount(array_key_exists('microserviceCount', $data) && $data['microserviceCount'] !== null ? $data['microserviceCount'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "importProgressId" => $this->getImportProgressId(),
            "transactionId" => $this->getTransactionId(),
            "userId" => $this->getUserId(),
            "imported" => $this->getImported(),
            "microserviceCount" => $this->getMicroserviceCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}