<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

/**
 * ウォレットの詳細
 *
 * @author Game Server Services, Inc.
 *
 */
class Wallet {

	/** @var double 単価 */
	private $price;

	/** @var int 所持数 */
	private $count;

	/**
	 * 単価を取得
	 *
	 * @return double 単価
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * 単価を設定
	 *
	 * @param double $price 単価
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * 単価を設定
	 *
	 * @param double $price 単価
	 * @return self
	 */
	public function withPrice($price): self {
		$this->setPrice($price);
		return $this;
	}

	/**
	 * 所持数を取得
	 *
	 * @return int 所持数
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * 所持数を設定
	 *
	 * @param int $count 所持数
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * 所持数を設定
	 *
	 * @param int $count 所持数
	 * @return self
	 */
	public function withCount($count): self {
		$this->setCount($count);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Wallet
	 */
    static function build(array $array)
    {
        $item = new Wallet();
        $item->setPrice(isset($array['price']) ? $array['price'] : null);
        $item->setCount(isset($array['count']) ? $array['count'] : null);
        return $item;
    }

}