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
 * Refund history information
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#refundhistory
 */
class RefundHistory implements IModel {
	/**
     * @var string Refund History GRN
	 */
	private $refundHistoryId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var int Year
	 */
	private $year;
	/**
     * @var int Month
	 */
	private $month;
	/**
     * @var int Day
	 */
	private $day;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var RefundEvent Refund event information
	 */
	private $detail;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
    /** @return string|null Refund History GRN */
	public function getRefundHistoryId(): ?string {
		return $this->refundHistoryId;
	}
    /** @param string|null $refundHistoryId Refund History GRN */
	public function setRefundHistoryId(?string $refundHistoryId) {
		$this->refundHistoryId = $refundHistoryId;
	}
    /**
     * @param string|null $refundHistoryId Refund History GRN
     * @return RefundHistory
     */
	public function withRefundHistoryId(?string $refundHistoryId): RefundHistory {
		$this->refundHistoryId = $refundHistoryId;
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
     * @return RefundHistory
     */
	public function withTransactionId(?string $transactionId): RefundHistory {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return int|null Year */
	public function getYear(): ?int {
		return $this->year;
	}
    /** @param int|null $year Year */
	public function setYear(?int $year) {
		$this->year = $year;
	}
    /**
     * @param int|null $year Year
     * @return RefundHistory
     */
	public function withYear(?int $year): RefundHistory {
		$this->year = $year;
		return $this;
	}
    /** @return int|null Month */
	public function getMonth(): ?int {
		return $this->month;
	}
    /** @param int|null $month Month */
	public function setMonth(?int $month) {
		$this->month = $month;
	}
    /**
     * @param int|null $month Month
     * @return RefundHistory
     */
	public function withMonth(?int $month): RefundHistory {
		$this->month = $month;
		return $this;
	}
    /** @return int|null Day */
	public function getDay(): ?int {
		return $this->day;
	}
    /** @param int|null $day Day */
	public function setDay(?int $day) {
		$this->day = $day;
	}
    /**
     * @param int|null $day Day
     * @return RefundHistory
     */
	public function withDay(?int $day): RefundHistory {
		$this->day = $day;
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
     * @return RefundHistory
     */
	public function withUserId(?string $userId): RefundHistory {
		$this->userId = $userId;
		return $this;
	}
    /** @return RefundEvent|null Refund event information */
	public function getDetail(): ?RefundEvent {
		return $this->detail;
	}
    /** @param RefundEvent|null $detail Refund event information */
	public function setDetail(?RefundEvent $detail) {
		$this->detail = $detail;
	}
    /**
     * @param RefundEvent|null $detail Refund event information
     * @return RefundHistory
     */
	public function withDetail(?RefundEvent $detail): RefundHistory {
		$this->detail = $detail;
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
     * @return RefundHistory
     */
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