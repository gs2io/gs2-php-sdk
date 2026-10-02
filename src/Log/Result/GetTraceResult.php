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

namespace Gs2\Log\Result;

use Gs2\Core\Model\IResult;
use Gs2\Log\Model\Label;
use Gs2\Log\Model\LogEntry;
use Gs2\Log\Model\Trace;

/**
 * Result of getTrace: Get trace by trace ID
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#gettrace
 */
class GetTraceResult implements IResult {
    /** @var Trace Trace */
    private $trace;
    /** @var array List of traces that were run in parallel */
    private $parallels;
    /** @var bool Indicates if the parallels list was truncated */
    private $parallelTruncated;

    /** @return Trace|null Trace */
	public function getTrace(): ?Trace {
		return $this->trace;
	}

    /** @param Trace|null $trace Trace */
	public function setTrace(?Trace $trace) {
		$this->trace = $trace;
	}

    /**
     * @param Trace|null $trace Trace
     * @return GetTraceResult
     */
	public function withTrace(?Trace $trace): GetTraceResult {
		$this->trace = $trace;
		return $this;
	}

    /** @return array|null List of traces that were run in parallel */
	public function getParallels(): ?array {
		return $this->parallels;
	}

    /** @param array|null $parallels List of traces that were run in parallel */
	public function setParallels(?array $parallels) {
		$this->parallels = $parallels;
	}

    /**
     * @param array|null $parallels List of traces that were run in parallel
     * @return GetTraceResult
     */
	public function withParallels(?array $parallels): GetTraceResult {
		$this->parallels = $parallels;
		return $this;
	}

    /** @return bool|null Indicates if the parallels list was truncated */
	public function getParallelTruncated(): ?bool {
		return $this->parallelTruncated;
	}

    /** @param bool|null $parallelTruncated Indicates if the parallels list was truncated */
	public function setParallelTruncated(?bool $parallelTruncated) {
		$this->parallelTruncated = $parallelTruncated;
	}

    /**
     * @param bool|null $parallelTruncated Indicates if the parallels list was truncated
     * @return GetTraceResult
     */
	public function withParallelTruncated(?bool $parallelTruncated): GetTraceResult {
		$this->parallelTruncated = $parallelTruncated;
		return $this;
	}

    public static function fromJson(?array $data): ?GetTraceResult {
        if ($data === null) {
            return null;
        }
        return (new GetTraceResult())
            ->withTrace(array_key_exists('trace', $data) && $data['trace'] !== null ? Trace::fromJson($data['trace']) : null)
            ->withParallels(!array_key_exists('parallels', $data) || $data['parallels'] === null ? null : array_map(
                function ($item) {
                    return Trace::fromJson($item);
                },
                $data['parallels']
            ))
            ->withParallelTruncated(array_key_exists('parallelTruncated', $data) ? $data['parallelTruncated'] : null);
    }

    public function toJson(): array {
        return array(
            "trace" => $this->getTrace() !== null ? $this->getTrace()->toJson() : null,
            "parallels" => $this->getParallels() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getParallels()
            ),
            "parallelTruncated" => $this->getParallelTruncated(),
        );
    }
}