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
 * ウォレット設定
 *
 * @author Game Server Services, Inc.
 *
 */
class WalletSettings {

	/** @var string ゴールド名 */
	private $goldName;

	/** @var long 各ウォレットの残高の最大値 */
	private $balanceMax;

	/** @var string メタデータ */
	private $meta;

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

	/**
	 * ゴールド名を取得
	 *
	 * @return string ゴールド名
	 */
	public function getGoldName() {
		return $this->goldName;
	}

	/**
	 * ゴールド名を設定
	 *
	 * @param string $goldName ゴールド名
	 */
	public function setGoldName($goldName) {
		$this->goldName = $goldName;
	}

	/**
	 * ゴールド名を設定
	 *
	 * @param string $goldName ゴールド名
	 * @return self
	 */
	public function withGoldName($goldName): self {
		$this->setGoldName($goldName);
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
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return WalletSettings
	 */
    static function build(array $array)
    {
        $item = new WalletSettings();
        $item->setGoldName(isset($array['goldName']) ? $array['goldName'] : null);
        $item->setBalanceMax(isset($array['balanceMax']) ? $array['balanceMax'] : null);
        $item->setMeta(isset($array['meta']) ? $array['meta'] : null);
        $item->setResetType(isset($array['resetType']) ? $array['resetType'] : null);
        $item->setResetDayOfMonth(isset($array['resetDayOfMonth']) ? $array['resetDayOfMonth'] : null);
        $item->setResetDayOfWeek(isset($array['resetDayOfWeek']) ? $array['resetDayOfWeek'] : null);
        $item->setResetHour(isset($array['resetHour']) ? $array['resetHour'] : null);
        $item->setLatestGainMax(isset($array['latestGainMax']) ? $array['latestGainMax'] : null);
        return $item;
    }

}