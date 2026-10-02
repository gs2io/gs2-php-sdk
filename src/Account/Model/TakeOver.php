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
 * Takeover Information
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#takeover
 */
class TakeOver implements IModel {
	/**
     * @var string Takeover Information GRN
	 */
	private $takeOverId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Slot Number
	 */
	private $type;
	/**
     * @var string User ID for takeover
	 */
	private $userIdentifier;
	/**
     * @var string Password
	 */
	private $password;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Takeover Information GRN */
	public function getTakeOverId(): ?string {
		return $this->takeOverId;
	}
    /** @param string|null $takeOverId Takeover Information GRN */
	public function setTakeOverId(?string $takeOverId) {
		$this->takeOverId = $takeOverId;
	}
    /**
     * @param string|null $takeOverId Takeover Information GRN
     * @return TakeOver
     */
	public function withTakeOverId(?string $takeOverId): TakeOver {
		$this->takeOverId = $takeOverId;
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
     * @return TakeOver
     */
	public function withUserId(?string $userId): TakeOver {
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
     * @return TakeOver
     */
	public function withType(?int $type): TakeOver {
		$this->type = $type;
		return $this;
	}
    /** @return string|null User ID for takeover */
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}
    /** @param string|null $userIdentifier User ID for takeover */
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}
    /**
     * @param string|null $userIdentifier User ID for takeover
     * @return TakeOver
     */
	public function withUserIdentifier(?string $userIdentifier): TakeOver {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return TakeOver
     */
	public function withPassword(?string $password): TakeOver {
		$this->password = $password;
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
     * @return TakeOver
     */
	public function withCreatedAt(?int $createdAt): TakeOver {
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
     * @return TakeOver
     */
	public function withRevision(?int $revision): TakeOver {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?TakeOver {
        if ($data === null) {
            return null;
        }
        return (new TakeOver())
            ->withTakeOverId(array_key_exists('takeOverId', $data) && $data['takeOverId'] !== null ? $data['takeOverId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withUserIdentifier(array_key_exists('userIdentifier', $data) && $data['userIdentifier'] !== null ? $data['userIdentifier'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "takeOverId" => $this->getTakeOverId(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "userIdentifier" => $this->getUserIdentifier(),
            "password" => $this->getPassword(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}