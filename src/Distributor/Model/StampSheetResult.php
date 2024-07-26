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


class StampSheetResult implements IModel {
	/**
     * @var string
	 */
	private $stampSheetResultId;
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
	private $verifyTaskRequests;
	/**
     * @var array
	 */
	private $taskRequests;
	/**
     * @var AcquireAction
	 */
	private $sheetRequest;
	/**
     * @var array
	 */
	private $verifyTaskResultCodes;
	/**
     * @var array
	 */
	private $verifyTaskResults;
	/**
     * @var array
	 */
	private $taskResultCodes;
	/**
     * @var array
	 */
	private $taskResults;
	/**
     * @var int
	 */
	private $sheetResultCode;
	/**
     * @var string
	 */
	private $sheetResult;
	/**
     * @var string
	 */
	private $nextTransactionId;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getStampSheetResultId(): ?string {
		return $this->stampSheetResultId;
	}
	public function setStampSheetResultId(?string $stampSheetResultId) {
		$this->stampSheetResultId = $stampSheetResultId;
	}
	public function withStampSheetResultId(?string $stampSheetResultId): StampSheetResult {
		$this->stampSheetResultId = $stampSheetResultId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): StampSheetResult {
		$this->userId = $userId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): StampSheetResult {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getVerifyTaskRequests(): ?array {
		return $this->verifyTaskRequests;
	}
	public function setVerifyTaskRequests(?array $verifyTaskRequests) {
		$this->verifyTaskRequests = $verifyTaskRequests;
	}
	public function withVerifyTaskRequests(?array $verifyTaskRequests): StampSheetResult {
		$this->verifyTaskRequests = $verifyTaskRequests;
		return $this;
	}
	public function getTaskRequests(): ?array {
		return $this->taskRequests;
	}
	public function setTaskRequests(?array $taskRequests) {
		$this->taskRequests = $taskRequests;
	}
	public function withTaskRequests(?array $taskRequests): StampSheetResult {
		$this->taskRequests = $taskRequests;
		return $this;
	}
	public function getSheetRequest(): ?AcquireAction {
		return $this->sheetRequest;
	}
	public function setSheetRequest(?AcquireAction $sheetRequest) {
		$this->sheetRequest = $sheetRequest;
	}
	public function withSheetRequest(?AcquireAction $sheetRequest): StampSheetResult {
		$this->sheetRequest = $sheetRequest;
		return $this;
	}
	public function getVerifyTaskResultCodes(): ?array {
		return $this->verifyTaskResultCodes;
	}
	public function setVerifyTaskResultCodes(?array $verifyTaskResultCodes) {
		$this->verifyTaskResultCodes = $verifyTaskResultCodes;
	}
	public function withVerifyTaskResultCodes(?array $verifyTaskResultCodes): StampSheetResult {
		$this->verifyTaskResultCodes = $verifyTaskResultCodes;
		return $this;
	}
	public function getVerifyTaskResults(): ?array {
		return $this->verifyTaskResults;
	}
	public function setVerifyTaskResults(?array $verifyTaskResults) {
		$this->verifyTaskResults = $verifyTaskResults;
	}
	public function withVerifyTaskResults(?array $verifyTaskResults): StampSheetResult {
		$this->verifyTaskResults = $verifyTaskResults;
		return $this;
	}
	public function getTaskResultCodes(): ?array {
		return $this->taskResultCodes;
	}
	public function setTaskResultCodes(?array $taskResultCodes) {
		$this->taskResultCodes = $taskResultCodes;
	}
	public function withTaskResultCodes(?array $taskResultCodes): StampSheetResult {
		$this->taskResultCodes = $taskResultCodes;
		return $this;
	}
	public function getTaskResults(): ?array {
		return $this->taskResults;
	}
	public function setTaskResults(?array $taskResults) {
		$this->taskResults = $taskResults;
	}
	public function withTaskResults(?array $taskResults): StampSheetResult {
		$this->taskResults = $taskResults;
		return $this;
	}
	public function getSheetResultCode(): ?int {
		return $this->sheetResultCode;
	}
	public function setSheetResultCode(?int $sheetResultCode) {
		$this->sheetResultCode = $sheetResultCode;
	}
	public function withSheetResultCode(?int $sheetResultCode): StampSheetResult {
		$this->sheetResultCode = $sheetResultCode;
		return $this;
	}
	public function getSheetResult(): ?string {
		return $this->sheetResult;
	}
	public function setSheetResult(?string $sheetResult) {
		$this->sheetResult = $sheetResult;
	}
	public function withSheetResult(?string $sheetResult): StampSheetResult {
		$this->sheetResult = $sheetResult;
		return $this;
	}
	public function getNextTransactionId(): ?string {
		return $this->nextTransactionId;
	}
	public function setNextTransactionId(?string $nextTransactionId) {
		$this->nextTransactionId = $nextTransactionId;
	}
	public function withNextTransactionId(?string $nextTransactionId): StampSheetResult {
		$this->nextTransactionId = $nextTransactionId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): StampSheetResult {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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
            ->withVerifyTaskRequests(array_map(
                function ($item) {
                    return VerifyAction::fromJson($item);
                },
                array_key_exists('verifyTaskRequests', $data) && $data['verifyTaskRequests'] !== null ? $data['verifyTaskRequests'] : []
            ))
            ->withTaskRequests(array_map(
                function ($item) {
                    return ConsumeAction::fromJson($item);
                },
                array_key_exists('taskRequests', $data) && $data['taskRequests'] !== null ? $data['taskRequests'] : []
            ))
            ->withSheetRequest(array_key_exists('sheetRequest', $data) && $data['sheetRequest'] !== null ? AcquireAction::fromJson($data['sheetRequest']) : null)
            ->withVerifyTaskResultCodes(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('verifyTaskResultCodes', $data) && $data['verifyTaskResultCodes'] !== null ? $data['verifyTaskResultCodes'] : []
            ))
            ->withVerifyTaskResults(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('verifyTaskResults', $data) && $data['verifyTaskResults'] !== null ? $data['verifyTaskResults'] : []
            ))
            ->withTaskResultCodes(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('taskResultCodes', $data) && $data['taskResultCodes'] !== null ? $data['taskResultCodes'] : []
            ))
            ->withTaskResults(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('taskResults', $data) && $data['taskResults'] !== null ? $data['taskResults'] : []
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
            "verifyTaskRequests" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getVerifyTaskRequests() !== null && $this->getVerifyTaskRequests() !== null ? $this->getVerifyTaskRequests() : []
            ),
            "taskRequests" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTaskRequests() !== null && $this->getTaskRequests() !== null ? $this->getTaskRequests() : []
            ),
            "sheetRequest" => $this->getSheetRequest() !== null ? $this->getSheetRequest()->toJson() : null,
            "verifyTaskResultCodes" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getVerifyTaskResultCodes() !== null && $this->getVerifyTaskResultCodes() !== null ? $this->getVerifyTaskResultCodes() : []
            ),
            "verifyTaskResults" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getVerifyTaskResults() !== null && $this->getVerifyTaskResults() !== null ? $this->getVerifyTaskResults() : []
            ),
            "taskResultCodes" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResultCodes() !== null && $this->getTaskResultCodes() !== null ? $this->getTaskResultCodes() : []
            ),
            "taskResults" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResults() !== null && $this->getTaskResults() !== null ? $this->getTaskResults() : []
            ),
            "sheetResultCode" => $this->getSheetResultCode(),
            "sheetResult" => $this->getSheetResult(),
            "nextTransactionId" => $this->getNextTransactionId(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}