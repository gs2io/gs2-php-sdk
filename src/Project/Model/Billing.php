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


/** Billing */
class Billing implements IModel {
	/**
     * @var string Usage Status GRN
	 */
	private $billingId;
	/**
     * @var string Project Name
	 */
	private $projectName;
	/**
     * @var int Year the event occurred
	 */
	private $year;
	/**
     * @var int Month the event occurred
	 */
	private $month;
	/**
     * @var string Region
	 */
	private $region;
	/**
     * @var string Service
	 */
	private $service;
	/**
     * @var string Event
	 */
	private $activityType;
	/**
     * @var float Count
	 */
	private $unit;
	/**
     * @var string Unit
	 */
	private $unitName;
	/**
     * @var float Price
	 */
	private $price;
	/**
     * @var string Currency
	 */
	private $currency;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Usage Status GRN */
	public function getBillingId(): ?string {
		return $this->billingId;
	}
    /** @param string|null $billingId Usage Status GRN */
	public function setBillingId(?string $billingId) {
		$this->billingId = $billingId;
	}
    /**
     * @param string|null $billingId Usage Status GRN
     * @return Billing
     */
	public function withBillingId(?string $billingId): Billing {
		$this->billingId = $billingId;
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
     * @return Billing
     */
	public function withProjectName(?string $projectName): Billing {
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
     * @return Billing
     */
	public function withYear(?int $year): Billing {
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
     * @return Billing
     */
	public function withMonth(?int $month): Billing {
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
     * @return Billing
     */
	public function withRegion(?string $region): Billing {
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
     * @return Billing
     */
	public function withService(?string $service): Billing {
		$this->service = $service;
		return $this;
	}
    /** @return string|null Event */
	public function getActivityType(): ?string {
		return $this->activityType;
	}
    /** @param string|null $activityType Event */
	public function setActivityType(?string $activityType) {
		$this->activityType = $activityType;
	}
    /**
     * @param string|null $activityType Event
     * @return Billing
     */
	public function withActivityType(?string $activityType): Billing {
		$this->activityType = $activityType;
		return $this;
	}
    /** @return float|null Count */
	public function getUnit(): ?float {
		return $this->unit;
	}
    /** @param float|null $unit Count */
	public function setUnit(?float $unit) {
		$this->unit = $unit;
	}
    /**
     * @param float|null $unit Count
     * @return Billing
     */
	public function withUnit(?float $unit): Billing {
		$this->unit = $unit;
		return $this;
	}
    /** @return string|null Unit */
	public function getUnitName(): ?string {
		return $this->unitName;
	}
    /** @param string|null $unitName Unit */
	public function setUnitName(?string $unitName) {
		$this->unitName = $unitName;
	}
    /**
     * @param string|null $unitName Unit
     * @return Billing
     */
	public function withUnitName(?string $unitName): Billing {
		$this->unitName = $unitName;
		return $this;
	}
    /** @return float|null Price */
	public function getPrice(): ?float {
		return $this->price;
	}
    /** @param float|null $price Price */
	public function setPrice(?float $price) {
		$this->price = $price;
	}
    /**
     * @param float|null $price Price
     * @return Billing
     */
	public function withPrice(?float $price): Billing {
		$this->price = $price;
		return $this;
	}
    /** @return string|null Currency */
	public function getCurrency(): ?string {
		return $this->currency;
	}
    /** @param string|null $currency Currency */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
    /**
     * @param string|null $currency Currency
     * @return Billing
     */
	public function withCurrency(?string $currency): Billing {
		$this->currency = $currency;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Billing
     */
	public function withCreatedAt(?int $createdAt): Billing {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Billing
     */
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