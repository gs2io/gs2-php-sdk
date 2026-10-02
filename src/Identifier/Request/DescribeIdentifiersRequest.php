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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for describeIdentifiers: List Credentials
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#describeidentifiers
 */
class DescribeIdentifiersRequest extends Gs2BasicRequest {
    /** @var string User name */
    private $userName;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data acquired */
    private $limit;
    /** @return string|null User name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName User name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName User name
     * @return DescribeIdentifiersRequest
     */
	public function withUserName(?string $userName): DescribeIdentifiersRequest {
		$this->userName = $userName;
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
     * @return DescribeIdentifiersRequest
     */
	public function withPageToken(?string $pageToken): DescribeIdentifiersRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
    /** @return int|null Number of data acquired */
	public function getLimit(): ?int {
		return $this->limit;
	}
    /** @param int|null $limit Number of data acquired */
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
    /**
     * @param int|null $limit Number of data acquired
     * @return DescribeIdentifiersRequest
     */
	public function withLimit(?int $limit): DescribeIdentifiersRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeIdentifiersRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeIdentifiersRequest())
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "userName" => $this->getUserName(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}