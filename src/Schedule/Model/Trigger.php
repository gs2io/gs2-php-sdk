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


/**
 * Trigger
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#trigger
 */
class Trigger implements IModel {
	/**
     * @var string Trigger GRN
	 */
	private $triggerId;
	/**
     * @var string Trigger name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Triggered At
	 */
	private $triggeredAt;
	/**
     * @var int Expires At
	 */
	private $expiresAt;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Trigger GRN */
	public function getTriggerId(): ?string {
		return $this->triggerId;
	}
    /** @param string|null $triggerId Trigger GRN */
	public function setTriggerId(?string $triggerId) {
		$this->triggerId = $triggerId;
	}
    /**
     * @param string|null $triggerId Trigger GRN
     * @return Trigger
     */
	public function withTriggerId(?string $triggerId): Trigger {
		$this->triggerId = $triggerId;
		return $this;
	}
    /** @return string|null Trigger name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Trigger name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Trigger name
     * @return Trigger
     */
	public function withName(?string $name): Trigger {
		$this->name = $name;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return Trigger
     */
	public function withUserId(?string $userId): Trigger {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Triggered At */
	public function getTriggeredAt(): ?int {
		return $this->triggeredAt;
	}
    /** @param int|null $triggeredAt Triggered At */
	public function setTriggeredAt(?int $triggeredAt) {
		$this->triggeredAt = $triggeredAt;
	}
    /**
     * @param int|null $triggeredAt Triggered At
     * @return Trigger
     */
	public function withTriggeredAt(?int $triggeredAt): Trigger {
		$this->triggeredAt = $triggeredAt;
		return $this;
	}
    /** @return int|null Expires At */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Expires At */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Expires At
     * @return Trigger
     */
	public function withExpiresAt(?int $expiresAt): Trigger {
		$this->expiresAt = $expiresAt;
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
     * @return Trigger
     */
	public function withCreatedAt(?int $createdAt): Trigger {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Trigger
     */
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