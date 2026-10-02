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
use Gs2\Log\Model\ExecuteStampTaskLogCount;

/**
 * Result of countExecuteStampTaskLog: Get aggregate results of consume action execution logs
 *
 * @see https://docs.gs2.io/api_reference/log/sdk/#countexecutestamptasklog
 */
class CountExecuteStampTaskLogResult implements IResult {
    /** @var array List of Aggregated consume action execution log */
    private $items;
    /** @var string Page token to retrieve the rest of the listing */
    private $nextPageToken;
    /** @var int Total number of query results */
    private $totalCount;
    /** @var int Total bytes scanned during search */
    private $scanSize;

    /** @return array|null List of Aggregated consume action execution log */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Aggregated consume action execution log */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Aggregated consume action execution log
     * @return CountExecuteStampTaskLogResult
     */
	public function withItems(?array $items): CountExecuteStampTaskLogResult {
		$this->items = $items;
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
     * @return CountExecuteStampTaskLogResult
     */
	public function withNextPageToken(?string $nextPageToken): CountExecuteStampTaskLogResult {
		$this->nextPageToken = $nextPageToken;
		return $this;
	}

    /** @return int|null Total number of query results */
	public function getTotalCount(): ?int {
		return $this->totalCount;
	}

    /** @param int|null $totalCount Total number of query results */
	public function setTotalCount(?int $totalCount) {
		$this->totalCount = $totalCount;
	}

    /**
     * @param int|null $totalCount Total number of query results
     * @return CountExecuteStampTaskLogResult
     */
	public function withTotalCount(?int $totalCount): CountExecuteStampTaskLogResult {
		$this->totalCount = $totalCount;
		return $this;
	}

    /** @return int|null Total bytes scanned during search */
	public function getScanSize(): ?int {
		return $this->scanSize;
	}

    /** @param int|null $scanSize Total bytes scanned during search */
	public function setScanSize(?int $scanSize) {
		$this->scanSize = $scanSize;
	}

    /**
     * @param int|null $scanSize Total bytes scanned during search
     * @return CountExecuteStampTaskLogResult
     */
	public function withScanSize(?int $scanSize): CountExecuteStampTaskLogResult {
		$this->scanSize = $scanSize;
		return $this;
	}

    public static function fromJson(?array $data): ?CountExecuteStampTaskLogResult {
        if ($data === null) {
            return null;
        }
        return (new CountExecuteStampTaskLogResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return ExecuteStampTaskLogCount::fromJson($item);
                },
                $data['items']
            ))
            ->withNextPageToken(array_key_exists('nextPageToken', $data) && $data['nextPageToken'] !== null ? $data['nextPageToken'] : null)
            ->withTotalCount(array_key_exists('totalCount', $data) && $data['totalCount'] !== null ? $data['totalCount'] : null)
            ->withScanSize(array_key_exists('scanSize', $data) && $data['scanSize'] !== null ? $data['scanSize'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => $this->getItems() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems()
            ),
            "nextPageToken" => $this->getNextPageToken(),
            "totalCount" => $this->getTotalCount(),
            "scanSize" => $this->getScanSize(),
        );
    }
}