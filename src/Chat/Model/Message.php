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


class Message implements IModel {
	/**
     * @var string
	 */
	private $messageId;
	/**
     * @var string
	 */
	private $roomName;
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
	private $category;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var int
	 */
	private $createdAt;

	public function getMessageId(): ?string {
		return $this->messageId;
	}

	public function setMessageId(?string $messageId) {
		$this->messageId = $messageId;
	}

	public function withMessageId(?string $messageId): Message {
		$this->messageId = $messageId;
		return $this;
	}

	public function getRoomName(): ?string {
		return $this->roomName;
	}

	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}

	public function withRoomName(?string $roomName): Message {
		$this->roomName = $roomName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Message {
		$this->name = $name;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Message {
		$this->userId = $userId;
		return $this;
	}

	public function getCategory(): ?int {
		return $this->category;
	}

	public function setCategory(?int $category) {
		$this->category = $category;
	}

	public function withCategory(?int $category): Message {
		$this->category = $category;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Message {
		$this->metadata = $metadata;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Message {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Message {
        if ($data === null) {
            return null;
        }
        return (new Message())
            ->withMessageId(array_key_exists('messageId', $data) && $data['messageId'] !== null ? $data['messageId'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "messageId" => $this->getMessageId(),
            "roomName" => $this->getRoomName(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "category" => $this->getCategory(),
            "metadata" => $this->getMetadata(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}