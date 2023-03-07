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

namespace Gs2\News\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeOutputsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $uploadToken;
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
	public function withNamespaceName(?string $namespaceName): DescribeOutputsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUploadToken(): ?string {
		return $this->uploadToken;
	}
	public function setUploadToken(?string $uploadToken) {
		$this->uploadToken = $uploadToken;
	}
	public function withUploadToken(?string $uploadToken): DescribeOutputsRequest {
		$this->uploadToken = $uploadToken;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): DescribeOutputsRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): DescribeOutputsRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeOutputsRequest {
        if ($data === null) {
            return null;
        }
        return (new DescribeOutputsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUploadToken(array_key_exists('uploadToken', $data) && $data['uploadToken'] !== null ? $data['uploadToken'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "uploadToken" => $this->getUploadToken(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}