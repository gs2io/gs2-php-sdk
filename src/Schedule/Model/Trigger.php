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

namespace Gs2\Schedule\Model;

use Gs2\Core\Model\IModel;


class Trigger implements IModel {
	/**
     * @var string
	 */
	private $triggerId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $triggeredAt;
	/**
     * @var int
	 */
	private $expiresAt;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getTriggerId(): ?string {
		return $this->triggerId;
	}
	public function setTriggerId(?string $triggerId) {
		$this->triggerId = $triggerId;
	}
	public function withTriggerId(?string $triggerId): Trigger {
		$this->triggerId = $triggerId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Trigger {
		$this->name = $name;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Trigger {
		$this->userId = $userId;
		return $this;
	}
	public function getTriggeredAt(): ?int {
		return $this->triggeredAt;
	}
	public function setTriggeredAt(?int $triggeredAt) {
		$this->triggeredAt = $triggeredAt;
	}
	public function withTriggeredAt(?int $triggeredAt): Trigger {
		$this->triggeredAt = $triggeredAt;
		return $this;
	}
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
	public function withExpiresAt(?int $expiresAt): Trigger {
		$this->expiresAt = $expiresAt;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Trigger {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Trigger {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Trigger {
        if ($data === null) {
            return null;
        }
        return (new Trigger())
            ->withTriggerId(array_key_exists('triggerId', $data) && $data['triggerId'] !== null ? $data['triggerId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTriggeredAt(array_key_exists('triggeredAt', $data) && $data['triggeredAt'] !== null ? $data['triggeredAt'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "triggerId" => $this->getTriggerId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "triggeredAt" => $this->getTriggeredAt(),
            "expiresAt" => $this->getExpiresAt(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}