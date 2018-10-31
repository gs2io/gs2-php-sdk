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

namespace Gs2\Gold\Model;

/**
 * ゴールド
 *
 * @author Game Server Services, Inc.
 *
 */
class GoldMaster {

	/** @var string ゴールドGRN */
	private $goldId;

	/** @var string ゴールド名 */
	private $name;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * ゴールドGRNを取得
	 *
	 * @return string ゴールドGRN
	 */
	public function getGoldId() {
		return $this->goldId;
	}

	/**
	 * ゴールドGRNを設定
	 *
	 * @param string $goldId ゴールドGRN
	 */
	public function setGoldId($goldId) {
		$this->goldId = $goldId;
	}

	/**
	 * ゴールドGRNを設定
	 *
	 * @param string $goldId ゴールドGRN
	 * @return self
	 */
	public function withGoldId($goldId): self {
		$this->setGoldId($goldId);
		return $this;
	}

	/**
	 * ゴールド名を取得
	 *
	 * @return string ゴールド名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * ゴールド名を設定
	 *
	 * @param string $name ゴールド名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * ゴールド名を設定
	 *
	 * @param string $name ゴールド名
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
	 * @return self
	 */
	public function withBalanceMax($balanceMax): self {
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
	 * @return self
	 */
	public function withResetType($resetType): self {
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
	 * @return self
	 */
	public function withResetDayOfMonth($resetDayOfMonth): self {
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
	 * @return self
	 */
	public function withResetDayOfWeek($resetDayOfWeek): self {
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
	 * @return self
	 */
	public function withResetHour($resetHour): self {
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
	 * @return self
	 */
	public function withLatestGainMax($latestGainMax): self {
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
	 * @return self
	 */
	public function withCreateWalletTriggerScript($createWalletTriggerScript): self {
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
	 * @return self
	 */
	public function withCreateWalletDoneTriggerScript($createWalletDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withDepositIntoWalletTriggerScript($depositIntoWalletTriggerScript): self {
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
	 * @return self
	 */
	public function withDepositIntoWalletDoneTriggerScript($depositIntoWalletDoneTriggerScript): self {
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
	 * @return self
	 */
	public function withWithdrawFromWalletTriggerScript($withdrawFromWalletTriggerScript): self {
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
	 * @return self
	 */
	public function withWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript): self {
		$this->setWithdrawFromWalletDoneTriggerScript($withdrawFromWalletDoneTriggerScript);
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
	 * @return GoldMaster
	 */
    static function build(array $array)
    {
        $item = new GoldMaster();
        $item->setGoldId(isset($array['goldId']) ? $array['goldId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setBalanceMax(isset($array['balanceMax']) ? $array['balanceMax'] : null);
        $item->setResetType(isset($array['resetType']) ? $array['resetType'] : null);
        $item->setResetDayOfMonth(isset($array['resetDayOfMonth']) ? $array['resetDayOfMonth'] : null);
        $item->setResetDayOfWeek(isset($array['resetDayOfWeek']) ? $array['resetDayOfWeek'] : null);
        $item->setResetHour(isset($array['resetHour']) ? $array['resetHour'] : null);
        $item->setLatestGainMax(isset($array['latestGainMax']) ? $array['latestGainMax'] : null);
        $item->setCreateWalletTriggerScript(isset($array['createWalletTriggerScript']) ? $array['createWalletTriggerScript'] : null);
        $item->setCreateWalletDoneTriggerScript(isset($array['createWalletDoneTriggerScript']) ? $array['createWalletDoneTriggerScript'] : null);
        $item->setDepositIntoWalletTriggerScript(isset($array['depositIntoWalletTriggerScript']) ? $array['depositIntoWalletTriggerScript'] : null);
        $item->setDepositIntoWalletDoneTriggerScript(isset($array['depositIntoWalletDoneTriggerScript']) ? $array['depositIntoWalletDoneTriggerScript'] : null);
        $item->setWithdrawFromWalletTriggerScript(isset($array['withdrawFromWalletTriggerScript']) ? $array['withdrawFromWalletTriggerScript'] : null);
        $item->setWithdrawFromWalletDoneTriggerScript(isset($array['withdrawFromWalletDoneTriggerScript']) ? $array['withdrawFromWalletDoneTriggerScript'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}