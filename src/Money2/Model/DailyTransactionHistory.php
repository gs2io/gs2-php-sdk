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


class DailyTransactionHistory implements IModel {
	/**
     * @var string
	 */
	private $dailyTransactionHistoryId;
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
	private $currency;
	/**
     * @var float
	 */
	private $depositAmount;
	/**
     * @var float
	 */
	private $withdrawAmount;
	/**
     * @var int
	 */
	private $issueCount;
	/**
     * @var int
	 */
	private $consumeCount;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getDailyTransactionHistoryId(): ?string {
		return $this->dailyTransactionHistoryId;
	}
	public function setDailyTransactionHistoryId(?string $dailyTransactionHistoryId) {
		$this->dailyTransactionHistoryId = $dailyTransactionHistoryId;
	}
	public function withDailyTransactionHistoryId(?string $dailyTransactionHistoryId): DailyTransactionHistory {
		$this->dailyTransactionHistoryId = $dailyTransactionHistoryId;
		return $this;
	}
	public function getYear(): ?int {
		return $this->year;
	}
	public function setYear(?int $year) {
		$this->year = $year;
	}
	public function withYear(?int $year): DailyTransactionHistory {
		$this->year = $year;
		return $this;
	}
	public function getMonth(): ?int {
		return $this->month;
	}
	public function setMonth(?int $month) {
		$this->month = $month;
	}
	public function withMonth(?int $month): DailyTransactionHistory {
		$this->month = $month;
		return $this;
	}
	public function getDay(): ?int {
		return $this->day;
	}
	public function setDay(?int $day) {
		$this->day = $day;
	}
	public function withDay(?int $day): DailyTransactionHistory {
		$this->day = $day;
		return $this;
	}
	public function getCurrency(): ?string {
		return $this->currency;
	}
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
	public function withCurrency(?string $currency): DailyTransactionHistory {
		$this->currency = $currency;
		return $this;
	}
	public function getDepositAmount(): ?float {
		return $this->depositAmount;
	}
	public function setDepositAmount(?float $depositAmount) {
		$this->depositAmount = $depositAmount;
	}
	public function withDepositAmount(?float $depositAmount): DailyTransactionHistory {
		$this->depositAmount = $depositAmount;
		return $this;
	}
	public function getWithdrawAmount(): ?float {
		return $this->withdrawAmount;
	}
	public function setWithdrawAmount(?float $withdrawAmount) {
		$this->withdrawAmount = $withdrawAmount;
	}
	public function withWithdrawAmount(?float $withdrawAmount): DailyTransactionHistory {
		$this->withdrawAmount = $withdrawAmount;
		return $this;
	}
	public function getIssueCount(): ?int {
		return $this->issueCount;
	}
	public function setIssueCount(?int $issueCount) {
		$this->issueCount = $issueCount;
	}
	public function withIssueCount(?int $issueCount): DailyTransactionHistory {
		$this->issueCount = $issueCount;
		return $this;
	}
	public function getConsumeCount(): ?int {
		return $this->consumeCount;
	}
	public function setConsumeCount(?int $consumeCount) {
		$this->consumeCount = $consumeCount;
	}
	public function withConsumeCount(?int $consumeCount): DailyTransactionHistory {
		$this->consumeCount = $consumeCount;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): DailyTransactionHistory {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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