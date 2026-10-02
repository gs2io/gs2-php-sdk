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

/**
 * Request for getTrace: Get trace by trace ID
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#gettrace
 */
class GetTraceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Trace ID */
    private $traceId;
    /** @var int Search range start date and time */
    private $begin;
    /** @var int Search range end date and time */
    private $end;
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
     * @return GetTraceRequest
     */
	public function withNamespaceName(?string $namespaceName): GetTraceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Trace ID */
	public function getTraceId(): ?string {
		return $this->traceId;
	}
    /** @param string|null $traceId Trace ID */
	public function setTraceId(?string $traceId) {
		$this->traceId = $traceId;
	}
    /**
     * @param string|null $traceId Trace ID
     * @return GetTraceRequest
     */
	public function withTraceId(?string $traceId): GetTraceRequest {
		$this->traceId = $traceId;
		return $this;
	}
    /** @return int|null Search range start date and time */
	public function getBegin(): ?int {
		return $this->begin;
	}
    /** @param int|null $begin Search range start date and time */
	public function setBegin(?int $begin) {
		$this->begin = $begin;
	}
    /**
     * @param int|null $begin Search range start date and time
     * @return GetTraceRequest
     */
	public function withBegin(?int $begin): GetTraceRequest {
		$this->begin = $begin;
		return $this;
	}
    /** @return int|null Search range end date and time */
	public function getEnd(): ?int {
		return $this->end;
	}
    /** @param int|null $end Search range end date and time */
	public function setEnd(?int $end) {
		$this->end = $end;
	}
    /**
     * @param int|null $end Search range end date and time
     * @return GetTraceRequest
     */
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