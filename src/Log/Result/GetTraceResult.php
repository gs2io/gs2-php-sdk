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

class GetTraceResult implements IResult {
    /** @var Trace */
    private $trace;
    /** @var array */
    private $parallels;
    /** @var bool */
    private $parallelTruncated;

	public function getTrace(): ?Trace {
		return $this->trace;
	}

	public function setTrace(?Trace $trace) {
		$this->trace = $trace;
	}

	public function withTrace(?Trace $trace): GetTraceResult {
		$this->trace = $trace;
		return $this;
	}

	public function getParallels(): ?array {
		return $this->parallels;
	}

	public function setParallels(?array $parallels) {
		$this->parallels = $parallels;
	}

	public function withParallels(?array $parallels): GetTraceResult {
		$this->parallels = $parallels;
		return $this;
	}

	public function getParallelTruncated(): ?bool {
		return $this->parallelTruncated;
	}

	public function setParallelTruncated(?bool $parallelTruncated) {
		$this->parallelTruncated = $parallelTruncated;
	}

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