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
 * Request for describeRefundHistoriesByDate: List store refund history by year and month
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#describerefundhistoriesbydate
 */
class DescribeRefundHistoriesByDateRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Year */
    private $year;
    /** @var int Month */
    private $month;
    /** @var int Day */
    private $day;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
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
     * @return DescribeRefundHistoriesByDateRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeRefundHistoriesByDateRequest {
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
     * @return DescribeRefundHistoriesByDateRequest
     */
	public function withYear(?int $year): DescribeRefundHistoriesByDateRequest {
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
     * @return DescribeRefundHistoriesByDateRequest
     */
	public function withMonth(?int $month): DescribeRefundHistoriesByDateRequest {
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
     * @return DescribeRefundHistoriesByDateRequest
     */
	public function withDay(?int $day): DescribeRefundHistoriesByDateRequest {
		$this->day = $day;
		return $this;
	}
    /** @return string|null Token specifying the position from which to start acquiring data */
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
    /** @param string|null $pageToken Token specifying the position from which to start acquiring data */
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
    /**
     * @param string|null $pageToken Token specifying the position from which to start acquiring data
     * @return DescribeRefundHistoriesByDateRequest
     */
	public function withPageToken(?string $pageToken): DescribeRefundHistoriesByDateRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data items to retrieve */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data items to retrieve */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data items to retrieve
     * @return DescribeRefundHistoriesByDateRequest
     */
	public function withLimit(?int $limit): DescribeRefundHistoriesByDateRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeRefundHistoriesByDateRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeRefundHistoriesByDateRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withDay(array_key_exists('day', $data) && $data['day'] !== null ? $data['day'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "day" => $this->getDay(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}