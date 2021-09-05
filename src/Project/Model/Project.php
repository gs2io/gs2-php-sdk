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
            ->withProjectId(empty($data['projectId']) ? null : $data['projectId'])
            ->withAccountName(empty($data['accountName']) ? null : $data['accountName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withPlan(empty($data['plan']) ? null : $data['plan'])
            ->withBillingMethodName(empty($data['billingMethodName']) ? null : $data['billingMethodName'])
            ->withEnableEventBridge(empty($data['enableEventBridge']) ? null : $data['enableEventBridge'])
            ->withEventBridgeAwsAccountId(empty($data['eventBridgeAwsAccountId']) ? null : $data['eventBridgeAwsAccountId'])
            ->withEventBridgeAwsRegion(empty($data['eventBridgeAwsRegion']) ? null : $data['eventBridgeAwsRegion'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "projectId" => $this->getProjectId(),
            "accountName" => $this->getAccountName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "plan" => $this->getPlan(),
            "billingMethodName" => $this->getBillingMethodName(),
            "enableEventBridge" => $this->getEnableEventBridge(),
            "eventBridgeAwsAccountId" => $this->getEventBridgeAwsAccountId(),
            "eventBridgeAwsRegion" => $this->getEventBridgeAwsRegion(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}