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


class BillingMethod implements IModel {
	/**
     * @var string
	 */
	private $billingMethodId;
	/**
     * @var string
	 */
	private $accountName;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $methodType;
	/**
     * @var string
	 */
	private $cardSignatureName;
	/**
     * @var string
	 */
	private $cardBrand;
	/**
     * @var string
	 */
	private $cardLast4;
	/**
     * @var string
	 */
	private $partnerId;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getBillingMethodId(): ?string {
		return $this->billingMethodId;
	}
	public function setBillingMethodId(?string $billingMethodId) {
		$this->billingMethodId = $billingMethodId;
	}
	public function withBillingMethodId(?string $billingMethodId): BillingMethod {
		$this->billingMethodId = $billingMethodId;
		return $this;
	}
	public function getAccountName(): ?string {
		return $this->accountName;
	}
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}
	public function withAccountName(?string $accountName): BillingMethod {
		$this->accountName = $accountName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): BillingMethod {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): BillingMethod {
		$this->description = $description;
		return $this;
	}
	public function getMethodType(): ?string {
		return $this->methodType;
	}
	public function setMethodType(?string $methodType) {
		$this->methodType = $methodType;
	}
	public function withMethodType(?string $methodType): BillingMethod {
		$this->methodType = $methodType;
		return $this;
	}
	public function getCardSignatureName(): ?string {
		return $this->cardSignatureName;
	}
	public function setCardSignatureName(?string $cardSignatureName) {
		$this->cardSignatureName = $cardSignatureName;
	}
	public function withCardSignatureName(?string $cardSignatureName): BillingMethod {
		$this->cardSignatureName = $cardSignatureName;
		return $this;
	}
	public function getCardBrand(): ?string {
		return $this->cardBrand;
	}
	public function setCardBrand(?string $cardBrand) {
		$this->cardBrand = $cardBrand;
	}
	public function withCardBrand(?string $cardBrand): BillingMethod {
		$this->cardBrand = $cardBrand;
		return $this;
	}
	public function getCardLast4(): ?string {
		return $this->cardLast4;
	}
	public function setCardLast4(?string $cardLast4) {
		$this->cardLast4 = $cardLast4;
	}
	public function withCardLast4(?string $cardLast4): BillingMethod {
		$this->cardLast4 = $cardLast4;
		return $this;
	}
	public function getPartnerId(): ?string {
		return $this->partnerId;
	}
	public function setPartnerId(?string $partnerId) {
		$this->partnerId = $partnerId;
	}
	public function withPartnerId(?string $partnerId): BillingMethod {
		$this->partnerId = $partnerId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): BillingMethod {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): BillingMethod {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?BillingMethod {
        if ($data === null) {
            return null;
        }
        return (new BillingMethod())
            ->withBillingMethodId(array_key_exists('billingMethodId', $data) && $data['billingMethodId'] !== null ? $data['billingMethodId'] : null)
            ->withAccountName(array_key_exists('accountName', $data) && $data['accountName'] !== null ? $data['accountName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMethodType(array_key_exists('methodType', $data) && $data['methodType'] !== null ? $data['methodType'] : null)
            ->withCardSignatureName(array_key_exists('cardSignatureName', $data) && $data['cardSignatureName'] !== null ? $data['cardSignatureName'] : null)
            ->withCardBrand(array_key_exists('cardBrand', $data) && $data['cardBrand'] !== null ? $data['cardBrand'] : null)
            ->withCardLast4(array_key_exists('cardLast4', $data) && $data['cardLast4'] !== null ? $data['cardLast4'] : null)
            ->withPartnerId(array_key_exists('partnerId', $data) && $data['partnerId'] !== null ? $data['partnerId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "billingMethodId" => $this->getBillingMethodId(),
            "accountName" => $this->getAccountName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "methodType" => $this->getMethodType(),
            "cardSignatureName" => $this->getCardSignatureName(),
            "cardBrand" => $this->getCardBrand(),
            "cardLast4" => $this->getCardLast4(),
            "partnerId" => $this->getPartnerId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}