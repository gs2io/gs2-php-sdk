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


/** Dump User Data Progress */
class DumpProgress implements IModel {
	/**
     * @var string Dump User Data Progress GRN
	 */
	private $dumpProgressId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Number of dumped microservices
	 */
	private $dumped;
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
    /** @return string|null Dump User Data Progress GRN */
	public function getDumpProgressId(): ?string {
		return $this->dumpProgressId;
	}
    /** @param string|null $dumpProgressId Dump User Data Progress GRN */
	public function setDumpProgressId(?string $dumpProgressId) {
		$this->dumpProgressId = $dumpProgressId;
	}
    /**
     * @param string|null $dumpProgressId Dump User Data Progress GRN
     * @return DumpProgress
     */
	public function withDumpProgressId(?string $dumpProgressId): DumpProgress {
		$this->dumpProgressId = $dumpProgressId;
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
     * @return DumpProgress
     */
	public function withTransactionId(?string $transactionId): DumpProgress {
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
     * @return DumpProgress
     */
	public function withUserId(?string $userId): DumpProgress {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Number of dumped microservices */
	public function getDumped(): ?int {
		return $this->dumped;
	}
    /** @param int|null $dumped Number of dumped microservices */
	public function setDumped(?int $dumped) {
		$this->dumped = $dumped;
	}
    /**
     * @param int|null $dumped Number of dumped microservices
     * @return DumpProgress
     */
	public function withDumped(?int $dumped): DumpProgress {
		$this->dumped = $dumped;
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
     * @return DumpProgress
     */
	public function withMicroserviceCount(?int $microserviceCount): DumpProgress {
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
     * @return DumpProgress
     */
	public function withCreatedAt(?int $createdAt): DumpProgress {
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
     * @return DumpProgress
     */
	public function withUpdatedAt(?int $updatedAt): DumpProgress {
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
     * @return DumpProgress
     */
	public function withRevision(?int $revision): DumpProgress {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?DumpProgress {
        if ($data === null) {
            return null;
        }
        return (new DumpProgress())
            ->withDumpProgressId(array_key_exists('dumpProgressId', $data) && $data['dumpProgressId'] !== null ? $data['dumpProgressId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDumped(array_key_exists('dumped', $data) && $data['dumped'] !== null ? $data['dumped'] : null)
            ->withMicroserviceCount(array_key_exists('microserviceCount', $data) && $data['microserviceCount'] !== null ? $data['microserviceCount'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "dumpProgressId" => $this->getDumpProgressId(),
            "transactionId" => $this->getTransactionId(),
            "userId" => $this->getUserId(),
            "dumped" => $this->getDumped(),
            "microserviceCount" => $this->getMicroserviceCount(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}