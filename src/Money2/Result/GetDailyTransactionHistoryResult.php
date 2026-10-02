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
use Gs2\Money2\Model\DailyTransactionHistory;

/**
 * Result of getDailyTransactionHistory: Get daily transaction history by specifying date and currency
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#getdailytransactionhistory
 */
class GetDailyTransactionHistoryResult implements IResult {
    /** @var DailyTransactionHistory DailyTransactionHistory */
    private $item;

    /** @return DailyTransactionHistory|null DailyTransactionHistory */
	public function getItem(): ?DailyTransactionHistory {
		return $this->item;
	}

    /** @param DailyTransactionHistory|null $item DailyTransactionHistory */
	public function setItem(?DailyTransactionHistory $item) {
		$this->item = $item;
	}

    /**
     * @param DailyTransactionHistory|null $item DailyTransactionHistory
     * @return GetDailyTransactionHistoryResult
     */
	public function withItem(?DailyTransactionHistory $item): GetDailyTransactionHistoryResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetDailyTransactionHistoryResult {
        if ($data === null) {
            return null;
        }
        return (new GetDailyTransactionHistoryResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? DailyTransactionHistory::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}