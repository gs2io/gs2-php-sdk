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
use Gs2\Money2\Model\WalletSummary;
use Gs2\Money2\Model\DepositTransaction;
use Gs2\Money2\Model\Wallet;

class WithdrawResult implements IResult {
    /** @var Wallet */
    private $item;
    /** @var array */
    private $withdrawTransactions;

	public function getItem(): ?Wallet {
		return $this->item;
	}

	public function setItem(?Wallet $item) {
		$this->item = $item;
	}

	public function withItem(?Wallet $item): WithdrawResult {
		$this->item = $item;
		return $this;
	}

	public function getWithdrawTransactions(): ?array {
		return $this->withdrawTransactions;
	}

	public function setWithdrawTransactions(?array $withdrawTransactions) {
		$this->withdrawTransactions = $withdrawTransactions;
	}

	public function withWithdrawTransactions(?array $withdrawTransactions): WithdrawResult {
		$this->withdrawTransactions = $withdrawTransactions;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawResult {
        if ($data === null) {
            return null;
        }
        return (new WithdrawResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Wallet::fromJson($data['item']) : null)
            ->withWithdrawTransactions(array_map(
                function ($item) {
                    return DepositTransaction::fromJson($item);
                },
                array_key_exists('withdrawTransactions', $data) && $data['withdrawTransactions'] !== null ? $data['withdrawTransactions'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "withdrawTransactions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getWithdrawTransactions() !== null && $this->getWithdrawTransactions() !== null ? $this->getWithdrawTransactions() : []
            ),
        );
    }
}