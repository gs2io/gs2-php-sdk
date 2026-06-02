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

class GetTraceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $traceId;
    /** @var int */
    private $begin;
    /** @var int */
    private $end;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetTraceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getTraceId(): ?string {
		return $this->traceId;
	}
	public function setTraceId(?string $traceId) {
		$this->traceId = $traceId;
	}
	public function withTraceId(?string $traceId): GetTraceRequest {
		$this->traceId = $traceId;
		return $this;
	}
	public function getBegin(): ?int {
		return $this->begin;
	}
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
	public function withBegin(?int $begin): GetTraceRequest {
		$this->begin = $begin;
		return $this;
	}
	public function getEnd(): ?int {
		return $this->end;
	}
	public function setEnd(?int $end) {
		$this->end = $end;
	}
	public function withEnd(?int $end): GetTraceRequest {
		$this->end = $end;
		return $this;
	}

    public static function fromJson(?array $data): ?GetTraceRequest {
        if ($data === null) {
            return null;
        }
        return (new GetTraceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withTraceId(array_key_exists('traceId', $data) && $data['traceId'] !== null ? $data['traceId'] : null)
            ->withBegin(array_key_exists('begin', $data) && $data['begin'] !== null ? $data['begin'] : null)
            ->withEnd(array_key_exists('end', $data) && $data['end'] !== null ? $data['end'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "traceId" => $this->getTraceId(),
            "begin" => $this->getBegin(),
            "end" => $this->getEnd(),
        );
    }
}