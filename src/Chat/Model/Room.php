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


/**
 * Room
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#room
 */
class Room implements IModel {
	/**
     * @var string Room GRN
	 */
	private $roomId;
	/**
     * @var string Room name
	 */
	private $name;
	/**
     * @var string Owner User ID
	 */
	private $userId;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var string Password required to access the room
	 */
	private $password;
	/**
     * @var array List of user IDs with access to the room
	 */
	private $whiteListUserIds;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Room GRN */
	public function getRoomId(): ?string {
		return $this->roomId;
	}
    /** @param string|null $roomId Room GRN */
	public function setRoomId(?string $roomId) {
		$this->roomId = $roomId;
	}
    /**
     * @param string|null $roomId Room GRN
     * @return Room
     */
	public function withRoomId(?string $roomId): Room {
		$this->roomId = $roomId;
		return $this;
	}
    /** @return string|null Room name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Room name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Room name
     * @return Room
     */
	public function withName(?string $name): Room {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Owner User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId Owner User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId Owner User ID
     * @return Room
     */
	public function withUserId(?string $userId): Room {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return Room
     */
	public function withMetadata(?string $metadata): Room {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Password required to access the room */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password required to access the room */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password required to access the room
     * @return Room
     */
	public function withPassword(?string $password): Room {
		$this->password = $password;
		return $this;
	}
    /** @return array|null List of user IDs with access to the room */
	public function getWhiteListUserIds(): ?array {
		return $this->whiteListUserIds;
	}
    /** @param array|null $whiteListUserIds List of user IDs with access to the room */
	public function setWhiteListUserIds(?array $whiteListUserIds) {
		$this->whiteListUserIds = $whiteListUserIds;
	}
    /**
     * @param array|null $whiteListUserIds List of user IDs with access to the room
     * @return Room
     */
	public function withWhiteListUserIds(?array $whiteListUserIds): Room {
		$this->whiteListUserIds = $whiteListUserIds;
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
     * @return Room
     */
	public function withCreatedAt(?int $createdAt): Room {
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
     * @return Room
     */
	public function withUpdatedAt(?int $updatedAt): Room {
		$this->updatedAt = $updatedAt;
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
     * @return Room
     */
	public function withRevision(?int $revision): Room {
		$this->revision = $revision;
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
            ->withWhiteListUserIds(!array_key_exists('whiteListUserIds', $data) || $data['whiteListUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['whiteListUserIds']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "roomId" => $this->getRoomId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "metadata" => $this->getMetadata(),
            "password" => $this->getPassword(),
            "whiteListUserIds" => $this->getWhiteListUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getWhiteListUserIds()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}