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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getDailyTransactionHistory: Get daily transaction history by specifying date and currency
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#getdailytransactionhistory
 */
class GetDailyTransactionHistoryRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Year */
    private $year;
    /** @var int Month */
    private $month;
    /** @var int Day */
    private $day;
    /** @var string Currency Code */
    private $currency;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return GetDailyTransactionHistoryRequest
     */
	public function withNamespaceName(?string $namespaceName): GetDailyTransactionHistoryRequest {
		$this->namespaceName = $namespaceName;
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
     * @return GetDailyTransactionHistoryRequest
     */
	public function withYear(?int $year): GetDailyTransactionHistoryRequest {
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
     * @return GetDailyTransactionHistoryRequest
     */
	public function withMonth(?int $month): GetDailyTransactionHistoryRequest {
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
     * @return GetDailyTransactionHistoryRequest
     */
	public function withDay(?int $day): GetDailyTransactionHistoryRequest {
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
     * @return GetDailyTransactionHistoryRequest
     */
	public function withCurrency(?string $currency): GetDailyTransactionHistoryRequest {
		$this->currency = $currency;
		return $this;
	}

    public static function fromJson(?array $data): ?GetDailyTransactionHistoryRequest {
        if ($data === null) {
            return null;
        }
        return (new GetDailyTransactionHistoryRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withDay(array_key_exists('day', $data) && $data['day'] !== null ? $data['day'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "day" => $this->getDay(),
            "currency" => $this->getCurrency(),
        );
    }
}