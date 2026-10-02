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
 * Request for describeLatestMessages: List latest Messages
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#describelatestmessages
 */
class DescribeLatestMessagesRequest extends Gs2BasicRequest {
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
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
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
     * @return DescribeLatestMessagesRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeLatestMessagesRequest {
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
     * @return DescribeLatestMessagesRequest
     */
	public function withRoomName(?string $roomName): DescribeLatestMessagesRequest {
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
     * @return DescribeLatestMessagesRequest
     */
	public function withPassword(?string $password): DescribeLatestMessagesRequest {
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
     * @return DescribeLatestMessagesRequest
     */
	public function withCategory(?int $category): DescribeLatestMessagesRequest {
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
     * @return DescribeLatestMessagesRequest
     */
	public function withAccessToken(?string $accessToken): DescribeLatestMessagesRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Token specifying the position from which to start acquiring data */
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
    /** @param string|null $pageToken Token specifying the position from which to start acquiring data */
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
    /**
     * @param string|null $pageToken Token specifying the position from which to start acquiring data
     * @return DescribeLatestMessagesRequest
     */
	public function withPageToken(?string $pageToken): DescribeLatestMessagesRequest {
		$this->pageToken = $pageToken;
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
     * @return DescribeLatestMessagesRequest
     */
	public function withLimit(?int $limit): DescribeLatestMessagesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeLatestMessagesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeLatestMessagesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomName(array_key_exists('roomName', $data) && $data['roomName'] !== null ? $data['roomName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withCategory(array_key_exists('category', $data) && $data['category'] !== null ? $data['category'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomName" => $this->getRoomName(),
            "password" => $this->getPassword(),
            "category" => $this->getCategory(),
            "accessToken" => $this->getAccessToken(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}