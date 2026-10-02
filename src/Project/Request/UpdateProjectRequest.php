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

/** Request for updateProject: Update Project */
class UpdateProjectRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Project Name */
    private $projectName;
    /** @var string Description */
    private $description;
    /** @var string Contract Plan */
    private $plan;
    /** @var string Payment Method Name */
    private $billingMethodName;
    /** @var string Configuring Amazon EventBridge */
    private $enableEventBridge;
    /** @var string ID of AWS account to be used for notification */
    private $eventBridgeAwsAccountId;
    /** @var string AWS Region to be used for notification */
    private $eventBridgeAwsRegion;
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
     * @return UpdateProjectRequest
     */
	public function withAccountToken(?string $accountToken): UpdateProjectRequest {
		$this->accountToken = $accountToken;
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
     * @return UpdateProjectRequest
     */
	public function withProjectName(?string $projectName): UpdateProjectRequest {
		$this->projectName = $projectName;
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
     * @return UpdateProjectRequest
     */
	public function withDescription(?string $description): UpdateProjectRequest {
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
     * @return UpdateProjectRequest
     */
	public function withPlan(?string $plan): UpdateProjectRequest {
		$this->plan = $plan;
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
     * @return UpdateProjectRequest
     */
	public function withBillingMethodName(?string $billingMethodName): UpdateProjectRequest {
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
     * @return UpdateProjectRequest
     */
	public function withEnableEventBridge(?string $enableEventBridge): UpdateProjectRequest {
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
     * @return UpdateProjectRequest
     */
	public function withEventBridgeAwsAccountId(?string $eventBridgeAwsAccountId): UpdateProjectRequest {
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
     * @return UpdateProjectRequest
     */
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