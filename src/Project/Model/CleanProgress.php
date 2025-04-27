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


class CleanProgress implements IModel {
	/**
     * @var string
	 */
	private $cleanProgressId;
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
	private $cleaned;
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
	public function getCleanProgressId(): ?string {
		return $this->cleanProgressId;
	}
	public function setCleanProgressId(?string $cleanProgressId) {
		$this->cleanProgressId = $cleanProgressId;
	}
	public function withCleanProgressId(?string $cleanProgressId): CleanProgress {
		$this->cleanProgressId = $cleanProgressId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): CleanProgress {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): CleanProgress {
		$this->userId = $userId;
		return $this;
	}
	public function getCleaned(): ?int {
		return $this->cleaned;
	}
	public function setCleaned(?int $cleaned) {
		$this->cleaned = $cleaned;
	}
	public function withCleaned(?int $cleaned): CleanProgress {
		$this->cleaned = $cleaned;
		return $this;
	}
	public function getMicroserviceCount(): ?int {
		return $this->microserviceCount;
	}
	public function setMicroserviceCount(?int $microserviceCount) {
		$this->microserviceCount = $microserviceCount;
	}
	public function withMicroserviceCount(?int $microserviceCount): CleanProgress {
		$this->microserviceCount = $microserviceCount;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): CleanProgress {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): CleanProgress {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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