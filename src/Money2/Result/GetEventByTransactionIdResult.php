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
use Gs2\Money2\Model\RefundEvent;
use Gs2\Money2\Model\Event;

class GetEventByTransactionIdResult implements IResult {
    /** @var Event */
    private $item;

	public function getItem(): ?Event {
		return $this->item;
	}

	public function setItem(?Event $item) {
		$this->item = $item;
	}

	public function withItem(?Event $item): GetEventByTransactionIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventByTransactionIdResult {
        if ($data === null) {
            return null;
        }
        return (new GetEventByTransactionIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Event::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}