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

namespace Gs2\Showcase\Model;

/**
 * 商品
 *
 * @author Game Server Services, Inc.
 *
 */
class Item {

	/** @var string 陳列商品ID */
	private $showcaseItemId;

	/** @var string 商品名 */
	private $name;

	/** @var string メタデータ */
	private $meta;

	/** @var string 販売通貨 */
	private $currencyType;

	/** @var string GS2-Money 課金通貨名 */
	private $currencyMoneyName;

	/** @var string GS2-Gold 通貨プール名 */
	private $currencyGoldPoolName;

	/** @var string GS2-Gold 通貨名 */
	private $currencyGoldName;

	/** @var string GS2-ConsumableItem アイテムプール名 */
	private $currencyConsumableItemItemPoolName;

	/** @var string GS2-ConsumableItem アイテム名 */
	private $currencyConsumableItemName;

	/** @var string 対価消費処理にまつわるオプション値 */
	private $currencyOption;

	/** @var float 販売価格 */
	private $price;

	/** @var string 入手アイテムの種類 */
	private $itemType;

	/** @var string GS2-Money 課金通貨名 */
	private $itemMoneyName;

	/** @var string GS2-Gold 通貨プール名 */
	private $itemGoldPoolName;

	/** @var string GS2-Gold 通貨名 */
	private $itemGoldName;

	/** @var string GS2-Stamina スタミナプール名 */
	private $itemStaminaStaminaPoolName;

	/** @var string GS2-ConsumableItem アイテムプール名 */
	private $itemConsumableItemItemPoolName;

	/** @var string GS2-ConsumableItem アイテム名 */
	private $itemConsumableItemItemName;

	/** @var string GS2-Gacha ガチャプール名 */
	private $itemGachaGachaPoolName;

	/** @var string GS2-Gacha ガチャ名 */
	private $itemGachaGachaName;

	/** @var int 入手数量 */
	private $itemAmount;

	/** @var string アイテムの入手処理にまつわるオプション値 */
	private $itemOption;

	/** @var bool 購入可能か */
	private $canBuy;

	/**
	 * 陳列商品IDを取得
	 *
	 * @return string 陳列商品ID
	 */
	public function getShowcaseItemId() {
		return $this->showcaseItemId;
	}

	/**
	 * 陳列商品IDを設定
	 *
	 * @param string $showcaseItemId 陳列商品ID
	 */
	public function setShowcaseItemId($showcaseItemId) {
		$this->showcaseItemId = $showcaseItemId;
	}

	/**
	 * 陳列商品IDを設定
	 *
	 * @param string $showcaseItemId 陳列商品ID
	 * @return self
	 */
	public function withShowcaseItemId($showcaseItemId): self {
		$this->setShowcaseItemId($showcaseItemId);
		return $this;
	}

	/**
	 * 商品名を取得
	 *
	 * @return string 商品名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string $name 商品名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string $name 商品名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * メタデータを取得
	 *
	 * @return string メタデータ
	 */
	public function getMeta() {
		return $this->meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 */
	public function setMeta($meta) {
		$this->meta = $meta;
	}

	/**
	 * メタデータを設定
	 *
	 * @param string $meta メタデータ
	 * @return self
	 */
	public function withMeta($meta): self {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * 販売通貨を取得
	 *
	 * @return string 販売通貨
	 */
	public function getCurrencyType() {
		return $this->currencyType;
	}

	/**
	 * 販売通貨を設定
	 *
	 * @param string $currencyType 販売通貨
	 */
	public function setCurrencyType($currencyType) {
		$this->currencyType = $currencyType;
	}

	/**
	 * 販売通貨を設定
	 *
	 * @param string $currencyType 販売通貨
	 * @return self
	 */
	public function withCurrencyType($currencyType): self {
		$this->setCurrencyType($currencyType);
		return $this;
	}

	/**
	 * GS2-Money 課金通貨名を取得
	 *
	 * @return string GS2-Money 課金通貨名
	 */
	public function getCurrencyMoneyName() {
		return $this->currencyMoneyName;
	}

	/**
	 * GS2-Money 課金通貨名を設定
	 *
	 * @param string $currencyMoneyName GS2-Money 課金通貨名
	 */
	public function setCurrencyMoneyName($currencyMoneyName) {
		$this->currencyMoneyName = $currencyMoneyName;
	}

	/**
	 * GS2-Money 課金通貨名を設定
	 *
	 * @param string $currencyMoneyName GS2-Money 課金通貨名
	 * @return self
	 */
	public function withCurrencyMoneyName($currencyMoneyName): self {
		$this->setCurrencyMoneyName($currencyMoneyName);
		return $this;
	}

	/**
	 * GS2-Gold 通貨プール名を取得
	 *
	 * @return string GS2-Gold 通貨プール名
	 */
	public function getCurrencyGoldPoolName() {
		return $this->currencyGoldPoolName;
	}

	/**
	 * GS2-Gold 通貨プール名を設定
	 *
	 * @param string $currencyGoldPoolName GS2-Gold 通貨プール名
	 */
	public function setCurrencyGoldPoolName($currencyGoldPoolName) {
		$this->currencyGoldPoolName = $currencyGoldPoolName;
	}

	/**
	 * GS2-Gold 通貨プール名を設定
	 *
	 * @param string $currencyGoldPoolName GS2-Gold 通貨プール名
	 * @return self
	 */
	public function withCurrencyGoldPoolName($currencyGoldPoolName): self {
		$this->setCurrencyGoldPoolName($currencyGoldPoolName);
		return $this;
	}

	/**
	 * GS2-Gold 通貨名を取得
	 *
	 * @return string GS2-Gold 通貨名
	 */
	public function getCurrencyGoldName() {
		return $this->currencyGoldName;
	}

	/**
	 * GS2-Gold 通貨名を設定
	 *
	 * @param string $currencyGoldName GS2-Gold 通貨名
	 */
	public function setCurrencyGoldName($currencyGoldName) {
		$this->currencyGoldName = $currencyGoldName;
	}

	/**
	 * GS2-Gold 通貨名を設定
	 *
	 * @param string $currencyGoldName GS2-Gold 通貨名
	 * @return self
	 */
	public function withCurrencyGoldName($currencyGoldName): self {
		$this->setCurrencyGoldName($currencyGoldName);
		return $this;
	}

	/**
	 * GS2-ConsumableItem アイテムプール名を取得
	 *
	 * @return string GS2-ConsumableItem アイテムプール名
	 */
	public function getCurrencyConsumableItemItemPoolName() {
		return $this->currencyConsumableItemItemPoolName;
	}

	/**
	 * GS2-ConsumableItem アイテムプール名を設定
	 *
	 * @param string $currencyConsumableItemItemPoolName GS2-ConsumableItem アイテムプール名
	 */
	public function setCurrencyConsumableItemItemPoolName($currencyConsumableItemItemPoolName) {
		$this->currencyConsumableItemItemPoolName = $currencyConsumableItemItemPoolName;
	}

	/**
	 * GS2-ConsumableItem アイテムプール名を設定
	 *
	 * @param string $currencyConsumableItemItemPoolName GS2-ConsumableItem アイテムプール名
	 * @return self
	 */
	public function withCurrencyConsumableItemItemPoolName($currencyConsumableItemItemPoolName): self {
		$this->setCurrencyConsumableItemItemPoolName($currencyConsumableItemItemPoolName);
		return $this;
	}

	/**
	 * GS2-ConsumableItem アイテム名を取得
	 *
	 * @return string GS2-ConsumableItem アイテム名
	 */
	public function getCurrencyConsumableItemName() {
		return $this->currencyConsumableItemName;
	}

	/**
	 * GS2-ConsumableItem アイテム名を設定
	 *
	 * @param string $currencyConsumableItemName GS2-ConsumableItem アイテム名
	 */
	public function setCurrencyConsumableItemName($currencyConsumableItemName) {
		$this->currencyConsumableItemName = $currencyConsumableItemName;
	}

	/**
	 * GS2-ConsumableItem アイテム名を設定
	 *
	 * @param string $currencyConsumableItemName GS2-ConsumableItem アイテム名
	 * @return self
	 */
	public function withCurrencyConsumableItemName($currencyConsumableItemName): self {
		$this->setCurrencyConsumableItemName($currencyConsumableItemName);
		return $this;
	}

	/**
	 * 対価消費処理にまつわるオプション値を取得
	 *
	 * @return string 対価消費処理にまつわるオプション値
	 */
	public function getCurrencyOption() {
		return $this->currencyOption;
	}

	/**
	 * 対価消費処理にまつわるオプション値を設定
	 *
	 * @param string $currencyOption 対価消費処理にまつわるオプション値
	 */
	public function setCurrencyOption($currencyOption) {
		$this->currencyOption = $currencyOption;
	}

	/**
	 * 対価消費処理にまつわるオプション値を設定
	 *
	 * @param string $currencyOption 対価消費処理にまつわるオプション値
	 * @return self
	 */
	public function withCurrencyOption($currencyOption): self {
		$this->setCurrencyOption($currencyOption);
		return $this;
	}

	/**
	 * 販売価格を取得
	 *
	 * @return float 販売価格
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * 販売価格を設定
	 *
	 * @param float $price 販売価格
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * 販売価格を設定
	 *
	 * @param float $price 販売価格
	 * @return self
	 */
	public function withPrice($price): self {
		$this->setPrice($price);
		return $this;
	}

	/**
	 * 入手アイテムの種類を取得
	 *
	 * @return string 入手アイテムの種類
	 */
	public function getItemType() {
		return $this->itemType;
	}

	/**
	 * 入手アイテムの種類を設定
	 *
	 * @param string $itemType 入手アイテムの種類
	 */
	public function setItemType($itemType) {
		$this->itemType = $itemType;
	}

	/**
	 * 入手アイテムの種類を設定
	 *
	 * @param string $itemType 入手アイテムの種類
	 * @return self
	 */
	public function withItemType($itemType): self {
		$this->setItemType($itemType);
		return $this;
	}

	/**
	 * GS2-Money 課金通貨名を取得
	 *
	 * @return string GS2-Money 課金通貨名
	 */
	public function getItemMoneyName() {
		return $this->itemMoneyName;
	}

	/**
	 * GS2-Money 課金通貨名を設定
	 *
	 * @param string $itemMoneyName GS2-Money 課金通貨名
	 */
	public function setItemMoneyName($itemMoneyName) {
		$this->itemMoneyName = $itemMoneyName;
	}

	/**
	 * GS2-Money 課金通貨名を設定
	 *
	 * @param string $itemMoneyName GS2-Money 課金通貨名
	 * @return self
	 */
	public function withItemMoneyName($itemMoneyName): self {
		$this->setItemMoneyName($itemMoneyName);
		return $this;
	}

	/**
	 * GS2-Gold 通貨プール名を取得
	 *
	 * @return string GS2-Gold 通貨プール名
	 */
	public function getItemGoldPoolName() {
		return $this->itemGoldPoolName;
	}

	/**
	 * GS2-Gold 通貨プール名を設定
	 *
	 * @param string $itemGoldPoolName GS2-Gold 通貨プール名
	 */
	public function setItemGoldPoolName($itemGoldPoolName) {
		$this->itemGoldPoolName = $itemGoldPoolName;
	}

	/**
	 * GS2-Gold 通貨プール名を設定
	 *
	 * @param string $itemGoldPoolName GS2-Gold 通貨プール名
	 * @return self
	 */
	public function withItemGoldPoolName($itemGoldPoolName): self {
		$this->setItemGoldPoolName($itemGoldPoolName);
		return $this;
	}

	/**
	 * GS2-Gold 通貨名を取得
	 *
	 * @return string GS2-Gold 通貨名
	 */
	public function getItemGoldName() {
		return $this->itemGoldName;
	}

	/**
	 * GS2-Gold 通貨名を設定
	 *
	 * @param string $itemGoldName GS2-Gold 通貨名
	 */
	public function setItemGoldName($itemGoldName) {
		$this->itemGoldName = $itemGoldName;
	}

	/**
	 * GS2-Gold 通貨名を設定
	 *
	 * @param string $itemGoldName GS2-Gold 通貨名
	 * @return self
	 */
	public function withItemGoldName($itemGoldName): self {
		$this->setItemGoldName($itemGoldName);
		return $this;
	}

	/**
	 * GS2-Stamina スタミナプール名を取得
	 *
	 * @return string GS2-Stamina スタミナプール名
	 */
	public function getItemStaminaStaminaPoolName() {
		return $this->itemStaminaStaminaPoolName;
	}

	/**
	 * GS2-Stamina スタミナプール名を設定
	 *
	 * @param string $itemStaminaStaminaPoolName GS2-Stamina スタミナプール名
	 */
	public function setItemStaminaStaminaPoolName($itemStaminaStaminaPoolName) {
		$this->itemStaminaStaminaPoolName = $itemStaminaStaminaPoolName;
	}

	/**
	 * GS2-Stamina スタミナプール名を設定
	 *
	 * @param string $itemStaminaStaminaPoolName GS2-Stamina スタミナプール名
	 * @return self
	 */
	public function withItemStaminaStaminaPoolName($itemStaminaStaminaPoolName): self {
		$this->setItemStaminaStaminaPoolName($itemStaminaStaminaPoolName);
		return $this;
	}

	/**
	 * GS2-ConsumableItem アイテムプール名を取得
	 *
	 * @return string GS2-ConsumableItem アイテムプール名
	 */
	public function getItemConsumableItemItemPoolName() {
		return $this->itemConsumableItemItemPoolName;
	}

	/**
	 * GS2-ConsumableItem アイテムプール名を設定
	 *
	 * @param string $itemConsumableItemItemPoolName GS2-ConsumableItem アイテムプール名
	 */
	public function setItemConsumableItemItemPoolName($itemConsumableItemItemPoolName) {
		$this->itemConsumableItemItemPoolName = $itemConsumableItemItemPoolName;
	}

	/**
	 * GS2-ConsumableItem アイテムプール名を設定
	 *
	 * @param string $itemConsumableItemItemPoolName GS2-ConsumableItem アイテムプール名
	 * @return self
	 */
	public function withItemConsumableItemItemPoolName($itemConsumableItemItemPoolName): self {
		$this->setItemConsumableItemItemPoolName($itemConsumableItemItemPoolName);
		return $this;
	}

	/**
	 * GS2-ConsumableItem アイテム名を取得
	 *
	 * @return string GS2-ConsumableItem アイテム名
	 */
	public function getItemConsumableItemItemName() {
		return $this->itemConsumableItemItemName;
	}

	/**
	 * GS2-ConsumableItem アイテム名を設定
	 *
	 * @param string $itemConsumableItemItemName GS2-ConsumableItem アイテム名
	 */
	public function setItemConsumableItemItemName($itemConsumableItemItemName) {
		$this->itemConsumableItemItemName = $itemConsumableItemItemName;
	}

	/**
	 * GS2-ConsumableItem アイテム名を設定
	 *
	 * @param string $itemConsumableItemItemName GS2-ConsumableItem アイテム名
	 * @return self
	 */
	public function withItemConsumableItemItemName($itemConsumableItemItemName): self {
		$this->setItemConsumableItemItemName($itemConsumableItemItemName);
		return $this;
	}

	/**
	 * GS2-Gacha ガチャプール名を取得
	 *
	 * @return string GS2-Gacha ガチャプール名
	 */
	public function getItemGachaGachaPoolName() {
		return $this->itemGachaGachaPoolName;
	}

	/**
	 * GS2-Gacha ガチャプール名を設定
	 *
	 * @param string $itemGachaGachaPoolName GS2-Gacha ガチャプール名
	 */
	public function setItemGachaGachaPoolName($itemGachaGachaPoolName) {
		$this->itemGachaGachaPoolName = $itemGachaGachaPoolName;
	}

	/**
	 * GS2-Gacha ガチャプール名を設定
	 *
	 * @param string $itemGachaGachaPoolName GS2-Gacha ガチャプール名
	 * @return self
	 */
	public function withItemGachaGachaPoolName($itemGachaGachaPoolName): self {
		$this->setItemGachaGachaPoolName($itemGachaGachaPoolName);
		return $this;
	}

	/**
	 * GS2-Gacha ガチャ名を取得
	 *
	 * @return string GS2-Gacha ガチャ名
	 */
	public function getItemGachaGachaName() {
		return $this->itemGachaGachaName;
	}

	/**
	 * GS2-Gacha ガチャ名を設定
	 *
	 * @param string $itemGachaGachaName GS2-Gacha ガチャ名
	 */
	public function setItemGachaGachaName($itemGachaGachaName) {
		$this->itemGachaGachaName = $itemGachaGachaName;
	}

	/**
	 * GS2-Gacha ガチャ名を設定
	 *
	 * @param string $itemGachaGachaName GS2-Gacha ガチャ名
	 * @return self
	 */
	public function withItemGachaGachaName($itemGachaGachaName): self {
		$this->setItemGachaGachaName($itemGachaGachaName);
		return $this;
	}

	/**
	 * 入手数量を取得
	 *
	 * @return int 入手数量
	 */
	public function getItemAmount() {
		return $this->itemAmount;
	}

	/**
	 * 入手数量を設定
	 *
	 * @param int $itemAmount 入手数量
	 */
	public function setItemAmount($itemAmount) {
		$this->itemAmount = $itemAmount;
	}

	/**
	 * 入手数量を設定
	 *
	 * @param int $itemAmount 入手数量
	 * @return self
	 */
	public function withItemAmount($itemAmount): self {
		$this->setItemAmount($itemAmount);
		return $this;
	}

	/**
	 * アイテムの入手処理にまつわるオプション値を取得
	 *
	 * @return string アイテムの入手処理にまつわるオプション値
	 */
	public function getItemOption() {
		return $this->itemOption;
	}

	/**
	 * アイテムの入手処理にまつわるオプション値を設定
	 *
	 * @param string $itemOption アイテムの入手処理にまつわるオプション値
	 */
	public function setItemOption($itemOption) {
		$this->itemOption = $itemOption;
	}

	/**
	 * アイテムの入手処理にまつわるオプション値を設定
	 *
	 * @param string $itemOption アイテムの入手処理にまつわるオプション値
	 * @return self
	 */
	public function withItemOption($itemOption): self {
		$this->setItemOption($itemOption);
		return $this;
	}

	/**
	 * 購入可能かを取得
	 *
	 * @return bool 購入可能か
	 */
	public function getCanBuy() {
		return $this->canBuy;
	}

	/**
	 * 購入可能かを設定
	 *
	 * @param bool $canBuy 購入可能か
	 */
	public function setCanBuy($canBuy) {
		$this->canBuy = $canBuy;
	}

	/**
	 * 購入可能かを設定
	 *
	 * @param bool $canBuy 購入可能か
	 * @return self
	 */
	public function withCanBuy($canBuy): self {
		$this->setCanBuy($canBuy);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Item
	 */
    static function build(array $array)
    {
        $item = new Item();
        $item->setShowcaseItemId(isset($array['showcaseItemId']) ? $array['showcaseItemId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setCurrencyType(isset($array['currencyType']) ? $array['currencyType'] : null);
        $item->setCurrencyMoneyName(isset($array['currencyMoneyName']) ? $array['currencyMoneyName'] : null);
        $item->setCurrencyGoldPoolName(isset($array['currencyGoldPoolName']) ? $array['currencyGoldPoolName'] : null);
        $item->setCurrencyGoldName(isset($array['currencyGoldName']) ? $array['currencyGoldName'] : null);
        $item->setCurrencyConsumableItemItemPoolName(isset($array['currencyConsumableItemItemPoolName']) ? $array['currencyConsumableItemItemPoolName'] : null);
        $item->setCurrencyConsumableItemName(isset($array['currencyConsumableItemName']) ? $array['currencyConsumableItemName'] : null);
        $item->setCurrencyOption(isset($array['currencyOption']) ? $array['currencyOption'] : null);
        $item->setPrice(isset($array['price']) ? $array['price'] : null);
        $item->setItemType(isset($array['itemType']) ? $array['itemType'] : null);
        $item->setItemMoneyName(isset($array['itemMoneyName']) ? $array['itemMoneyName'] : null);
        $item->setItemGoldPoolName(isset($array['itemGoldPoolName']) ? $array['itemGoldPoolName'] : null);
        $item->setItemGoldName(isset($array['itemGoldName']) ? $array['itemGoldName'] : null);
        $item->setItemStaminaStaminaPoolName(isset($array['itemStaminaStaminaPoolName']) ? $array['itemStaminaStaminaPoolName'] : null);
        $item->setItemConsumableItemItemPoolName(isset($array['itemConsumableItemItemPoolName']) ? $array['itemConsumableItemItemPoolName'] : null);
        $item->setItemConsumableItemItemName(isset($array['itemConsumableItemItemName']) ? $array['itemConsumableItemItemName'] : null);
        $item->setItemGachaGachaPoolName(isset($array['itemGachaGachaPoolName']) ? $array['itemGachaGachaPoolName'] : null);
        $item->setItemGachaGachaName(isset($array['itemGachaGachaName']) ? $array['itemGachaGachaName'] : null);
        $item->setItemAmount(isset($array['itemAmount']) ? $array['itemAmount'] : null);
        $item->setItemOption(isset($array['itemOption']) ? $array['itemOption'] : null);
        $item->setCanBuy(isset($array['canBuy']) ? $array['canBuy'] : null);
        return $item;
    }

}