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
 * Transaction Execution Result (Legacy)
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#stampsheetresult
 */
class StampSheetResult implements IModel {
	/**
     * @var string Transaction Result GRN
	 */
	private $stampSheetResultId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var array List of verify action request payload
	 */
	private $verifyTaskRequests;
	/**
     * @var array List of Consume Action request payload
	 */
	private $taskRequests;
	/**
     * @var AcquireAction Acquire Action request payload
	 */
	private $sheetRequest;
	/**
     * @var array Verify Action execution status code
	 */
	private $verifyTaskResultCodes;
	/**
     * @var array Verify Action execution results
	 */
	private $verifyTaskResults;
	/**
     * @var array Consume Action execution status code
	 */
	private $taskResultCodes;
	/**
     * @var array Consume Action execution results
	 */
	private $taskResults;
	/**
     * @var int Acquire Action execution status code
	 */
	private $sheetResultCode;
	/**
     * @var string Acquire Action execution results
	 */
	private $sheetResult;
	/**
     * @var string Transaction ID of the newly issued transaction by executing the transaction
	 */
	private $nextTransactionId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Transaction Result GRN */
	public function getStampSheetResultId(): ?string {
		return $this->stampSheetResultId;
	}
    /** @param string|null $stampSheetResultId Transaction Result GRN */
	public function setStampSheetResultId(?string $stampSheetResultId) {
		$this->stampSheetResultId = $stampSheetResultId;
	}
    /**
     * @param string|null $stampSheetResultId Transaction Result GRN
     * @return StampSheetResult
     */
	public function withStampSheetResultId(?string $stampSheetResultId): StampSheetResult {
		$this->stampSheetResultId = $stampSheetResultId;
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
     * @return StampSheetResult
     */
	public function withUserId(?string $userId): StampSheetResult {
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
     * @return StampSheetResult
     */
	public function withTransactionId(?string $transactionId): StampSheetResult {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return array|null List of verify action request payload */
	public function getVerifyTaskRequests(): ?array {
		return $this->verifyTaskRequests;
	}
    /** @param array|null $verifyTaskRequests List of verify action request payload */
	public function setVerifyTaskRequests(?array $verifyTaskRequests) {
		$this->verifyTaskRequests = $verifyTaskRequests;
	}
    /**
     * @param array|null $verifyTaskRequests List of verify action request payload
     * @return StampSheetResult
     */
	public function withVerifyTaskRequests(?array $verifyTaskRequests): StampSheetResult {
		$this->verifyTaskRequests = $verifyTaskRequests;
		return $this;
	}
    /** @return array|null List of Consume Action request payload */
	public function getTaskRequests(): ?array {
		return $this->taskRequests;
	}
    /** @param array|null $taskRequests List of Consume Action request payload */
	public function setTaskRequests(?array $taskRequests) {
		$this->taskRequests = $taskRequests;
	}
    /**
     * @param array|null $taskRequests List of Consume Action request payload
     * @return StampSheetResult
     */
	public function withTaskRequests(?array $taskRequests): StampSheetResult {
		$this->taskRequests = $taskRequests;
		return $this;
	}
    /** @return AcquireAction|null Acquire Action request payload */
	public function getSheetRequest(): ?AcquireAction {
		return $this->sheetRequest;
	}
    /** @param AcquireAction|null $sheetRequest Acquire Action request payload */
	public function setSheetRequest(?AcquireAction $sheetRequest) {
		$this->sheetRequest = $sheetRequest;
	}
    /**
     * @param AcquireAction|null $sheetRequest Acquire Action request payload
     * @return StampSheetResult
     */
	public function withSheetRequest(?AcquireAction $sheetRequest): StampSheetResult {
		$this->sheetRequest = $sheetRequest;
		return $this;
	}
    /** @return array|null Verify Action execution status code */
	public function getVerifyTaskResultCodes(): ?array {
		return $this->verifyTaskResultCodes;
	}
    /** @param array|null $verifyTaskResultCodes Verify Action execution status code */
	public function setVerifyTaskResultCodes(?array $verifyTaskResultCodes) {
		$this->verifyTaskResultCodes = $verifyTaskResultCodes;
	}
    /**
     * @param array|null $verifyTaskResultCodes Verify Action execution status code
     * @return StampSheetResult
     */
	public function withVerifyTaskResultCodes(?array $verifyTaskResultCodes): StampSheetResult {
		$this->verifyTaskResultCodes = $verifyTaskResultCodes;
		return $this;
	}
    /** @return array|null Verify Action execution results */
	public function getVerifyTaskResults(): ?array {
		return $this->verifyTaskResults;
	}
    /** @param array|null $verifyTaskResults Verify Action execution results */
	public function setVerifyTaskResults(?array $verifyTaskResults) {
		$this->verifyTaskResults = $verifyTaskResults;
	}
    /**
     * @param array|null $verifyTaskResults Verify Action execution results
     * @return StampSheetResult
     */
	public function withVerifyTaskResults(?array $verifyTaskResults): StampSheetResult {
		$this->verifyTaskResults = $verifyTaskResults;
		return $this;
	}
    /** @return array|null Consume Action execution status code */
	public function getTaskResultCodes(): ?array {
		return $this->taskResultCodes;
	}
    /** @param array|null $taskResultCodes Consume Action execution status code */
	public function setTaskResultCodes(?array $taskResultCodes) {
		$this->taskResultCodes = $taskResultCodes;
	}
    /**
     * @param array|null $taskResultCodes Consume Action execution status code
     * @return StampSheetResult
     */
	public function withTaskResultCodes(?array $taskResultCodes): StampSheetResult {
		$this->taskResultCodes = $taskResultCodes;
		return $this;
	}
    /** @return array|null Consume Action execution results */
	public function getTaskResults(): ?array {
		return $this->taskResults;
	}
    /** @param array|null $taskResults Consume Action execution results */
	public function setTaskResults(?array $taskResults) {
		$this->taskResults = $taskResults;
	}
    /**
     * @param array|null $taskResults Consume Action execution results
     * @return StampSheetResult
     */
	public function withTaskResults(?array $taskResults): StampSheetResult {
		$this->taskResults = $taskResults;
		return $this;
	}
    /** @return int|null Acquire Action execution status code */
	public function getSheetResultCode(): ?int {
		return $this->sheetResultCode;
	}
    /** @param int|null $sheetResultCode Acquire Action execution status code */
	public function setSheetResultCode(?int $sheetResultCode) {
		$this->sheetResultCode = $sheetResultCode;
	}
    /**
     * @param int|null $sheetResultCode Acquire Action execution status code
     * @return StampSheetResult
     */
	public function withSheetResultCode(?int $sheetResultCode): StampSheetResult {
		$this->sheetResultCode = $sheetResultCode;
		return $this;
	}
    /** @return string|null Acquire Action execution results */
	public function getSheetResult(): ?string {
		return $this->sheetResult;
	}
    /** @param string|null $sheetResult Acquire Action execution results */
	public function setSheetResult(?string $sheetResult) {
		$this->sheetResult = $sheetResult;
	}
    /**
     * @param string|null $sheetResult Acquire Action execution results
     * @return StampSheetResult
     */
	public function withSheetResult(?string $sheetResult): StampSheetResult {
		$this->sheetResult = $sheetResult;
		return $this;
	}
    /** @return string|null Transaction ID of the newly issued transaction by executing the transaction */
	public function getNextTransactionId(): ?string {
		return $this->nextTransactionId;
	}
    /** @param string|null $nextTransactionId Transaction ID of the newly issued transaction by executing the transaction */
	public function setNextTransactionId(?string $nextTransactionId) {
		$this->nextTransactionId = $nextTransactionId;
	}
    /**
     * @param string|null $nextTransactionId Transaction ID of the newly issued transaction by executing the transaction
     * @return StampSheetResult
     */
	public function withNextTransactionId(?string $nextTransactionId): StampSheetResult {
		$this->nextTransactionId = $nextTransactionId;
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
     * @return StampSheetResult
     */
	public function withCreatedAt(?int $createdAt): StampSheetResult {
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
     * @return StampSheetResult
     */
	public function withRevision(?int $revision): StampSheetResult {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?StampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new StampSheetResult())
            ->withStampSheetResultId(array_key_exists('stampSheetResultId', $data) && $data['stampSheetResultId'] !== null ? $data['stampSheetResultId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withVerifyTaskRequests(!array_key_exists('verifyTaskRequests', $data) || $data['verifyTaskRequests'] === null ? null : array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                $data['verifyTaskRequests']
            ))
            ->withTaskRequests(!array_key_exists('taskRequests', $data) || $data['taskRequests'] === null ? null : array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                $data['taskRequests']
            ))
            ->withSheetRequest(array_key_exists('sheetRequest', $data) && $data['sheetRequest'] !== null ? AcquireAction::fromJson($data['sheetRequest']) : null)
            ->withVerifyTaskResultCodes(!array_key_exists('verifyTaskResultCodes', $data) || $data['verifyTaskResultCodes'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['verifyTaskResultCodes']
            ))
            ->withVerifyTaskResults(!array_key_exists('verifyTaskResults', $data) || $data['verifyTaskResults'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['verifyTaskResults']
            ))
            ->withTaskResultCodes(!array_key_exists('taskResultCodes', $data) || $data['taskResultCodes'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['taskResultCodes']
            ))
            ->withTaskResults(!array_key_exists('taskResults', $data) || $data['taskResults'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['taskResults']
            ))
            ->withSheetResultCode(array_key_exists('sheetResultCode', $data) && $data['sheetResultCode'] !== null ? $data['sheetResultCode'] : null)
            ->withSheetResult(array_key_exists('sheetResult', $data) && $data['sheetResult'] !== null ? $data['sheetResult'] : null)
            ->withNextTransactionId(array_key_exists('nextTransactionId', $data) && $data['nextTransactionId'] !== null ? $data['nextTransactionId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "stampSheetResultId" => $this->getStampSheetResultId(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "verifyTaskRequests" => $this->getVerifyTaskRequests() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyTaskRequests()
            ),
            "taskRequests" => $this->getTaskRequests() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTaskRequests()
            ),
            "sheetRequest" => $this->getSheetRequest() !== null ? $this->getSheetRequest()->toJson() : null,
            "verifyTaskResultCodes" => $this->getVerifyTaskResultCodes() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getVerifyTaskResultCodes()
            ),
            "verifyTaskResults" => $this->getVerifyTaskResults() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getVerifyTaskResults()
            ),
            "taskResultCodes" => $this->getTaskResultCodes() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResultCodes()
            ),
            "taskResults" => $this->getTaskResults() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResults()
            ),
            "sheetResultCode" => $this->getSheetResultCode(),
            "sheetResult" => $this->getSheetResult(),
            "nextTransactionId" => $this->getNextTransactionId(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}