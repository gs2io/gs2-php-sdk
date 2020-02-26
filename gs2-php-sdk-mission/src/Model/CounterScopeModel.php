<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Mission\Model;

use Gs2\Core\Model\IModel;

/**
 * カウンターのリセットタイミング
 *
 * @author Game Server Services, Inc.
 *
 */
class CounterScopeModel implements IModel {
	/**
     * @var string リセットタイミング
	 */
	protected $resetType;

	/**
	 * リセットタイミングを取得
	 *
	 * @return string|null リセットタイミング
	 */
	public function getResetType(): ?string {
		return $this->resetType;
	}

	/**
	 * リセットタイミングを設定
	 *
	 * @param string|null $resetType リセットタイミング
	 */
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	/**
	 * リセットタイミングを設定
	 *
	 * @param string|null $resetType リセットタイミング
	 * @return CounterScopeModel $this
	 */
	public function withResetType(?string $resetType): CounterScopeModel {
		$this->resetType = $resetType;
		return $this;
	}
	/**
     * @var int リセットをする日にち
	 */
	protected $resetDayOfMonth;

	/**
	 * リセットをする日にちを取得
	 *
	 * @return int|null リセットをする日にち
	 */
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}

	/**
	 * リセットをする日にちを設定
	 *
	 * @param int|null $resetDayOfMonth リセットをする日にち
	 */
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	/**
	 * リセットをする日にちを設定
	 *
	 * @param int|null $resetDayOfMonth リセットをする日にち
	 * @return CounterScopeModel $this
	 */
	public function withResetDayOfMonth(?int $resetDayOfMonth): CounterScopeModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
	/**
     * @var string リセットする曜日
	 */
	protected $resetDayOfWeek;

	/**
	 * リセットする曜日を取得
	 *
	 * @return string|null リセットする曜日
	 */
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}

	/**
	 * リセットする曜日を設定
	 *
	 * @param string|null $resetDayOfWeek リセットする曜日
	 */
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	/**
	 * リセットする曜日を設定
	 *
	 * @param string|null $resetDayOfWeek リセットする曜日
	 * @return CounterScopeModel $this
	 */
	public function withResetDayOfWeek(?string $resetDayOfWeek): CounterScopeModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
	/**
     * @var int リセット時刻
	 */
	protected $resetHour;

	/**
	 * リセット時刻を取得
	 *
	 * @return int|null リセット時刻
	 */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}

	/**
	 * リセット時刻を設定
	 *
	 * @param int|null $resetHour リセット時刻
	 */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}

	/**
	 * リセット時刻を設定
	 *
	 * @param int|null $resetHour リセット時刻
	 * @return CounterScopeModel $this
	 */
	public function withResetHour(?int $resetHour): CounterScopeModel {
		$this->resetHour = $resetHour;
		return $this;
	}

    public function toJson(): array {
        return array(
            "resetType" => $this->resetType,
            "resetDayOfMonth" => $this->resetDayOfMonth,
            "resetDayOfWeek" => $this->resetDayOfWeek,
            "resetHour" => $this->resetHour,
        );
    }

    public static function fromJson(array $data): CounterScopeModel {
        $model = new CounterScopeModel();
        $model->setResetType(isset($data["resetType"]) ? $data["resetType"] : null);
        $model->setResetDayOfMonth(isset($data["resetDayOfMonth"]) ? $data["resetDayOfMonth"] : null);
        $model->setResetDayOfWeek(isset($data["resetDayOfWeek"]) ? $data["resetDayOfWeek"] : null);
        $model->setResetHour(isset($data["resetHour"]) ? $data["resetHour"] : null);
        return $model;
    }
}