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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateDashboard: Update Dashboard
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#updatedashboard
 */
class UpdateDashboardRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Dashboard Name */
    private $dashboardName;
    /** @var string Display Name */
    private $displayName;
    /** @var string Description */
    private $description;
    /** @var string Payload */
    private $payload;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateDashboardRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateDashboardRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Dashboard Name */
	public function getDashboardName(): ?string {
		return $this->dashboardName;
	}
    /** @param string|null $dashboardName Dashboard Name */
	public function setDashboardName(?string $dashboardName) {
		$this->dashboardName = $dashboardName;
	}
    /**
     * @param string|null $dashboardName Dashboard Name
     * @return UpdateDashboardRequest
     */
	public function withDashboardName(?string $dashboardName): UpdateDashboardRequest {
		$this->dashboardName = $dashboardName;
		return $this;
	}
    /** @return string|null Display Name */
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
    /** @param string|null $displayName Display Name */
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
    /**
     * @param string|null $displayName Display Name
     * @return UpdateDashboardRequest
     */
	public function withDisplayName(?string $displayName): UpdateDashboardRequest {
		$this->displayName = $displayName;
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
     * @return UpdateDashboardRequest
     */
	public function withDescription(?string $description): UpdateDashboardRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Payload */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload Payload */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload Payload
     * @return UpdateDashboardRequest
     */
	public function withPayload(?string $payload): UpdateDashboardRequest {
		$this->payload = $payload;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateDashboardRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateDashboardRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDashboardName(array_key_exists('dashboardName', $data) && $data['dashboardName'] !== null ? $data['dashboardName'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "dashboardName" => $this->getDashboardName(),
            "displayName" => $this->getDisplayName(),
            "description" => $this->getDescription(),
            "payload" => $this->getPayload(),
        );
    }
}