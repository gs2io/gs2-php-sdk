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
	private $ipAddress;
	/**
     * @var int
	 */
	private $port;
	/**
     * @var string
	 */
	private $encryptionKey;
	/**
     * @var array
	 */
	private $notificationUserIds;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
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
	public function getIpAddress(): ?string {
		return $this->ipAddress;
	}
	public function setIpAddress(?string $ipAddress) {
		$this->ipAddress = $ipAddress;
	}
	public function withIpAddress(?string $ipAddress): Room {
		$this->ipAddress = $ipAddress;
		return $this;
	}
	public function getPort(): ?int {
		return $this->port;
	}
	public function setPort(?int $port) {
		$this->port = $port;
	}
	public function withPort(?int $port): Room {
		$this->port = $port;
		return $this;
	}
	public function getEncryptionKey(): ?string {
		return $this->encryptionKey;
	}
	public function setEncryptionKey(?string $encryptionKey) {
		$this->encryptionKey = $encryptionKey;
	}
	public function withEncryptionKey(?string $encryptionKey): Room {
		$this->encryptionKey = $encryptionKey;
		return $this;
	}
	public function getNotificationUserIds(): ?array {
		return $this->notificationUserIds;
	}
	public function setNotificationUserIds(?array $notificationUserIds) {
		$this->notificationUserIds = $notificationUserIds;
	}
	public function withNotificationUserIds(?array $notificationUserIds): Room {
		$this->notificationUserIds = $notificationUserIds;
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
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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