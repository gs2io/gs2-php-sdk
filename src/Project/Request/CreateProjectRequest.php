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

/** Request for createProject: Create Project */
class CreateProjectRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Project Name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Contract Plan */
    private $plan;
    /** @var string Payment Currency */
    private $currency;
    /** @var string First region name to activate */
    private $activateRegionName;
    /** @var string Payment Method Name */
    private $billingMethodName;
    /** @var string Configuring Amazon EventBridge */
    private $enableEventBridge;
    /** @var string ID of AWS account to be used for notification */
    private $eventBridgeAwsAccountId;
    /** @var string AWS Region to be used for notification */
    private $eventBridgeAwsRegion;
    /** @var string Database schema */
    private $dataStoreKeyScheme;
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
     * @return CreateProjectRequest
     */
	public function withAccountToken(?string $accountToken): CreateProjectRequest {
		$this->accountToken = $accountToken;
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
     * @return CreateProjectRequest
     */
	public function withName(?string $name): CreateProjectRequest {
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
     * @return CreateProjectRequest
     */
	public function withDescription(?string $description): CreateProjectRequest {
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
     * @return CreateProjectRequest
     */
	public function withPlan(?string $plan): CreateProjectRequest {
		$this->plan = $plan;
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
     * @return CreateProjectRequest
     */
	public function withCurrency(?string $currency): CreateProjectRequest {
		$this->currency = $currency;
		return $this;
	}
    /** @return string|null First region name to activate */
	public function getActivateRegionName(): ?string {
		return $this->activateRegionName;
	}
    /** @param string|null $activateRegionName First region name to activate */
	public function setActivateRegionName(?string $activateRegionName) {
		$this->activateRegionName = $activateRegionName;
	}
    /**
     * @param string|null $activateRegionName First region name to activate
     * @return CreateProjectRequest
     */
	public function withActivateRegionName(?string $activateRegionName): CreateProjectRequest {
		$this->activateRegionName = $activateRegionName;
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
     * @return CreateProjectRequest
     */
	public function withBillingMethodName(?string $billingMethodName): CreateProjectRequest {
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
     * @return CreateProjectRequest
     */
	public function withEnableEventBridge(?string $enableEventBridge): CreateProjectRequest {
		$this->enableEventBridge = $enableEventBridge;
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
     * @return CreateProjectRequest
     */
	public function withEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId): CreateProjectRequest {
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
     * @return CreateProjectRequest
     */
	public function withEventBridgeAwsRegion(?string $eventBridgeAwsRegion): CreateProjectRequest {
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
     * @return CreateProjectRequest
     */
	public function withDataStoreKeyScheme(?string $dataStoreKeyScheme): CreateProjectRequest {
		$this->dataStoreKeyScheme = $dataStoreKeyScheme;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateProjectRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateProjectRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPlan(array_key_exists('plan', $data) && $data['plan'] !== null ? $data['plan'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withActivateRegionName(array_key_exists('activateRegionName', $data) && $data['activateRegionName'] !== null ? $data['activateRegionName'] : null)
            ->withBillingMethodName(array_key_exists('billingMethodName', $data) && $data['billingMethodName'] !== null ? $data['billingMethodName'] : null)
            ->withEnableEventBridge(array_key_exists('enableEventBridge', $data) && $data['enableEventBridge'] !== null ? $data['enableEventBridge'] : null)
            ->withEventBridgeAwsAccountId(array_key_exists('eventBridgeAwsAccountId', $data) && $data['eventBridgeAwsAccountId'] !== null ? $data['eventBridgeAwsAccountId'] : null)
            ->withEventBridgeAwsRegion(array_key_exists('eventBridgeAwsRegion', $data) && $data['eventBridgeAwsRegion'] !== null ? $data['eventBridgeAwsRegion'] : null)
            ->withDataStoreKeyScheme(array_key_exists('dataStoreKeyScheme', $data) && $data['dataStoreKeyScheme'] !== null ? $data['dataStoreKeyScheme'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "plan" => $this->getPlan(),
            "currency" => $this->getCurrency(),
            "activateRegionName" => $this->getActivateRegionName(),
            "billingMethodName" => $this->getBillingMethodName(),
            "enableEventBridge" => $this->getEnableEventBridge(),
            "eventBridgeAwsAccountId" => $this->getEventBridgeAwsAccountId(),
            "eventBridgeAwsRegion" => $this->getEventBridgeAwsRegion(),
            "dataStoreKeyScheme" => $this->getDataStoreKeyScheme(),
        );
    }
}