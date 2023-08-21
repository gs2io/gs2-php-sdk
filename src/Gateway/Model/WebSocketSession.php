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

namespace Gs2\Gateway\Model;

use Gs2\Core\Model\IModel;


class WebSocketSession implements IModel {
	/**
     * @var string
	 */
	private $webSocketSessionId;
	/**
     * @var string
	 */
	private $connectionId;
	/**
     * @var string
	 */
	private $namespaceName;
	/**
     * @var string
	 */
	private $userId;
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
	public function getWebSocketSessionId(): ?string {
		return $this->webSocketSessionId;
	}
	public function setWebSocketSessionId(?string $webSocketSessionId) {
		$this->webSocketSessionId = $webSocketSessionId;
	}
	public function withWebSocketSessionId(?string $webSocketSessionId): WebSocketSession {
		$this->webSocketSessionId = $webSocketSessionId;
		return $this;
	}
	public function getConnectionId(): ?string {
		return $this->connectionId;
	}
	public function setConnectionId(?string $connectionId) {
		$this->connectionId = $connectionId;
	}
	public function withConnectionId(?string $connectionId): WebSocketSession {
		$this->connectionId = $connectionId;
		return $this;
	}
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): WebSocketSession {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): WebSocketSession {
		$this->userId = $userId;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): WebSocketSession {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): WebSocketSession {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): WebSocketSession {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?WebSocketSession {
        if ($data === null) {
            return null;
        }
        return (new WebSocketSession())
            ->withWebSocketSessionId(array_key_exists('webSocketSessionId', $data) && $data['webSocketSessionId'] !== null ? $data['webSocketSessionId'] : null)
            ->withConnectionId(array_key_exists('connectionId', $data) && $data['connectionId'] !== null ? $data['connectionId'] : null)
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "webSocketSessionId" => $this->getWebSocketSessionId(),
            "connectionId" => $this->getConnectionId(),
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}