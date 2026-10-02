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
 * Message
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#message
 */
class Message implements IModel {
	/**
     * @var string Message GRN
	 */
	private $messageId;
	/**
     * @var string Room name
	 */
	private $roomName;
	/**
     * @var string Message name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Category number for classifying messages
	 */
	private $category;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Message GRN */
	public function getMessageId(): ?string {
		return $this->messageId;
	}
    /** @param string|null $messageId Message GRN */
	public function setMessageId(?string $messageId) {
		$this->messageId = $messageId;
	}
    /**
     * @param string|null $messageId Message GRN
     * @return Message
     */
	public function withMessageId(?string $messageId): Message {
		$this->messageId = $messageId;
		return $this;
	}
    /** @return string|null Room name */
	public function getRoomName(): ?string {
		return $this->roomName;
	}
    /** @param string|null $roomName Room name */
	public function setRoomName(?string $roomName) {
		$this->roomName = $roomName;
	}
    /**
     * @param string|null $roomName Room name
     * @return Message
     */
	public function withRoomName(?string $roomName): Message {
		$this->roomName = $roomName;
		return $this;
	}
    /** @return string|null Message name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Message name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Message name
     * @return Message
     */
	public function withName(?string $name): Message {
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
     * @return Message
     */
	public function withUserId(?string $userId): Message {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Category number for classifying messages */
	public function getCategory(): ?int {
		return $this->category;
	}
    /** @param int|null $category Category number for classifying messages */
	public function setCategory(?int $category) {
		$this->category = $category;
	}
    /**
     * @param int|null $category Category number for classifying messages
     * @return Message
     */
	public function withCategory(?int $category): Message {
		$this->category = $category;
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
     * @return Message
     */
	public function withMetadata(?string $metadata): Message {
		$this->metadata = $metadata;
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
     * @return Message
     */
	public function withCreatedAt(?int $createdAt): Message {
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
     * @return Message
     */
	public function withRevision(?int $revision): Message {
		$this->revision = $revision;
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
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "revision" => $this->getRevision(),
        );
    }
}