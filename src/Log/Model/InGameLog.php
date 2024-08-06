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


class InGameLog implements IModel {
	/**
     * @var int
	 */
	private $timestamp;
	/**
     * @var string
	 */
	private $requestId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var array
	 */
	private $tags;
	/**
     * @var string
	 */
	private $payload;
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
	public function withTimestamp(?int $timestamp): InGameLog {
		$this->timestamp = $timestamp;
		return $this;
	}
	public function getRequestId(): ?string {
		return $this->requestId;
	}
	public function setRequestId(?string $requestId) {
		$this->requestId = $requestId;
	}
	public function withRequestId(?string $requestId): InGameLog {
		$this->requestId = $requestId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): InGameLog {
		$this->userId = $userId;
		return $this;
	}
	public function getTags(): ?array {
		return $this->tags;
	}
	public function setTags(?array $tags) {
		$this->tags = $tags;
	}
	public function withTags(?array $tags): InGameLog {
		$this->tags = $tags;
		return $this;
	}
	public function getPayload(): ?string {
		return $this->payload;
	}
	public function setPayload(?string $payload) {
		$this->payload = $payload;
	}
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
            ->withTags(array_map(
                function ($item) {
                    return InGameLogTag::fromJson($item);
                },
                array_key_exists('tags', $data) && $data['tags'] !== null ? $data['tags'] : []
            ))
            ->withPayload(array_key_exists('payload', $data) && $data['payload'] !== null ? $data['payload'] : null);
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
            "requestId" => $this->getRequestId(),
            "userId" => $this->getUserId(),
            "tags" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTags() !== null && $this->getTags() !== null ? $this->getTags() : []
            ),
            "payload" => $this->getPayload(),
        );
    }
}