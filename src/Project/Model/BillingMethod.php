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


/** Payment Method */
class BillingMethod implements IModel {
	/**
     * @var string Payment Method GRN
	 */
	private $billingMethodId;
	/**
     * @var string GS2 Account Name
	 */
	private $accountName;
	/**
     * @var string Name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Payment Method
	 */
	private $methodType;
	/**
     * @var string Card Signatures
	 */
	private $cardSignatureName;
	/**
     * @var string Card Brand
	 */
	private $cardBrand;
	/**
     * @var string Card Number (Last 4)
	 */
	private $cardLast4;
	/**
     * @var string Partner ID
	 */
	private $partnerId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Payment Method GRN */
	public function getBillingMethodId(): ?string {
		return $this->billingMethodId;
	}
    /** @param string|null $billingMethodId Payment Method GRN */
	public function setBillingMethodId(?string $billingMethodId) {
		$this->billingMethodId = $billingMethodId;
	}
    /**
     * @param string|null $billingMethodId Payment Method GRN
     * @return BillingMethod
     */
	public function withBillingMethodId(?string $billingMethodId): BillingMethod {
		$this->billingMethodId = $billingMethodId;
		return $this;
	}
    /** @return string|null GS2 Account Name */
	public function getAccountName(): ?string {
		return $this->accountName;
	}
    /** @param string|null $accountName GS2 Account Name */
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}
    /**
     * @param string|null $accountName GS2 Account Name
     * @return BillingMethod
     */
	public function withAccountName(?string $accountName): BillingMethod {
		$this->accountName = $accountName;
		return $this;
	}
    /** @return string|null Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Name
     * @return BillingMethod
     */
	public function withName(?string $name): BillingMethod {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return BillingMethod
     */
	public function withDescription(?string $description): BillingMethod {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Payment Method */
	public function getMethodType(): ?string {
		return $this->methodType;
	}
    /** @param string|null $methodType Payment Method */
	public function setMethodType(?string $methodType) {
		$this->methodType = $methodType;
	}
    /**
     * @param string|null $methodType Payment Method
     * @return BillingMethod
     */
	public function withMethodType(?string $methodType): BillingMethod {
		$this->methodType = $methodType;
		return $this;
	}
    /** @return string|null Card Signatures */
	public function getCardSignatureName(): ?string {
		return $this->cardSignatureName;
	}
    /** @param string|null $cardSignatureName Card Signatures */
	public function setCardSignatureName(?string $cardSignatureName) {
		$this->cardSignatureName = $cardSignatureName;
	}
    /**
     * @param string|null $cardSignatureName Card Signatures
     * @return BillingMethod
     */
	public function withCardSignatureName(?string $cardSignatureName): BillingMethod {
		$this->cardSignatureName = $cardSignatureName;
		return $this;
	}
    /** @return string|null Card Brand */
	public function getCardBrand(): ?string {
		return $this->cardBrand;
	}
    /** @param string|null $cardBrand Card Brand */
	public function setCardBrand(?string $cardBrand) {
		$this->cardBrand = $cardBrand;
	}
    /**
     * @param string|null $cardBrand Card Brand
     * @return BillingMethod
     */
	public function withCardBrand(?string $cardBrand): BillingMethod {
		$this->cardBrand = $cardBrand;
		return $this;
	}
    /** @return string|null Card Number (Last 4) */
	public function getCardLast4(): ?string {
		return $this->cardLast4;
	}
    /** @param string|null $cardLast4 Card Number (Last 4) */
	public function setCardLast4(?string $cardLast4) {
		$this->cardLast4 = $cardLast4;
	}
    /**
     * @param string|null $cardLast4 Card Number (Last 4)
     * @return BillingMethod
     */
	public function withCardLast4(?string $cardLast4): BillingMethod {
		$this->cardLast4 = $cardLast4;
		return $this;
	}
    /** @return string|null Partner ID */
	public function getPartnerId(): ?string {
		return $this->partnerId;
	}
    /** @param string|null $partnerId Partner ID */
	public function setPartnerId(?string $partnerId) {
		$this->partnerId = $partnerId;
	}
    /**
     * @param string|null $partnerId Partner ID
     * @return BillingMethod
     */
	public function withPartnerId(?string $partnerId): BillingMethod {
		$this->partnerId = $partnerId;
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
     * @return BillingMethod
     */
	public function withCreatedAt(?int $createdAt): BillingMethod {
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
     * @return BillingMethod
     */
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