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


class Project implements IModel {
	/**
     * @var string
	 */
	private $projectId;
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
	private $plan;
	/**
     * @var array
	 */
	private $regions;
	/**
     * @var string
	 */
	private $billingMethodName;
	/**
     * @var string
	 */
	private $enableEventBridge;
	/**
     * @var string
	 */
	private $currency;
	/**
     * @var string
	 */
	private $eventBridgeAwsAccountId;
	/**
     * @var string
	 */
	private $eventBridgeAwsRegion;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getProjectId(): ?string {
		return $this->projectId;
	}
	public function setProjectId(?string $projectId) {
		$this->projectId = $projectId;
	}
	public function withProjectId(?string $projectId): Project {
		$this->projectId = $projectId;
		return $this;
	}
	public function getAccountName(): ?string {
		return $this->accountName;
	}
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}
	public function withAccountName(?string $accountName): Project {
		$this->accountName = $accountName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Project {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): Project {
		$this->description = $description;
		return $this;
	}
	public function getPlan(): ?string {
		return $this->plan;
	}
	public function setPlan(?string $plan) {
		$this->plan = $plan;
	}
	public function withPlan(?string $plan): Project {
		$this->plan = $plan;
		return $this;
	}
	public function getRegions(): ?array {
		return $this->regions;
	}
	public function setRegions(?array $regions) {
		$this->regions = $regions;
	}
	public function withRegions(?array $regions): Project {
		$this->regions = $regions;
		return $this;
	}
	public function getBillingMethodName(): ?string {
		return $this->billingMethodName;
	}
	public function setBillingMethodName(?string $billingMethodName) {
		$this->billingMethodName = $billingMethodName;
	}
	public function withBillingMethodName(?string $billingMethodName): Project {
		$this->billingMethodName = $billingMethodName;
		return $this;
	}
	public function getEnableEventBridge(): ?string {
		return $this->enableEventBridge;
	}
	public function setEnableEventBridge(?string $enableEventBridge) {
		$this->enableEventBridge = $enableEventBridge;
	}
	public function withEnableEventBridge(?string $enableEventBridge): Project {
		$this->enableEventBridge = $enableEventBridge;
		return $this;
	}
	public function getCurrency(): ?string {
		return $this->currency;
	}
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
	public function withCurrency(?string $currency): Project {
		$this->currency = $currency;
		return $this;
	}
	public function getEventBridgeAwsAccountId(): ?string {
		return $this->eventBridgeAwsAccountId;
	}
	public function setEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId) {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
	}
	public function withEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId): Project {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
		return $this;
	}
	public function getEventBridgeAwsRegion(): ?string {
		return $this->eventBridgeAwsRegion;
	}
	public function setEventBridgeAwsRegion(?string $eventBridgeAwsRegion) {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
	}
	public function withEventBridgeAwsRegion(?string $eventBridgeAwsRegion): Project {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Project {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}