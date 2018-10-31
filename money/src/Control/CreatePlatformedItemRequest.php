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

namespace Gs2\Money\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreatePlatformedItemRequest extends Gs2BasicRequest {

    const FUNCTION = "CreatePlatformedItem";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var string 商品の名前 */
	private $itemName;

	/** @var string 販売プラットフォーム */
	private $platform;

	/** @var string アプリ内課金ID */
	private $name;

	/** @var double 販売価格 */
	private $price;


	/**
	 * 課金通貨の名前を取得
	 *
	 * @return string 課金通貨の名前
	 */
	public function getMoneyName() {
		return $this->moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 */
	public function setMoneyName($moneyName) {
		$this->moneyName = $moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 * @return CreatePlatformedItemRequest
	 */
	public function withMoneyName($moneyName): CreatePlatformedItemRequest {
		$this->setMoneyName($moneyName);
		return $this;
	}

	/**
	 * 商品の名前を取得
	 *
	 * @return string 商品の名前
	 */
	public function getItemName() {
		return $this->itemName;
	}

	/**
	 * 商品の名前を設定
	 *
	 * @param string $itemName 商品の名前
	 */
	public function setItemName($itemName) {
		$this->itemName = $itemName;
	}

	/**
	 * 商品の名前を設定
	 *
	 * @param string $itemName 商品の名前
	 * @return CreatePlatformedItemRequest
	 */
	public function withItemName($itemName): CreatePlatformedItemRequest {
		$this->setItemName($itemName);
		return $this;
	}

	/**
	 * 販売プラットフォームを取得
	 *
	 * @return string 販売プラットフォーム
	 */
	public function getPlatform() {
		return $this->platform;
	}

	/**
	 * 販売プラットフォームを設定
	 *
	 * @param string $platform 販売プラットフォーム
	 */
	public function setPlatform($platform) {
		$this->platform = $platform;
	}

	/**
	 * 販売プラットフォームを設定
	 *
	 * @param string $platform 販売プラットフォーム
	 * @return CreatePlatformedItemRequest
	 */
	public function withPlatform($platform): CreatePlatformedItemRequest {
		$this->setPlatform($platform);
		return $this;
	}

	/**
	 * アプリ内課金IDを取得
	 *
	 * @return string アプリ内課金ID
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * アプリ内課金IDを設定
	 *
	 * @param string $name アプリ内課金ID
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * アプリ内課金IDを設定
	 *
	 * @param string $name アプリ内課金ID
	 * @return CreatePlatformedItemRequest
	 */
	public function withName($name): CreatePlatformedItemRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * 販売価格を取得
	 *
	 * @return double 販売価格
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * 販売価格を設定
	 *
	 * @param double $price 販売価格
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * 販売価格を設定
	 *
	 * @param double $price 販売価格
	 * @return CreatePlatformedItemRequest
	 */
	public function withPrice($price): CreatePlatformedItemRequest {
		$this->setPrice($price);
		return $this;
	}

}