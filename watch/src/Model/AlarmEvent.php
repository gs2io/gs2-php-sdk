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

namespace Gs2\Watch\Model;

/**
 * アラームイベント
 *
 * @author Game Server Services, Inc.
 *
 */
class AlarmEvent {

	/** @var string イベントID */
	private $eventId;

	/** @var string アラームID */
	private $alarmId;

	/** @var string イベントの種類 */
	private $type;

	/** @var int 発生日時(エポック秒) */
	private $eventAt;

	/**
	 * イベントIDを取得
	 *
	 * @return string イベントID
	 */
	public function getEventId() {
		return $this->eventId;
	}

	/**
	 * イベントIDを設定
	 *
	 * @param string $eventId イベントID
	 */
	public function setEventId($eventId) {
		$this->eventId = $eventId;
	}

	/**
	 * イベントIDを設定
	 *
	 * @param string $eventId イベントID
	 * @return self
	 */
	public function withEventId($eventId): self {
		$this->setEventId($eventId);
		return $this;
	}

	/**
	 * アラームIDを取得
	 *
	 * @return string アラームID
	 */
	public function getAlarmId() {
		return $this->alarmId;
	}

	/**
	 * アラームIDを設定
	 *
	 * @param string $alarmId アラームID
	 */
	public function setAlarmId($alarmId) {
		$this->alarmId = $alarmId;
	}

	/**
	 * アラームIDを設定
	 *
	 * @param string $alarmId アラームID
	 * @return self
	 */
	public function withAlarmId($alarmId): self {
		$this->setAlarmId($alarmId);
		return $this;
	}

	/**
	 * イベントの種類を取得
	 *
	 * @return string イベントの種類
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string $type イベントの種類
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * イベントの種類を設定
	 *
	 * @param string $type イベントの種類
	 * @return self
	 */
	public function withType($type): self {
		$this->setType($type);
		return $this;
	}

	/**
	 * 発生日時(エポック秒)を取得
	 *
	 * @return int 発生日時(エポック秒)
	 */
	public function getEventAt() {
		return $this->eventAt;
	}

	/**
	 * 発生日時(エポック秒)を設定
	 *
	 * @param int $eventAt 発生日時(エポック秒)
	 */
	public function setEventAt($eventAt) {
		$this->eventAt = $eventAt;
	}

	/**
	 * 発生日時(エポック秒)を設定
	 *
	 * @param int $eventAt 発生日時(エポック秒)
	 * @return self
	 */
	public function withEventAt($eventAt): self {
		$this->setEventAt($eventAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return AlarmEvent
	 */
    static function build(array $array)
    {
        $item = new AlarmEvent();
        $item->setEventId(isset($array['eventId']) ? $array['eventId'] : null);
        $item->setAlarmId(isset($array['alarmId']) ? $array['alarmId'] : null);
        $item->setType(isset($array['type']) ? $array['type'] : null);
        $item->setEventAt(isset($array['eventAt']) ? $array['eventAt'] : null);
        return $item;
    }

}