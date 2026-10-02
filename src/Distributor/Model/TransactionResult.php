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


/**
 * Transaction Execution Result
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#transactionresult
 */
class TransactionResult implements IModel {
	/**
     * @var string Transaction Result GRN
	 */
	private $transactionResultId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var array List of verify action execution results
	 */
	private $verifyResults;
	/**
     * @var array List of Consume Action execution results
	 */
	private $consumeResults;
	/**
     * @var array List of acquire action execution results
	 */
	private $acquireResults;
	/**
     * @var bool Whether an error occurred during transaction execution
	 */
	private $hasError;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Transaction Result GRN */
	public function getTransactionResultId(): ?string {
		return $this->transactionResultId;
	}
    /** @param string|null $transactionResultId Transaction Result GRN */
	public function setTransactionResultId(?string $transactionResultId) {
		$this->transactionResultId = $transactionResultId;
	}
    /**
     * @param string|null $transactionResultId Transaction Result GRN
     * @return TransactionResult
     */
	public function withTransactionResultId(?string $transactionResultId): TransactionResult {
		$this->transactionResultId = $transactionResultId;
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
     * @return TransactionResult
     */
	public function withUserId(?string $userId): TransactionResult {
		$this->userId = $userId;
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
     * @return TransactionResult
     */
	public function withTransactionId(?string $transactionId): TransactionResult {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return array|null List of verify action execution results */
	public function getVerifyResults(): ?array {
		return $this->verifyResults;
	}
    /** @param array|null $verifyResults List of verify action execution results */
	public function setVerifyResults(?array $verifyResults) {
		$this->verifyResults = $verifyResults;
	}
    /**
     * @param array|null $verifyResults List of verify action execution results
     * @return TransactionResult
     */
	public function withVerifyResults(?array $verifyResults): TransactionResult {
		$this->verifyResults = $verifyResults;
		return $this;
	}
    /** @return array|null List of Consume Action execution results */
	public function getConsumeResults(): ?array {
		return $this->consumeResults;
	}
    /** @param array|null $consumeResults List of Consume Action execution results */
	public function setConsumeResults(?array $consumeResults) {
		$this->consumeResults = $consumeResults;
	}
    /**
     * @param array|null $consumeResults List of Consume Action execution results
     * @return TransactionResult
     */
	public function withConsumeResults(?array $consumeResults): TransactionResult {
		$this->consumeResults = $consumeResults;
		return $this;
	}
    /** @return array|null List of acquire action execution results */
	public function getAcquireResults(): ?array {
		return $this->acquireResults;
	}
    /** @param array|null $acquireResults List of acquire action execution results */
	public function setAcquireResults(?array $acquireResults) {
		$this->acquireResults = $acquireResults;
	}
    /**
     * @param array|null $acquireResults List of acquire action execution results
     * @return TransactionResult
     */
	public function withAcquireResults(?array $acquireResults): TransactionResult {
		$this->acquireResults = $acquireResults;
		return $this;
	}
    /** @return bool|null Whether an error occurred during transaction execution */
	public function getHasError(): ?bool {
		return $this->hasError;
	}
    /** @param bool|null $hasError Whether an error occurred during transaction execution */
	public function setHasError(?bool $hasError) {
		$this->hasError = $hasError;
	}
    /**
     * @param bool|null $hasError Whether an error occurred during transaction execution
     * @return TransactionResult
     */
	public function withHasError(?bool $hasError): TransactionResult {
		$this->hasError = $hasError;
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
     * @return TransactionResult
     */
	public function withCreatedAt(?int $createdAt): TransactionResult {
		$this->createdAt = $createdAt;
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
     * @return TransactionResult
     */
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
            ->withHasError(array_key_exists('hasError', $data) ? $data['hasError'] : null)
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
            "hasError" => $this->getHasError(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}