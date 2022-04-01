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

class GetBillingActivityRequest extends Gs2BasicRequest {
    /** @var int */
    private $year;
    /** @var int */
    private $month;
    /** @var string */
    private $service;
    /** @var string */
    private $activityType;

	public function getYear(): ?int {
		return $this->year;
	}

	public function setYear(?int $year) {
		$this->year = $year;
	}

	public function withYear(?int $year): GetBillingActivityRequest {
		$this->year = $year;
		return $this;
	}

	public function getMonth(): ?int {
		return $this->month;
	}

	public function setMonth(?int $month) {
		$this->month = $month;
	}

	public function withMonth(?int $month): GetBillingActivityRequest {
		$this->month = $month;
		return $this;
	}

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): GetBillingActivityRequest {
		$this->service = $service;
		return $this;
	}

	public function getActivityType(): ?string {
		return $this->activityType;
	}

	public function setActivityType(?string $activityType) {
		$this->activityType = $activityType;
	}

	public function withActivityType(?string $activityType): GetBillingActivityRequest {
		$this->activityType = $activityType;
		return $this;
	}

    public static function fromJson(?array $data): ?GetBillingActivityRequest {
        if ($data === null) {
            return null;
        }
        return (new GetBillingActivityRequest())
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withActivityType(array_key_exists('activityType', $data) && $data['activityType'] !== null ? $data['activityType'] : null);
    }

    public function toJson(): array {
        return array(
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "service" => $this->getService(),
            "activityType" => $this->getActivityType(),
        );
    }
}