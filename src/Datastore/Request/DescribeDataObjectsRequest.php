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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeDataObjectsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $status;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): DescribeDataObjectsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getAccessToken(): ?string {
		return $this->accessToken;
	}

	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}

	public function withAccessToken(?string $accessToken): DescribeDataObjectsRequest {
		$this->accessToken = $accessToken;
		return $this;
	}

	public function getStatus(): ?string {
		return $this->status;
	}

	public function setStatus(?string $status) {
		$this->status = $status;
	}

	public function withStatus(?string $status): DescribeDataObjectsRequest {
		$this->status = $status;
		return $this;
	}

	public function getPageToken(): ?string {
		return $this->pageToken;
	}

	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}

	public function withPageToken(?string $pageToken): DescribeDataObjectsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): DescribeDataObjectsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeDataObjectsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeDataObjectsRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withAccessToken(empty($data['accessToken']) ? null : $data['accessToken'])
            ->withStatus(empty($data['status']) ? null : $data['status'])
            ->withPageToken(empty($data['pageToken']) ? null : $data['pageToken'])
            ->withLimit(empty($data['limit']) ? null : $data['limit']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "status" => $this->getStatus(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}