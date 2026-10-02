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
use Gs2\Schedule\Model\RepeatSetting;

/**
 * Request for updateEventMaster: Update Event Master
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#updateeventmaster
 */
class UpdateEventMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Event name */
    private $eventName;
    /** @var string Description */
    private $description;
    /** @var string Metadata */
    private $metadata;
    /** @var string Schedule Type */
    private $scheduleType;
    /** @var int Absolute Begin */
    private $absoluteBegin;
    /** @var int Absolute End */
    private $absoluteEnd;
    /** @var string Type of repetition */
    private $repeatType;
    /** @var int Event repeat start date (If the value exceeds the days of the month, it is treated as the last day.) */
    private $repeatBeginDayOfMonth;
    /** @var int Event repeat end date (If the value exceeds the days of the month, it is treated as the last day.) */
    private $repeatEndDayOfMonth;
    /** @var string Repeat start day of event */
    private $repeatBeginDayOfWeek;
    /** @var string Repeat event end day of the week */
    private $repeatEndDayOfWeek;
    /** @var int Event repetition start time (in hours) */
    private $repeatBeginHour;
    /** @var int Event repetition end time (in hours) */
    private $repeatEndHour;
    /** @var string Event start trigger name */
    private $relativeTriggerName;
    /** @var RepeatSetting Repeat Setting */
    private $repeatSetting;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateEventMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateEventMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Event name */
	public function getEventName(): ?string {
		return $this->eventName;
	}
    /** @param string|null $eventName Event name */
	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}
    /**
     * @param string|null $eventName Event name
     * @return UpdateEventMasterRequest
     */
	public function withEventName(?string $eventName): UpdateEventMasterRequest {
		$this->eventName = $eventName;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return UpdateEventMasterRequest
     */
	public function withDescription(?string $description): UpdateEventMasterRequest {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Metadata */
	public function getMetadata(): ?string {
		return $this->metadata;
	}
    /** @param string|null $metadata Metadata */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
    /**
     * @param string|null $metadata Metadata
     * @return UpdateEventMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateEventMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return string|null Schedule Type */
	public function getScheduleType(): ?string {
		return $this->scheduleType;
	}
    /** @param string|null $scheduleType Schedule Type */
	public function setScheduleType(?string $scheduleType) {
		$this->scheduleType = $scheduleType;
	}
    /**
     * @param string|null $scheduleType Schedule Type
     * @return UpdateEventMasterRequest
     */
	public function withScheduleType(?string $scheduleType): UpdateEventMasterRequest {
		$this->scheduleType = $scheduleType;
		return $this;
	}
    /** @return int|null Absolute Begin */
	public function getAbsoluteBegin(): ?int {
		return $this->absoluteBegin;
	}
    /** @param int|null $absoluteBegin Absolute Begin */
	public function setAbsoluteBegin(?int $absoluteBegin) {
		$this->absoluteBegin = $absoluteBegin;
	}
    /**
     * @param int|null $absoluteBegin Absolute Begin
     * @return UpdateEventMasterRequest
     */
	public function withAbsoluteBegin(?int $absoluteBegin): UpdateEventMasterRequest {
		$this->absoluteBegin = $absoluteBegin;
		return $this;
	}
    /** @return int|null Absolute End */
	public function getAbsoluteEnd(): ?int {
		return $this->absoluteEnd;
	}
    /** @param int|null $absoluteEnd Absolute End */
	public function setAbsoluteEnd(?int $absoluteEnd) {
		$this->absoluteEnd = $absoluteEnd;
	}
    /**
     * @param int|null $absoluteEnd Absolute End
     * @return UpdateEventMasterRequest
     */
	public function withAbsoluteEnd(?int $absoluteEnd): UpdateEventMasterRequest {
		$this->absoluteEnd = $absoluteEnd;
		return $this;
	}
    /**
     * @return string|null Type of repetition
     * @deprecated
     */
	public function getRepeatType(): ?string {
		return $this->repeatType;
	}
    /**
     * @param string|null $repeatType Type of repetition
     * @deprecated
     */
	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}
    /**
     * @param string|null $repeatType Type of repetition
     * @return UpdateEventMasterRequest
     * @deprecated
     */
	public function withRepeatType(?string $repeatType): UpdateEventMasterRequest {
		$this->repeatType = $repeatType;
		return $this;
	}
    /**
     * @return int|null Event repeat start date (If the value exceeds the days of the month, it is treated as the last day.)
     * @deprecated
     */
	public function getRepeatBeginDayOfMonth(): ?int {
		return $this->repeatBeginDayOfMonth;
	}
    /**
     * @param int|null $repeatBeginDayOfMonth Event repeat start date (If the value exceeds the days of the month, it is treated as the last day.)
     * @deprecated
     */
	public function setRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth) {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
	}
    /**
     * @param int|null $repeatBeginDayOfMonth Event repeat start date (If the value exceeds the days of the month, it is treated as the last day.)
     * @return UpdateEventMasterRequest
     * @deprecated
     */
	public function withRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth): UpdateEventMasterRequest {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
		return $this;
	}
    /**
     * @return int|null Event repeat end date (If the value exceeds the days of the month, it is treated as the last day.)
     * @deprecated
     */
	public function getRepeatEndDayOfMonth(): ?int {
		return $this->repeatEndDayOfMonth;
	}
    /**
     * @param int|null $repeatEndDayOfMonth Event repeat end date (If the value exceeds the days of the month, it is treated as the last day.)
     * @deprecated
     */
	public function setRepeatEndDayOfMonth(?int $repeatEndDayOfMonth) {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
	}
    /**
     * @param int|null $repeatEndDayOfMonth Event repeat end date (If the value exceeds the days of the month, it is treated as the last day.)
     * @return UpdateEventMasterRequest
     * @deprecated
     */
	public function withRepeatEndDayOfMonth(?int $repeatEndDayOfMonth): UpdateEventMasterRequest {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
		return $this;
	}
    /**
     * @return string|null Repeat start day of event
     * @deprecated
     */
	public function getRepeatBeginDayOfWeek(): ?string {
		return $this->repeatBeginDayOfWeek;
	}
    /**
     * @param string|null $repeatBeginDayOfWeek Repeat start day of event
     * @deprecated
     */
	public function setRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek) {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
	}
    /**
     * @param string|null $repeatBeginDayOfWeek Repeat start day of event
     * @return UpdateEventMasterRequest
     * @deprecated
     */
	public function withRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek): UpdateEventMasterRequest {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
		return $this;
	}
    /**
     * @return string|null Repeat event end day of the week
     * @deprecated
     */
	public function getRepeatEndDayOfWeek(): ?string {
		return $this->repeatEndDayOfWeek;
	}
    /**
     * @param string|null $repeatEndDayOfWeek Repeat event end day of the week
     * @deprecated
     */
	public function setRepeatEndDayOfWeek(?string $repeatEndDayOfWeek) {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
	}
    /**
     * @param string|null $repeatEndDayOfWeek Repeat event end day of the week
     * @return UpdateEventMasterRequest
     * @deprecated
     */
	public function withRepeatEndDayOfWeek(?string $repeatEndDayOfWeek): UpdateEventMasterRequest {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
		return $this;
	}
    /**
     * @return int|null Event repetition start time (in hours)
     * @deprecated
     */
	public function getRepeatBeginHour(): ?int {
		return $this->repeatBeginHour;
	}
    /**
     * @param int|null $repeatBeginHour Event repetition start time (in hours)
     * @deprecated
     */
	public function setRepeatBeginHour(?int $repeatBeginHour) {
		$this->repeatBeginHour = $repeatBeginHour;
	}
    /**
     * @param int|null $repeatBeginHour Event repetition start time (in hours)
     * @return UpdateEventMasterRequest
     * @deprecated
     */
	public function withRepeatBeginHour(?int $repeatBeginHour): UpdateEventMasterRequest {
		$this->repeatBeginHour = $repeatBeginHour;
		return $this;
	}
    /**
     * @return int|null Event repetition end time (in hours)
     * @deprecated
     */
	public function getRepeatEndHour(): ?int {
		return $this->repeatEndHour;
	}
    /**
     * @param int|null $repeatEndHour Event repetition end time (in hours)
     * @deprecated
     */
	public function setRepeatEndHour(?int $repeatEndHour) {
		$this->repeatEndHour = $repeatEndHour;
	}
    /**
     * @param int|null $repeatEndHour Event repetition end time (in hours)
     * @return UpdateEventMasterRequest
     * @deprecated
     */
	public function withRepeatEndHour(?int $repeatEndHour): UpdateEventMasterRequest {
		$this->repeatEndHour = $repeatEndHour;
		return $this;
	}
    /** @return string|null Event start trigger name */
	public function getRelativeTriggerName(): ?string {
		return $this->relativeTriggerName;
	}
    /** @param string|null $relativeTriggerName Event start trigger name */
	public function setRelativeTriggerName(?string $relativeTriggerName) {
		$this->relativeTriggerName = $relativeTriggerName;
	}
    /**
     * @param string|null $relativeTriggerName Event start trigger name
     * @return UpdateEventMasterRequest
     */
	public function withRelativeTriggerName(?string $relativeTriggerName): UpdateEventMasterRequest {
		$this->relativeTriggerName = $relativeTriggerName;
		return $this;
	}
    /** @return RepeatSetting|null Repeat Setting */
	public function getRepeatSetting(): ?RepeatSetting {
		return $this->repeatSetting;
	}
    /** @param RepeatSetting|null $repeatSetting Repeat Setting */
	public function setRepeatSetting(?RepeatSetting $repeatSetting) {
		$this->repeatSetting = $repeatSetting;
	}
    /**
     * @param RepeatSetting|null $repeatSetting Repeat Setting
     * @return UpdateEventMasterRequest
     */
	public function withRepeatSetting(?RepeatSetting $repeatSetting): UpdateEventMasterRequest {
		$this->repeatSetting = $repeatSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateEventMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateEventMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withEventName(array_key_exists('eventName', $data) && $data['eventName'] !== null ? $data['eventName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withScheduleType(array_key_exists('scheduleType', $data) && $data['scheduleType'] !== null ? $data['scheduleType'] : null)
            ->withAbsoluteBegin(array_key_exists('absoluteBegin', $data) && $data['absoluteBegin'] !== null ? $data['absoluteBegin'] : null)
            ->withAbsoluteEnd(array_key_exists('absoluteEnd', $data) && $data['absoluteEnd'] !== null ? $data['absoluteEnd'] : null)
            ->withRepeatType(array_key_exists('repeatType', $data) && $data['repeatType'] !== null ? $data['repeatType'] : null)
            ->withRepeatBeginDayOfMonth(array_key_exists('repeatBeginDayOfMonth', $data) && $data['repeatBeginDayOfMonth'] !== null ? $data['repeatBeginDayOfMonth'] : null)
            ->withRepeatEndDayOfMonth(array_key_exists('repeatEndDayOfMonth', $data) && $data['repeatEndDayOfMonth'] !== null ? $data['repeatEndDayOfMonth'] : null)
            ->withRepeatBeginDayOfWeek(array_key_exists('repeatBeginDayOfWeek', $data) && $data['repeatBeginDayOfWeek'] !== null ? $data['repeatBeginDayOfWeek'] : null)
            ->withRepeatEndDayOfWeek(array_key_exists('repeatEndDayOfWeek', $data) && $data['repeatEndDayOfWeek'] !== null ? $data['repeatEndDayOfWeek'] : null)
            ->withRepeatBeginHour(array_key_exists('repeatBeginHour', $data) && $data['repeatBeginHour'] !== null ? $data['repeatBeginHour'] : null)
            ->withRepeatEndHour(array_key_exists('repeatEndHour', $data) && $data['repeatEndHour'] !== null ? $data['repeatEndHour'] : null)
            ->withRelativeTriggerName(array_key_exists('relativeTriggerName', $data) && $data['relativeTriggerName'] !== null ? $data['relativeTriggerName'] : null)
            ->withRepeatSetting(array_key_exists('repeatSetting', $data) && $data['repeatSetting'] !== null ? RepeatSetting::fromJson($data['repeatSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "eventName" => $this->getEventName(),
            "description" => $this->getDescription(),
            "metadata" => $this->getMetadata(),
            "scheduleType" => $this->getScheduleType(),
            "absoluteBegin" => $this->getAbsoluteBegin(),
            "absoluteEnd" => $this->getAbsoluteEnd(),
            "repeatType" => $this->getRepeatType(),
            "repeatBeginDayOfMonth" => $this->getRepeatBeginDayOfMonth(),
            "repeatEndDayOfMonth" => $this->getRepeatEndDayOfMonth(),
            "repeatBeginDayOfWeek" => $this->getRepeatBeginDayOfWeek(),
            "repeatEndDayOfWeek" => $this->getRepeatEndDayOfWeek(),
            "repeatBeginHour" => $this->getRepeatBeginHour(),
            "repeatEndHour" => $this->getRepeatEndHour(),
            "relativeTriggerName" => $this->getRelativeTriggerName(),
            "repeatSetting" => $this->getRepeatSetting() !== null ? $this->getRepeatSetting()->toJson() : null,
        );
    }
}