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

namespace Gs2\Log\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class QueryLogRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var int */
    private $begin;
    /** @var int */
    private $end;
    /** @var string */
    private $query;
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
	public function withNamespaceName(?string $namespaceName): QueryLogRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBegin(): ?int {
		return $this->begin;
	}
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
	public function withBegin(?int $begin): QueryLogRequest {
		$this->begin = $begin;
		return $this;
	}
	public function getEnd(): ?int {
		return $this->end;
	}
	public function setEnd(?int $end) {
		$this->end = $end;
	}
	public function withEnd(?int $end): QueryLogRequest {
		$this->end = $end;
		return $this;
	}
	public function getQuery(): ?string {
		return $this->query;
	}
	public function setQuery(?string $query) {
		$this->query = $query;
	}
	public function withQuery(?string $query): QueryLogRequest {
		$this->query = $query;
		return $this;
	}
	public function getPageToken(): ?string {
		return $this->pageToken;
	}
	public function setPageToken(?string $pageToken) {
		$this->pageToken = $pageToken;
	}
	public function withPageToken(?string $pageToken): QueryLogRequest {
		$this->pageToken = $pageToken;
		return $this;
	}
	public function getLimit(): ?int {
		return $this->limit;
	}
	public function setLimit(?int $limit) {
		$this->limit = $limit;
	}
	public function withLimit(?int $limit): QueryLogRequest {
		$this->limit = $limit;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryLogRequest {
        if ($data === null) {
            return null;
        }
        return (new QueryLogRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null)
            ->withQuery(array_key_exists('query', $data) && $data['query'] !== null ? $data['query'] : null)
            ->withPageToken(array_key_exists('pageToken', $data) && $data['pageToken'] !== null ? $data['pageToken'] : null)
            ->withLimit(array_key_exists('limit', $data) && $data['limit'] !== null ? $data['limit'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "query" => $this->getQuery(),
            "pageToken" => $this->getPageToken(),
            "limit" => $this->getLimit(),
        );
    }
}