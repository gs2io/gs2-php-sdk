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
use Gs2\Money\Model\Wallet;

/**
 * ウォレットから残高を消費します のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class WithdrawResult implements IResult {
	/** @var Wallet 消費後のウォレット */
	private $item;
	/** @var float 消費した通貨の価格 */
	private $price;

	/**
	 * 消費後のウォレットを取得
	 *
	 * @return Wallet|null ウォレットから残高を消費します
	 */
	public function getItem(): ?Wallet {
		return $this->item;
	}

	/**
	 * 消費後のウォレットを設定
	 *
	 * @param Wallet|null $item ウォレットから残高を消費します
	 */
	public function setItem(?Wallet $item) {
		$this->item = $item;
	}

	/**
	 * 消費した通貨の価格を取得
	 *
	 * @return float|null ウォレットから残高を消費します
	 */
	public function getPrice(): ?float {
		return $this->price;
	}

	/**
	 * 消費した通貨の価格を設定
	 *
	 * @param float|null $price ウォレットから残高を消費します
	 */
	public function setPrice(?float $price) {
		$this->price = $price;
	}

    public static function fromJson(array $data): WithdrawResult {
        $result = new WithdrawResult();
        $result->setItem(isset($data["item"]) ? Wallet::fromJson($data["item"]) : null);
        $result->setPrice(isset($data["price"]) ? $data["price"] : null);
        return $result;
    }
}