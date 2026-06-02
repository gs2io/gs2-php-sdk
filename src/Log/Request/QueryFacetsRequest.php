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

class QueryFacetsRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var int */
    private $begin;
    /** @var int */
    private $end;
    /** @var string */
    private $query;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): QueryFacetsRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getBegin(): ?int {
		return $this->begin;
	}
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
	public function withBegin(?int $begin): QueryFacetsRequest {
		$this->begin = $begin;
		return $this;
	}
	public function getEnd(): ?int {
		return $this->end;
	}
	public function setEnd(?int $end) {
		$this->end = $end;
	}
	public function withEnd(?int $end): QueryFacetsRequest {
		$this->end = $end;
		return $this;
	}
	public function getQuery(): ?string {
		return $this->query;
	}
	public function setQuery(?string $query) {
		$this->query = $query;
	}
	public function withQuery(?string $query): QueryFacetsRequest {
		$this->query = $query;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryFacetsRequest {
        if ($data === null) {
            return null;
        }
        return (new QueryFacetsRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null)
            ->withQuery(array_key_exists('query', $data) && $data['query'] !== null ? $data['query'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
            "query" => $this->getQuery(),
        );
    }
}