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

namespace Gs2\Distributor\Model;

use Gs2\Core\Model\IModel;


class TransactionResult implements IModel {
	/**
     * @var string
	 */
	private $transactionResultId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var array
	 */
	private $verifyResults;
	/**
     * @var array
	 */
	private $consumeResults;
	/**
     * @var array
	 */
	private $acquireResults;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getTransactionResultId(): ?string {
		return $this->transactionResultId;
	}
	public function setTransactionResultId(?string $transactionResultId) {
		$this->transactionResultId = $transactionResultId;
	}
	public function withTransactionResultId(?string $transactionResultId): TransactionResult {
		$this->transactionResultId = $transactionResultId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): TransactionResult {
		$this->userId = $userId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): TransactionResult {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getVerifyResults(): ?array {
		return $this->verifyResults;
	}
	public function setVerifyResults(?array $verifyResults) {
		$this->verifyResults = $verifyResults;
	}
	public function withVerifyResults(?array $verifyResults): TransactionResult {
		$this->verifyResults = $verifyResults;
		return $this;
	}
	public function getConsumeResults(): ?array {
		return $this->consumeResults;
	}
	public function setConsumeResults(?array $consumeResults) {
		$this->consumeResults = $consumeResults;
	}
	public function withConsumeResults(?array $consumeResults): TransactionResult {
		$this->consumeResults = $consumeResults;
		return $this;
	}
	public function getAcquireResults(): ?array {
		return $this->acquireResults;
	}
	public function setAcquireResults(?array $acquireResults) {
		$this->acquireResults = $acquireResults;
	}
	public function withAcquireResults(?array $acquireResults): TransactionResult {
		$this->acquireResults = $acquireResults;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): TransactionResult {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): TransactionResult {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?TransactionResult {
        if ($data === null) {
            return null;
        }
        return (new TransactionResult())
            ->withTransactionResultId(array_key_exists('transactionResultId', $data) && $data['transactionResultId'] !== null ? $data['transactionResultId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withVerifyResults(!array_key_exists('verifyResults', $data) || $data['verifyResults'] === null ? null : array_map(
                function ($item) {
                    return VerifyActionResult::fromJson($item);
                },
                $data['verifyResults']
            ))
            ->withConsumeResults(!array_key_exists('consumeResults', $data) || $data['consumeResults'] === null ? null : array_map(
                function ($item) {
                    return ConsumeActionResult::fromJson($item);
                },
                $data['consumeResults']
            ))
            ->withAcquireResults(!array_key_exists('acquireResults', $data) || $data['acquireResults'] === null ? null : array_map(
                function ($item) {
                    return AcquireActionResult::fromJson($item);
                },
                $data['acquireResults']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "transactionResultId" => $this->getTransactionResultId(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "verifyResults" => $this->getVerifyResults() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyResults()
            ),
            "consumeResults" => $this->getConsumeResults() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConsumeResults()
            ),
            "acquireResults" => $this->getAcquireResults() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireResults()
            ),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}