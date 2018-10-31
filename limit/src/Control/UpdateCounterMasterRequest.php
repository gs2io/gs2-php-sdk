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

namespace Gs2\Limit\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class UpdateCounterMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "UpdateCounterMaster";

	/** @var string 回数制限の名前を指定します。 */
	private $limitName;

	/** @var string カウンター名を指定します。 */
	private $counterName;

	/** @var int カウンターの最大値 */
	private $max;

	/** @var string リセット周期 */
	private $resetType;

	/** @var int 期間内の取得量をリセットする日にち */
	private $resetDayOfMonth;

	/** @var string 期間内の取得量をリセットする曜日 */
	private $resetDayOfWeek;

	/** @var int 期間内の取得量をリセットする時 */
	private $resetHour;


	/**
	 * 回数制限の名前を指定します。を取得
	 *
	 * @return string 回数制限の名前を指定します。
	 */
	public function getLimitName() {
		return $this->limitName;
	}

	/**
	 * 回数制限の名前を指定します。を設定
	 *
	 * @param string $limitName 回数制限の名前を指定します。
	 */
	public function setLimitName($limitName) {
		$this->limitName = $limitName;
	}

	/**
	 * 回数制限の名前を指定します。を設定
	 *
	 * @param string $limitName 回数制限の名前を指定します。
	 * @return UpdateCounterMasterRequest
	 */
	public function withLimitName($limitName): UpdateCounterMasterRequest {
		$this->setLimitName($limitName);
		return $this;
	}

	/**
	 * カウンター名を指定します。を取得
	 *
	 * @return string カウンター名を指定します。
	 */
	public function getCounterName() {
		return $this->counterName;
	}

	/**
	 * カウンター名を指定します。を設定
	 *
	 * @param string $counterName カウンター名を指定します。
	 */
	public function setCounterName($counterName) {
		$this->counterName = $counterName;
	}

	/**
	 * カウンター名を指定します。を設定
	 *
	 * @param string $counterName カウンター名を指定します。
	 * @return UpdateCounterMasterRequest
	 */
	public function withCounterName($counterName): UpdateCounterMasterRequest {
		$this->setCounterName($counterName);
		return $this;
	}

	/**
	 * カウンターの最大値を取得
	 *
	 * @return int カウンターの最大値
	 */
	public function getMax() {
		return $this->max;
	}

	/**
	 * カウンターの最大値を設定
	 *
	 * @param int $max カウンターの最大値
	 */
	public function setMax($max) {
		$this->max = $max;
	}

	/**
	 * カウンターの最大値を設定
	 *
	 * @param int $max カウンターの最大値
	 * @return UpdateCounterMasterRequest
	 */
	public function withMax($max): UpdateCounterMasterRequest {
		$this->setMax($max);
		return $this;
	}

	/**
	 * リセット周期を取得
	 *
	 * @return string リセット周期
	 */
	public function getResetType() {
		return $this->resetType;
	}

	/**
	 * リセット周期を設定
	 *
	 * @param string $resetType リセット周期
	 */
	public function setResetType($resetType) {
		$this->resetType = $resetType;
	}

	/**
	 * リセット周期を設定
	 *
	 * @param string $resetType リセット周期
	 * @return UpdateCounterMasterRequest
	 */
	public function withResetType($resetType): UpdateCounterMasterRequest {
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
	 * @return UpdateCounterMasterRequest
	 */
	public function withResetDayOfMonth($resetDayOfMonth): UpdateCounterMasterRequest {
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
	 * @return UpdateCounterMasterRequest
	 */
	public function withResetDayOfWeek($resetDayOfWeek): UpdateCounterMasterRequest {
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
	 * @return UpdateCounterMasterRequest
	 */
	public function withResetHour($resetHour): UpdateCounterMasterRequest {
		$this->setResetHour($resetHour);
		return $this;
	}

}