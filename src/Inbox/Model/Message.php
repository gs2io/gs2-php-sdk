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


class Message implements IModel {
	/**
     * @var string
	 */
	private $messageId;
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
     * @var bool
	 */
	private $isRead;
	/**
     * @var array
	 */
	private $readAcquireActions;
	/**
     * @var int
	 */
	private $receivedAt;
	/**
     * @var int
	 */
	private $readAt;
	/**
     * @var int
	 */
	private $expiresAt;
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
	public function getIsRead(): ?bool {
		return $this->isRead;
	}
	public function setIsRead(?bool $isRead) {
		$this->isRead = $isRead;
	}
	public function withIsRead(?bool $isRead): Message {
		$this->isRead = $isRead;
		return $this;
	}
	public function getReadAcquireActions(): ?array {
		return $this->readAcquireActions;
	}
	public function setReadAcquireActions(?array $readAcquireActions) {
		$this->readAcquireActions = $readAcquireActions;
	}
	public function withReadAcquireActions(?array $readAcquireActions): Message {
		$this->readAcquireActions = $readAcquireActions;
		return $this;
	}
	public function getReceivedAt(): ?int {
		return $this->receivedAt;
	}
	public function setReceivedAt(?int $receivedAt) {
		$this->receivedAt = $receivedAt;
	}
	public function withReceivedAt(?int $receivedAt): Message {
		$this->receivedAt = $receivedAt;
		return $this;
	}
	public function getReadAt(): ?int {
		return $this->readAt;
	}
	public function setReadAt(?int $readAt) {
		$this->readAt = $readAt;
	}
	public function withReadAt(?int $readAt): Message {
		$this->readAt = $readAt;
		return $this;
	}
	public function getExpiresAt(): ?int {
		return $this->expiresAt;
	}
	public function setExpiresAt(?int $expiresAt) {
		$this->expiresAt = $expiresAt;
	}
	public function withExpiresAt(?int $expiresAt): Message {
		$this->expiresAt = $expiresAt;
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
            ->withReadAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('readAcquireActions', $data) && $data['readAcquireActions'] !== null ? $data['readAcquireActions'] : []
            ))
            ->withReceivedAt(array_key_exists('receivedAt', $data) && $data['receivedAt'] !== null ? $data['receivedAt'] : null)
            ->withReadAt(array_key_exists('readAt', $data) && $data['readAt'] !== null ? $data['readAt'] : null)
            ->withExpiresAt(array_key_exists('expiresAt', $data) && $data['expiresAt'] !== null ? $data['expiresAt'] : null);
    }

    public function toJson(): array {
        return array(
            "messageId" => $this->getMessageId(),
            "name" => $this->getName(),
            "userId" => $this->getUserId(),
            "metadata" => $this->getMetadata(),
            "isRead" => $this->getIsRead(),
            "readAcquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getReadAcquireActions() !== null && $this->getReadAcquireActions() !== null ? $this->getReadAcquireActions() : []
            ),
            "receivedAt" => $this->getReceivedAt(),
            "readAt" => $this->getReadAt(),
            "expiresAt" => $this->getExpiresAt(),
        );
    }
}