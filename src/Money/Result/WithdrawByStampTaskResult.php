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

namespace Gs2\Money\Result;

use Gs2\Core\Model\IResult;
use Gs2\Money\Model\WalletDetail;
use Gs2\Money\Model\Wallet;

/**
 * Result of withdrawByStampTask: Execute balance consumption from wallet as a consume action
 *
 * @see https://docs.gs2.io/api_reference/money/stamp_sheet/#gs2moneywithdrawbyuserid
 */
class WithdrawByStampTaskResult implements IResult {
    /** @var Wallet Post-withdraw Wallet */
    private $item;
    /** @var float Price of currency consumed */
    private $price;
    /** @var string Context recording the execution results of Consume Actions */
    private $newContextStack;

    /** @return Wallet|null Post-withdraw Wallet */
	public function getItem(): ?Wallet {
		return $this->item;
	}

    /** @param Wallet|null $item Post-withdraw Wallet */
	public function setItem(?Wallet $item) {
		$this->item = $item;
	}

    /**
     * @param Wallet|null $item Post-withdraw Wallet
     * @return WithdrawByStampTaskResult
     */
	public function withItem(?Wallet $item): WithdrawByStampTaskResult {
		$this->item = $item;
		return $this;
	}

    /** @return float|null Price of currency consumed */
	public function getPrice(): ?float {
		return $this->price;
	}

    /** @param float|null $price Price of currency consumed */
	public function setPrice(?float $price) {
		$this->price = $price;
	}

    /**
     * @param float|null $price Price of currency consumed
     * @return WithdrawByStampTaskResult
     */
	public function withPrice(?float $price): WithdrawByStampTaskResult {
		$this->price = $price;
		return $this;
	}

    /** @return string|null Context recording the execution results of Consume Actions */
	public function getNewContextStack(): ?string {
		return $this->newContextStack;
	}

    /** @param string|null $newContextStack Context recording the execution results of Consume Actions */
	public function setNewContextStack(?string $newContextStack) {
		$this->newContextStack = $newContextStack;
	}

    /**
     * @param string|null $newContextStack Context recording the execution results of Consume Actions
     * @return WithdrawByStampTaskResult
     */
	public function withNewContextStack(?string $newContextStack): WithdrawByStampTaskResult {
		$this->newContextStack = $newContextStack;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawByStampTaskResult {
        if ($data === null) {
            return null;
        }
        return (new WithdrawByStampTaskResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Wallet::fromJson($data['item']) : null)
            ->withPrice(array_key_exists('price', $data) && $data['price'] !== null ? $data['price'] : null)
            ->withNewContextStack(array_key_exists('newContextStack', $data) && $data['newContextStack'] !== null ? $data['newContextStack'] : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
            "price" => $this->getPrice(),
            "newContextStack" => $this->getNewContextStack(),
        );
    }
}