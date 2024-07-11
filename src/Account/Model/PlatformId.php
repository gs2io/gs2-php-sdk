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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


class PlatformId implements IModel {
	/**
     * @var string
	 */
	private $platformId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $type;
	/**
     * @var string
	 */
	private $userIdentifier;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $revision;
	public function getPlatformId(): ?string {
		return $this->platformId;
	}
	public function setPlatformId(?string $platformId) {
		$this->platformId = $platformId;
	}
	public function withPlatformId(?string $platformId): PlatformId {
		$this->platformId = $platformId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): PlatformId {
		$this->userId = $userId;
		return $this;
	}
	public function getType(): ?int {
		return $this->type;
	}
	public function setType(?int $type) {
		$this->type = $type;
	}
	public function withType(?int $type): PlatformId {
		$this->type = $type;
		return $this;
	}
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}
	public function withUserIdentifier(?string $userIdentifier): PlatformId {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): PlatformId {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): PlatformId {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?PlatformId {
        if ($data === null) {
            return null;
        }
        return (new PlatformId())
            ->withPlatformId(array_key_exists('platformId', $data) && $data['platformId'] !== null ? $data['platformId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withUserIdentifier(array_key_exists('userIdentifier', $data) && $data['userIdentifier'] !== null ? $data['userIdentifier'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "platformId" => $this->getPlatformId(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "userIdentifier" => $this->getUserIdentifier(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}