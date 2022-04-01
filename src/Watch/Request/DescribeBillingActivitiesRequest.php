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

namespace Gs2\Watch\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeBillingActivitiesRequest extends Gs2BasicRequest {
    /** @var int */
    private $year;
    /** @var int */
    private $month;
    /** @var string */
    private $service;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;

	public function getYear(): ?int {
		return $this->year;
	}

	public function setYear(?int $year) {
		$this->year = $year;
	}

	public function withYear(?int $year): DescribeBillingActivitiesRequest {
		$this->year = $year;
		return $this;
	}

	public function getMonth(): ?int {
		return $this->month;
	}

	public function setMonth(?int $month) {
		$this->month = $month;
	}

	public function withMonth(?int $month): DescribeBillingActivitiesRequest {
		$this->month = $month;
		return $this;
	}

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): DescribeBillingActivitiesRequest {
		$this->service = $service;
		return $this;
	}

	public function getPageToken(): ?string {
		return $this->pageToken;
	}

	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}

	public function withPageToken(?string $pageToken): DescribeBillingActivitiesRequest {
		$this->pageToken = $pageToken;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): DescribeBillingActivitiesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeBillingActivitiesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeBillingActivitiesRequest())
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "service" => $this->getService(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}