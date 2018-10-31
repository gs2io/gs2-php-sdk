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
class UpdateMoneyRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateMoney";

	/** @var string 取得する課金通貨の名前 */
	private $moneyName;

	/** @var string 説明文(1024文字以内) */
	private $description;

	/** @var string 支払い優先度 */
	private $priority;

	/** @var bool ストアプラットフォームのレシートの検証機能を利用するか */
	private $useVerifyReceipt;

	/** @var string Apple のアプリケーションバンドルID */
	private $appleKey;

	/** @var string Google のレシート検証用公開鍵 */
	private $googleKey;

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


	/**
	 * 取得する課金通貨の名前を取得
	 *
	 * @return string 取得する課金通貨の名前
	 */
	public function getMoneyName() {
		return $this->moneyName;
	}

	/**
	 * 取得する課金通貨の名前を設定
	 *
	 * @param string $moneyName 取得する課金通貨の名前
	 */
	public function setMoneyName($moneyName) {
		$this->moneyName = $moneyName;
	}

	/**
	 * 取得する課金通貨の名前を設定
	 *
	 * @param string $moneyName 取得する課金通貨の名前
	 * @return UpdateMoneyRequest
	 */
	public function withMoneyName($moneyName): UpdateMoneyRequest {
		$this->setMoneyName($moneyName);
		return $this;
	}

	/**
	 * 説明文(1024文字以内)を取得
	 *
	 * @return string 説明文(1024文字以内)
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * 説明文(1024文字以内)を設定
	 *
	 * @param string $description 説明文(1024文字以内)
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * 説明文(1024文字以内)を設定
	 *
	 * @param string $description 説明文(1024文字以内)
	 * @return UpdateMoneyRequest
	 */
	public function withDescription($description): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withPriority($priority): UpdateMoneyRequest {
		$this->setPriority($priority);
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
	 * @return UpdateMoneyRequest
	 */
	public function withUseVerifyReceipt($useVerifyReceipt): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withAppleKey($appleKey): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withGoogleKey($googleKey): UpdateMoneyRequest {
		$this->setGoogleKey($googleKey);
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
	 * @return UpdateMoneyRequest
	 */
	public function withCreateWalletTriggerScript($createWalletTriggerScript): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withCreateWalletDoneTriggerScript($createWalletDoneTriggerScript): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withChargeWalletTriggerScript($chargeWalletTriggerScript): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withChargeWalletDoneTriggerScript($chargeWalletDoneTriggerScript): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withConsumeWalletTriggerScript($consumeWalletTriggerScript): UpdateMoneyRequest {
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
	 * @return UpdateMoneyRequest
	 */
	public function withConsumeWalletDoneTriggerScript($consumeWalletDoneTriggerScript): UpdateMoneyRequest {
		$this->setConsumeWalletDoneTriggerScript($consumeWalletDoneTriggerScript);
		return $this;
	}

}