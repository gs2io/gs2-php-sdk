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

namespace Gs2\Money\Model;

use Gs2\Core\Model\IModel;


/**
 * Wallet Detail
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#walletdetail
 */
class WalletDetail implements IModel {
	/**
     * @var float Unit Price
	 */
	private $price;
	/**
     * @var int Count
	 */
	private $count;
    /** @return float|null Unit Price */
	public function getPrice(): ?float {
		return $this->price;
	}
    /** @param float|null $price Unit Price */
	public function setPrice(?float $price) {
		$this->price = $price;
	}
    /**
     * @param float|null $price Unit Price
     * @return WalletDetail
     */
	public function withPrice(?float $price): WalletDetail {
		$this->price = $price;
		return $this;
	}
    /** @return int|null Count */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Count */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Count
     * @return WalletDetail
     */
	public function withCount(?int $count): WalletDetail {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?WalletDetail {
        if ($data === null) {
            return null;
        }
        return (new WalletDetail())
            ->withPrice(array_key_exists('price', $data) && $data['price'] !== null ? $data['price'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "price" => $this->getPrice(),
            "count" => $this->getCount(),
        );
    }
}