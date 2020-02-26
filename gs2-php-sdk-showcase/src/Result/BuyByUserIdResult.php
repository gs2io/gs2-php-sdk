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

namespace Gs2\Showcase\Result;

use Gs2\Core\Model\IResult;
use Gs2\Showcase\Model\SalesItem;

/**
 * ユーザIDを指定して陳列棚を取得 のレスポンスモデル
 *
 * @author Game Server Services, Inc.
 */
class BuyByUserIdResult implements IResult {
	/** @var SalesItem 商品 */
	private $item;
	/** @var string 購入処理の実行に使用するスタンプシート */
	private $stampSheet;

	/**
	 * 商品を取得
	 *
	 * @return SalesItem|null ユーザIDを指定して陳列棚を取得
	 */
	public function getItem(): ?SalesItem {
		return $this->item;
	}

	/**
	 * 商品を設定
	 *
	 * @param SalesItem|null $item ユーザIDを指定して陳列棚を取得
	 */
	public function setItem(?SalesItem $item) {
		$this->item = $item;
	}

	/**
	 * 購入処理の実行に使用するスタンプシートを取得
	 *
	 * @return string|null ユーザIDを指定して陳列棚を取得
	 */
	public function getStampSheet(): ?string {
		return $this->stampSheet;
	}

	/**
	 * 購入処理の実行に使用するスタンプシートを設定
	 *
	 * @param string|null $stampSheet ユーザIDを指定して陳列棚を取得
	 */
	public function setStampSheet(?string $stampSheet) {
		$this->stampSheet = $stampSheet;
	}

    public static function fromJson(array $data): BuyByUserIdResult {
        $result = new BuyByUserIdResult();
        $result->setItem(isset($data["item"]) ? SalesItem::fromJson($data["item"]) : null);
        $result->setStampSheet(isset($data["stampSheet"]) ? $data["stampSheet"] : null);
        return $result;
    }
}