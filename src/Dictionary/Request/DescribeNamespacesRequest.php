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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeNamespacesRequest extends Gs2BasicRequest {
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;

	public function getPageToken(): ?string {
		return $this->pageToken;
	}

	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}

	public function withPageToken(?string $pageToken): DescribeNamespacesRequest {
		$this->pageToken = $pageToken;
		return $this;
	}

	public function getLimit(): ?int {
		return $this->limit;
	}

	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}

	public function withLimit(?int $limit): DescribeNamespacesRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeNamespacesRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeNamespacesRequest())
            ->withPageToken(empty($data['pageToken']) ? null : $data['pageToken'])
            ->withLimit(empty($data['limit']) && $data['limit'] !== 0 ? null : $data['limit']);
    }

    public function toJson(): array {
        return array(
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}