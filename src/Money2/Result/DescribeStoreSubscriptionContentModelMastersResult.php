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
use Gs2\Money2\Model\AppleAppStoreSubscriptionContent;
use Gs2\Money2\Model\GooglePlaySubscriptionContent;
use Gs2\Money2\Model\StoreSubscriptionContentModelMaster;

/**
 * Result of describeStoreSubscriptionContentModelMasters: List Store Subscription Content Model Masters
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#describestoresubscriptioncontentmodelmasters
 */
class DescribeStoreSubscriptionContentModelMastersResult implements IResult {
    /** @var array List of Store Subscription Content Model Masters */
    private $items;
    /** @var string Page token to retrieve the rest of the listing */
    private $nextPageToken;

    /** @return array|null List of Store Subscription Content Model Masters */
	public function getItems(): ?array {
		return $this->items;
	}

    /** @param array|null $items List of Store Subscription Content Model Masters */
	public function setItems(?array $items) {
		$this->items = $items;
	}

    /**
     * @param array|null $items List of Store Subscription Content Model Masters
     * @return DescribeStoreSubscriptionContentModelMastersResult
     */
	public function withItems(?array $items): DescribeStoreSubscriptionContentModelMastersResult {
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
     * @return DescribeStoreSubscriptionContentModelMastersResult
     */
	public function withNextPageToken(?string $nextPageToken): DescribeStoreSubscriptionContentModelMastersResult {
		$this->nextPageToken = $nextPageToken;
		return $this;
	}

    public static function fromJson(?array $data): ?DescribeStoreSubscriptionContentModelMastersResult {
        if ($data === null) {
            return null;
        }
        return (new DescribeStoreSubscriptionContentModelMastersResult())
            ->withItems(!array_key_exists('items', $data) || $data['items'] === null ? null : array_map(
                function ($item) {
                    return StoreSubscriptionContentModelMaster::fromJson($item);
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