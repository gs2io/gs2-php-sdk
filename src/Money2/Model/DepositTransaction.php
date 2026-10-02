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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Deposit Transaction
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#deposittransaction
 */
class DepositTransaction implements IModel {
	/**
     * @var float Purchase Price
	 */
	private $price;
	/**
     * @var string Currency Code
	 */
	private $currency;
	/**
     * @var int Quantity of premium currency
	 */
	private $count;
	/**
     * @var int Deposit Date
	 */
	private $depositedAt;
    /** @return float|null Purchase Price */
	public function getPrice(): ?float {
		return $this->price;
	}
    /** @param float|null $price Purchase Price */
	public function setPrice(?float $price) {
		$this->price = $price;
	}
    /**
     * @param float|null $price Purchase Price
     * @return DepositTransaction
     */
	public function withPrice(?float $price): DepositTransaction {
		$this->price = $price;
		return $this;
	}
    /** @return string|null Currency Code */
	public function getCurrency(): ?string {
		return $this->currency;
	}
    /** @param string|null $currency Currency Code */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
    /**
     * @param string|null $currency Currency Code
     * @return DepositTransaction
     */
	public function withCurrency(?string $currency): DepositTransaction {
		$this->currency = $currency;
		return $this;
	}
    /** @return int|null Quantity of premium currency */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Quantity of premium currency */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Quantity of premium currency
     * @return DepositTransaction
     */
	public function withCount(?int $count): DepositTransaction {
		$this->count = $count;
		return $this;
	}
    /** @return int|null Deposit Date */
	public function getDepositedAt(): ?int {
		return $this->depositedAt;
	}
    /** @param int|null $depositedAt Deposit Date */
	public function setDepositedAt(?int $depositedAt) {
		$this->depositedAt = $depositedAt;
	}
    /**
     * @param int|null $depositedAt Deposit Date
     * @return DepositTransaction
     */
	public function withDepositedAt(?int $depositedAt): DepositTransaction {
		$this->depositedAt = $depositedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?DepositTransaction {
        if ($data === null) {
            return null;
        }
        return (new DepositTransaction())
            ->withPrice(array_key_exists('price', $data) && $data['price'] !== null ? $data['price'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null)
            ->withDepositedAt(array_key_exists('depositedAt', $data) && $data['depositedAt'] !== null ? $data['depositedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "price" => $this->getPrice(),
            "currency" => $this->getCurrency(),
            "count" => $this->getCount(),
            "depositedAt" => $this->getDepositedAt(),
        );
    }
}