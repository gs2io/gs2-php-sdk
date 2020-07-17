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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * イベントマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateEventMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName イベントマスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateEventMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string イベントの種類名 */
    private $eventName;

    /**
     * イベントの種類名を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getEventName(): ?string {
        return $this->eventName;
    }

    /**
     * イベントの種類名を設定
     *
     * @param string $eventName イベントマスターを更新
     */
    public function setEventName(string $eventName = null) {
        $this->eventName = $eventName;
    }

    /**
     * イベントの種類名を設定
     *
     * @param string $eventName イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withEventName(string $eventName = null): UpdateEventMasterRequest {
        $this->setEventName($eventName);
        return $this;
    }

    /** @var string イベントマスターの説明 */
    private $description;

    /**
     * イベントマスターの説明を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * イベントマスターの説明を設定
     *
     * @param string $description イベントマスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * イベントマスターの説明を設定
     *
     * @param string $description イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateEventMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string イベントの種類のメタデータ */
    private $metadata;

    /**
     * イベントの種類のメタデータを取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * イベントの種類のメタデータを設定
     *
     * @param string $metadata イベントマスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * イベントの種類のメタデータを設定
     *
     * @param string $metadata イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateEventMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string イベント期間の種類 */
    private $scheduleType;

    /**
     * イベント期間の種類を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getScheduleType(): ?string {
        return $this->scheduleType;
    }

    /**
     * イベント期間の種類を設定
     *
     * @param string $scheduleType イベントマスターを更新
     */
    public function setScheduleType(string $scheduleType = null) {
        $this->scheduleType = $scheduleType;
    }

    /**
     * イベント期間の種類を設定
     *
     * @param string $scheduleType イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withScheduleType(string $scheduleType = null): UpdateEventMasterRequest {
        $this->setScheduleType($scheduleType);
        return $this;
    }

    /** @var int イベントの開始日時 */
    private $absoluteBegin;

    /**
     * イベントの開始日時を取得
     *
     * @return int|null イベントマスターを更新
     */
    public function getAbsoluteBegin(): ?int {
        return $this->absoluteBegin;
    }

    /**
     * イベントの開始日時を設定
     *
     * @param int $absoluteBegin イベントマスターを更新
     */
    public function setAbsoluteBegin(int $absoluteBegin = null) {
        $this->absoluteBegin = $absoluteBegin;
    }

    /**
     * イベントの開始日時を設定
     *
     * @param int $absoluteBegin イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withAbsoluteBegin(int $absoluteBegin = null): UpdateEventMasterRequest {
        $this->setAbsoluteBegin($absoluteBegin);
        return $this;
    }

    /** @var int イベントの終了日時 */
    private $absoluteEnd;

    /**
     * イベントの終了日時を取得
     *
     * @return int|null イベントマスターを更新
     */
    public function getAbsoluteEnd(): ?int {
        return $this->absoluteEnd;
    }

    /**
     * イベントの終了日時を設定
     *
     * @param int $absoluteEnd イベントマスターを更新
     */
    public function setAbsoluteEnd(int $absoluteEnd = null) {
        $this->absoluteEnd = $absoluteEnd;
    }

    /**
     * イベントの終了日時を設定
     *
     * @param int $absoluteEnd イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withAbsoluteEnd(int $absoluteEnd = null): UpdateEventMasterRequest {
        $this->setAbsoluteEnd($absoluteEnd);
        return $this;
    }

    /** @var string 繰り返しの種類 */
    private $repeatType;

    /**
     * 繰り返しの種類を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getRepeatType(): ?string {
        return $this->repeatType;
    }

    /**
     * 繰り返しの種類を設定
     *
     * @param string $repeatType イベントマスターを更新
     */
    public function setRepeatType(string $repeatType = null) {
        $this->repeatType = $repeatType;
    }

    /**
     * 繰り返しの種類を設定
     *
     * @param string $repeatType イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRepeatType(string $repeatType = null): UpdateEventMasterRequest {
        $this->setRepeatType($repeatType);
        return $this;
    }

    /** @var int イベントの繰り返し開始日 */
    private $repeatBeginDayOfMonth;

    /**
     * イベントの繰り返し開始日を取得
     *
     * @return int|null イベントマスターを更新
     */
    public function getRepeatBeginDayOfMonth(): ?int {
        return $this->repeatBeginDayOfMonth;
    }

    /**
     * イベントの繰り返し開始日を設定
     *
     * @param int $repeatBeginDayOfMonth イベントマスターを更新
     */
    public function setRepeatBeginDayOfMonth(int $repeatBeginDayOfMonth = null) {
        $this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
    }

    /**
     * イベントの繰り返し開始日を設定
     *
     * @param int $repeatBeginDayOfMonth イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRepeatBeginDayOfMonth(int $repeatBeginDayOfMonth = null): UpdateEventMasterRequest {
        $this->setRepeatBeginDayOfMonth($repeatBeginDayOfMonth);
        return $this;
    }

    /** @var int イベントの繰り返し終了日 */
    private $repeatEndDayOfMonth;

    /**
     * イベントの繰り返し終了日を取得
     *
     * @return int|null イベントマスターを更新
     */
    public function getRepeatEndDayOfMonth(): ?int {
        return $this->repeatEndDayOfMonth;
    }

    /**
     * イベントの繰り返し終了日を設定
     *
     * @param int $repeatEndDayOfMonth イベントマスターを更新
     */
    public function setRepeatEndDayOfMonth(int $repeatEndDayOfMonth = null) {
        $this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
    }

    /**
     * イベントの繰り返し終了日を設定
     *
     * @param int $repeatEndDayOfMonth イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRepeatEndDayOfMonth(int $repeatEndDayOfMonth = null): UpdateEventMasterRequest {
        $this->setRepeatEndDayOfMonth($repeatEndDayOfMonth);
        return $this;
    }

    /** @var string イベントの繰り返し開始曜日 */
    private $repeatBeginDayOfWeek;

    /**
     * イベントの繰り返し開始曜日を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getRepeatBeginDayOfWeek(): ?string {
        return $this->repeatBeginDayOfWeek;
    }

    /**
     * イベントの繰り返し開始曜日を設定
     *
     * @param string $repeatBeginDayOfWeek イベントマスターを更新
     */
    public function setRepeatBeginDayOfWeek(string $repeatBeginDayOfWeek = null) {
        $this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
    }

    /**
     * イベントの繰り返し開始曜日を設定
     *
     * @param string $repeatBeginDayOfWeek イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRepeatBeginDayOfWeek(string $repeatBeginDayOfWeek = null): UpdateEventMasterRequest {
        $this->setRepeatBeginDayOfWeek($repeatBeginDayOfWeek);
        return $this;
    }

    /** @var string イベントの繰り返し終了曜日 */
    private $repeatEndDayOfWeek;

    /**
     * イベントの繰り返し終了曜日を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getRepeatEndDayOfWeek(): ?string {
        return $this->repeatEndDayOfWeek;
    }

    /**
     * イベントの繰り返し終了曜日を設定
     *
     * @param string $repeatEndDayOfWeek イベントマスターを更新
     */
    public function setRepeatEndDayOfWeek(string $repeatEndDayOfWeek = null) {
        $this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
    }

    /**
     * イベントの繰り返し終了曜日を設定
     *
     * @param string $repeatEndDayOfWeek イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRepeatEndDayOfWeek(string $repeatEndDayOfWeek = null): UpdateEventMasterRequest {
        $this->setRepeatEndDayOfWeek($repeatEndDayOfWeek);
        return $this;
    }

    /** @var int イベントの繰り返し開始時間 */
    private $repeatBeginHour;

    /**
     * イベントの繰り返し開始時間を取得
     *
     * @return int|null イベントマスターを更新
     */
    public function getRepeatBeginHour(): ?int {
        return $this->repeatBeginHour;
    }

    /**
     * イベントの繰り返し開始時間を設定
     *
     * @param int $repeatBeginHour イベントマスターを更新
     */
    public function setRepeatBeginHour(int $repeatBeginHour = null) {
        $this->repeatBeginHour = $repeatBeginHour;
    }

    /**
     * イベントの繰り返し開始時間を設定
     *
     * @param int $repeatBeginHour イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRepeatBeginHour(int $repeatBeginHour = null): UpdateEventMasterRequest {
        $this->setRepeatBeginHour($repeatBeginHour);
        return $this;
    }

    /** @var int イベントの繰り返し終了時間 */
    private $repeatEndHour;

    /**
     * イベントの繰り返し終了時間を取得
     *
     * @return int|null イベントマスターを更新
     */
    public function getRepeatEndHour(): ?int {
        return $this->repeatEndHour;
    }

    /**
     * イベントの繰り返し終了時間を設定
     *
     * @param int $repeatEndHour イベントマスターを更新
     */
    public function setRepeatEndHour(int $repeatEndHour = null) {
        $this->repeatEndHour = $repeatEndHour;
    }

    /**
     * イベントの繰り返し終了時間を設定
     *
     * @param int $repeatEndHour イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRepeatEndHour(int $repeatEndHour = null): UpdateEventMasterRequest {
        $this->setRepeatEndHour($repeatEndHour);
        return $this;
    }

    /** @var string イベントの開始トリガー名 */
    private $relativeTriggerName;

    /**
     * イベントの開始トリガー名を取得
     *
     * @return string|null イベントマスターを更新
     */
    public function getRelativeTriggerName(): ?string {
        return $this->relativeTriggerName;
    }

    /**
     * イベントの開始トリガー名を設定
     *
     * @param string $relativeTriggerName イベントマスターを更新
     */
    public function setRelativeTriggerName(string $relativeTriggerName = null) {
        $this->relativeTriggerName = $relativeTriggerName;
    }

    /**
     * イベントの開始トリガー名を設定
     *
     * @param string $relativeTriggerName イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRelativeTriggerName(string $relativeTriggerName = null): UpdateEventMasterRequest {
        $this->setRelativeTriggerName($relativeTriggerName);
        return $this;
    }

    /** @var int イベントの開催期間(秒) */
    private $relativeDuration;

    /**
     * イベントの開催期間(秒)を取得
     *
     * @return int|null イベントマスターを更新
     */
    public function getRelativeDuration(): ?int {
        return $this->relativeDuration;
    }

    /**
     * イベントの開催期間(秒)を設定
     *
     * @param int $relativeDuration イベントマスターを更新
     */
    public function setRelativeDuration(int $relativeDuration = null) {
        $this->relativeDuration = $relativeDuration;
    }

    /**
     * イベントの開催期間(秒)を設定
     *
     * @param int $relativeDuration イベントマスターを更新
     * @return UpdateEventMasterRequest $this
     */
    public function withRelativeDuration(int $relativeDuration = null): UpdateEventMasterRequest {
        $this->setRelativeDuration($relativeDuration);
        return $this;
    }

}