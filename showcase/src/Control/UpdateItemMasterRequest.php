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

namespace Gs2\Showcase\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateItemMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateItemMaster";

	/** @var string ショーケースの名前 */
	private $showcaseName;

	/** @var string 商品の名前 */
	private $itemName;

	/** @var string メタデータ */
	private $meta;

	/** @var string 販売通貨 */
	private $currencyType;

	/** @var string GS2-Money 課金通貨名 */
	private $currencyMoneyName;

	/** @var string GS2-Gold 通貨名 */
	private $currencyGoldName;

	/** @var string GS2-Gold 通貨プール名 */
	private $currencyGoldPoolName;

	/** @var string GS2-ConsumableItem アイテムプール名 */
	private $currencyConsumableItemItemPoolName;

	/** @var string GS2-ConsumableItem アイテム名 */
	private $currencyConsumableItemItemName;

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

	/** @var string 購入許可判定の種類 */
	private $openConditionType;

	/** @var string 購入許可判定 に実行されるGS2-Limit */
	private $openConditionLimitName;

	/** @var string 購入許可判定 に実行されるGS2-Limit のカウンター */
	private $openConditionLimitCounterName;


	/**
	 * ショーケースの名前を取得
	 *
	 * @return string ショーケースの名前
	 */
	public function getShowcaseName() {
		return $this->showcaseName;
	}

	/**
	 * ショーケースの名前を設定
	 *
	 * @param string $showcaseName ショーケースの名前
	 */
	public function setShowcaseName($showcaseName) {
		$this->showcaseName = $showcaseName;
	}

	/**
	 * ショーケースの名前を設定
	 *
	 * @param string $showcaseName ショーケースの名前
	 * @return UpdateItemMasterRequest
	 */
	public function withShowcaseName($showcaseName): UpdateItemMasterRequest {
		$this->setShowcaseName($showcaseName);
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemName($itemName): UpdateItemMasterRequest {
		$this->setItemName($itemName);
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
	 * @return UpdateItemMasterRequest
	 */
	public function withMeta($meta): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withCurrencyType($currencyType): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withCurrencyMoneyName($currencyMoneyName): UpdateItemMasterRequest {
		$this->setCurrencyMoneyName($currencyMoneyName);
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
	 * @return UpdateItemMasterRequest
	 */
	public function withCurrencyGoldName($currencyGoldName): UpdateItemMasterRequest {
		$this->setCurrencyGoldName($currencyGoldName);
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
	 * @return UpdateItemMasterRequest
	 */
	public function withCurrencyGoldPoolName($currencyGoldPoolName): UpdateItemMasterRequest {
		$this->setCurrencyGoldPoolName($currencyGoldPoolName);
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
	 * @return UpdateItemMasterRequest
	 */
	public function withCurrencyConsumableItemItemPoolName($currencyConsumableItemItemPoolName): UpdateItemMasterRequest {
		$this->setCurrencyConsumableItemItemPoolName($currencyConsumableItemItemPoolName);
		return $this;
	}

	/**
	 * GS2-ConsumableItem アイテム名を取得
	 *
	 * @return string GS2-ConsumableItem アイテム名
	 */
	public function getCurrencyConsumableItemItemName() {
		return $this->currencyConsumableItemItemName;
	}

	/**
	 * GS2-ConsumableItem アイテム名を設定
	 *
	 * @param string $currencyConsumableItemItemName GS2-ConsumableItem アイテム名
	 */
	public function setCurrencyConsumableItemItemName($currencyConsumableItemItemName) {
		$this->currencyConsumableItemItemName = $currencyConsumableItemItemName;
	}

	/**
	 * GS2-ConsumableItem アイテム名を設定
	 *
	 * @param string $currencyConsumableItemItemName GS2-ConsumableItem アイテム名
	 * @return UpdateItemMasterRequest
	 */
	public function withCurrencyConsumableItemItemName($currencyConsumableItemItemName): UpdateItemMasterRequest {
		$this->setCurrencyConsumableItemItemName($currencyConsumableItemItemName);
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
	 * @return UpdateItemMasterRequest
	 */
	public function withCurrencyOption($currencyOption): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withPrice($price): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemType($itemType): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemMoneyName($itemMoneyName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemGoldPoolName($itemGoldPoolName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemGoldName($itemGoldName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemStaminaStaminaPoolName($itemStaminaStaminaPoolName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemConsumableItemItemPoolName($itemConsumableItemItemPoolName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemConsumableItemItemName($itemConsumableItemItemName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemGachaGachaPoolName($itemGachaGachaPoolName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemGachaGachaName($itemGachaGachaName): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemAmount($itemAmount): UpdateItemMasterRequest {
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
	 * @return UpdateItemMasterRequest
	 */
	public function withItemOption($itemOption): UpdateItemMasterRequest {
		$this->setItemOption($itemOption);
		return $this;
	}

	/**
	 * 購入許可判定の種類を取得
	 *
	 * @return string 購入許可判定の種類
	 */
	public function getOpenConditionType() {
		return $this->openConditionType;
	}

	/**
	 * 購入許可判定の種類を設定
	 *
	 * @param string $openConditionType 購入許可判定の種類
	 */
	public function setOpenConditionType($openConditionType) {
		$this->openConditionType = $openConditionType;
	}

	/**
	 * 購入許可判定の種類を設定
	 *
	 * @param string $openConditionType 購入許可判定の種類
	 * @return UpdateItemMasterRequest
	 */
	public function withOpenConditionType($openConditionType): UpdateItemMasterRequest {
		$this->setOpenConditionType($openConditionType);
		return $this;
	}

	/**
	 * 購入許可判定 に実行されるGS2-Limitを取得
	 *
	 * @return string 購入許可判定 に実行されるGS2-Limit
	 */
	public function getOpenConditionLimitName() {
		return $this->openConditionLimitName;
	}

	/**
	 * 購入許可判定 に実行されるGS2-Limitを設定
	 *
	 * @param string $openConditionLimitName 購入許可判定 に実行されるGS2-Limit
	 */
	public function setOpenConditionLimitName($openConditionLimitName) {
		$this->openConditionLimitName = $openConditionLimitName;
	}

	/**
	 * 購入許可判定 に実行されるGS2-Limitを設定
	 *
	 * @param string $openConditionLimitName 購入許可判定 に実行されるGS2-Limit
	 * @return UpdateItemMasterRequest
	 */
	public function withOpenConditionLimitName($openConditionLimitName): UpdateItemMasterRequest {
		$this->setOpenConditionLimitName($openConditionLimitName);
		return $this;
	}

	/**
	 * 購入許可判定 に実行されるGS2-Limit のカウンターを取得
	 *
	 * @return string 購入許可判定 に実行されるGS2-Limit のカウンター
	 */
	public function getOpenConditionLimitCounterName() {
		return $this->openConditionLimitCounterName;
	}

	/**
	 * 購入許可判定 に実行されるGS2-Limit のカウンターを設定
	 *
	 * @param string $openConditionLimitCounterName 購入許可判定 に実行されるGS2-Limit のカウンター
	 */
	public function setOpenConditionLimitCounterName($openConditionLimitCounterName) {
		$this->openConditionLimitCounterName = $openConditionLimitCounterName;
	}

	/**
	 * 購入許可判定 に実行されるGS2-Limit のカウンターを設定
	 *
	 * @param string $openConditionLimitCounterName 購入許可判定 に実行されるGS2-Limit のカウンター
	 * @return UpdateItemMasterRequest
	 */
	public function withOpenConditionLimitCounterName($openConditionLimitCounterName): UpdateItemMasterRequest {
		$this->setOpenConditionLimitCounterName($openConditionLimitCounterName);
		return $this;
	}

}