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


class Dashboard implements IModel {
	/**
     * @var string
	 */
	private $dashboardId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $displayName;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var string
	 */
	private $payload;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getDashboardId(): ?string {
		return $this->dashboardId;
	}
	public function setDashboardId(?string $dashboardId) {
		$this->dashboardId = $dashboardId;
	}
	public function withDashboardId(?string $dashboardId): Dashboard {
		$this->dashboardId = $dashboardId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Dashboard {
		$this->name = $name;
		return $this;
	}
	public function getDisplayName(): ?string {
		return $this->displayName;
	}
	public function setDisplayName(?string $displayName) {
		$this->displayName = $displayName;
	}
	public function withDisplayName(?string $displayName): Dashboard {
		$this->displayName = $displayName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): Dashboard {
		$this->description = $description;
		return $this;
	}
	public function getPayload(): ?string {
		return $this->payload;
	}
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
	public function withPayload(?string $payload): Dashboard {
		$this->payload = $payload;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Dashboard {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
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