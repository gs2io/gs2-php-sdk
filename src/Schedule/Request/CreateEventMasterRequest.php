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

class CreateEventMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $metadata;
    /** @var string */
    private $scheduleType;
    /** @var int */
    private $absoluteBegin;
    /** @var int */
    private $absoluteEnd;
    /** @var string */
    private $repeatType;
    /** @var int */
    private $repeatBeginDayOfMonth;
    /** @var int */
    private $repeatEndDayOfMonth;
    /** @var string */
    private $repeatBeginDayOfWeek;
    /** @var string */
    private $repeatEndDayOfWeek;
    /** @var int */
    private $repeatBeginHour;
    /** @var int */
    private $repeatEndHour;
    /** @var string */
    private $relativeTriggerName;
    /** @var RepeatSetting */
    private $repeatSetting;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): CreateEventMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateEventMasterRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateEventMasterRequest {
		$this->description = $description;
		return $this;
	}
	public function getMetadata(): ?string {
		return $this->metadata;
	}
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}
	public function withMetadata(?string $metadata): CreateEventMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}
	public function getScheduleType(): ?string {
		return $this->scheduleType;
	}
	public function setScheduleType(?string $scheduleType) {
		$this->scheduleType = $scheduleType;
	}
	public function withScheduleType(?string $scheduleType): CreateEventMasterRequest {
		$this->scheduleType = $scheduleType;
		return $this;
	}
	public function getAbsoluteBegin(): ?int {
		return $this->absoluteBegin;
	}
	public function setAbsoluteBegin(?int $absoluteBegin) {
		$this->absoluteBegin = $absoluteBegin;
	}
	public function withAbsoluteBegin(?int $absoluteBegin): CreateEventMasterRequest {
		$this->absoluteBegin = $absoluteBegin;
		return $this;
	}
	public function getAbsoluteEnd(): ?int {
		return $this->absoluteEnd;
	}
	public function setAbsoluteEnd(?int $absoluteEnd) {
		$this->absoluteEnd = $absoluteEnd;
	}
	public function withAbsoluteEnd(?int $absoluteEnd): CreateEventMasterRequest {
		$this->absoluteEnd = $absoluteEnd;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getRepeatType(): ?string {
		return $this->repeatType;
	}
    /**
     * @deprecated
     */
	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}
    /**
     * @deprecated
     */
	public function withRepeatType(?string $repeatType): CreateEventMasterRequest {
		$this->repeatType = $repeatType;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getRepeatBeginDayOfMonth(): ?int {
		return $this->repeatBeginDayOfMonth;
	}
    /**
     * @deprecated
     */
	public function setRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth) {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
	}
    /**
     * @deprecated
     */
	public function withRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth): CreateEventMasterRequest {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getRepeatEndDayOfMonth(): ?int {
		return $this->repeatEndDayOfMonth;
	}
    /**
     * @deprecated
     */
	public function setRepeatEndDayOfMonth(?int $repeatEndDayOfMonth) {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
	}
    /**
     * @deprecated
     */
	public function withRepeatEndDayOfMonth(?int $repeatEndDayOfMonth): CreateEventMasterRequest {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getRepeatBeginDayOfWeek(): ?string {
		return $this->repeatBeginDayOfWeek;
	}
    /**
     * @deprecated
     */
	public function setRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek) {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
	}
    /**
     * @deprecated
     */
	public function withRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek): CreateEventMasterRequest {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getRepeatEndDayOfWeek(): ?string {
		return $this->repeatEndDayOfWeek;
	}
    /**
     * @deprecated
     */
	public function setRepeatEndDayOfWeek(?string $repeatEndDayOfWeek) {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
	}
    /**
     * @deprecated
     */
	public function withRepeatEndDayOfWeek(?string $repeatEndDayOfWeek): CreateEventMasterRequest {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getRepeatBeginHour(): ?int {
		return $this->repeatBeginHour;
	}
    /**
     * @deprecated
     */
	public function setRepeatBeginHour(?int $repeatBeginHour) {
		$this->repeatBeginHour = $repeatBeginHour;
	}
    /**
     * @deprecated
     */
	public function withRepeatBeginHour(?int $repeatBeginHour): CreateEventMasterRequest {
		$this->repeatBeginHour = $repeatBeginHour;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getRepeatEndHour(): ?int {
		return $this->repeatEndHour;
	}
    /**
     * @deprecated
     */
	public function setRepeatEndHour(?int $repeatEndHour) {
		$this->repeatEndHour = $repeatEndHour;
	}
    /**
     * @deprecated
     */
	public function withRepeatEndHour(?int $repeatEndHour): CreateEventMasterRequest {
		$this->repeatEndHour = $repeatEndHour;
		return $this;
	}
	public function getRelativeTriggerName(): ?string {
		return $this->relativeTriggerName;
	}
	public function setRelativeTriggerName(?string $relativeTriggerName) {
		$this->relativeTriggerName = $relativeTriggerName;
	}
	public function withRelativeTriggerName(?string $relativeTriggerName): CreateEventMasterRequest {
		$this->relativeTriggerName = $relativeTriggerName;
		return $this;
	}
	public function getRepeatSetting(): ?RepeatSetting {
		return $this->repeatSetting;
	}
	public function setRepeatSetting(?RepeatSetting $repeatSetting) {
		$this->repeatSetting = $repeatSetting;
	}
	public function withRepeatSetting(?RepeatSetting $repeatSetting): CreateEventMasterRequest {
		$this->repeatSetting = $repeatSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateEventMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateEventMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
            "name" => $this->getName(),
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