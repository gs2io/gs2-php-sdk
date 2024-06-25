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


class DepositTransaction implements IModel {
	/**
     * @var float
	 */
	private $price;
	/**
     * @var string
	 */
	private $currency;
	/**
     * @var int
	 */
	private $count;
	/**
     * @var int
	 */
	private $depositedAt;
	public function getPrice(): ?float {
		return $this->price;
	}
	public function setPrice(?float $price) {
		$this->price = $price;
	}
	public function withPrice(?float $price): DepositTransaction {
		$this->price = $price;
		return $this;
	}
	public function getCurrency(): ?string {
		return $this->currency;
	}
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
	public function withCurrency(?string $currency): DepositTransaction {
		$this->currency = $currency;
		return $this;
	}
	public function getCount(): ?int {
		return $this->count;
	}
	public function setCount(?int $count) {
		$this->count = $count;
	}
	public function withCount(?int $count): DepositTransaction {
		$this->count = $count;
		return $this;
	}
	public function getDepositedAt(): ?int {
		return $this->depositedAt;
	}
	public function setDepositedAt(?int $depositedAt) {
		$this->depositedAt = $depositedAt;
	}
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