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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for describeMessages: List Messages
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#describemessages
 */
class DescribeMessagesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name */
    private $roomName;
    /** @var string Password required to access the room */
    private $password;
    /** @var int Category number for classifying messages */
    private $category;
    /** @var string User ID */
    private $accessToken;
    /** @var int Start time for message retrieval */
    private $startAt;
    /** @var int Number of data items to retrieve */
    private $limit;
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
     * @return DescribeMessagesRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeMessagesRequest {
		$this->namespaceName = $namespaceName;
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
     * @return DescribeMessagesRequest
     */
	public function withRoomName(?string $roomName): DescribeMessagesRequest {
		$this->roomName = $roomName;
		return $this;
	}
    /** @return string|null Password required to access the room */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password required to access the room */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password required to access the room
     * @return DescribeMessagesRequest
     */
	public function withPassword(?string $password): DescribeMessagesRequest {
		$this->password = $password;
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
     * @return DescribeMessagesRequest
     */
	public function withCategory(?int $category): DescribeMessagesRequest {
		$this->category = $category;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return DescribeMessagesRequest
     */
	public function withAccessToken(?string $accessToken): DescribeMessagesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Start time for message retrieval */
	public function getStartAt(): ?int {
		return $this->startAt;
	}
    /** @param int|null $startAt Start time for message retrieval */
	public function setStartAt(?int $startAt) {
		$this->startAt = $startAt;
	}
    /**
     * @param int|null $startAt Start time for message retrieval
     * @return DescribeMessagesRequest
     */
	public function withStartAt(?int $startAt): DescribeMessagesRequest {
		$this->startAt = $startAt;
		return $this;
	}
    /** @return int|null Number of data items to retrieve */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data items to retrieve */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data items to retrieve
     * @return DescribeMessagesRequest
     */
	public function withLimit(?int $limit): DescribeMessagesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeMessagesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeMessagesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withStartAt(array_key_exists('startAt', $data) && $data['startAt'] !== null ? $data['startAt'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "password" => $this->getPassword(),
            "category" => $this->getCategory(),
            "accessToken" => $this->getAccessToken(),
            "startAt" => $this->getStartAt(),
            "limit" => $this->getLimit(),
        );
    }
}