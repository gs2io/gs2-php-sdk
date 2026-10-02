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

namespace Gs2\Realtime\Model;

use Gs2\Core\Model\IModel;


/**
 * Room
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#room
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
     * @var string IP Address
	 */
	private $ipAddress;
	/**
     * @var int Port
	 */
	private $port;
	/**
     * @var string Encryption Key
	 */
	private $encryptionKey;
	/**
     * @var array Notification User IDs
	 */
	private $notificationUserIds;
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
    /** @return string|null IP Address */
	public function getIpAddress(): ?string {
		return $this->ipAddress;
	}
    /** @param string|null $ipAddress IP Address */
	public function setIpAddress(?string $ipAddress) {
		$this->ipAddress = $ipAddress;
	}
    /**
     * @param string|null $ipAddress IP Address
     * @return Room
     */
	public function withIpAddress(?string $ipAddress): Room {
		$this->ipAddress = $ipAddress;
		return $this;
	}
    /** @return int|null Port */
	public function getPort(): ?int {
		return $this->port;
	}
    /** @param int|null $port Port */
	public function setPort(?int $port) {
		$this->port = $port;
	}
    /**
     * @param int|null $port Port
     * @return Room
     */
	public function withPort(?int $port): Room {
		$this->port = $port;
		return $this;
	}
    /** @return string|null Encryption Key */
	public function getEncryptionKey(): ?string {
		return $this->encryptionKey;
	}
    /** @param string|null $encryptionKey Encryption Key */
	public function setEncryptionKey(?string $encryptionKey) {
		$this->encryptionKey = $encryptionKey;
	}
    /**
     * @param string|null $encryptionKey Encryption Key
     * @return Room
     */
	public function withEncryptionKey(?string $encryptionKey): Room {
		$this->encryptionKey = $encryptionKey;
		return $this;
	}
    /** @return array|null Notification User IDs */
	public function getNotificationUserIds(): ?array {
		return $this->notificationUserIds;
	}
    /** @param array|null $notificationUserIds Notification User IDs */
	public function setNotificationUserIds(?array $notificationUserIds) {
		$this->notificationUserIds = $notificationUserIds;
	}
    /**
     * @param array|null $notificationUserIds Notification User IDs
     * @return Room
     */
	public function withNotificationUserIds(?array $notificationUserIds): Room {
		$this->notificationUserIds = $notificationUserIds;
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
            ->withIpAddress(array_key_exists('ipAddress', $data) && $data['ipAddress'] !== null ? $data['ipAddress'] : null)
            ->withPort(array_key_exists('port', $data) && $data['port'] !== null ? $data['port'] : null)
            ->withEncryptionKey(array_key_exists('encryptionKey', $data) && $data['encryptionKey'] !== null ? $data['encryptionKey'] : null)
            ->withNotificationUserIds(!array_key_exists('notificationUserIds', $data) || $data['notificationUserIds'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['notificationUserIds']
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "roomId" => $this->getRoomId(),
            "name" => $this->getName(),
            "ipAddress" => $this->getIpAddress(),
            "port" => $this->getPort(),
            "encryptionKey" => $this->getEncryptionKey(),
            "notificationUserIds" => $this->getNotificationUserIds() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getNotificationUserIds()
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}