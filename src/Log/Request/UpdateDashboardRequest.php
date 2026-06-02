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

class UpdateDashboardRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $dashboardName;
    /** @var string */
    private $displayName;
    /** @var string */
    private $description;
    /** @var string */
    private $payload;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateDashboardRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getDashboardName(): ?string {
		return $this->dashboardName;
	}
	public function setDashboardName(?string $dashboardName) {
		$this->dashboardName = $dashboardName;
	}
	public function withDashboardName(?string $dashboardName): UpdateDashboardRequest {
		$this->dashboardName = $dashboardName;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): UpdateDashboardRequest {
		$this->displayName = $displayName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateDashboardRequest {
		$this->description = $description;
		return $this;
	}
	public function getPayload(): ?string {
		return $this->payload;
	}
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
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