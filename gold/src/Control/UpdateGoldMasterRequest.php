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
class UpdateGoldMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateGoldMaster";

	/** @var string ゴールドプールの名前 */
	private $goldPoolName;

	/** @var string ゴールドの名前 */
	private $goldName;

	/** @var string メタデータ */
	private $meta;

	/** @var long 各ウォレットの残高の最大値 */
	private $balanceMax;

	/** @var string 取得量の期間制限のタイプ */
	private $resetType;

	/** @var int 期間内の取得量をリセットする日にち */
	private $resetDayOfMonth;

	/** @var string 期間内の取得量をリセットする曜日 */
	private $resetDayOfWeek;

	/** @var int 期間内の取得量をリセットする時 */
	private $resetHour;

	/** @var long 期間内の最大取得量 */
	private $latestGainMax;

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
	 * ゴールドプールの名前を取得
	 *
	 * @return string ゴールドプールの名前
	 */
	public function getGoldPoolName() {
		return $this->goldPoolName;
	}

	/**
	 * ゴールドプールの名前を設定
	 *
	 * @param string $goldPoolName ゴールドプールの名前
	 */
	public function setGoldPoolName($goldPoolName) {
		$this->goldPoolName = $goldPoolName;
	}

	/**
	 * ゴールドプールの名前を設定
	 *
	 * @param string $goldPoolName ゴールドプールの名前
	 * @return UpdateGoldMasterRequest
	 */
	public function withGoldPoolName($goldPoolName): UpdateGoldMasterRequest {
		$this->setGoldPoolName($goldPoolName);
		return $this;
	}

	/**
	 * ゴールドの名前を取得
	 *
	 * @return string ゴールドの名前
	 */
	public function getGoldName() {
		return $this->goldName;
	}

	/**
	 * ゴールドの名前を設定
	 *
	 * @param string $goldName ゴールドの名前
	 */
	public function setGoldName($goldName) {
		$this->goldName = $goldName;
	}

	/**
	 * ゴールドの名前を設定
	 *
	 * @param string $goldName ゴールドの名前
	 * @return UpdateGoldMasterRequest
	 */
	public function withGoldName($goldName): UpdateGoldMasterRequest {
		$this->setGoldName($goldName);
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
	 * @return UpdateGoldMasterRequest
	 */
	public function withMeta($meta): UpdateGoldMasterRequest {
		$this->setMeta($meta);
		return $this;
	}

	/**
	 * 各ウォレットの残高の最大値を取得
	 *
	 * @return long 各ウォレットの残高の最大値
	 */
	public function getBalanceMax() {
		return $this->balanceMax;
	}

	/**
	 * 各ウォレットの残高の最大値を設定
	 *
	 * @param long $balanceMax 各ウォレットの残高の最大値
	 */
	public function setBalanceMax($balanceMax) {
		$this->balanceMax = $balanceMax;
	}

	/**
	 * 各ウォレットの残高の最大値を設定
	 *
	 * @param long $balanceMax 各ウォレットの残高の最大値
	 * @return UpdateGoldMasterRequest
	 */
	public function withBalanceMax($balanceMax): UpdateGoldMasterRequest {
		$this->setBalanceMax($balanceMax);
		return $this;
	}

	/**
	 * 取得量の期間制限のタイプを取得
	 *
	 * @return string 取得量の期間制限のタイプ
	 */
	public function getResetType() {
		return $this->resetType;
	}

	/**
	 * 取得量の期間制限のタイプを設定
	 *
	 * @param string $resetType 取得量の期間制限のタイプ
	 */
	public function setResetType($resetType) {
		$this->resetType = $resetType;
	}

	/**
	 * 取得量の期間制限のタイプを設定
	 *
	 * @param string $resetType 取得量の期間制限のタイプ
	 * @return UpdateGoldMasterRequest
	 */
	public function withResetType($resetType): UpdateGoldMasterRequest {
		$this->setResetType($resetType);
		return $this;
	}

	/**
	 * 期間内の取得量をリセットする日にちを取得
	 *
	 * @return int 期間内の取得量をリセットする日にち
	 */
	public function getResetDayOfMonth() {
		return $this->resetDayOfMonth;
	}

	/**
	 * 期間内の取得量をリセットする日にちを設定
	 *
	 * @param int $resetDayOfMonth 期間内の取得量をリセットする日にち
	 */
	public function setResetDayOfMonth($resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	/**
	 * 期間内の取得量をリセットする日にちを設定
	 *
	 * @param int $resetDayOfMonth 期間内の取得量をリセットする日にち
	 * @return UpdateGoldMasterRequest
	 */
	public function withResetDayOfMonth($resetDayOfMonth): UpdateGoldMasterRequest {
		$this->setResetDayOfMonth($resetDayOfMonth);
		return $this;
	}

	/**
	 * 期間内の取得量をリセットする曜日を取得
	 *
	 * @return string 期間内の取得量をリセットする曜日
	 */
	public function getResetDayOfWeek() {
		return $this->resetDayOfWeek;
	}

	/**
	 * 期間内の取得量をリセットする曜日を設定
	 *
	 * @param string $resetDayOfWeek 期間内の取得量をリセットする曜日
	 */
	public function setResetDayOfWeek($resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	/**
	 * 期間内の取得量をリセットする曜日を設定
	 *
	 * @param string $resetDayOfWeek 期間内の取得量をリセットする曜日
	 * @return UpdateGoldMasterRequest
	 */
	public function withResetDayOfWeek($resetDayOfWeek): UpdateGoldMasterRequest {
		$this->setResetDayOfWeek($resetDayOfWeek);
		return $this;
	}

	/**
	 * 期間内の取得量をリセットする時を取得
	 *
	 * @return int 期間内の取得量をリセットする時
	 */
	public function getResetHour() {
		return $this->resetHour;
	}

	/**
	 * 期間内の取得量をリセットする時を設定
	 *
	 * @param int $resetHour 期間内の取得量をリセットする時
	 */
	public function setResetHour($resetHour) {
		$this->resetHour = $resetHour;
	}

	/**
	 * 期間内の取得量をリセットする時を設定
	 *
	 * @param int $resetHour 期間内の取得量をリセットする時
	 * @return UpdateGoldMasterRequest
	 */
	public function withResetHour($resetHour): UpdateGoldMasterRequest {
		$this->setResetHour($resetHour);
		return $this;
	}

	/**
	 * 期間内の最大取得量を取得
	 *
	 * @return long 期間内の最大取得量
	 */
	public function getLatestGainMax() {
		return $this->latestGainMax;
	}

	/**
	 * 期間内の最大取得量を設定
	 *
	 * @param long $latestGainMax 期間内の最大取得量
	 */
	public function setLatestGainMax($latestGainMax) {
		$this->latestGainMax = $latestGainMax;
	}

	/**
	 * 期間内の最大取得量を設定
	 *
	 * @param long $latestGainMax 期間内の最大取得量
	 * @return UpdateGoldMasterRequest
	 */
	public function withLatestGainMax($latestGainMax): UpdateGoldMasterRequest {
		$this->setLatestGainMax($latestGainMax);
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
	 * @return UpdateGoldMasterRequest
	 */
	public function withCreateWalletTriggerScript($createWalletTriggerScript): UpdateGoldMasterRequest {
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
	 * @return UpdateGoldMasterRequest
	 */
	public function withCreateWalletDoneTriggerScript($createWalletDoneTriggerScript): UpdateGoldMasterRequest {
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
	 * @return UpdateGoldMasterRequest
	 */
	public function withDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript): UpdateGoldMasterRequest {
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
	 * @return UpdateGoldMasterRequest
	 */
	public function withDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript): UpdateGoldMasterRequest {
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
	 * @return UpdateGoldMasterRequest
	 */
	public function withWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript): UpdateGoldMasterRequest {
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
	 * @return UpdateGoldMasterRequest
	 */
	public function withWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript): UpdateGoldMasterRequest {
		$this->setWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript);
		return $this;
	}

}