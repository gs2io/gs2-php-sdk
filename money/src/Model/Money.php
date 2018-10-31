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
 * 課金通貨
 *
 * @author Game Server Services, Inc.
 *
 */
class Money {

	/** @var string 課金通貨GRN */
	private $moneyId;

	/** @var string オーナーID */
	private $ownerId;

	/** @var string 課金通貨名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string 支払い優先度 */
	private $priority;

	/** @var bool 無償課金通貨を異なるスロットで共有するか */
	private $shareFree;

	/** @var string 通貨 */
	private $currency;

	/** @var bool ストアプラットフォームのレシートの検証機能を利用するか */
	private $useVerifyReceipt;

	/** @var string Apple のアプリケーションバンドルID */
	private $appleKey;

	/** @var string Google のレシート検証用公開鍵 */
	private $googleKey;

	/** @var double 未使用残高 */
	private $balance;

	/** @var string ウォレット新規作成時 に実行されるGS2-Script */
	private $createWalletTriggerScript;

	/** @var string ウォレット新規作成完了時 に実行されるGS2-Script */
	private $createWalletDoneTriggerScript;

	/** @var string ウォレット残高加算時 に実行されるGS2-Script */
	private $chargeWalletTriggerScript;

	/** @var string ウォレット残高加算完了時 に実行されるGS2-Script */
	private $chargeWalletDoneTriggerScript;

	/** @var string ウォレット残高消費時 に実行されるGS2-Script */
	private $consumeWalletTriggerScript;

	/** @var string ウォレット残高消費完了時 に実行されるGS2-Script */
	private $consumeWalletDoneTriggerScript;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 課金通貨GRNを取得
	 *
	 * @return string 課金通貨GRN
	 */
	public function getMoneyId() {
		return $this->moneyId;
	}

	/**
	 * 課金通貨GRNを設定
	 *
	 * @param string $moneyId 課金通貨GRN
	 */
	public function setMoneyId($moneyId) {
		$this->moneyId = $moneyId;
	}

	/**
	 * 課金通貨GRNを設定
	 *
	 * @param string $moneyId 課金通貨GRN
	 * @return self
	 */
	public function withMoneyId($moneyId): self {
		$this->setMoneyId($moneyId);
		return $this;
	}

	/**
	 * オーナーIDを取得
	 *
	 * @return string オーナーID
	 */
	public function getOwnerId() {
		return $this->ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 */
	public function setOwnerId($ownerId) {
		$this->ownerId = $ownerId;
	}

	/**
	 * オーナーIDを設定
	 *
	 * @param string $ownerId オーナーID
	 * @return self
	 */
	public function withOwnerId($ownerId): self {
		$this->setOwnerId($ownerId);
		return $this;
	}

	/**
	 * 課金通貨名を取得
	 *
	 * @return string 課金通貨名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 課金通貨名を設定
	 *
	 * @param string $name 課金通貨名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 課金通貨名を設定
	 *
	 * @param string $name 課金通貨名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 説明文を取得
	 *
	 * @return string 説明文
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文を設定
	 *
	 * @param string $description 説明文
	 * @return self
	 */
	public function withDescription($description): self {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * 支払い優先度を取得
	 *
	 * @return string 支払い優先度
	 */
	public function getPriority() {
		return $this->priority;
	}

	/**
	 * 支払い優先度を設定
	 *
	 * @param string $priority 支払い優先度
	 */
	public function setPriority($priority) {
		$this->priority = $priority;
	}

	/**
	 * 支払い優先度を設定
	 *
	 * @param string $priority 支払い優先度
	 * @return self
	 */
	public function withPriority($priority): self {
		$this->setPriority($priority);
		return $this;
	}

	/**
	 * 無償課金通貨を異なるスロットで共有するかを取得
	 *
	 * @return bool 無償課金通貨を異なるスロットで共有するか
	 */
	public function getShareFree() {
		return $this->shareFree;
	}

	/**
	 * 無償課金通貨を異なるスロットで共有するかを設定
	 *
	 * @param bool $shareFree 無償課金通貨を異なるスロットで共有するか
	 */
	public function setShareFree($shareFree) {
		$this->shareFree = $shareFree;
	}

	/**
	 * 無償課金通貨を異なるスロットで共有するかを設定
	 *
	 * @param bool $shareFree 無償課金通貨を異なるスロットで共有するか
	 * @return self
	 */
	public function withShareFree($shareFree): self {
		$this->setShareFree($shareFree);
		return $this;
	}

	/**
	 * 通貨を取得
	 *
	 * @return string 通貨
	 */
	public function getCurrency() {
		return $this->currency;
	}

	/**
	 * 通貨を設定
	 *
	 * @param string $currency 通貨
	 */
	public function setCurrency($currency) {
		$this->currency = $currency;
	}

	/**
	 * 通貨を設定
	 *
	 * @param string $currency 通貨
	 * @return self
	 */
	public function withCurrency($currency): self {
		$this->setCurrency($currency);
		return $this;
	}

	/**
	 * ストアプラットフォームのレシートの検証機能を利用するかを取得
	 *
	 * @return bool ストアプラットフォームのレシートの検証機能を利用するか
	 */
	public function getUseVerifyReceipt() {
		return $this->useVerifyReceipt;
	}

	/**
	 * ストアプラットフォームのレシートの検証機能を利用するかを設定
	 *
	 * @param bool $useVerifyReceipt ストアプラットフォームのレシートの検証機能を利用するか
	 */
	public function setUseVerifyReceipt($useVerifyReceipt) {
		$this->useVerifyReceipt = $useVerifyReceipt;
	}

	/**
	 * ストアプラットフォームのレシートの検証機能を利用するかを設定
	 *
	 * @param bool $useVerifyReceipt ストアプラットフォームのレシートの検証機能を利用するか
	 * @return self
	 */
	public function withUseVerifyReceipt($useVerifyReceipt): self {
		$this->setUseVerifyReceipt($useVerifyReceipt);
		return $this;
	}

	/**
	 * Apple のアプリケーションバンドルIDを取得
	 *
	 * @return string Apple のアプリケーションバンドルID
	 */
	public function getAppleKey() {
		return $this->appleKey;
	}

	/**
	 * Apple のアプリケーションバンドルIDを設定
	 *
	 * @param string $appleKey Apple のアプリケーションバンドルID
	 */
	public function setAppleKey($appleKey) {
		$this->appleKey = $appleKey;
	}

	/**
	 * Apple のアプリケーションバンドルIDを設定
	 *
	 * @param string $appleKey Apple のアプリケーションバンドルID
	 * @return self
	 */
	public function withAppleKey($appleKey): self {
		$this->setAppleKey($appleKey);
		return $this;
	}

	/**
	 * Google のレシート検証用公開鍵を取得
	 *
	 * @return string Google のレシート検証用公開鍵
	 */
	public function getGoogleKey() {
		return $this->googleKey;
	}

	/**
	 * Google のレシート検証用公開鍵を設定
	 *
	 * @param string $googleKey Google のレシート検証用公開鍵
	 */
	public function setGoogleKey($googleKey) {
		$this->googleKey = $googleKey;
	}

	/**
	 * Google のレシート検証用公開鍵を設定
	 *
	 * @param string $googleKey Google のレシート検証用公開鍵
	 * @return self
	 */
	public function withGoogleKey($googleKey): self {
		$this->setGoogleKey($googleKey);
		return $this;
	}

	/**
	 * 未使用残高を取得
	 *
	 * @return double 未使用残高
	 */
	public function getBalance() {
		return $this->balance;
	}

	/**
	 * 未使用残高を設定
	 *
	 * @param double $balance 未使用残高
	 */
	public function setBalance($balance) {
		$this->balance = $balance;
	}

	/**
	 * 未使用残高を設定
	 *
	 * @param double $balance 未使用残高
	 * @return self
	 */
	public function withBalance($balance): self {
		$this->setBalance($balance);
		return $this;
	}

	/**
	 * ウォレット新規作成時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレット新規作成時 に実行されるGS2-Script
	 */
	public function getCreateWalletTriggerScript() {
		return $this->createWalletTriggerScript;
	}

	/**
	 * ウォレット新規作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletTriggerScript ウォレット新規作成時 に実行されるGS2-Script
	 */
	public function setCreateWalletTriggerScript($createWalletTriggerScript) {
		$this->createWalletTriggerScript = $createWalletTriggerScript;
	}

	/**
	 * ウォレット新規作成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletTriggerScript ウォレット新規作成時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateWalletTriggerScript($createWalletTriggerScript): self {
		$this->setCreateWalletTriggerScript($createWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレット新規作成完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレット新規作成完了時 に実行されるGS2-Script
	 */
	public function getCreateWalletDoneTriggerScript() {
		return $this->createWalletDoneTriggerScript;
	}

	/**
	 * ウォレット新規作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletDoneTriggerScript ウォレット新規作成完了時 に実行されるGS2-Script
	 */
	public function setCreateWalletDoneTriggerScript($createWalletDoneTriggerScript) {
		$this->createWalletDoneTriggerScript = $createWalletDoneTriggerScript;
	}

	/**
	 * ウォレット新規作成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletDoneTriggerScript ウォレット新規作成完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withCreateWalletDoneTriggerScript($createWalletDoneTriggerScript): self {
		$this->setCreateWalletDoneTriggerScript($createWalletDoneTriggerScript);
		return $this;
	}

	/**
	 * ウォレット残高加算時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレット残高加算時 に実行されるGS2-Script
	 */
	public function getChargeWalletTriggerScript() {
		return $this->chargeWalletTriggerScript;
	}

	/**
	 * ウォレット残高加算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $chargeWalletTriggerScript ウォレット残高加算時 に実行されるGS2-Script
	 */
	public function setChargeWalletTriggerScript($chargeWalletTriggerScript) {
		$this->chargeWalletTriggerScript = $chargeWalletTriggerScript;
	}

	/**
	 * ウォレット残高加算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $chargeWalletTriggerScript ウォレット残高加算時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChargeWalletTriggerScript($chargeWalletTriggerScript): self {
		$this->setChargeWalletTriggerScript($chargeWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレット残高加算完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレット残高加算完了時 に実行されるGS2-Script
	 */
	public function getChargeWalletDoneTriggerScript() {
		return $this->chargeWalletDoneTriggerScript;
	}

	/**
	 * ウォレット残高加算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $chargeWalletDoneTriggerScript ウォレット残高加算完了時 に実行されるGS2-Script
	 */
	public function setChargeWalletDoneTriggerScript($chargeWalletDoneTriggerScript) {
		$this->chargeWalletDoneTriggerScript = $chargeWalletDoneTriggerScript;
	}

	/**
	 * ウォレット残高加算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $chargeWalletDoneTriggerScript ウォレット残高加算完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withChargeWalletDoneTriggerScript($chargeWalletDoneTriggerScript): self {
		$this->setChargeWalletDoneTriggerScript($chargeWalletDoneTriggerScript);
		return $this;
	}

	/**
	 * ウォレット残高消費時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレット残高消費時 に実行されるGS2-Script
	 */
	public function getConsumeWalletTriggerScript() {
		return $this->consumeWalletTriggerScript;
	}

	/**
	 * ウォレット残高消費時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeWalletTriggerScript ウォレット残高消費時 に実行されるGS2-Script
	 */
	public function setConsumeWalletTriggerScript($consumeWalletTriggerScript) {
		$this->consumeWalletTriggerScript = $consumeWalletTriggerScript;
	}

	/**
	 * ウォレット残高消費時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeWalletTriggerScript ウォレット残高消費時 に実行されるGS2-Script
	 * @return self
	 */
	public function withConsumeWalletTriggerScript($consumeWalletTriggerScript): self {
		$this->setConsumeWalletTriggerScript($consumeWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレット残高消費完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレット残高消費完了時 に実行されるGS2-Script
	 */
	public function getConsumeWalletDoneTriggerScript() {
		return $this->consumeWalletDoneTriggerScript;
	}

	/**
	 * ウォレット残高消費完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeWalletDoneTriggerScript ウォレット残高消費完了時 に実行されるGS2-Script
	 */
	public function setConsumeWalletDoneTriggerScript($consumeWalletDoneTriggerScript) {
		$this->consumeWalletDoneTriggerScript = $consumeWalletDoneTriggerScript;
	}

	/**
	 * ウォレット残高消費完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $consumeWalletDoneTriggerScript ウォレット残高消費完了時 に実行されるGS2-Script
	 * @return self
	 */
	public function withConsumeWalletDoneTriggerScript($consumeWalletDoneTriggerScript): self {
		$this->setConsumeWalletDoneTriggerScript($consumeWalletDoneTriggerScript);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Money
	 */
    static function build(array $array)
    {
        $item = new Money();
        $item->setMoneyId(isset($array['moneyId']) ? $array['moneyId'] : null);
        $item->setOwnerId(isset($array['ownerId']) ? $array['ownerId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setDescription(isset($array['description']) ? $array['description'] : null);
        $item->setPriority(isset($array['priority']) ? $array['priority'] : null);
        $item->setShareFree(isset($array['shareFree']) ? $array['shareFree'] : null);
        $item->setCurrency(isset($array['currency']) ? $array['currency'] : null);
        $item->setUseVerifyReceipt(isset($array['useVerifyReceipt']) ? $array['useVerifyReceipt'] : null);
        $item->setAppleKey(isset($array['appleKey']) ? $array['appleKey'] : null);
        $item->setGoogleKey(isset($array['googleKey']) ? $array['googleKey'] : null);
        $item->setBalance(isset($array['balance']) ? $array['balance'] : null);
        $item->setCreateWalletTriggerScript(isset($array['createWalletTriggerScript']) ? $array['createWalletTriggerScript'] : null);
        $item->setCreateWalletDoneTriggerScript(isset($array['createWalletDoneTriggerScript']) ? $array['createWalletDoneTriggerScript'] : null);
        $item->setChargeWalletTriggerScript(isset($array['chargeWalletTriggerScript']) ? $array['chargeWalletTriggerScript'] : null);
        $item->setChargeWalletDoneTriggerScript(isset($array['chargeWalletDoneTriggerScript']) ? $array['chargeWalletDoneTriggerScript'] : null);
        $item->setConsumeWalletTriggerScript(isset($array['consumeWalletTriggerScript']) ? $array['consumeWalletTriggerScript'] : null);
        $item->setConsumeWalletDoneTriggerScript(isset($array['consumeWalletDoneTriggerScript']) ? $array['consumeWalletDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}