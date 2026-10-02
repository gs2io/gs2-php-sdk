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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;


/**
 * Message
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#message
 */
class Message implements IModel {
	/**
     * @var string Message GRN
	 */
	private $messageId;
	/**
     * @var string Message name
	 */
	private $name;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var bool Read Status
	 */
	private $isRead;
	/**
     * @var array Acquire Actions on Open
	 */
	private $readAcquireActions;
	/**
     * @var int Creation Timestamp
	 */
	private $receivedAt;
	/**
     * @var int Datetime of read
	 */
	private $readAt;
	/**
     * @var int Expiration datetime
	 */
	private $expiresAt;
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
    /** @return bool|null Read Status */
	public function getIsRead(): ?bool {
		return $this->isRead;
	}
    /** @param bool|null $isRead Read Status */
	public function setIsRead(?bool $isRead) {
		$this->isRead = $isRead;
	}
    /**
     * @param bool|null $isRead Read Status
     * @return Message
     */
	public function withIsRead(?bool $isRead): Message {
		$this->isRead = $isRead;
		return $this;
	}
    /** @return array|null Acquire Actions on Open */
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}
    /** @param array|null $readAcquireActions Acquire Actions on Open */
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}
    /**
     * @param array|null $readAcquireActions Acquire Actions on Open
     * @return Message
     */
	public function withReadAcquireActions(?array $readAcquireActions): Message {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getReceivedAt(): ?int {
		return $this->receivedAt;
	}
    /** @param int|null $receivedAt Creation Timestamp */
	public function setReceivedAt(?int $receivedAt) {
		$this->receivedAt = $receivedAt;
	}
    /**
     * @param int|null $receivedAt Creation Timestamp
     * @return Message
     */
	public function withReceivedAt(?int $receivedAt): Message {
		$this->receivedAt = $receivedAt;
		return $this;
	}
    /** @return int|null Datetime of read */
	public function getReadAt(): ?int {
		return $this->readAt;
	}
    /** @param int|null $readAt Datetime of read */
	public function setReadAt(?int $readAt) {
		$this->readAt = $readAt;
	}
    /**
     * @param int|null $readAt Datetime of read
     * @return Message
     */
	public function withReadAt(?int $readAt): Message {
		$this->readAt = $readAt;
		return $this;
	}
    /** @return int|null Expiration datetime */
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
    /** @param int|null $expiresAt Expiration datetime */
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
    /**
     * @param int|null $expiresAt Expiration datetime
     * @return Message
     */
	public function withExpiresAt(?int $expiresAt): Message {
		$this->expiresAt = $expiresAt;
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
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withIsRead(array_key_exists('isRead', $data) ? $data['isRead'] : null)
            ->withReadAcquireActions(!array_key_exists('readAcquireActions', $data) || $data['readAcquireActions'] === null ? null : array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                $data['readAcquireActions']
            ))
            ->withReceivedAt(array_key_exists('receivedAt', $data) && $data['receivedAt'] !== null ? $data['receivedAt'] : null)
            ->withReadAt(array_key_exists('readAt', $data) && $data['readAt'] !== null ? $data['readAt'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "messageId" => $this->getMessageId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "metadata" => $this->getMetadata(),
            "isRead" => $this->getIsRead(),
            "readAcquireActions" => $this->getReadAcquireActions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReadAcquireActions()
            ),
            "receivedAt" => $this->getReceivedAt(),
            "readAt" => $this->getReadAt(),
            "expiresAt" => $this->getExpiresAt(),
            "revision" => $this->getRevision(),
        );
    }
}