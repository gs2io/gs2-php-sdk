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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


/**
 * Dashboard
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#dashboard
 */
class Dashboard implements IModel {
	/**
     * @var string Dashboard GRN
	 */
	private $dashboardId;
	/**
     * @var string Dashboard Name
	 */
	private $name;
	/**
     * @var string Display Name
	 */
	private $displayName;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Payload
	 */
	private $payload;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
    /** @return string|null Dashboard GRN */
	public function getDashboardId(): ?string {
		return $this->dashboardId;
	}
    /** @param string|null $dashboardId Dashboard GRN */
	public function setDashboardId(?string $dashboardId) {
		$this->dashboardId = $dashboardId;
	}
    /**
     * @param string|null $dashboardId Dashboard GRN
     * @return Dashboard
     */
	public function withDashboardId(?string $dashboardId): Dashboard {
		$this->dashboardId = $dashboardId;
		return $this;
	}
    /** @return string|null Dashboard Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Dashboard Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Dashboard Name
     * @return Dashboard
     */
	public function withName(?string $name): Dashboard {
		$this->name = $name;
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
     * @return Dashboard
     */
	public function withDisplayName(?string $displayName): Dashboard {
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
     * @return Dashboard
     */
	public function withDescription(?string $description): Dashboard {
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
     * @return Dashboard
     */
	public function withPayload(?string $payload): Dashboard {
		$this->payload = $payload;
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
     * @return Dashboard
     */
	public function withCreatedAt(?int $createdAt): Dashboard {
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
     * @return Dashboard
     */
	public function withUpdatedAt(?int $updatedAt): Dashboard {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Dashboard {
        if ($data === null) {
            return null;
        }
        return (new Dashboard())
            ->withDashboardId(array_key_exists('dashboardId', $data) && $data['dashboardId'] !== null ? $data['dashboardId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDisplayName(array_key_exists('displayName', $data) && $data['displayName'] !== null ? $data['displayName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "dashboardId" => $this->getDashboardId(),
            "name" => $this->getName(),
            "displayName" => $this->getDisplayName(),
            "description" => $this->getDescription(),
            "payload" => $this->getPayload(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}