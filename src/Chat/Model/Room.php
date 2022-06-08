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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;


class Room implements IModel {
	/**
     * @var string
	 */
	private $roomId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $password;
	/**
     * @var array
	 */
	private $whiteListUserIds;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	public function getRoomId(): ?string {
		return $this->roomId;
	}
	public function setRoomId(?string $roomId) {
		$this->roomId = $roomId;
	}
	public function withRoomId(?string $roomId): Room {
		$this->roomId = $roomId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Room {
		$this->name = $name;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Room {
		$this->userId = $userId;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): Room {
		$this->metadata = $metadata;
		return $this;
	}
	public function getPassword(): ?string {
		return $this->password;
	}
	public function setPassword(?string $password) {
		$this->password = $password;
	}
	public function withPassword(?string $password): Room {
		$this->password = $password;
		return $this;
	}
	public function getWhiteListUserIds(): ?array {
		return $this->whiteListUserIds;
	}
	public function setWhiteListUserIds(?array $whiteListUserIds) {
		$this->whiteListUserIds = $whiteListUserIds;
	}
	public function withWhiteListUserIds(?array $whiteListUserIds): Room {
		$this->whiteListUserIds = $whiteListUserIds;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Room {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Room {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Room {
        if ($data === null) {
            return null;
        }
        return (new Room())
            ->withRoomId(array_key_exists('roomId', $data) && $data['roomId'] !== null ? $data['roomId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withWhiteListUserIds(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('whiteListUserIds', $data) && $data['whiteListUserIds'] !== null ? $data['whiteListUserIds'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "roomId" => $this->getRoomId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "metadata" => $this->getMetadata(),
            "password" => $this->getPassword(),
            "whiteListUserIds" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListUserIds() !== null && $this->getWhiteListUserIds() !== null ? $this->getWhiteListUserIds() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}