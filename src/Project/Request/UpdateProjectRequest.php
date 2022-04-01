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

class UpdateProjectRequest extends Gs2BasicRequest {
    /** @var string */
    private $accountToken;
    /** @var string */
    private $projectName;
    /** @var string */
    private $description;
    /** @var string */
    private $plan;
    /** @var string */
    private $billingMethodName;
    /** @var string */
    private $enableEventBridge;
    /** @var string */
    private $eventBridgeAwsAccountId;
    /** @var string */
    private $eventBridgeAwsRegion;

	public function getAccountToken(): ?string {
		return $this->accountToken;
	}

	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}

	public function withAccountToken(?string $accountToken): UpdateProjectRequest {
		$this->accountToken = $accountToken;
		return $this;
	}

	public function getProjectName(): ?string {
		return $this->projectName;
	}

	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}

	public function withProjectName(?string $projectName): UpdateProjectRequest {
		$this->projectName = $projectName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateProjectRequest {
		$this->description = $description;
		return $this;
	}

	public function getPlan(): ?string {
		return $this->plan;
	}

	public function setPlan(?string $plan) {
		$this->plan = $plan;
	}

	public function withPlan(?string $plan): UpdateProjectRequest {
		$this->plan = $plan;
		return $this;
	}

	public function getBillingMethodName(): ?string {
		return $this->billingMethodName;
	}

	public function setBillingMethodName(?string $billingMethodName) {
		$this->billingMethodName = $billingMethodName;
	}

	public function withBillingMethodName(?string $billingMethodName): UpdateProjectRequest {
		$this->billingMethodName = $billingMethodName;
		return $this;
	}

	public function getEnableEventBridge(): ?string {
		return $this->enableEventBridge;
	}

	public function setEnableEventBridge(?string $enableEventBridge) {
		$this->enableEventBridge = $enableEventBridge;
	}

	public function withEnableEventBridge(?string $enableEventBridge): UpdateProjectRequest {
		$this->enableEventBridge = $enableEventBridge;
		return $this;
	}

	public function getEventBridgeAwsAccountId(): ?string {
		return $this->eventBridgeAwsAccountId;
	}

	public function setEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId) {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
	}

	public function withEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId): UpdateProjectRequest {
		$this->eventBridgeAwsAccountId = $eventBridgeAwsAccountId;
		return $this;
	}

	public function getEventBridgeAwsRegion(): ?string {
		return $this->eventBridgeAwsRegion;
	}

	public function setEventBridgeAwsRegion(?string $eventBridgeAwsRegion) {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
	}

	public function withEventBridgeAwsRegion(?string $eventBridgeAwsRegion): UpdateProjectRequest {
		$this->eventBridgeAwsRegion = $eventBridgeAwsRegion;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateProjectRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateProjectRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withProjectName(array_key_exists('projectName', $data) && $data['projectName'] !== null ? $data['projectName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPlan(array_key_exists('plan', $data) && $data['plan'] !== null ? $data['plan'] : null)
            ->withBillingMethodName(array_key_exists('billingMethodName', $data) && $data['billingMethodName'] !== null ? $data['billingMethodName'] : null)
            ->withEnableEventBridge(array_key_exists('enableEventBridge', $data) && $data['enableEventBridge'] !== null ? $data['enableEventBridge'] : null)
            ->withEventBridgeAwsAccountId(array_key_exists('eventBridgeAwsAccountId', $data) && $data['eventBridgeAwsAccountId'] !== null ? $data['eventBridgeAwsAccountId'] : null)
            ->withEventBridgeAwsRegion(array_key_exists('eventBridgeAwsRegion', $data) && $data['eventBridgeAwsRegion'] !== null ? $data['eventBridgeAwsRegion'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "projectName" => $this->getProjectName(),
            "description" => $this->getDescription(),
            "plan" => $this->getPlan(),
            "billingMethodName" => $this->getBillingMethodName(),
            "enableEventBridge" => $this->getEnableEventBridge(),
            "eventBridgeAwsAccountId" => $this->getEventBridgeAwsAccountId(),
            "eventBridgeAwsRegion" => $this->getEventBridgeAwsRegion(),
        );
    }
}