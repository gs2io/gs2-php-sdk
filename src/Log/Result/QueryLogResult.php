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

/**
 * Result of queryLog: Query log entries (v2)
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#querylog
 */
class QueryLogResult implements IResult {
    /** @var array List of Access Logs */
    private $items;
    /** @var int Total number of query results (returns 10001 if it exceeds 10000) */
    private $totalEntryCount;
    /** @var string Page token to retrieve the rest of the listing */
    private $nextPageToken;

    /** @return array|null List of Access Logs */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Access Logs */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Access Logs
     * @return QueryLogResult
     */
	public function withItems(?array $items): QueryLogResult {
		$this->items = $items;
		return $this;
	}

    /** @return int|null Total number of query results (returns 10001 if it exceeds 10000) */
	public function getTotalEntryCount(): ?int {
		return $this->totalEntryCount;
	}

    /** @param int|null $totalEntryCount Total number of query results (returns 10001 if it exceeds 10000) */
	public function setTotalEntryCount(?int $totalEntryCount) {
		$this->totalEntryCount = $totalEntryCount;
	}

    /**
     * @param int|null $totalEntryCount Total number of query results (returns 10001 if it exceeds 10000)
     * @return QueryLogResult
     */
	public function withTotalEntryCount(?int $totalEntryCount): QueryLogResult {
		$this->totalEntryCount = $totalEntryCount;
		return $this;
	}

    /** @return string|null Page token to retrieve the rest of the listing */
	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

    /** @param string|null $nextPageToken Page token to retrieve the rest of the listing */
	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

    /**
     * @param string|null $nextPageToken Page token to retrieve the rest of the listing
     * @return QueryLogResult
     */
	public function withNextPageToken(?string $nextPageToken): QueryLogResult {
		$this->nextPageToken = $nextPageToken;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryLogResult {
        if ($data === null) {
            return null;
        }
        return (new QueryLogResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return LogEntry::fromJson($item);
                },
                $data['items']
            ))
            ->withTotalEntryCount(array_key_exists('totalEntryCount', $data) && $data['totalEntryCount'] !== null ? $data['totalEntryCount'] : null)
            ->withNextPageToken(array_key_exists('nextPageToken', $data) && $data['nextPageToken'] !== null ? $data['nextPageToken'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "totalEntryCount" => $this->getTotalEntryCount(),
            "nextPageToken" => $this->getNextPageToken(),
        );
    }
}