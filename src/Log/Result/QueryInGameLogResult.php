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
use Gs2\Log\Model\InGameLogTag;
use Gs2\Log\Model\InGameLog;

class QueryInGameLogResult implements IResult {
    /** @var array */
    private $items;
    /** @var string */
    private $nextPageToken;
    /** @var int */
    private $totalCount;
    /** @var int */
    private $scanSize;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): QueryInGameLogResult {
		$this->items = $items;
		return $this;
	}

	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

	public function withNextPageToken(?string $nextPageToken): QueryInGameLogResult {
		$this->nextPageToken = $nextPageToken;
		return $this;
	}

	public function getTotalCount(): ?int {
		return $this->totalCount;
	}

	public function setTotalCount(?int $totalCount) {
		$this->totalCount = $totalCount;
	}

	public function withTotalCount(?int $totalCount): QueryInGameLogResult {
		$this->totalCount = $totalCount;
		return $this;
	}

	public function getScanSize(): ?int {
		return $this->scanSize;
	}

	public function setScanSize(?int $scanSize) {
		$this->scanSize = $scanSize;
	}

	public function withScanSize(?int $scanSize): QueryInGameLogResult {
		$this->scanSize = $scanSize;
		return $this;
	}

    public static function fromJson(?array $data): ?QueryInGameLogResult {
        if ($data === null) {
            return null;
        }
        return (new QueryInGameLogResult())
            ->withItems(array_map(
                function ($item) {
                    return InGameLog::fromJson($item);
                },
                array_key_exists('items', $data) && $data['items'] !== null ? $data['items'] : []
            ))
            ->withNextPageToken(array_key_exists('nextPageToken', $data) && $data['nextPageToken'] !== null ? $data['nextPageToken'] : null)
            ->withTotalCount(array_key_exists('totalCount', $data) && $data['totalCount'] !== null ? $data['totalCount'] : null)
            ->withScanSize(array_key_exists('scanSize', $data) && $data['scanSize'] !== null ? $data['scanSize'] : null);
    }

    public function toJson(): array {
        return array(
            "items" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getItems() !== null && $this->getItems() !== null ? $this->getItems() : []
            ),
            "nextPageToken" => $this->getNextPageToken(),
            "totalCount" => $this->getTotalCount(),
            "scanSize" => $this->getScanSize(),
        );
    }
}