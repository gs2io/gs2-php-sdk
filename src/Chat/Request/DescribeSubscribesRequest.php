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
 * Request for describeSubscribes: List Room Subscriptions
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#describesubscribes
 */
class DescribeSubscribesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Filter by Room name prefix */
    private $roomNamePrefix;
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
     * @return DescribeSubscribesRequest
     */
	public function withNamespaceName(?string $namespaceName): DescribeSubscribesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Filter by Room name prefix */
	public function getRoomNamePrefix(): ?string {
		return $this->roomNamePrefix;
	}
    /** @param string|null $roomNamePrefix Filter by Room name prefix */
	public function setRoomNamePrefix(?string $roomNamePrefix) {
		$this->roomNamePrefix = $roomNamePrefix;
	}
    /**
     * @param string|null $roomNamePrefix Filter by Room name prefix
     * @return DescribeSubscribesRequest
     */
	public function withRoomNamePrefix(?string $roomNamePrefix): DescribeSubscribesRequest {
		$this->roomNamePrefix = $roomNamePrefix;
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
     * @return DescribeSubscribesRequest
     */
	public function withAccessToken(?string $accessToken): DescribeSubscribesRequest {
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
     * @return DescribeSubscribesRequest
     */
	public function withPageToken(?string $pageToken): DescribeSubscribesRequest {
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
     * @return DescribeSubscribesRequest
     */
	public function withLimit(?int $limit): DescribeSubscribesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeSubscribesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeSubscribesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRoomNamePrefix(array_key_exists('roomNamePrefix', $data) && $data['roomNamePrefix'] !== null ? $data['roomNamePrefix'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "roomNamePrefix" => $this->getRoomNamePrefix(),
            "accessToken" => $this->getAccessToken(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}