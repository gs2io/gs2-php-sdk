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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Subscription purchase information
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#subscribetransaction
 */
class SubscribeTransaction implements IModel {
	/**
     * @var string Subscription Transaction GRN
	 */
	private $subscribeTransactionId;
	/**
     * @var string Store Subscription Content Model name
	 */
	private $contentName;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var string Store
	 */
	private $store;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Status
	 */
	private $statusDetail;
	/**
     * @var int Expiration time
	 */
	private $expiresAt;
	/**
     * @var int Last time allocated to user
	 */
	private $lastAllocatedAt;
	/**
     * @var int Last time taken over by user
	 */
	private $lastTakeOverAt;
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
    /** @return string|null Subscription Transaction GRN */
	public function getSubscribeTransactionId(): ?string {
		return $this->subscribeTransactionId;
	}
    /** @param string|null $subscribeTransactionId Subscription Transaction GRN */
	public function setSubscribeTransactionId(?string $subscribeTransactionId) {
		$this->subscribeTransactionId = $subscribeTransactionId;
	}
    /**
     * @param string|null $subscribeTransactionId Subscription Transaction GRN
     * @return SubscribeTransaction
     */
	public function withSubscribeTransactionId(?string $subscribeTransactionId): SubscribeTransaction {
		$this->subscribeTransactionId = $subscribeTransactionId;
		return $this;
	}
    /** @return string|null Store Subscription Content Model name */
	public function getContentName(): ?string {
		return $this->contentName;
	}
    /** @param string|null $contentName Store Subscription Content Model name */
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
    /**
     * @param string|null $contentName Store Subscription Content Model name
     * @return SubscribeTransaction
     */
	public function withContentName(?string $contentName): SubscribeTransaction {
		$this->contentName = $contentName;
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
     * @return SubscribeTransaction
     */
	public function withTransactionId(?string $transactionId): SubscribeTransaction {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return string|null Store */
	public function getStore(): ?string {
		return $this->store;
	}
    /** @param string|null $store Store */
	public function setStore(?string $store) {
		$this->store = $store;
	}
    /**
     * @param string|null $store Store
     * @return SubscribeTransaction
     */
	public function withStore(?string $store): SubscribeTransaction {
		$this->store = $store;
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
     * @return SubscribeTransaction
     */
	public function withUserId(?string $userId): SubscribeTransaction {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Status */
	public function getStatusDetail(): ?string {
		return $this->statusDetail;
	}
    /** @param string|null $statusDetail Status */
	public function setStatusDetail(?string $statusDetail) {
		$this->statusDetail = $statusDetail;
	}
    /**
     * @param string|null $statusDetail Status
     * @return SubscribeTransaction
     */
	public function withStatusDetail(?string $statusDetail): SubscribeTransaction {
		$this->statusDetail = $statusDetail;
		return $this;
	}
    /** @return int|null Expiration time */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Expiration time */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Expiration time
     * @return SubscribeTransaction
     */
	public function withExpiresAt(?int $expiresAt): SubscribeTransaction {
		$this->expiresAt = $expiresAt;
		return $this;
	}
    /** @return int|null Last time allocated to user */
	public function getLastAllocatedAt(): ?int {
		return $this->lastAllocatedAt;
	}
    /** @param int|null $lastAllocatedAt Last time allocated to user */
	public function setLastAllocatedAt(?int $lastAllocatedAt) {
		$this->lastAllocatedAt = $lastAllocatedAt;
	}
    /**
     * @param int|null $lastAllocatedAt Last time allocated to user
     * @return SubscribeTransaction
     */
	public function withLastAllocatedAt(?int $lastAllocatedAt): SubscribeTransaction {
		$this->lastAllocatedAt = $lastAllocatedAt;
		return $this;
	}
    /** @return int|null Last time taken over by user */
	public function getLastTakeOverAt(): ?int {
		return $this->lastTakeOverAt;
	}
    /** @param int|null $lastTakeOverAt Last time taken over by user */
	public function setLastTakeOverAt(?int $lastTakeOverAt) {
		$this->lastTakeOverAt = $lastTakeOverAt;
	}
    /**
     * @param int|null $lastTakeOverAt Last time taken over by user
     * @return SubscribeTransaction
     */
	public function withLastTakeOverAt(?int $lastTakeOverAt): SubscribeTransaction {
		$this->lastTakeOverAt = $lastTakeOverAt;
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
     * @return SubscribeTransaction
     */
	public function withCreatedAt(?int $createdAt): SubscribeTransaction {
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
     * @return SubscribeTransaction
     */
	public function withUpdatedAt(?int $updatedAt): SubscribeTransaction {
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
     * @return SubscribeTransaction
     */
	public function withRevision(?int $revision): SubscribeTransaction {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?SubscribeTransaction {
        if ($data === null) {
            return null;
        }
        return (new SubscribeTransaction())
            ->withSubscribeTransactionId(array_key_exists('subscribeTransactionId', $data) && $data['subscribeTransactionId'] !== null ? $data['subscribeTransactionId'] : null)
            ->withContentName(array_key_exists('contentName', $data) && $data['contentName'] !== null ? $data['contentName'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withStore(array_key_exists('store', $data) && $data['store'] !== null ? $data['store'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withStatusDetail(array_key_exists('statusDetail', $data) && $data['statusDetail'] !== null ? $data['statusDetail'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withLastAllocatedAt(array_key_exists('lastAllocatedAt', $data) && $data['lastAllocatedAt'] !== null ? $data['lastAllocatedAt'] : null)
            ->withLastTakeOverAt(array_key_exists('lastTakeOverAt', $data) && $data['lastTakeOverAt'] !== null ? $data['lastTakeOverAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "subscribeTransactionId" => $this->getSubscribeTransactionId(),
            "contentName" => $this->getContentName(),
            "transactionId" => $this->getTransactionId(),
            "store" => $this->getStore(),
            "userId" => $this->getUserId(),
            "statusDetail" => $this->getStatusDetail(),
            "expiresAt" => $this->getExpiresAt(),
            "lastAllocatedAt" => $this->getLastAllocatedAt(),
            "lastTakeOverAt" => $this->getLastTakeOverAt(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}