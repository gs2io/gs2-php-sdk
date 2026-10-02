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

namespace Gs2\Matchmaking\Model;

use Gs2\Core\Model\IModel;


/**
 * Player
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#player
 */
class Player implements IModel {
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array List of Attributes
	 */
	private $attributes;
	/**
     * @var string Role Name
	 */
	private $roleName;
	/**
     * @var array Deny User IDs
	 */
	private $denyUserIds;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
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
     * @return Player
     */
	public function withUserId(?string $userId): Player {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null List of Attributes */
	public function getAttributes(): ?array {
		return $this->attributes;
	}
    /** @param array|null $attributes List of Attributes */
	public function setAttributes(?array $attributes) {
		$this->attributes = $attributes;
	}
    /**
     * @param array|null $attributes List of Attributes
     * @return Player
     */
	public function withAttributes(?array $attributes): Player {
		$this->attributes = $attributes;
		return $this;
	}
    /** @return string|null Role Name */
	public function getRoleName(): ?string {
		return $this->roleName;
	}
    /** @param string|null $roleName Role Name */
	public function setRoleName(?string $roleName) {
		$this->roleName = $roleName;
	}
    /**
     * @param string|null $roleName Role Name
     * @return Player
     */
	public function withRoleName(?string $roleName): Player {
		$this->roleName = $roleName;
		return $this;
	}
    /** @return array|null Deny User IDs */
	public function getDenyUserIds(): ?array {
		return $this->denyUserIds;
	}
    /** @param array|null $denyUserIds Deny User IDs */
	public function setDenyUserIds(?array $denyUserIds) {
		$this->denyUserIds = $denyUserIds;
	}
    /**
     * @param array|null $denyUserIds Deny User IDs
     * @return Player
     */
	public function withDenyUserIds(?array $denyUserIds): Player {
		$this->denyUserIds = $denyUserIds;
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
     * @return Player
     */
	public function withCreatedAt(?int $createdAt): Player {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Player {
        if ($data === null) {
            return null;
        }
        return (new Player())
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withAttributes(!array_key_exists('attributes', $data) || $data['attributes'] === null ? null : array_map(
                function ($item) {
                    return Attribute::fromJson($item);
                },
                $data['attributes']
            ))
            ->withRoleName(array_key_exists('roleName', $data) && $data['roleName'] !== null ? $data['roleName'] : null)
            ->withDenyUserIds(!array_key_exists('denyUserIds', $data) || $data['denyUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['denyUserIds']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "userId" => $this->getUserId(),
            "attributes" => $this->getAttributes() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAttributes()
            ),
            "roleName" => $this->getRoleName(),
            "denyUserIds" => $this->getDenyUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getDenyUserIds()
            ),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}