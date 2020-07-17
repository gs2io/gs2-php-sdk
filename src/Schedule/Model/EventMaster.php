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

namespace Gs2\Schedule\Model;

use Gs2\Core\Model\IModel;

/**
 * イベントマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class EventMaster implements IModel {
	/**
     * @var string イベントマスター
	 */
	protected $eventId;

	/**
	 * イベントマスターを取得
	 *
	 * @return string|null イベントマスター
	 */
	public function getEventId(): ?string {
		return $this->eventId;
	}

	/**
	 * イベントマスターを設定
	 *
	 * @param string|null $eventId イベントマスター
	 */
	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}

	/**
	 * イベントマスターを設定
	 *
	 * @param string|null $eventId イベントマスター
	 * @return EventMaster $this
	 */
	public function withEventId(?string $eventId): EventMaster {
		$this->eventId = $eventId;
		return $this;
	}
	/**
     * @var string イベントの種類名
	 */
	protected $name;

	/**
	 * イベントの種類名を取得
	 *
	 * @return string|null イベントの種類名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * イベントの種類名を設定
	 *
	 * @param string|null $name イベントの種類名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * イベントの種類名を設定
	 *
	 * @param string|null $name イベントの種類名
	 * @return EventMaster $this
	 */
	public function withName(?string $name): EventMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string イベントマスターの説明
	 */
	protected $description;

	/**
	 * イベントマスターの説明を取得
	 *
	 * @return string|null イベントマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * イベントマスターの説明を設定
	 *
	 * @param string|null $description イベントマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * イベントマスターの説明を設定
	 *
	 * @param string|null $description イベントマスターの説明
	 * @return EventMaster $this
	 */
	public function withDescription(?string $description): EventMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string イベントの種類のメタデータ
	 */
	protected $metadata;

	/**
	 * イベントの種類のメタデータを取得
	 *
	 * @return string|null イベントの種類のメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * イベントの種類のメタデータを設定
	 *
	 * @param string|null $metadata イベントの種類のメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * イベントの種類のメタデータを設定
	 *
	 * @param string|null $metadata イベントの種類のメタデータ
	 * @return EventMaster $this
	 */
	public function withMetadata(?string $metadata): EventMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var string イベント期間の種類
	 */
	protected $scheduleType;

	/**
	 * イベント期間の種類を取得
	 *
	 * @return string|null イベント期間の種類
	 */
	public function getScheduleType(): ?string {
		return $this->scheduleType;
	}

	/**
	 * イベント期間の種類を設定
	 *
	 * @param string|null $scheduleType イベント期間の種類
	 */
	public function setScheduleType(?string $scheduleType) {
		$this->scheduleType = $scheduleType;
	}

	/**
	 * イベント期間の種類を設定
	 *
	 * @param string|null $scheduleType イベント期間の種類
	 * @return EventMaster $this
	 */
	public function withScheduleType(?string $scheduleType): EventMaster {
		$this->scheduleType = $scheduleType;
		return $this;
	}
	/**
     * @var string 繰り返しの種類
	 */
	protected $repeatType;

	/**
	 * 繰り返しの種類を取得
	 *
	 * @return string|null 繰り返しの種類
	 */
	public function getRepeatType(): ?string {
		return $this->repeatType;
	}

	/**
	 * 繰り返しの種類を設定
	 *
	 * @param string|null $repeatType 繰り返しの種類
	 */
	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}

	/**
	 * 繰り返しの種類を設定
	 *
	 * @param string|null $repeatType 繰り返しの種類
	 * @return EventMaster $this
	 */
	public function withRepeatType(?string $repeatType): EventMaster {
		$this->repeatType = $repeatType;
		return $this;
	}
	/**
     * @var int イベントの開始日時
	 */
	protected $absoluteBegin;

	/**
	 * イベントの開始日時を取得
	 *
	 * @return int|null イベントの開始日時
	 */
	public function getAbsoluteBegin(): ?int {
		return $this->absoluteBegin;
	}

	/**
	 * イベントの開始日時を設定
	 *
	 * @param int|null $absoluteBegin イベントの開始日時
	 */
	public function setAbsoluteBegin(?int $absoluteBegin) {
		$this->absoluteBegin = $absoluteBegin;
	}

	/**
	 * イベントの開始日時を設定
	 *
	 * @param int|null $absoluteBegin イベントの開始日時
	 * @return EventMaster $this
	 */
	public function withAbsoluteBegin(?int $absoluteBegin): EventMaster {
		$this->absoluteBegin = $absoluteBegin;
		return $this;
	}
	/**
     * @var int イベントの終了日時
	 */
	protected $absoluteEnd;

	/**
	 * イベントの終了日時を取得
	 *
	 * @return int|null イベントの終了日時
	 */
	public function getAbsoluteEnd(): ?int {
		return $this->absoluteEnd;
	}

	/**
	 * イベントの終了日時を設定
	 *
	 * @param int|null $absoluteEnd イベントの終了日時
	 */
	public function setAbsoluteEnd(?int $absoluteEnd) {
		$this->absoluteEnd = $absoluteEnd;
	}

	/**
	 * イベントの終了日時を設定
	 *
	 * @param int|null $absoluteEnd イベントの終了日時
	 * @return EventMaster $this
	 */
	public function withAbsoluteEnd(?int $absoluteEnd): EventMaster {
		$this->absoluteEnd = $absoluteEnd;
		return $this;
	}
	/**
     * @var int イベントの繰り返し開始日
	 */
	protected $repeatBeginDayOfMonth;

	/**
	 * イベントの繰り返し開始日を取得
	 *
	 * @return int|null イベントの繰り返し開始日
	 */
	public function getRepeatBeginDayOfMonth(): ?int {
		return $this->repeatBeginDayOfMonth;
	}

	/**
	 * イベントの繰り返し開始日を設定
	 *
	 * @param int|null $repeatBeginDayOfMonth イベントの繰り返し開始日
	 */
	public function setRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth) {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
	}

	/**
	 * イベントの繰り返し開始日を設定
	 *
	 * @param int|null $repeatBeginDayOfMonth イベントの繰り返し開始日
	 * @return EventMaster $this
	 */
	public function withRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth): EventMaster {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
		return $this;
	}
	/**
     * @var int イベントの繰り返し終了日
	 */
	protected $repeatEndDayOfMonth;

	/**
	 * イベントの繰り返し終了日を取得
	 *
	 * @return int|null イベントの繰り返し終了日
	 */
	public function getRepeatEndDayOfMonth(): ?int {
		return $this->repeatEndDayOfMonth;
	}

	/**
	 * イベントの繰り返し終了日を設定
	 *
	 * @param int|null $repeatEndDayOfMonth イベントの繰り返し終了日
	 */
	public function setRepeatEndDayOfMonth(?int $repeatEndDayOfMonth) {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
	}

	/**
	 * イベントの繰り返し終了日を設定
	 *
	 * @param int|null $repeatEndDayOfMonth イベントの繰り返し終了日
	 * @return EventMaster $this
	 */
	public function withRepeatEndDayOfMonth(?int $repeatEndDayOfMonth): EventMaster {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
		return $this;
	}
	/**
     * @var string イベントの繰り返し開始曜日
	 */
	protected $repeatBeginDayOfWeek;

	/**
	 * イベントの繰り返し開始曜日を取得
	 *
	 * @return string|null イベントの繰り返し開始曜日
	 */
	public function getRepeatBeginDayOfWeek(): ?string {
		return $this->repeatBeginDayOfWeek;
	}

	/**
	 * イベントの繰り返し開始曜日を設定
	 *
	 * @param string|null $repeatBeginDayOfWeek イベントの繰り返し開始曜日
	 */
	public function setRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek) {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
	}

	/**
	 * イベントの繰り返し開始曜日を設定
	 *
	 * @param string|null $repeatBeginDayOfWeek イベントの繰り返し開始曜日
	 * @return EventMaster $this
	 */
	public function withRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek): EventMaster {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
		return $this;
	}
	/**
     * @var string イベントの繰り返し終了曜日
	 */
	protected $repeatEndDayOfWeek;

	/**
	 * イベントの繰り返し終了曜日を取得
	 *
	 * @return string|null イベントの繰り返し終了曜日
	 */
	public function getRepeatEndDayOfWeek(): ?string {
		return $this->repeatEndDayOfWeek;
	}

	/**
	 * イベントの繰り返し終了曜日を設定
	 *
	 * @param string|null $repeatEndDayOfWeek イベントの繰り返し終了曜日
	 */
	public function setRepeatEndDayOfWeek(?string $repeatEndDayOfWeek) {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
	}

	/**
	 * イベントの繰り返し終了曜日を設定
	 *
	 * @param string|null $repeatEndDayOfWeek イベントの繰り返し終了曜日
	 * @return EventMaster $this
	 */
	public function withRepeatEndDayOfWeek(?string $repeatEndDayOfWeek): EventMaster {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
		return $this;
	}
	/**
     * @var int イベントの繰り返し開始時間
	 */
	protected $repeatBeginHour;

	/**
	 * イベントの繰り返し開始時間を取得
	 *
	 * @return int|null イベントの繰り返し開始時間
	 */
	public function getRepeatBeginHour(): ?int {
		return $this->repeatBeginHour;
	}

	/**
	 * イベントの繰り返し開始時間を設定
	 *
	 * @param int|null $repeatBeginHour イベントの繰り返し開始時間
	 */
	public function setRepeatBeginHour(?int $repeatBeginHour) {
		$this->repeatBeginHour = $repeatBeginHour;
	}

	/**
	 * イベントの繰り返し開始時間を設定
	 *
	 * @param int|null $repeatBeginHour イベントの繰り返し開始時間
	 * @return EventMaster $this
	 */
	public function withRepeatBeginHour(?int $repeatBeginHour): EventMaster {
		$this->repeatBeginHour = $repeatBeginHour;
		return $this;
	}
	/**
     * @var int イベントの繰り返し終了時間
	 */
	protected $repeatEndHour;

	/**
	 * イベントの繰り返し終了時間を取得
	 *
	 * @return int|null イベントの繰り返し終了時間
	 */
	public function getRepeatEndHour(): ?int {
		return $this->repeatEndHour;
	}

	/**
	 * イベントの繰り返し終了時間を設定
	 *
	 * @param int|null $repeatEndHour イベントの繰り返し終了時間
	 */
	public function setRepeatEndHour(?int $repeatEndHour) {
		$this->repeatEndHour = $repeatEndHour;
	}

	/**
	 * イベントの繰り返し終了時間を設定
	 *
	 * @param int|null $repeatEndHour イベントの繰り返し終了時間
	 * @return EventMaster $this
	 */
	public function withRepeatEndHour(?int $repeatEndHour): EventMaster {
		$this->repeatEndHour = $repeatEndHour;
		return $this;
	}
	/**
     * @var string イベントの開始トリガー名
	 */
	protected $relativeTriggerName;

	/**
	 * イベントの開始トリガー名を取得
	 *
	 * @return string|null イベントの開始トリガー名
	 */
	public function getRelativeTriggerName(): ?string {
		return $this->relativeTriggerName;
	}

	/**
	 * イベントの開始トリガー名を設定
	 *
	 * @param string|null $relativeTriggerName イベントの開始トリガー名
	 */
	public function setRelativeTriggerName(?string $relativeTriggerName) {
		$this->relativeTriggerName = $relativeTriggerName;
	}

	/**
	 * イベントの開始トリガー名を設定
	 *
	 * @param string|null $relativeTriggerName イベントの開始トリガー名
	 * @return EventMaster $this
	 */
	public function withRelativeTriggerName(?string $relativeTriggerName): EventMaster {
		$this->relativeTriggerName = $relativeTriggerName;
		return $this;
	}
	/**
     * @var int イベントの開催期間(秒)
	 */
	protected $relativeDuration;

	/**
	 * イベントの開催期間(秒)を取得
	 *
	 * @return int|null イベントの開催期間(秒)
	 */
	public function getRelativeDuration(): ?int {
		return $this->relativeDuration;
	}

	/**
	 * イベントの開催期間(秒)を設定
	 *
	 * @param int|null $relativeDuration イベントの開催期間(秒)
	 */
	public function setRelativeDuration(?int $relativeDuration) {
		$this->relativeDuration = $relativeDuration;
	}

	/**
	 * イベントの開催期間(秒)を設定
	 *
	 * @param int|null $relativeDuration イベントの開催期間(秒)
	 * @return EventMaster $this
	 */
	public function withRelativeDuration(?int $relativeDuration): EventMaster {
		$this->relativeDuration = $relativeDuration;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return EventMaster $this
	 */
	public function withCreatedAt(?int $createdAt): EventMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return EventMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): EventMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "eventId" => $this->eventId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "scheduleType" => $this->scheduleType,
            "repeatType" => $this->repeatType,
            "absoluteBegin" => $this->absoluteBegin,
            "absoluteEnd" => $this->absoluteEnd,
            "repeatBeginDayOfMonth" => $this->repeatBeginDayOfMonth,
            "repeatEndDayOfMonth" => $this->repeatEndDayOfMonth,
            "repeatBeginDayOfWeek" => $this->repeatBeginDayOfWeek,
            "repeatEndDayOfWeek" => $this->repeatEndDayOfWeek,
            "repeatBeginHour" => $this->repeatBeginHour,
            "repeatEndHour" => $this->repeatEndHour,
            "relativeTriggerName" => $this->relativeTriggerName,
            "relativeDuration" => $this->relativeDuration,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): EventMaster {
        $model = new EventMaster();
        $model->setEventId(isset($data["eventId"]) ? $data["eventId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setScheduleType(isset($data["scheduleType"]) ? $data["scheduleType"] : null);
        $model->setRepeatType(isset($data["repeatType"]) ? $data["repeatType"] : null);
        $model->setAbsoluteBegin(isset($data["absoluteBegin"]) ? $data["absoluteBegin"] : null);
        $model->setAbsoluteEnd(isset($data["absoluteEnd"]) ? $data["absoluteEnd"] : null);
        $model->setRepeatBeginDayOfMonth(isset($data["repeatBeginDayOfMonth"]) ? $data["repeatBeginDayOfMonth"] : null);
        $model->setRepeatEndDayOfMonth(isset($data["repeatEndDayOfMonth"]) ? $data["repeatEndDayOfMonth"] : null);
        $model->setRepeatBeginDayOfWeek(isset($data["repeatBeginDayOfWeek"]) ? $data["repeatBeginDayOfWeek"] : null);
        $model->setRepeatEndDayOfWeek(isset($data["repeatEndDayOfWeek"]) ? $data["repeatEndDayOfWeek"] : null);
        $model->setRepeatBeginHour(isset($data["repeatBeginHour"]) ? $data["repeatBeginHour"] : null);
        $model->setRepeatEndHour(isset($data["repeatEndHour"]) ? $data["repeatEndHour"] : null);
        $model->setRelativeTriggerName(isset($data["relativeTriggerName"]) ? $data["relativeTriggerName"] : null);
        $model->setRelativeDuration(isset($data["relativeDuration"]) ? $data["relativeDuration"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}