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
 * ウォレットの詳細
 *
 * @author Game Server Services, Inc.
 *
 */
class WalletDetail implements IModel {
	/**
     * @var float 単価
	 */
	protected $price;

	/**
	 * 単価を取得
	 *
	 * @return float|null 単価
	 */
	public function getPrice(): ?float {
		return $this->price;
	}

	/**
	 * 単価を設定
	 *
	 * @param float|null $price 単価
	 */
	public function setPrice(?float $price) {
		$this->price = $price;
	}

	/**
	 * 単価を設定
	 *
	 * @param float|null $price 単価
	 * @return WalletDetail $this
	 */
	public function withPrice(?float $price): WalletDetail {
		$this->price = $price;
		return $this;
	}
	/**
     * @var int 所持量
	 */
	protected $count;

	/**
	 * 所持量を取得
	 *
	 * @return int|null 所持量
	 */
	public function getCount(): ?int {
		return $this->count;
	}

	/**
	 * 所持量を設定
	 *
	 * @param int|null $count 所持量
	 */
	public function setCount(?int $count) {
		$this->count = $count;
	}

	/**
	 * 所持量を設定
	 *
	 * @param int|null $count 所持量
	 * @return WalletDetail $this
	 */
	public function withCount(?int $count): WalletDetail {
		$this->count = $count;
		return $this;
	}

    public function toJson(): array {
        return array(
            "price" => $this->price,
            "count" => $this->count,
        );
    }

    public static function fromJson(array $data): WalletDetail {
        $model = new WalletDetail();
        $model->setPrice(isset($data["price"]) ? $data["price"] : null);
        $model->setCount(isset($data["count"]) ? $data["count"] : null);
        return $model;
    }
}