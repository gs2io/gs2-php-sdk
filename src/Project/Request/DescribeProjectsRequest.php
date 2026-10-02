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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/** Request for describeProjects: Get list of projects */
class DescribeProjectsRequest extends Gs2BasicRequest {
    /** @var string Signed in to the account token. */
    private $accountToken;
    /** @var string Token specifying the position from which to start acquiring data */
    private $pageToken;
    /** @var int Number of data items to retrieve */
    private $limit;
    /** @return string|null Signed in to the account token. */
	public function getAccountToken(): ?string {
		return $this->accountToken;
	}
    /** @param string|null $accountToken Signed in to the account token. */
	public function setAccountToken(?string $accountToken) {
		$this->accountToken = $accountToken;
	}
    /**
     * @param string|null $accountToken Signed in to the account token.
     * @return DescribeProjectsRequest
     */
	public function withAccountToken(?string $accountToken): DescribeProjectsRequest {
		$this->accountToken = $accountToken;
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
     * @return DescribeProjectsRequest
     */
	public function withPageToken(?string $pageToken): DescribeProjectsRequest {
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
     * @return DescribeProjectsRequest
     */
	public function withLimit(?int $limit): DescribeProjectsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeProjectsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeProjectsRequest())
            ->withAccountToken(array_key_exists('accountToken', $data) && $data['accountToken'] !== null ? $data['accountToken'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "accountToken" => $this->getAccountToken(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}