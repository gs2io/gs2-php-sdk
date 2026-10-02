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

namespace Gs2\LoginReward\Result;

use Gs2\Core\Model\IResult;
use Gs2\LoginReward\Model\ReceiveStatus;

/**
 * Result of describeReceiveStatuses: List Receive Statuses
 *
 * @see https://docs.gs2.io/api_reference/login_reward/sdk/#describereceivestatuses
 */
class DescribeReceiveStatusesResult implements IResult {
    /** @var array List of ReceiveStatuses */
    private $items;
    /** @var string Page token to retrieve the rest of the listing */
    private $nextPageToken;

    /** @return array|null List of ReceiveStatuses */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of ReceiveStatuses */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of ReceiveStatuses
     * @return DescribeReceiveStatusesResult
     */
	public function withItems(?array $items): DescribeReceiveStatusesResult {
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
     * @return DescribeReceiveStatusesResult
     */
	public function withNextPageToken(?string $nextPageToken): DescribeReceiveStatusesResult {
		$this->nextPageToken = $nextPageToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeReceiveStatusesResult {
        if ($data === null) {
            return null;
        }
        return (new DescribeReceiveStatusesResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return ReceiveStatus::fromJson($item);
                },
                $data['items']
            ))
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
            "nextPageToken" => $this->getNextPageToken(),
        );
    }
}