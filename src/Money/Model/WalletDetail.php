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


class WalletDetail implements IModel {
	/**
     * @var float
	 */
	private $price;
	/**
     * @var int
	 */
	private $count;

	public function getPrice(): ?float {
		return $this->price;
	}

	public function setPrice(?float $price) {
		$this->price = $price;
	}

	public function withPrice(?float $price): WalletDetail {
		$this->price = $price;
		return $this;
	}

	public function getCount(): ?int {
		return $this->count;
	}

	public function setCount(?int $count) {
		$this->count = $count;
	}

	public function withCount(?int $count): WalletDetail {
		$this->count = $count;
		return $this;
	}

    public static function fromJson(?array $data): ?WalletDetail {
        if ($data === null) {
            return null;
        }
        return (new WalletDetail())
            ->withPrice(empty($data['price']) && $data['price'] !== 0 ? null : $data['price'])
            ->withCount(empty($data['count']) && $data['count'] !== 0 ? null : $data['count']);
    }

    public function toJson(): array {
        return array(
            "price" => $this->getPrice(),
            "count" => $this->getCount(),
        );
    }
}