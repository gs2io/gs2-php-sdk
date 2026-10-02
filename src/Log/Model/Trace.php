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

namespace Gs2\Log\Model;

use Gs2\Core\Model\IModel;


/**
 * Trace
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#trace
 */
class Trace implements IModel {
	/**
     * @var string Trace ID
	 */
	private $traceId;
	/**
     * @var array Spans
	 */
	private $spans;
	/**
     * @var bool Truncated
	 */
	private $truncated;
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
     * @return Trace
     */
	public function withTraceId(?string $traceId): Trace {
		$this->traceId = $traceId;
		return $this;
	}
    /** @return array|null Spans */
	public function getSpans(): ?array {
		return $this->spans;
	}
    /** @param array|null $spans Spans */
	public function setSpans(?array $spans) {
		$this->spans = $spans;
	}
    /**
     * @param array|null $spans Spans
     * @return Trace
     */
	public function withSpans(?array $spans): Trace {
		$this->spans = $spans;
		return $this;
	}
    /** @return bool|null Truncated */
	public function getTruncated(): ?bool {
		return $this->truncated;
	}
    /** @param bool|null $truncated Truncated */
	public function setTruncated(?bool $truncated) {
		$this->truncated = $truncated;
	}
    /**
     * @param bool|null $truncated Truncated
     * @return Trace
     */
	public function withTruncated(?bool $truncated): Trace {
		$this->truncated = $truncated;
		return $this;
	}

    public static function fromJson(?array $data): ?Trace {
        if ($data === null) {
            return null;
        }
        return (new Trace())
            ->withTraceId(array_key_exists('traceId', $data) && $data['traceId'] !== null ? $data['traceId'] : null)
            ->withSpans(!array_key_exists('spans', $data) || $data['spans'] === null ? null : array_map(
                function ($item) {
                    return LogEntry::fromJson($item);
                },
                $data['spans']
            ))
            ->withTruncated(array_key_exists('truncated', $data) ? $data['truncated'] : null);
    }

    public function toJson(): array {
        return array(
            "traceId" => $this->getTraceId(),
            "spans" => $this->getSpans() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getSpans()
            ),
            "truncated" => $this->getTruncated(),
        );
    }
}