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


class EventMaster implements IModel {
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
	private $description;
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
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getEventId(): ?string {
		return $this->eventId;
	}

	public function setEventId(?string $eventId) {
		$this->eventId = $eventId;
	}

	public function withEventId(?string $eventId): EventMaster {
		$this->eventId = $eventId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): EventMaster {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): EventMaster {
		$this->description = $description;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): EventMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getScheduleType(): ?string {
		return $this->scheduleType;
	}

	public function setScheduleType(?string $scheduleType) {
		$this->scheduleType = $scheduleType;
	}

	public function withScheduleType(?string $scheduleType): EventMaster {
		$this->scheduleType = $scheduleType;
		return $this;
	}

	public function getRepeatType(): ?string {
		return $this->repeatType;
	}

	public function setRepeatType(?string $repeatType) {
		$this->repeatType = $repeatType;
	}

	public function withRepeatType(?string $repeatType): EventMaster {
		$this->repeatType = $repeatType;
		return $this;
	}

	public function getAbsoluteBegin(): ?int {
		return $this->absoluteBegin;
	}

	public function setAbsoluteBegin(?int $absoluteBegin) {
		$this->absoluteBegin = $absoluteBegin;
	}

	public function withAbsoluteBegin(?int $absoluteBegin): EventMaster {
		$this->absoluteBegin = $absoluteBegin;
		return $this;
	}

	public function getAbsoluteEnd(): ?int {
		return $this->absoluteEnd;
	}

	public function setAbsoluteEnd(?int $absoluteEnd) {
		$this->absoluteEnd = $absoluteEnd;
	}

	public function withAbsoluteEnd(?int $absoluteEnd): EventMaster {
		$this->absoluteEnd = $absoluteEnd;
		return $this;
	}

	public function getRepeatBeginDayOfMonth(): ?int {
		return $this->repeatBeginDayOfMonth;
	}

	public function setRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth) {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
	}

	public function withRepeatBeginDayOfMonth(?int $repeatBeginDayOfMonth): EventMaster {
		$this->repeatBeginDayOfMonth = $repeatBeginDayOfMonth;
		return $this;
	}

	public function getRepeatEndDayOfMonth(): ?int {
		return $this->repeatEndDayOfMonth;
	}

	public function setRepeatEndDayOfMonth(?int $repeatEndDayOfMonth) {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
	}

	public function withRepeatEndDayOfMonth(?int $repeatEndDayOfMonth): EventMaster {
		$this->repeatEndDayOfMonth = $repeatEndDayOfMonth;
		return $this;
	}

	public function getRepeatBeginDayOfWeek(): ?string {
		return $this->repeatBeginDayOfWeek;
	}

	public function setRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek) {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
	}

	public function withRepeatBeginDayOfWeek(?string $repeatBeginDayOfWeek): EventMaster {
		$this->repeatBeginDayOfWeek = $repeatBeginDayOfWeek;
		return $this;
	}

	public function getRepeatEndDayOfWeek(): ?string {
		return $this->repeatEndDayOfWeek;
	}

	public function setRepeatEndDayOfWeek(?string $repeatEndDayOfWeek) {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
	}

	public function withRepeatEndDayOfWeek(?string $repeatEndDayOfWeek): EventMaster {
		$this->repeatEndDayOfWeek = $repeatEndDayOfWeek;
		return $this;
	}

	public function getRepeatBeginHour(): ?int {
		return $this->repeatBeginHour;
	}

	public function setRepeatBeginHour(?int $repeatBeginHour) {
		$this->repeatBeginHour = $repeatBeginHour;
	}

	public function withRepeatBeginHour(?int $repeatBeginHour): EventMaster {
		$this->repeatBeginHour = $repeatBeginHour;
		return $this;
	}

	public function getRepeatEndHour(): ?int {
		return $this->repeatEndHour;
	}

	public function setRepeatEndHour(?int $repeatEndHour) {
		$this->repeatEndHour = $repeatEndHour;
	}

	public function withRepeatEndHour(?int $repeatEndHour): EventMaster {
		$this->repeatEndHour = $repeatEndHour;
		return $this;
	}

	public function getRelativeTriggerName(): ?string {
		return $this->relativeTriggerName;
	}

	public function setRelativeTriggerName(?string $relativeTriggerName) {
		$this->relativeTriggerName = $relativeTriggerName;
	}

	public function withRelativeTriggerName(?string $relativeTriggerName): EventMaster {
		$this->relativeTriggerName = $relativeTriggerName;
		return $this;
	}

	public function getRelativeDuration(): ?int {
		return $this->relativeDuration;
	}

	public function setRelativeDuration(?int $relativeDuration) {
		$this->relativeDuration = $relativeDuration;
	}

	public function withRelativeDuration(?int $relativeDuration): EventMaster {
		$this->relativeDuration = $relativeDuration;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): EventMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): EventMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?EventMaster {
        if ($data === null) {
            return null;
        }
        return (new EventMaster())
            ->withEventId(empty($data['eventId']) ? null : $data['eventId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withScheduleType(empty($data['scheduleType']) ? null : $data['scheduleType'])
            ->withRepeatType(empty($data['repeatType']) ? null : $data['repeatType'])
            ->withAbsoluteBegin(empty($data['absoluteBegin']) && $data['absoluteBegin'] !== 0 ? null : $data['absoluteBegin'])
            ->withAbsoluteEnd(empty($data['absoluteEnd']) && $data['absoluteEnd'] !== 0 ? null : $data['absoluteEnd'])
            ->withRepeatBeginDayOfMonth(empty($data['repeatBeginDayOfMonth']) && $data['repeatBeginDayOfMonth'] !== 0 ? null : $data['repeatBeginDayOfMonth'])
            ->withRepeatEndDayOfMonth(empty($data['repeatEndDayOfMonth']) && $data['repeatEndDayOfMonth'] !== 0 ? null : $data['repeatEndDayOfMonth'])
            ->withRepeatBeginDayOfWeek(empty($data['repeatBeginDayOfWeek']) ? null : $data['repeatBeginDayOfWeek'])
            ->withRepeatEndDayOfWeek(empty($data['repeatEndDayOfWeek']) ? null : $data['repeatEndDayOfWeek'])
            ->withRepeatBeginHour(empty($data['repeatBeginHour']) && $data['repeatBeginHour'] !== 0 ? null : $data['repeatBeginHour'])
            ->withRepeatEndHour(empty($data['repeatEndHour']) && $data['repeatEndHour'] !== 0 ? null : $data['repeatEndHour'])
            ->withRelativeTriggerName(empty($data['relativeTriggerName']) ? null : $data['relativeTriggerName'])
            ->withRelativeDuration(empty($data['relativeDuration']) && $data['relativeDuration'] !== 0 ? null : $data['relativeDuration'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "eventId" => $this->getEventId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}