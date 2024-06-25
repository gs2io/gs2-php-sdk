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

namespace Gs2\Money2\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money2\Model\AppleAppStoreVerifyReceiptEvent;
use Gs2\Money2\Model\GooglePlayVerifyReceiptEvent;
use Gs2\Money2\Model\VerifyReceiptEvent;
use Gs2\Money2\Model\DepositTransaction;
use Gs2\Money2\Model\WalletSummary;
use Gs2\Money2\Model\DepositEvent;
use Gs2\Money2\Model\WithdrawEvent;
use Gs2\Money2\Model\Event;

class DescribeEventsByUserIdResult implements IResult {
    /** @var array */
    private $items;
    /** @var string */
    private $nextPageToken;

	public function getItems(): ?array {
		return $this->items;
	}

	public function setItems(?array $items) {
		$this->items = $items;
	}

	public function withItems(?array $items): DescribeEventsByUserIdResult {
		$this->items = $items;
		return $this;
	}

	public function getNextPageToken(): ?string {
		return $this->nextPageToken;
	}

	public function setNextPageToken(?string $nextPageToken) {
		$this->nextPageToken = $nextPageToken;
	}

	public function withNextPageToken(?string $nextPageToken): DescribeEventsByUserIdResult {
		$this->nextPageToken = $nextPageToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeEventsByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new DescribeEventsByUserIdResult())
            ->withItems(array_map(
                function ($item) {
                    return Event::fromJson($item);
                },
                array_key_exists('items', $data) && $data['items'] !== null ? $data['items'] : []
            ))
            ->withNextPageToken(array_key_exists('nextPageToken', $data) && $data['nextPageToken'] !== null ? $data['nextPageToken'] : null);
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
        );
    }
}