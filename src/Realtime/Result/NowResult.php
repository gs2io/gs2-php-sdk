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

namespace Gs2\Realtime\Result;

use Gs2\Core\Model\IResult;

/**
 * Result of now: Get current time
 *
 * @see https://docs.gs2.io/api_reference/realtime/sdk/#now
 */
class NowResult implements IResult {
    /** @var int Current time */
    private $timestamp;

    /** @return int|null Current time */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}

    /** @param int|null $timestamp Current time */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}

    /**
     * @param int|null $timestamp Current time
     * @return NowResult
     */
	public function withTimestamp(?int $timestamp): NowResult {
		$this->timestamp = $timestamp;
		return $this;
	}

    public static function fromJson(?array $data): ?NowResult {
        if ($data === null) {
            return null;
        }
        return (new NowResult())
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null);
    }

    public function toJson(): array {
        return array(
            "timestamp" => $this->getTimestamp(),
        );
    }
}