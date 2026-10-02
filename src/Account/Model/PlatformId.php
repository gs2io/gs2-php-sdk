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


/**
 * External Platform Account ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#platformid
 */
class PlatformId implements IModel {
	/**
     * @var string Platform Id GRN
	 */
	private $platformId;
	/**
     * @var string GS2-Account User ID
	 */
	private $userId;
	/**
     * @var int Slot Number
	 */
	private $type;
	/**
     * @var string External Platform User ID
	 */
	private $userIdentifier;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Platform Id GRN */
	public function getPlatformId(): ?string {
		return $this->platformId;
	}
    /** @param string|null $platformId Platform Id GRN */
	public function setPlatformId(?string $platformId) {
		$this->platformId = $platformId;
	}
    /**
     * @param string|null $platformId Platform Id GRN
     * @return PlatformId
     */
	public function withPlatformId(?string $platformId): PlatformId {
		$this->platformId = $platformId;
		return $this;
	}
    /** @return string|null GS2-Account User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId GS2-Account User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId GS2-Account User ID
     * @return PlatformId
     */
	public function withUserId(?string $userId): PlatformId {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return PlatformId
     */
	public function withType(?int $type): PlatformId {
		$this->type = $type;
		return $this;
	}
    /** @return string|null External Platform User ID */
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}
    /** @param string|null $userIdentifier External Platform User ID */
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}
    /**
     * @param string|null $userIdentifier External Platform User ID
     * @return PlatformId
     */
	public function withUserIdentifier(?string $userIdentifier): PlatformId {
		$this->userIdentifier = $userIdentifier;
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
     * @return PlatformId
     */
	public function withCreatedAt(?int $createdAt): PlatformId {
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
     * @return PlatformId
     */
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