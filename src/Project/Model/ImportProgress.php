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


class ImportProgress implements IModel {
	/**
     * @var string
	 */
	private $importProgressId;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $imported;
	/**
     * @var int
	 */
	private $microserviceCount;
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
	public function getImportProgressId(): ?string {
		return $this->importProgressId;
	}
	public function setImportProgressId(?string $importProgressId) {
		$this->importProgressId = $importProgressId;
	}
	public function withImportProgressId(?string $importProgressId): ImportProgress {
		$this->importProgressId = $importProgressId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): ImportProgress {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): ImportProgress {
		$this->userId = $userId;
		return $this;
	}
	public function getImported(): ?int {
		return $this->imported;
	}
	public function setImported(?int $imported) {
		$this->imported = $imported;
	}
	public function withImported(?int $imported): ImportProgress {
		$this->imported = $imported;
		return $this;
	}
	public function getMicroserviceCount(): ?int {
		return $this->microserviceCount;
	}
	public function setMicroserviceCount(?int $microserviceCount) {
		$this->microserviceCount = $microserviceCount;
	}
	public function withMicroserviceCount(?int $microserviceCount): ImportProgress {
		$this->microserviceCount = $microserviceCount;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): ImportProgress {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): ImportProgress {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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