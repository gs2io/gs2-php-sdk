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


class SubscribeTransaction implements IModel {
	/**
     * @var string
	 */
	private $subscribeTransactionId;
	/**
     * @var string
	 */
	private $contentName;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var string
	 */
	private $store;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $statusDetail;
	/**
     * @var int
	 */
	private $expiresAt;
	/**
     * @var int
	 */
	private $lastAllocatedAt;
	/**
     * @var int
	 */
	private $lastTakeOverAt;
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
	public function getSubscribeTransactionId(): ?string {
		return $this->subscribeTransactionId;
	}
	public function setSubscribeTransactionId(?string $subscribeTransactionId) {
		$this->subscribeTransactionId = $subscribeTransactionId;
	}
	public function withSubscribeTransactionId(?string $subscribeTransactionId): SubscribeTransaction {
		$this->subscribeTransactionId = $subscribeTransactionId;
		return $this;
	}
	public function getContentName(): ?string {
		return $this->contentName;
	}
	public function setContentName(?string $contentName) {
		$this->contentName = $contentName;
	}
	public function withContentName(?string $contentName): SubscribeTransaction {
		$this->contentName = $contentName;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): SubscribeTransaction {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getStore(): ?string {
		return $this->store;
	}
	public function setStore(?string $store) {
		$this->store = $store;
	}
	public function withStore(?string $store): SubscribeTransaction {
		$this->store = $store;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): SubscribeTransaction {
		$this->userId = $userId;
		return $this;
	}
	public function getStatusDetail(): ?string {
		return $this->statusDetail;
	}
	public function setStatusDetail(?string $statusDetail) {
		$this->statusDetail = $statusDetail;
	}
	public function withStatusDetail(?string $statusDetail): SubscribeTransaction {
		$this->statusDetail = $statusDetail;
		return $this;
	}
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
	public function withExpiresAt(?int $expiresAt): SubscribeTransaction {
		$this->expiresAt = $expiresAt;
		return $this;
	}
	public function getLastAllocatedAt(): ?int {
		return $this->lastAllocatedAt;
	}
	public function setLastAllocatedAt(?int $lastAllocatedAt) {
		$this->lastAllocatedAt = $lastAllocatedAt;
	}
	public function withLastAllocatedAt(?int $lastAllocatedAt): SubscribeTransaction {
		$this->lastAllocatedAt = $lastAllocatedAt;
		return $this;
	}
	public function getLastTakeOverAt(): ?int {
		return $this->lastTakeOverAt;
	}
	public function setLastTakeOverAt(?int $lastTakeOverAt) {
		$this->lastTakeOverAt = $lastTakeOverAt;
	}
	public function withLastTakeOverAt(?int $lastTakeOverAt): SubscribeTransaction {
		$this->lastTakeOverAt = $lastTakeOverAt;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): SubscribeTransaction {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): SubscribeTransaction {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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