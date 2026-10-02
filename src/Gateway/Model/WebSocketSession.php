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


/**
 * WebSocketSession
 *
 * @see https://docs.gs2.io/api_reference/gateway/sdk/#websocketsession
 */
class WebSocketSession implements IModel {
	/**
     * @var string WebSocket Session GRN
	 */
	private $webSocketSessionId;
	/**
     * @var string Connection ID
	 */
	private $connectionId;
	/**
     * @var string Namespace name
	 */
	private $namespaceName;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Session ID
	 */
	private $sessionId;
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
    /** @return string|null WebSocket Session GRN */
	public function getWebSocketSessionId(): ?string {
		return $this->webSocketSessionId;
	}
    /** @param string|null $webSocketSessionId WebSocket Session GRN */
	public function setWebSocketSessionId(?string $webSocketSessionId) {
		$this->webSocketSessionId = $webSocketSessionId;
	}
    /**
     * @param string|null $webSocketSessionId WebSocket Session GRN
     * @return WebSocketSession
     */
	public function withWebSocketSessionId(?string $webSocketSessionId): WebSocketSession {
		$this->webSocketSessionId = $webSocketSessionId;
		return $this;
	}
    /** @return string|null Connection ID */
	public function getConnectionId(): ?string {
		return $this->connectionId;
	}
    /** @param string|null $connectionId Connection ID */
	public function setConnectionId(?string $connectionId) {
		$this->connectionId = $connectionId;
	}
    /**
     * @param string|null $connectionId Connection ID
     * @return WebSocketSession
     */
	public function withConnectionId(?string $connectionId): WebSocketSession {
		$this->connectionId = $connectionId;
		return $this;
	}
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return WebSocketSession
     */
	public function withNamespaceName(?string $namespaceName): WebSocketSession {
		$this->namespaceName = $namespaceName;
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
     * @return WebSocketSession
     */
	public function withUserId(?string $userId): WebSocketSession {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Session ID */
	public function getSessionId(): ?string {
		return $this->sessionId;
	}
    /** @param string|null $sessionId Session ID */
	public function setSessionId(?string $sessionId) {
		$this->sessionId = $sessionId;
	}
    /**
     * @param string|null $sessionId Session ID
     * @return WebSocketSession
     */
	public function withSessionId(?string $sessionId): WebSocketSession {
		$this->sessionId = $sessionId;
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
     * @return WebSocketSession
     */
	public function withCreatedAt(?int $createdAt): WebSocketSession {
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
     * @return WebSocketSession
     */
	public function withUpdatedAt(?int $updatedAt): WebSocketSession {
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
     * @return WebSocketSession
     */
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
            ->withSessionId(array_key_exists('sessionId', $data) && $data['sessionId'] !== null ? $data['sessionId'] : null)
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
            "sessionId" => $this->getSessionId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}