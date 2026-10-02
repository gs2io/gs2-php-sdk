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


/** Project */
class Project implements IModel {
	/**
     * @var string Project GRN
	 */
	private $projectId;
	/**
     * @var string GS2 Account Name
	 */
	private $accountName;
	/**
     * @var string Project Name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Contract Plan
	 */
	private $plan;
	/**
     * @var array Region
	 */
	private $regions;
	/**
     * @var string Payment Method Name
	 */
	private $billingMethodName;
	/**
     * @var string Configuring Amazon EventBridge
	 */
	private $enableEventBridge;
	/**
     * @var string Payment Currency
	 */
	private $currency;
	/**
     * @var string ID of AWS account to be used for notification
	 */
	private $eventBridgeAwsAccountId;
	/**
     * @var string AWS Region to be used for notification
	 */
	private $eventBridgeAwsRegion;
	/**
     * @var string Database schema
	 */
	private $dataStoreKeyScheme;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Project GRN */
	public function getProjectId(): ?string {
		return $this->projectId;
	}
    /** @param string|null $projectId Project GRN */
	public function setProjectId(?string $projectId) {
		$this->projectId = $projectId;
	}
    /**
     * @param string|null $projectId Project GRN
     * @return Project
     */
	public function withProjectId(?string $projectId): Project {
		$this->projectId = $projectId;
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
     * @return Project
     */
	public function withAccountName(?string $accountName): Project {
		$this->accountName = $accountName;
		return $this;
	}
    /** @return string|null Project Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Project Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Project Name
     * @return Project
     */
	public function withName(?string $name): Project {
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
     * @return Project
     */
	public function withDescription(?string $description): Project {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Contract Plan */
	public function getPlan(): ?string {
		return $this->plan;
	}
    /** @param string|null $plan Contract Plan */
	public function setPlan(?string $plan) {
		$this->plan = $plan;
	}
    /**
     * @param string|null $plan Contract Plan
     * @return Project
     */
	public function withPlan(?string $plan): Project {
		$this->plan = $plan;
		return $this;
	}
    /** @return array|null Region */
	public function getRegions(): ?array {
		return $this->regions;
	}
    /** @param array|null $regions Region */
	public function setRegions(?array $regions) {
		$this->regions = $regions;
	}
    /**
     * @param array|null $regions Region
     * @return Project
     */
	public function withRegions(?array $regions): Project {
		$this->regions = $regions;
		return $this;
	}
    /** @return string|null Payment Method Name */
	public function getBillingMethodName(): ?string {
		return $this->billingMethodName;
	}
    /** @param string|null $billingMethodName Payment Method Name */
	public function setBillingMethodName(?string $billingMethodName) {
		$this->billingMethodName = $billingMethodName;
	}
    /**
     * @param string|null $billingMethodName Payment Method Name
     * @return Project
     */
	public function withBillingMethodName(?string $billingMethodName): Project {
		$this->billingMethodName = $billingMethodName;
		return $this;
	}
    /** @return string|null Configuring Amazon EventBridge */
	public function getEnableEventBridge(): ?string {
		return $this->enableEventBridge;
	}
    /** @param string|null $enableEventBridge Configuring Amazon EventBridge */
	public function setEnableEventBridge(?string $enableEventBridge) {
		$this->enableEventBridge = $enableEventBridge;
	}
    /**
     * @param string|null $enableEventBridge Configuring Amazon EventBridge
     * @return Project
     */
	public function withEnableEventBridge(?string $enableEventBridge): Project {
		$this->enableEventBridge = $enableEventBridge;
		return $this;
	}
    /** @return string|null Payment Currency */
	public function getCurrency(): ?string {
		return $this->currency;
	}
    /** @param string|null $currency Payment Currency */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
    /**
     * @param string|null $currency Payment Currency
     * @return Project
     */
	public function withCurrency(?string $currency): Project {
		$this->currency = $currency;
		return $this;
	}
    /** @return string|null ID of AWS account to be used for notification */
	public function getEventBridgeAwsAccountId(): ?string {
		return $this->eventBridgeAwsAccountId;
	}
    /** @param string|null $eventBridgeAwsAccountId ID of AWS account to be used for notification */
	public function setEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId) {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
	}
    /**
     * @param string|null $eventBridgeAwsAccountId ID of AWS account to be used for notification
     * @return Project
     */
	public function withEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId): Project {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
		return $this;
	}
    /** @return string|null AWS Region to be used for notification */
	public function getEventBridgeAwsRegion(): ?string {
		return $this->eventBridgeAwsRegion;
	}
    /** @param string|null $eventBridgeAwsRegion AWS Region to be used for notification */
	public function setEventBridgeAwsRegion(?string $eventBridgeAwsRegion) {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
	}
    /**
     * @param string|null $eventBridgeAwsRegion AWS Region to be used for notification
     * @return Project
     */
	public function withEventBridgeAwsRegion(?string $eventBridgeAwsRegion): Project {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
		return $this;
	}
    /** @return string|null Database schema */
	public function getDataStoreKeyScheme(): ?string {
		return $this->dataStoreKeyScheme;
	}
    /** @param string|null $dataStoreKeyScheme Database schema */
	public function setDataStoreKeyScheme(?string $dataStoreKeyScheme) {
		$this->dataStoreKeyScheme = $dataStoreKeyScheme;
	}
    /**
     * @param string|null $dataStoreKeyScheme Database schema
     * @return Project
     */
	public function withDataStoreKeyScheme(?string $dataStoreKeyScheme): Project {
		$this->dataStoreKeyScheme = $dataStoreKeyScheme;
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
     * @return Project
     */
	public function withCreatedAt(?int $createdAt): Project {
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
     * @return Project
     */
	public function withUpdatedAt(?int $updatedAt): Project {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Project {
        if ($data === null) {
            return null;
        }
        return (new Project())
            ->withProjectId(array_key_exists('projectId', $data) && $data['projectId'] !== null ? $data['projectId'] : null)
            ->withAccountName(array_key_exists('accountName', $data) && $data['accountName'] !== null ? $data['accountName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPlan(array_key_exists('plan', $data) && $data['plan'] !== null ? $data['plan'] : null)
            ->withRegions(!array_key_exists('regions', $data) || $data['regions'] === null ? null : array_map(
                function ($item) {
                    return Gs2Region::fromJson($item);
                },
                $data['regions']
            ))
            ->withBillingMethodName(array_key_exists('billingMethodName', $data) && $data['billingMethodName'] !== null ? $data['billingMethodName'] : null)
            ->withEnableEventBridge(array_key_exists('enableEventBridge', $data) && $data['enableEventBridge'] !== null ? $data['enableEventBridge'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withEventBridgeAwsAccountId(array_key_exists('eventBridgeAwsAccountId', $data) && $data['eventBridgeAwsAccountId'] !== null ? $data['eventBridgeAwsAccountId'] : null)
            ->withEventBridgeAwsRegion(array_key_exists('eventBridgeAwsRegion', $data) && $data['eventBridgeAwsRegion'] !== null ? $data['eventBridgeAwsRegion'] : null)
            ->withDataStoreKeyScheme(array_key_exists('dataStoreKeyScheme', $data) && $data['dataStoreKeyScheme'] !== null ? $data['dataStoreKeyScheme'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "projectId" => $this->getProjectId(),
            "accountName" => $this->getAccountName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "plan" => $this->getPlan(),
            "regions" => $this->getRegions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getRegions()
            ),
            "billingMethodName" => $this->getBillingMethodName(),
            "enableEventBridge" => $this->getEnableEventBridge(),
            "currency" => $this->getCurrency(),
            "eventBridgeAwsAccountId" => $this->getEventBridgeAwsAccountId(),
            "eventBridgeAwsRegion" => $this->getEventBridgeAwsRegion(),
            "dataStoreKeyScheme" => $this->getDataStoreKeyScheme(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}