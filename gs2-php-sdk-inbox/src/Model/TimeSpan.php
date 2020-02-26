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

namespace Gs2\Inbox\Model;

use Gs2\Core\Model\IModel;

/**
 * 差分時間設定
 *
 * @author Game Server Services, Inc.
 *
 */
class TimeSpan implements IModel {
	/**
     * @var int 現在時刻からの日数
	 */
	protected $days;

	/**
	 * 現在時刻からの日数を取得
	 *
	 * @return int|null 現在時刻からの日数
	 */
	public function getDays(): ?int {
		return $this->days;
	}

	/**
	 * 現在時刻からの日数を設定
	 *
	 * @param int|null $days 現在時刻からの日数
	 */
	public function setDays(?int $days) {
		$this->days = $days;
	}

	/**
	 * 現在時刻からの日数を設定
	 *
	 * @param int|null $days 現在時刻からの日数
	 * @return TimeSpan $this
	 */
	public function withDays(?int $days): TimeSpan {
		$this->days = $days;
		return $this;
	}
	/**
     * @var int 現在時刻からの時間
	 */
	protected $hours;

	/**
	 * 現在時刻からの時間を取得
	 *
	 * @return int|null 現在時刻からの時間
	 */
	public function getHours(): ?int {
		return $this->hours;
	}

	/**
	 * 現在時刻からの時間を設定
	 *
	 * @param int|null $hours 現在時刻からの時間
	 */
	public function setHours(?int $hours) {
		$this->hours = $hours;
	}

	/**
	 * 現在時刻からの時間を設定
	 *
	 * @param int|null $hours 現在時刻からの時間
	 * @return TimeSpan $this
	 */
	public function withHours(?int $hours): TimeSpan {
		$this->hours = $hours;
		return $this;
	}
	/**
     * @var int 現在時刻からの分
	 */
	protected $minutes;

	/**
	 * 現在時刻からの分を取得
	 *
	 * @return int|null 現在時刻からの分
	 */
	public function getMinutes(): ?int {
		return $this->minutes;
	}

	/**
	 * 現在時刻からの分を設定
	 *
	 * @param int|null $minutes 現在時刻からの分
	 */
	public function setMinutes(?int $minutes) {
		$this->minutes = $minutes;
	}

	/**
	 * 現在時刻からの分を設定
	 *
	 * @param int|null $minutes 現在時刻からの分
	 * @return TimeSpan $this
	 */
	public function withMinutes(?int $minutes): TimeSpan {
		$this->minutes = $minutes;
		return $this;
	}

    public function toJson(): array {
        return array(
            "days" => $this->days,
            "hours" => $this->hours,
            "minutes" => $this->minutes,
        );
    }

    public static function fromJson(array $data): TimeSpan {
        $model = new TimeSpan();
        $model->setDays(isset($data["days"]) ? $data["days"] : null);
        $model->setHours(isset($data["hours"]) ? $data["hours"] : null);
        $model->setMinutes(isset($data["minutes"]) ? $data["minutes"] : null);
        return $model;
    }
}