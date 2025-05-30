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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;


class Billing implements IModel {
	/**
     * @var string
	 */
	private $billingId;
	/**
     * @var string
	 */
	private $projectName;
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
	private $region;
	/**
     * @var string
	 */
	private $service;
	/**
     * @var string
	 */
	private $activityType;
	/**
     * @var float
	 */
	private $unit;
	/**
     * @var string
	 */
	private $unitName;
	/**
     * @var float
	 */
	private $price;
	/**
     * @var string
	 */
	private $currency;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getBillingId(): ?string {
		return $this->billingId;
	}
	public function setBillingId(?string $billingId) {
		$this->billingId = $billingId;
	}
	public function withBillingId(?string $billingId): Billing {
		$this->billingId = $billingId;
		return $this;
	}
	public function getProjectName(): ?string {
		return $this->projectName;
	}
	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}
	public function withProjectName(?string $projectName): Billing {
		$this->projectName = $projectName;
		return $this;
	}
	public function getYear(): ?int {
		return $this->year;
	}
	public function setYear(?int $year) {
		$this->year = $year;
	}
	public function withYear(?int $year): Billing {
		$this->year = $year;
		return $this;
	}
	public function getMonth(): ?int {
		return $this->month;
	}
	public function setMonth(?int $month) {
		$this->month = $month;
	}
	public function withMonth(?int $month): Billing {
		$this->month = $month;
		return $this;
	}
	public function getRegion(): ?string {
		return $this->region;
	}
	public function setRegion(?string $region) {
		$this->region = $region;
	}
	public function withRegion(?string $region): Billing {
		$this->region = $region;
		return $this;
	}
	public function getService(): ?string {
		return $this->service;
	}
	public function setService(?string $service) {
		$this->service = $service;
	}
	public function withService(?string $service): Billing {
		$this->service = $service;
		return $this;
	}
	public function getActivityType(): ?string {
		return $this->activityType;
	}
	public function setActivityType(?string $activityType) {
		$this->activityType = $activityType;
	}
	public function withActivityType(?string $activityType): Billing {
		$this->activityType = $activityType;
		return $this;
	}
	public function getUnit(): ?float {
		return $this->unit;
	}
	public function setUnit(?float $unit) {
		$this->unit = $unit;
	}
	public function withUnit(?float $unit): Billing {
		$this->unit = $unit;
		return $this;
	}
	public function getUnitName(): ?string {
		return $this->unitName;
	}
	public function setUnitName(?string $unitName) {
		$this->unitName = $unitName;
	}
	public function withUnitName(?string $unitName): Billing {
		$this->unitName = $unitName;
		return $this;
	}
	public function getPrice(): ?float {
		return $this->price;
	}
	public function setPrice(?float $price) {
		$this->price = $price;
	}
	public function withPrice(?float $price): Billing {
		$this->price = $price;
		return $this;
	}
	public function getCurrency(): ?string {
		return $this->currency;
	}
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
	public function withCurrency(?string $currency): Billing {
		$this->currency = $currency;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Billing {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Billing {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Billing {
        if ($data === null) {
            return null;
        }
        return (new Billing())
            ->withBillingId(array_key_exists('billingId', $data) && $data['billingId'] !== null ? $data['billingId'] : null)
            ->withProjectName(array_key_exists('projectName', $data) && $data['projectName'] !== null ? $data['projectName'] : null)
            ->withYear(array_key_exists('year', $data) && $data['year'] !== null ? $data['year'] : null)
            ->withMonth(array_key_exists('month', $data) && $data['month'] !== null ? $data['month'] : null)
            ->withRegion(array_key_exists('region', $data) && $data['region'] !== null ? $data['region'] : null)
            ->withService(array_key_exists('service', $data) && $data['service'] !== null ? $data['service'] : null)
            ->withActivityType(array_key_exists('activityType', $data) && $data['activityType'] !== null ? $data['activityType'] : null)
            ->withUnit(array_key_exists('unit', $data) && $data['unit'] !== null ? $data['unit'] : null)
            ->withUnitName(array_key_exists('unitName', $data) && $data['unitName'] !== null ? $data['unitName'] : null)
            ->withPrice(array_key_exists('price', $data) && $data['price'] !== null ? $data['price'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "billingId" => $this->getBillingId(),
            "projectName" => $this->getProjectName(),
            "year" => $this->getYear(),
            "month" => $this->getMonth(),
            "region" => $this->getRegion(),
            "service" => $this->getService(),
            "activityType" => $this->getActivityType(),
            "unit" => $this->getUnit(),
            "unitName" => $this->getUnitName(),
            "price" => $this->getPrice(),
            "currency" => $this->getCurrency(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}