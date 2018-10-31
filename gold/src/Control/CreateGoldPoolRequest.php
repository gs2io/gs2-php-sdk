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

namespace Gs2\Gold\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateGoldPoolRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateGoldPool";

	/** @var string ゴールドプール名 */
	private $name;

	/** @var string 説明文 */
	private $description;

	/** @var string サービスクラス */
	private $serviceClass;

	/** @var string ウォレットの生成時 に実行されるGS2-Script */
	private $createWalletTriggerScript;

	/** @var string ウォレットの生成完了時 に実行されるGS2-Script */
	private $createWalletDoneTriggerScript;

	/** @var string ウォレットへの加算時 に実行されるGS2-Script */
	private $depositIntoWalletTriggerScript;

	/** @var string ウォレットへの加算完了時 に実行されるGS2-Script */
	private $depositIntoWalletDoneTriggerScript;

	/** @var string ウォレットからの減算時 に実行されるGS2-Script */
	private $withdrawFromWalletTriggerScript;

	/** @var string ウォレットからの減算完了時 に実行されるGS2-Script */
	private $withdrawFromWalletDoneTriggerScript;


	/**
	 * ゴールドプール名を取得
	 *
	 * @return string ゴールドプール名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ゴールドプール名を設定
	 *
	 * @param string $name ゴールドプール名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ゴールドプール名を設定
	 *
	 * @param string $name ゴールドプール名
	 * @return CreateGoldPoolRequest
	 */
	public function withName($name): CreateGoldPoolRequest {
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
	 * @return CreateGoldPoolRequest
	 */
	public function withDescription($description): CreateGoldPoolRequest {
		$this->setDescription($description);
		return $this;
	}

	/**
	 * サービスクラスを取得
	 *
	 * @return string サービスクラス
	 */
	public function getServiceClass() {
		return $this->serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 */
	public function setServiceClass($serviceClass) {
		$this->serviceClass = $serviceClass;
	}

	/**
	 * サービスクラスを設定
	 *
	 * @param string $serviceClass サービスクラス
	 * @return CreateGoldPoolRequest
	 */
	public function withServiceClass($serviceClass): CreateGoldPoolRequest {
		$this->setServiceClass($serviceClass);
		return $this;
	}

	/**
	 * ウォレットの生成時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットの生成時 に実行されるGS2-Script
	 */
	public function getCreateWalletTriggerScript() {
		return $this->createWalletTriggerScript;
	}

	/**
	 * ウォレットの生成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletTriggerScript ウォレットの生成時 に実行されるGS2-Script
	 */
	public function setCreateWalletTriggerScript($createWalletTriggerScript) {
		$this->createWalletTriggerScript = $createWalletTriggerScript;
	}

	/**
	 * ウォレットの生成時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletTriggerScript ウォレットの生成時 に実行されるGS2-Script
	 * @return CreateGoldPoolRequest
	 */
	public function withCreateWalletTriggerScript($createWalletTriggerScript): CreateGoldPoolRequest {
		$this->setCreateWalletTriggerScript($createWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレットの生成完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットの生成完了時 に実行されるGS2-Script
	 */
	public function getCreateWalletDoneTriggerScript() {
		return $this->createWalletDoneTriggerScript;
	}

	/**
	 * ウォレットの生成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletDoneTriggerScript ウォレットの生成完了時 に実行されるGS2-Script
	 */
	public function setCreateWalletDoneTriggerScript($createWalletDoneTriggerScript) {
		$this->createWalletDoneTriggerScript = $createWalletDoneTriggerScript;
	}

	/**
	 * ウォレットの生成完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $createWalletDoneTriggerScript ウォレットの生成完了時 に実行されるGS2-Script
	 * @return CreateGoldPoolRequest
	 */
	public function withCreateWalletDoneTriggerScript($createWalletDoneTriggerScript): CreateGoldPoolRequest {
		$this->setCreateWalletDoneTriggerScript($createWalletDoneTriggerScript);
		return $this;
	}

	/**
	 * ウォレットへの加算時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットへの加算時 に実行されるGS2-Script
	 */
	public function getDepositIntoWalletTriggerScript() {
		return $this->depositIntoWalletTriggerScript;
	}

	/**
	 * ウォレットへの加算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletTriggerScript ウォレットへの加算時 に実行されるGS2-Script
	 */
	public function setDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript) {
		$this->depositIntoWalletTriggerScript = $depositIntoWalletTriggerScript;
	}

	/**
	 * ウォレットへの加算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletTriggerScript ウォレットへの加算時 に実行されるGS2-Script
	 * @return CreateGoldPoolRequest
	 */
	public function withDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript): CreateGoldPoolRequest {
		$this->setDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレットへの加算完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットへの加算完了時 に実行されるGS2-Script
	 */
	public function getDepositIntoWalletDoneTriggerScript() {
		return $this->depositIntoWalletDoneTriggerScript;
	}

	/**
	 * ウォレットへの加算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletDoneTriggerScript ウォレットへの加算完了時 に実行されるGS2-Script
	 */
	public function setDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript) {
		$this->depositIntoWalletDoneTriggerScript = $depositIntoWalletDoneTriggerScript;
	}

	/**
	 * ウォレットへの加算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $depositIntoWalletDoneTriggerScript ウォレットへの加算完了時 に実行されるGS2-Script
	 * @return CreateGoldPoolRequest
	 */
	public function withDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript): CreateGoldPoolRequest {
		$this->setDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript);
		return $this;
	}

	/**
	 * ウォレットからの減算時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットからの減算時 に実行されるGS2-Script
	 */
	public function getWithdrawFromWalletTriggerScript() {
		return $this->withdrawFromWalletTriggerScript;
	}

	/**
	 * ウォレットからの減算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletTriggerScript ウォレットからの減算時 に実行されるGS2-Script
	 */
	public function setWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript) {
		$this->withdrawFromWalletTriggerScript = $withdrawFromWalletTriggerScript;
	}

	/**
	 * ウォレットからの減算時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletTriggerScript ウォレットからの減算時 に実行されるGS2-Script
	 * @return CreateGoldPoolRequest
	 */
	public function withWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript): CreateGoldPoolRequest {
		$this->setWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript);
		return $this;
	}

	/**
	 * ウォレットからの減算完了時 に実行されるGS2-Scriptを取得
	 *
	 * @return string ウォレットからの減算完了時 に実行されるGS2-Script
	 */
	public function getWithdrawFromWalletDoneTriggerScript() {
		return $this->withdrawFromWalletDoneTriggerScript;
	}

	/**
	 * ウォレットからの減算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletDoneTriggerScript ウォレットからの減算完了時 に実行されるGS2-Script
	 */
	public function setWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript) {
		$this->withdrawFromWalletDoneTriggerScript = $withdrawFromWalletDoneTriggerScript;
	}

	/**
	 * ウォレットからの減算完了時 に実行されるGS2-Scriptを設定
	 *
	 * @param string $withdrawFromWalletDoneTriggerScript ウォレットからの減算完了時 に実行されるGS2-Script
	 * @return CreateGoldPoolRequest
	 */
	public function withWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript): CreateGoldPoolRequest {
		$this->setWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript);
		return $this;
	}

}