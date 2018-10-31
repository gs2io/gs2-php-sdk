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

namespace Gs2\Limit\Model;

/**
 * カウンターマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class CounterMaster {

	/** @var string カウンターマスターGRN */
	private $counterMasterId;

	/** @var string カウンターマスター名 */
	private $name;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * カウンターマスターGRNを取得
	 *
	 * @return string カウンターマスターGRN
	 */
	public function getCounterMasterId() {
		return $this->counterMasterId;
	}

	/**
	 * カウンターマスターGRNを設定
	 *
	 * @param string $counterMasterId カウンターマスターGRN
	 */
	public function setCounterMasterId($counterMasterId) {
		$this->counterMasterId = $counterMasterId;
	}

	/**
	 * カウンターマスターGRNを設定
	 *
	 * @param string $counterMasterId カウンターマスターGRN
	 * @return self
	 */
	public function withCounterMasterId($counterMasterId): self {
		$this->setCounterMasterId($counterMasterId);
		return $this;
	}

	/**
	 * カウンターマスター名を取得
	 *
	 * @return string カウンターマスター名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * カウンターマスター名を設定
	 *
	 * @param string $name カウンターマスター名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * カウンターマスター名を設定
	 *
	 * @param string $name カウンターマスター名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
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
	 * @return self
	 */
	public function withMax($max): self {
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
	 * @return CounterMaster
	 */
    static function build(array $array)
    {
        $item = new CounterMaster();
        $item->setCounterMasterId(isset($array['counterMasterId']) ? $array['counterMasterId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setMax(isset($array['max']) ? $array['max'] : null);
        $item->setResetType(isset($array['resetType']) ? $array['resetType'] : null);
        $item->setResetDayOfMonth(isset($array['resetDayOfMonth']) ? $array['resetDayOfMonth'] : null);
        $item->setResetDayOfWeek(isset($array['resetDayOfWeek']) ? $array['resetDayOfWeek'] : null);
        $item->setResetHour(isset($array['resetHour']) ? $array['resetHour'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}