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

class UpdateEventMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $eventName;
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
    /** @var int */
    private $relativeDuration;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateEventMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getEventName(): ?string {
		return $this->eventName;
	}

	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}

	public function withEventName(?string $eventName): UpdateEventMasterRequest {
		$this->eventName = $eventName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateEventMasterRequest {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): UpdateEventMasterRequest {
		$this->metadata = $metadata;
		return $this;
	}

	public function getScheduleType(): ?string {
		return $this->scheduleType;
	}

	public function setScheduleType(?string $scheduleType) {
		$this->scheduleType = $scheduleType;
	}

	public function withScheduleType(?string $scheduleType): UpdateEventMasterRequest {
		$this->scheduleType = $scheduleType;
		return $this;
	}

	public function getAbsoluteBegin(): ?int {
		return $this->absoluteBegin;
	}

	public function setAbsoluteBegin(?int $absoluteBegin) {
		$this->absoluteBegin = $absoluteBegin;
	}

	public function withAbsoluteBegin(?int $absoluteBegin): UpdateEventMasterRequest {
		$this->absoluteBegin = $absoluteBegin;
		return $this;
	}

	public function getAbsoluteEnd(): ?int {
		return $this->absoluteEnd;
	}

	public function setAbsoluteEnd(?int $absoluteEnd) {
		$this->absoluteEnd = $absoluteEnd;
	}

	public function withAbsoluteEnd(?int $absoluteEnd): UpdateEventMasterRequest {
		$this->absoluteEnd = $absoluteEnd;
		return $this;
	}

	public function getRepeatType(): ?string {
		return $this->repeatType;
	}

	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}

	public function withRepeatType(?string $repeatType): UpdateEventMasterRequest {
		$this->repeatType = $repeatType;
		return $this;
	}

	public function getRepeatBeginDayOfMonth(): ?int {
		return $this->repeatBeginDayOfMonth;
	}

	public function setRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth) {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
	}

	public function withRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth): UpdateEventMasterRequest {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
		return $this;
	}

	public function getRepeatEndDayOfMonth(): ?int {
		return $this->repeatEndDayOfMonth;
	}

	public function setRepeatEndDayOfMonth(?int $repeatEndDayOfMonth) {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
	}

	public function withRepeatEndDayOfMonth(?int $repeatEndDayOfMonth): UpdateEventMasterRequest {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
		return $this;
	}

	public function getRepeatBeginDayOfWeek(): ?string {
		return $this->repeatBeginDayOfWeek;
	}

	public function setRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek) {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
	}

	public function withRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek): UpdateEventMasterRequest {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
		return $this;
	}

	public function getRepeatEndDayOfWeek(): ?string {
		return $this->repeatEndDayOfWeek;
	}

	public function setRepeatEndDayOfWeek(?string $repeatEndDayOfWeek) {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
	}

	public function withRepeatEndDayOfWeek(?string $repeatEndDayOfWeek): UpdateEventMasterRequest {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
		return $this;
	}

	public function getRepeatBeginHour(): ?int {
		return $this->repeatBeginHour;
	}

	public function setRepeatBeginHour(?int $repeatBeginHour) {
		$this->repeatBeginHour = $repeatBeginHour;
	}

	public function withRepeatBeginHour(?int $repeatBeginHour): UpdateEventMasterRequest {
		$this->repeatBeginHour = $repeatBeginHour;
		return $this;
	}

	public function getRepeatEndHour(): ?int {
		return $this->repeatEndHour;
	}

	public function setRepeatEndHour(?int $repeatEndHour) {
		$this->repeatEndHour = $repeatEndHour;
	}

	public function withRepeatEndHour(?int $repeatEndHour): UpdateEventMasterRequest {
		$this->repeatEndHour = $repeatEndHour;
		return $this;
	}

	public function getRelativeTriggerName(): ?string {
		return $this->relativeTriggerName;
	}

	public function setRelativeTriggerName(?string $relativeTriggerName) {
		$this->relativeTriggerName = $relativeTriggerName;
	}

	public function withRelativeTriggerName(?string $relativeTriggerName): UpdateEventMasterRequest {
		$this->relativeTriggerName = $relativeTriggerName;
		return $this;
	}

	public function getRelativeDuration(): ?int {
		return $this->relativeDuration;
	}

	public function setRelativeDuration(?int $relativeDuration) {
		$this->relativeDuration = $relativeDuration;
	}

	public function withRelativeDuration(?int $relativeDuration): UpdateEventMasterRequest {
		$this->relativeDuration = $relativeDuration;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateEventMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateEventMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withEventName(empty($data['eventName']) ? null : $data['eventName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withScheduleType(empty($data['scheduleType']) ? null : $data['scheduleType'])
            ->withAbsoluteBegin(empty($data['absoluteBegin']) && $data['absoluteBegin'] !== 0 ? null : $data['absoluteBegin'])
            ->withAbsoluteEnd(empty($data['absoluteEnd']) && $data['absoluteEnd'] !== 0 ? null : $data['absoluteEnd'])
            ->withRepeatType(empty($data['repeatType']) ? null : $data['repeatType'])
            ->withRepeatBeginDayOfMonth(empty($data['repeatBeginDayOfMonth']) && $data['repeatBeginDayOfMonth'] !== 0 ? null : $data['repeatBeginDayOfMonth'])
            ->withRepeatEndDayOfMonth(empty($data['repeatEndDayOfMonth']) && $data['repeatEndDayOfMonth'] !== 0 ? null : $data['repeatEndDayOfMonth'])
            ->withRepeatBeginDayOfWeek(empty($data['repeatBeginDayOfWeek']) ? null : $data['repeatBeginDayOfWeek'])
            ->withRepeatEndDayOfWeek(empty($data['repeatEndDayOfWeek']) ? null : $data['repeatEndDayOfWeek'])
            ->withRepeatBeginHour(empty($data['repeatBeginHour']) && $data['repeatBeginHour'] !== 0 ? null : $data['repeatBeginHour'])
            ->withRepeatEndHour(empty($data['repeatEndHour']) && $data['repeatEndHour'] !== 0 ? null : $data['repeatEndHour'])
            ->withRelativeTriggerName(empty($data['relativeTriggerName']) ? null : $data['relativeTriggerName'])
            ->withRelativeDuration(empty($data['relativeDuration']) && $data['relativeDuration'] !== 0 ? null : $data['relativeDuration']);
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
            "relativeDuration" => $this->getRelativeDuration(),
        );
    }
}