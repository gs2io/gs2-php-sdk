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


class Trace implements IModel {
	/**
     * @var string
	 */
	private $traceId;
	/**
     * @var array
	 */
	private $spans;
	/**
     * @var bool
	 */
	private $truncated;
	public function getTraceId(): ?string {
		return $this->traceId;
	}
	public function setTraceId(?string $traceId) {
		$this->traceId = $traceId;
	}
	public function withTraceId(?string $traceId): Trace {
		$this->traceId = $traceId;
		return $this;
	}
	public function getSpans(): ?array {
		return $this->spans;
	}
	public function setSpans(?array $spans) {
		$this->spans = $spans;
	}
	public function withSpans(?array $spans): Trace {
		$this->spans = $spans;
		return $this;
	}
	public function getTruncated(): ?bool {
		return $this->truncated;
	}
	public function setTruncated(?bool $truncated) {
		$this->truncated = $truncated;
	}
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