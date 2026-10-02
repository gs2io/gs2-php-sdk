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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


/**
 * In-game Log
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#ingamelog
 */
class InGameLog implements IModel {
	/**
     * @var int Timestamp
	 */
	private $timestamp;
	/**
     * @var string Request ID
	 */
	private $requestId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var array Tags
	 */
	private $tags;
	/**
     * @var string Payload
	 */
	private $payload;
    /** @return int|null Timestamp */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
    /** @param int|null $timestamp Timestamp */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
    /**
     * @param int|null $timestamp Timestamp
     * @return InGameLog
     */
	public function withTimestamp(?int $timestamp): InGameLog {
		$this->timestamp = $timestamp;
		return $this;
	}
    /** @return string|null Request ID */
	public function getRequestId(): ?string {
		return $this->requestId;
	}
    /** @param string|null $requestId Request ID */
	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}
    /**
     * @param string|null $requestId Request ID
     * @return InGameLog
     */
	public function withRequestId(?string $requestId): InGameLog {
		$this->requestId = $requestId;
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
     * @return InGameLog
     */
	public function withUserId(?string $userId): InGameLog {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Tags */
	public function getTags(): ?array {
		return $this->tags;
	}
    /** @param array|null $tags Tags */
	public function setTags(?array $tags) {
		$this->tags = $tags;
	}
    /**
     * @param array|null $tags Tags
     * @return InGameLog
     */
	public function withTags(?array $tags): InGameLog {
		$this->tags = $tags;
		return $this;
	}
    /** @return string|null Payload */
	public function getPayload(): ?string {
		return $this->payload;
	}
    /** @param string|null $payload Payload */
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
    /**
     * @param string|null $payload Payload
     * @return InGameLog
     */
	public function withPayload(?string $payload): InGameLog {
		$this->payload = $payload;
		return $this;
	}

    public static function fromJson(?array $data): ?InGameLog {
        if ($data === null) {
            return null;
        }
        return (new InGameLog())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withRequestId(array_key_exists('requestId', $data) && $data['requestId'] !== null ? $data['requestId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTags(!array_key_exists('tags', $data) || $data['tags'] === null ? null : array_map(
                function ($item) {
                    return InGameLogTag::fromJson($item);
                },
                $data['tags']
            ))
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null);
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "requestId" => $this->getRequestId(),
            "userId" => $this->getUserId(),
            "tags" => $this->getTags() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTags()
            ),
            "payload" => $this->getPayload(),
        );
    }
}