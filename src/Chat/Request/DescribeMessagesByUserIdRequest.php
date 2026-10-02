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
 * Request for describeMessagesByUserId: List Messages by User ID
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#describemessagesbyuserid
 */
class DescribeMessagesByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Room name */
    private $roomName;
    /** @var string Password required to access the room */
    private $password;
    /** @var int Category number for classifying messages */
    private $category;
    /** @var string User ID */
    private $userId;
    /** @var int Start time for message retrieval */
    private $startAt;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return DescribeMessagesByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeMessagesByUserIdRequest {
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
     * @return DescribeMessagesByUserIdRequest
     */
	public function withRoomName(?string $roomName): DescribeMessagesByUserIdRequest {
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
     * @return DescribeMessagesByUserIdRequest
     */
	public function withPassword(?string $password): DescribeMessagesByUserIdRequest {
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
     * @return DescribeMessagesByUserIdRequest
     */
	public function withCategory(?int $category): DescribeMessagesByUserIdRequest {
		$this->category = $category;
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
     * @return DescribeMessagesByUserIdRequest
     */
	public function withUserId(?string $userId): DescribeMessagesByUserIdRequest {
		$this->userId = $userId;
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
     * @return DescribeMessagesByUserIdRequest
     */
	public function withStartAt(?int $startAt): DescribeMessagesByUserIdRequest {
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
     * @return DescribeMessagesByUserIdRequest
     */
	public function withLimit(?int $limit): DescribeMessagesByUserIdRequest {
		$this->limit = $limit;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return DescribeMessagesByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DescribeMessagesByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeMessagesByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeMessagesByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withStartAt(array_key_exists('startAt', $data) && $data['startAt'] !== null ? $data['startAt'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "password" => $this->getPassword(),
            "category" => $this->getCategory(),
            "userId" => $this->getUserId(),
            "startAt" => $this->getStartAt(),
            "limit" => $this->getLimit(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}