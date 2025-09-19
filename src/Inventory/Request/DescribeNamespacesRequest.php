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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class DescribeNamespacesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namePrefix;
    /** @var string */
    private $pageToken;
    /** @var int */
    private $limit;
	public function getNamePrefix(): ?string {
		return $this->namePrefix;
	}
	public function setNamePrefix(?string $namePrefix) {
		$this->namePrefix = $namePrefix;
	}
	public function withNamePrefix(?string $namePrefix): DescribeNamespacesRequest {
		$this->namePrefix = $namePrefix;
		return $this;
	}
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
            ->withNamePrefix(array_key_exists('namePrefix', $data) && $data['namePrefix'] !== null ? $data['namePrefix'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namePrefix" => $this->getNamePrefix(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}