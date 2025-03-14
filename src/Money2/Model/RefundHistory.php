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


class RefundHistory implements IModel {
	/**
     * @var string
	 */
	private $refundHistoryId;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var int
	 */
	private $year;
	/**
     * @var int
	 */
	private $month;
	/**
     * @var int
	 */
	private $day;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var RefundEvent
	 */
	private $detail;
	/**
     * @var int
	 */
	private $createdAt;
	public function getRefundHistoryId(): ?string {
		return $this->refundHistoryId;
	}
	public function setRefundHistoryId(?string $refundHistoryId) {
		$this->refundHistoryId = $refundHistoryId;
	}
	public function withRefundHistoryId(?string $refundHistoryId): RefundHistory {
		$this->refundHistoryId = $refundHistoryId;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): RefundHistory {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getYear(): ?int {
		return $this->year;
	}
	public function setYear(?int $year) {
		$this->year = $year;
	}
	public function withYear(?int $year): RefundHistory {
		$this->year = $year;
		return $this;
	}
	public function getMonth(): ?int {
		return $this->month;
	}
	public function setMonth(?int $month) {
		$this->month = $month;
	}
	public function withMonth(?int $month): RefundHistory {
		$this->month = $month;
		return $this;
	}
	public function getDay(): ?int {
		return $this->day;
	}
	public function setDay(?int $day) {
		$this->day = $day;
	}
	public function withDay(?int $day): RefundHistory {
		$this->day = $day;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): RefundHistory {
		$this->userId = $userId;
		return $this;
	}
	public function getDetail(): ?RefundEvent {
		return $this->detail;
	}
	public function setDetail(?RefundEvent $detail) {
		$this->detail = $detail;
	}
	public function withDetail(?RefundEvent $detail): RefundHistory {
		$this->detail = $detail;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): RefundHistory {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?RefundHistory {
        if ($data === null) {
            return null;
        }
        return (new RefundHistory())
            ->withRefundHistoryId(array_key_exists('refundHistoryId', $data) && $data['refundHistoryId'] !== null ? $data['refundHistoryId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withDay(array_key_exists('day', $data) && $data['day'] !== null ? $data['day'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withDetail(array_key_exists('detail', $data) && $data['detail'] !== null ? RefundEvent::fromJson($data['detail']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "refundHistoryId" => $this->getRefundHistoryId(),
            "transactionId" => $this->getTransactionId(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "day" => $this->getDay(),
            "userId" => $this->getUserId(),
            "detail" => $this->getDetail() !== null ? $this->getDetail()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
        );
    }
}