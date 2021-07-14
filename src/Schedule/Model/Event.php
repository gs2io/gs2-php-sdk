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


class Event implements IModel {
	/**
     * @var string
	 */
	private $eventId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var string
	 */
	private $scheduleType;
	/**
     * @var string
	 */
	private $repeatType;
	/**
     * @var int
	 */
	private $absoluteBegin;
	/**
     * @var int
	 */
	private $absoluteEnd;
	/**
     * @var int
	 */
	private $repeatBeginDayOfMonth;
	/**
     * @var int
	 */
	private $repeatEndDayOfMonth;
	/**
     * @var string
	 */
	private $repeatBeginDayOfWeek;
	/**
     * @var string
	 */
	private $repeatEndDayOfWeek;
	/**
     * @var int
	 */
	private $repeatBeginHour;
	/**
     * @var int
	 */
	private $repeatEndHour;
	/**
     * @var string
	 */
	private $relativeTriggerName;
	/**
     * @var int
	 */
	private $relativeDuration;

	public function getEventId(): ?string {
		return $this->eventId;
	}

	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}

	public function withEventId(?string $eventId): Event {
		$this->eventId = $eventId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Event {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): Event {
		$this->metadata = $metadata;
		return $this;
	}

	public function getScheduleType(): ?string {
		return $this->scheduleType;
	}

	public function setScheduleType(?string $scheduleType) {
		$this->scheduleType = $scheduleType;
	}

	public function withScheduleType(?string $scheduleType): Event {
		$this->scheduleType = $scheduleType;
		return $this;
	}

	public function getRepeatType(): ?string {
		return $this->repeatType;
	}

	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}

	public function withRepeatType(?string $repeatType): Event {
		$this->repeatType = $repeatType;
		return $this;
	}

	public function getAbsoluteBegin(): ?int {
		return $this->absoluteBegin;
	}

	public function setAbsoluteBegin(?int $absoluteBegin) {
		$this->absoluteBegin = $absoluteBegin;
	}

	public function withAbsoluteBegin(?int $absoluteBegin): Event {
		$this->absoluteBegin = $absoluteBegin;
		return $this;
	}

	public function getAbsoluteEnd(): ?int {
		return $this->absoluteEnd;
	}

	public function setAbsoluteEnd(?int $absoluteEnd) {
		$this->absoluteEnd = $absoluteEnd;
	}

	public function withAbsoluteEnd(?int $absoluteEnd): Event {
		$this->absoluteEnd = $absoluteEnd;
		return $this;
	}

	public function getRepeatBeginDayOfMonth(): ?int {
		return $this->repeatBeginDayOfMonth;
	}

	public function setRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth) {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
	}

	public function withRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth): Event {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
		return $this;
	}

	public function getRepeatEndDayOfMonth(): ?int {
		return $this->repeatEndDayOfMonth;
	}

	public function setRepeatEndDayOfMonth(?int $repeatEndDayOfMonth) {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
	}

	public function withRepeatEndDayOfMonth(?int $repeatEndDayOfMonth): Event {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
		return $this;
	}

	public function getRepeatBeginDayOfWeek(): ?string {
		return $this->repeatBeginDayOfWeek;
	}

	public function setRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek) {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
	}

	public function withRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek): Event {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
		return $this;
	}

	public function getRepeatEndDayOfWeek(): ?string {
		return $this->repeatEndDayOfWeek;
	}

	public function setRepeatEndDayOfWeek(?string $repeatEndDayOfWeek) {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
	}

	public function withRepeatEndDayOfWeek(?string $repeatEndDayOfWeek): Event {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
		return $this;
	}

	public function getRepeatBeginHour(): ?int {
		return $this->repeatBeginHour;
	}

	public function setRepeatBeginHour(?int $repeatBeginHour) {
		$this->repeatBeginHour = $repeatBeginHour;
	}

	public function withRepeatBeginHour(?int $repeatBeginHour): Event {
		$this->repeatBeginHour = $repeatBeginHour;
		return $this;
	}

	public function getRepeatEndHour(): ?int {
		return $this->repeatEndHour;
	}

	public function setRepeatEndHour(?int $repeatEndHour) {
		$this->repeatEndHour = $repeatEndHour;
	}

	public function withRepeatEndHour(?int $repeatEndHour): Event {
		$this->repeatEndHour = $repeatEndHour;
		return $this;
	}

	public function getRelativeTriggerName(): ?string {
		return $this->relativeTriggerName;
	}

	public function setRelativeTriggerName(?string $relativeTriggerName) {
		$this->relativeTriggerName = $relativeTriggerName;
	}

	public function withRelativeTriggerName(?string $relativeTriggerName): Event {
		$this->relativeTriggerName = $relativeTriggerName;
		return $this;
	}

	public function getRelativeDuration(): ?int {
		return $this->relativeDuration;
	}

	public function setRelativeDuration(?int $relativeDuration) {
		$this->relativeDuration = $relativeDuration;
	}

	public function withRelativeDuration(?int $relativeDuration): Event {
		$this->relativeDuration = $relativeDuration;
		return $this;
	}

    public static function fromJson(?array $data): ?Event {
        if ($data === null) {
            return null;
        }
        return (new Event())
            ->withEventId(empty($data['eventId']) ? null : $data['eventId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withScheduleType(empty($data['scheduleType']) ? null : $data['scheduleType'])
            ->withRepeatType(empty($data['repeatType']) ? null : $data['repeatType'])
            ->withAbsoluteBegin(empty($data['absoluteBegin']) ? null : $data['absoluteBegin'])
            ->withAbsoluteEnd(empty($data['absoluteEnd']) ? null : $data['absoluteEnd'])
            ->withRepeatBeginDayOfMonth(empty($data['repeatBeginDayOfMonth']) ? null : $data['repeatBeginDayOfMonth'])
            ->withRepeatEndDayOfMonth(empty($data['repeatEndDayOfMonth']) ? null : $data['repeatEndDayOfMonth'])
            ->withRepeatBeginDayOfWeek(empty($data['repeatBeginDayOfWeek']) ? null : $data['repeatBeginDayOfWeek'])
            ->withRepeatEndDayOfWeek(empty($data['repeatEndDayOfWeek']) ? null : $data['repeatEndDayOfWeek'])
            ->withRepeatBeginHour(empty($data['repeatBeginHour']) ? null : $data['repeatBeginHour'])
            ->withRepeatEndHour(empty($data['repeatEndHour']) ? null : $data['repeatEndHour'])
            ->withRelativeTriggerName(empty($data['relativeTriggerName']) ? null : $data['relativeTriggerName'])
            ->withRelativeDuration(empty($data['relativeDuration']) ? null : $data['relativeDuration']);
    }

    public function toJson(): array {
        return array(
            "eventId" => $this->getEventId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "scheduleType" => $this->getScheduleType(),
            "repeatType" => $this->getRepeatType(),
            "absoluteBegin" => $this->getAbsoluteBegin(),
            "absoluteEnd" => $this->getAbsoluteEnd(),
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