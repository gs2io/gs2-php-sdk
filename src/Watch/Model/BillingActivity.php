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

namespace Gs2\Watch\Model;

use Gs2\Core\Model\IModel;


class BillingActivity implements IModel {
	/**
     * @var string
	 */
	private $billingActivityId;
	/**
     * @var int
	 */
	private $year;
	/**
     * @var int
	 */
	private $month;
	/**
     * @var string
	 */
	private $service;
	/**
     * @var string
	 */
	private $activityType;
	/**
     * @var int
	 */
	private $value;

	public function getBillingActivityId(): ?string {
		return $this->billingActivityId;
	}

	public function setBillingActivityId(?string $billingActivityId) {
		$this->billingActivityId = $billingActivityId;
	}

	public function withBillingActivityId(?string $billingActivityId): BillingActivity {
		$this->billingActivityId = $billingActivityId;
		return $this;
	}

	public function getYear(): ?int {
		return $this->year;
	}

	public function setYear(?int $year) {
		$this->year = $year;
	}

	public function withYear(?int $year): BillingActivity {
		$this->year = $year;
		return $this;
	}

	public function getMonth(): ?int {
		return $this->month;
	}

	public function setMonth(?int $month) {
		$this->month = $month;
	}

	public function withMonth(?int $month): BillingActivity {
		$this->month = $month;
		return $this;
	}

	public function getService(): ?string {
		return $this->service;
	}

	public function setService(?string $service) {
		$this->service = $service;
	}

	public function withService(?string $service): BillingActivity {
		$this->service = $service;
		return $this;
	}

	public function getActivityType(): ?string {
		return $this->activityType;
	}

	public function setActivityType(?string $activityType) {
		$this->activityType = $activityType;
	}

	public function withActivityType(?string $activityType): BillingActivity {
		$this->activityType = $activityType;
		return $this;
	}

	public function getValue(): ?int {
		return $this->value;
	}

	public function setValue(?int $value) {
		$this->value = $value;
	}

	public function withValue(?int $value): BillingActivity {
		$this->value = $value;
		return $this;
	}

    public static function fromJson(?array $data): ?BillingActivity {
        if ($data === null) {
            return null;
        }
        return (new BillingActivity())
            ->withBillingActivityId(empty($data['billingActivityId']) ? null : $data['billingActivityId'])
            ->withYear(empty($data['year']) ? null : $data['year'])
            ->withMonth(empty($data['month']) ? null : $data['month'])
            ->withService(empty($data['service']) ? null : $data['service'])
            ->withActivityType(empty($data['activityType']) ? null : $data['activityType'])
            ->withValue(empty($data['value']) ? null : $data['value']);
    }

    public function toJson(): array {
        return array(
            "billingActivityId" => $this->getBillingActivityId(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "service" => $this->getService(),
            "activityType" => $this->getActivityType(),
            "value" => $this->getValue(),
        );
    }
}