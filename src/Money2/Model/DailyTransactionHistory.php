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
 * Daily Transaction History
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#dailytransactionhistory
 */
class DailyTransactionHistory implements IModel {
	/**
     * @var string Transaction History of Daily Transactions GRN
	 */
	private $dailyTransactionHistoryId;
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
     * @var string Currency Code
	 */
	private $currency;
	/**
     * @var float Deposit Amount
	 */
	private $depositAmount;
	/**
     * @var float Withdraw Amount
	 */
	private $withdrawAmount;
	/**
     * @var int Issue Count
	 */
	private $issueCount;
	/**
     * @var int Consume Count
	 */
	private $consumeCount;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Transaction History of Daily Transactions GRN */
	public function getDailyTransactionHistoryId(): ?string {
		return $this->dailyTransactionHistoryId;
	}
    /** @param string|null $dailyTransactionHistoryId Transaction History of Daily Transactions GRN */
	public function setDailyTransactionHistoryId(?string $dailyTransactionHistoryId) {
		$this->dailyTransactionHistoryId = $dailyTransactionHistoryId;
	}
    /**
     * @param string|null $dailyTransactionHistoryId Transaction History of Daily Transactions GRN
     * @return DailyTransactionHistory
     */
	public function withDailyTransactionHistoryId(?string $dailyTransactionHistoryId): DailyTransactionHistory {
		$this->dailyTransactionHistoryId = $dailyTransactionHistoryId;
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
     * @return DailyTransactionHistory
     */
	public function withYear(?int $year): DailyTransactionHistory {
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
     * @return DailyTransactionHistory
     */
	public function withMonth(?int $month): DailyTransactionHistory {
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
     * @return DailyTransactionHistory
     */
	public function withDay(?int $day): DailyTransactionHistory {
		$this->day = $day;
		return $this;
	}
    /** @return string|null Currency Code */
	public function getCurrency(): ?string {
		return $this->currency;
	}
    /** @param string|null $currency Currency Code */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
    /**
     * @param string|null $currency Currency Code
     * @return DailyTransactionHistory
     */
	public function withCurrency(?string $currency): DailyTransactionHistory {
		$this->currency = $currency;
		return $this;
	}
    /** @return float|null Deposit Amount */
	public function getDepositAmount(): ?float {
		return $this->depositAmount;
	}
    /** @param float|null $depositAmount Deposit Amount */
	public function setDepositAmount(?float $depositAmount) {
		$this->depositAmount = $depositAmount;
	}
    /**
     * @param float|null $depositAmount Deposit Amount
     * @return DailyTransactionHistory
     */
	public function withDepositAmount(?float $depositAmount): DailyTransactionHistory {
		$this->depositAmount = $depositAmount;
		return $this;
	}
    /** @return float|null Withdraw Amount */
	public function getWithdrawAmount(): ?float {
		return $this->withdrawAmount;
	}
    /** @param float|null $withdrawAmount Withdraw Amount */
	public function setWithdrawAmount(?float $withdrawAmount) {
		$this->withdrawAmount = $withdrawAmount;
	}
    /**
     * @param float|null $withdrawAmount Withdraw Amount
     * @return DailyTransactionHistory
     */
	public function withWithdrawAmount(?float $withdrawAmount): DailyTransactionHistory {
		$this->withdrawAmount = $withdrawAmount;
		return $this;
	}
    /** @return int|null Issue Count */
	public function getIssueCount(): ?int {
		return $this->issueCount;
	}
    /** @param int|null $issueCount Issue Count */
	public function setIssueCount(?int $issueCount) {
		$this->issueCount = $issueCount;
	}
    /**
     * @param int|null $issueCount Issue Count
     * @return DailyTransactionHistory
     */
	public function withIssueCount(?int $issueCount): DailyTransactionHistory {
		$this->issueCount = $issueCount;
		return $this;
	}
    /** @return int|null Consume Count */
	public function getConsumeCount(): ?int {
		return $this->consumeCount;
	}
    /** @param int|null $consumeCount Consume Count */
	public function setConsumeCount(?int $consumeCount) {
		$this->consumeCount = $consumeCount;
	}
    /**
     * @param int|null $consumeCount Consume Count
     * @return DailyTransactionHistory
     */
	public function withConsumeCount(?int $consumeCount): DailyTransactionHistory {
		$this->consumeCount = $consumeCount;
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
     * @return DailyTransactionHistory
     */
	public function withUpdatedAt(?int $updatedAt): DailyTransactionHistory {
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
     * @return DailyTransactionHistory
     */
	public function withRevision(?int $revision): DailyTransactionHistory {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?DailyTransactionHistory {
        if ($data === null) {
            return null;
        }
        return (new DailyTransactionHistory())
            ->withDailyTransactionHistoryId(array_key_exists('dailyTransactionHistoryId', $data) && $data['dailyTransactionHistoryId'] !== null ? $data['dailyTransactionHistoryId'] : null)
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withDay(array_key_exists('day', $data) && $data['day'] !== null ? $data['day'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withDepositAmount(array_key_exists('depositAmount', $data) && $data['depositAmount'] !== null ? $data['depositAmount'] : null)
            ->withWithdrawAmount(array_key_exists('withdrawAmount', $data) && $data['withdrawAmount'] !== null ? $data['withdrawAmount'] : null)
            ->withIssueCount(array_key_exists('issueCount', $data) && $data['issueCount'] !== null ? $data['issueCount'] : null)
            ->withConsumeCount(array_key_exists('consumeCount', $data) && $data['consumeCount'] !== null ? $data['consumeCount'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "dailyTransactionHistoryId" => $this->getDailyTransactionHistoryId(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "day" => $this->getDay(),
            "currency" => $this->getCurrency(),
            "depositAmount" => $this->getDepositAmount(),
            "withdrawAmount" => $this->getWithdrawAmount(),
            "issueCount" => $this->getIssueCount(),
            "consumeCount" => $this->getConsumeCount(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}