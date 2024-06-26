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

class DescribeDailyTransactionHistoriesByCurrencyRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $currency;
    /** @var int */
    private $year;
    /** @var int */
    private $month;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): DescribeDailyTransactionHistoriesByCurrencyRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getCurrency(): ?string {
		return $this->currency;
	}
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
	public function withCurrency(?string $currency): DescribeDailyTransactionHistoriesByCurrencyRequest {
		$this->currency = $currency;
		return $this;
	}
	public function getYear(): ?int {
		return $this->year;
	}
	public function setYear(?int $year) {
		$this->year = $year;
	}
	public function withYear(?int $year): DescribeDailyTransactionHistoriesByCurrencyRequest {
		$this->year = $year;
		return $this;
	}
	public function getMonth(): ?int {
		return $this->month;
	}
	public function setMonth(?int $month) {
		$this->month = $month;
	}
	public function withMonth(?int $month): DescribeDailyTransactionHistoriesByCurrencyRequest {
		$this->month = $month;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): DescribeDailyTransactionHistoriesByCurrencyRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): DescribeDailyTransactionHistoriesByCurrencyRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeDailyTransactionHistoriesByCurrencyRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeDailyTransactionHistoriesByCurrencyRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "currency" => $this->getCurrency(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}