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

/** Request for describeBillings: Get list of usage status */
class DescribeBillingsRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Project Name */
    private $projectName;
    /** @var int Year the event occurred */
    private $year;
    /** @var int Month the event occurred */
    private $month;
    /** @var string Region */
    private $region;
    /** @var string Service */
    private $service;
    /** @return string|null Signed in to the account token. */
	public function getAccountToken(): ?string {
		return $this->accountToken;
	}
    /** @param string|null $accountToken Signed in to the account token. */
	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}
    /**
     * @param string|null $accountToken Signed in to the account token.
     * @return DescribeBillingsRequest
     */
	public function withAccountToken(?string $accountToken): DescribeBillingsRequest {
		$this->accountToken = $accountToken;
		return $this;
	}
    /** @return string|null Project Name */
	public function getProjectName(): ?string {
		return $this->projectName;
	}
    /** @param string|null $projectName Project Name */
	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}
    /**
     * @param string|null $projectName Project Name
     * @return DescribeBillingsRequest
     */
	public function withProjectName(?string $projectName): DescribeBillingsRequest {
		$this->projectName = $projectName;
		return $this;
	}
    /** @return int|null Year the event occurred */
	public function getYear(): ?int {
		return $this->year;
	}
    /** @param int|null $year Year the event occurred */
	public function setYear(?int $year) {
		$this->year = $year;
	}
    /**
     * @param int|null $year Year the event occurred
     * @return DescribeBillingsRequest
     */
	public function withYear(?int $year): DescribeBillingsRequest {
		$this->year = $year;
		return $this;
	}
    /** @return int|null Month the event occurred */
	public function getMonth(): ?int {
		return $this->month;
	}
    /** @param int|null $month Month the event occurred */
	public function setMonth(?int $month) {
		$this->month = $month;
	}
    /**
     * @param int|null $month Month the event occurred
     * @return DescribeBillingsRequest
     */
	public function withMonth(?int $month): DescribeBillingsRequest {
		$this->month = $month;
		return $this;
	}
    /** @return string|null Region */
	public function getRegion(): ?string {
		return $this->region;
	}
    /** @param string|null $region Region */
	public function setRegion(?string $region) {
		$this->region = $region;
	}
    /**
     * @param string|null $region Region
     * @return DescribeBillingsRequest
     */
	public function withRegion(?string $region): DescribeBillingsRequest {
		$this->region = $region;
		return $this;
	}
    /** @return string|null Service */
	public function getService(): ?string {
		return $this->service;
	}
    /** @param string|null $service Service */
	public function setService(?string $service) {
		$this->service = $service;
	}
    /**
     * @param string|null $service Service
     * @return DescribeBillingsRequest
     */
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