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
	private $taskResults;
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

    public static function fromJson(?array $data): ?StampSheetResult {
        if ($data === null) {
            return null;
        }
        return (new StampSheetResult())
            ->withStampSheetResultId(array_key_exists('stampSheetResultId', $data) && $data['stampSheetResultId'] !== null ? $data['stampSheetResultId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withTaskResults(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('taskResults', $data) && $data['taskResults'] !== null ? $data['taskResults'] : []
            ))
            ->withSheetResult(array_key_exists('sheetResult', $data) && $data['sheetResult'] !== null ? $data['sheetResult'] : null)
            ->withNextTransactionId(array_key_exists('nextTransactionId', $data) && $data['nextTransactionId'] !== null ? $data['nextTransactionId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "stampSheetResultId" => $this->getStampSheetResultId(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "taskResults" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getTaskResults() !== null && $this->getTaskResults() !== null ? $this->getTaskResults() : []
            ),
            "sheetResult" => $this->getSheetResult(),
            "nextTransactionId" => $this->getNextTransactionId(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}