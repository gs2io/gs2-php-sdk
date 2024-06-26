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

class GetDailyTransactionHistoryRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var int */
    private $year;
    /** @var int */
    private $month;
    /** @var int */
    private $day;
    /** @var string */
    private $currency;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetDailyTransactionHistoryRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getYear(): ?int {
		return $this->year;
	}
	public function setYear(?int $year) {
		$this->year = $year;
	}
	public function withYear(?int $year): GetDailyTransactionHistoryRequest {
		$this->year = $year;
		return $this;
	}
	public function getMonth(): ?int {
		return $this->month;
	}
	public function setMonth(?int $month) {
		$this->month = $month;
	}
	public function withMonth(?int $month): GetDailyTransactionHistoryRequest {
		$this->month = $month;
		return $this;
	}
	public function getDay(): ?int {
		return $this->day;
	}
	public function setDay(?int $day) {
		$this->day = $day;
	}
	public function withDay(?int $day): GetDailyTransactionHistoryRequest {
		$this->day = $day;
		return $this;
	}
	public function getCurrency(): ?string {
		return $this->currency;
	}
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
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