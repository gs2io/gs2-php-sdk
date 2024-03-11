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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeBillingsRequest extends Gs2BasicRequest {
    /** @var string */
    private $accountToken;
    /** @var string */
    private $projectName;
    /** @var int */
    private $year;
    /** @var int */
    private $month;
    /** @var string */
    private $region;
    /** @var string */
    private $service;
	public function getAccountToken(): ?string {
		return $this->accountToken;
	}
	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}
	public function withAccountToken(?string $accountToken): DescribeBillingsRequest {
		$this->accountToken = $accountToken;
		return $this;
	}
	public function getProjectName(): ?string {
		return $this->projectName;
	}
	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}
	public function withProjectName(?string $projectName): DescribeBillingsRequest {
		$this->projectName = $projectName;
		return $this;
	}
	public function getYear(): ?int {
		return $this->year;
	}
	public function setYear(?int $year) {
		$this->year = $year;
	}
	public function withYear(?int $year): DescribeBillingsRequest {
		$this->year = $year;
		return $this;
	}
	public function getMonth(): ?int {
		return $this->month;
	}
	public function setMonth(?int $month) {
		$this->month = $month;
	}
	public function withMonth(?int $month): DescribeBillingsRequest {
		$this->month = $month;
		return $this;
	}
	public function getRegion(): ?string {
		return $this->region;
	}
	public function setRegion(?string $region) {
		$this->region = $region;
	}
	public function withRegion(?string $region): DescribeBillingsRequest {
		$this->region = $region;
		return $this;
	}
	public function getService(): ?string {
		return $this->service;
	}
	public function setService(?string $service) {
		$this->service = $service;
	}
	public function withService(?string $service): DescribeBillingsRequest {
		$this->service = $service;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeBillingsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeBillingsRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withProjectName(array_key_exists('projectName', $data) && $data['projectName'] !== null ? $data['projectName'] : null)
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withRegion(array_key_exists('region', $data) && $data['region'] !== null ? $data['region'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "projectName" => $this->getProjectName(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "region" => $this->getRegion(),
            "service" => $this->getService(),
        );
    }
}