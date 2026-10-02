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
 * Mission Group Model
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#missiongroupmodel
 */
class MissionGroupModel implements IModel {
	/**
     * @var string Mission Group GRN
	 */
	private $missionGroupId;
	/**
     * @var string Mission Group Model name
	 */
	private $name;
	/**
     * @var string Metadata
	 */
	private $metadata;
	/**
     * @var array List of Mission Task
	 */
	private $tasks;
	/**
     * @var string Reset timing
	 */
	private $resetType;
	/**
     * @var int Date to reset
	 */
	private $resetDayOfMonth;
	/**
     * @var string Day of the week to reset
	 */
	private $resetDayOfWeek;
	/**
     * @var int Hour of Reset
	 */
	private $resetHour;
	/**
     * @var string Push notifications when mission tasks are accomplished
	 */
	private $completeNotificationNamespaceId;
	/**
     * @var int Base date and time for counting elapsed days
	 */
	private $anchorTimestamp;
	/**
     * @var int Number of days to reset
	 */
	private $days;
    /** @return string|null Mission Group GRN */
	public function getMissionGroupId(): ?string {
		return $this->missionGroupId;
	}
    /** @param string|null $missionGroupId Mission Group GRN */
	public function setMissionGroupId(?string $missionGroupId) {
		$this->missionGroupId = $missionGroupId;
	}
    /**
     * @param string|null $missionGroupId Mission Group GRN
     * @return MissionGroupModel
     */
	public function withMissionGroupId(?string $missionGroupId): MissionGroupModel {
		$this->missionGroupId = $missionGroupId;
		return $this;
	}
    /** @return string|null Mission Group Model name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Mission Group Model name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Mission Group Model name
     * @return MissionGroupModel
     */
	public function withName(?string $name): MissionGroupModel {
		$this->name = $name;
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
     * @return MissionGroupModel
     */
	public function withMetadata(?string $metadata): MissionGroupModel {
		$this->metadata = $metadata;
		return $this;
	}
    /** @return array|null List of Mission Task */
	public function getTasks(): ?array {
		return $this->tasks;
	}
    /** @param array|null $tasks List of Mission Task */
	public function setTasks(?array $tasks) {
		$this->tasks = $tasks;
	}
    /**
     * @param array|null $tasks List of Mission Task
     * @return MissionGroupModel
     */
	public function withTasks(?array $tasks): MissionGroupModel {
		$this->tasks = $tasks;
		return $this;
	}
    /** @return string|null Reset timing */
	public function getResetType(): ?string {
		return $this->resetType;
	}
    /** @param string|null $resetType Reset timing */
	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}
    /**
     * @param string|null $resetType Reset timing
     * @return MissionGroupModel
     */
	public function withResetType(?string $resetType): MissionGroupModel {
		$this->resetType = $resetType;
		return $this;
	}
    /** @return int|null Date to reset */
	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}
    /** @param int|null $resetDayOfMonth Date to reset */
	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}
    /**
     * @param int|null $resetDayOfMonth Date to reset
     * @return MissionGroupModel
     */
	public function withResetDayOfMonth(?int $resetDayOfMonth): MissionGroupModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}
    /** @return string|null Day of the week to reset */
	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}
    /** @param string|null $resetDayOfWeek Day of the week to reset */
	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}
    /**
     * @param string|null $resetDayOfWeek Day of the week to reset
     * @return MissionGroupModel
     */
	public function withResetDayOfWeek(?string $resetDayOfWeek): MissionGroupModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}
    /** @return int|null Hour of Reset */
	public function getResetHour(): ?int {
		return $this->resetHour;
	}
    /** @param int|null $resetHour Hour of Reset */
	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}
    /**
     * @param int|null $resetHour Hour of Reset
     * @return MissionGroupModel
     */
	public function withResetHour(?int $resetHour): MissionGroupModel {
		$this->resetHour = $resetHour;
		return $this;
	}
    /** @return string|null Push notifications when mission tasks are accomplished */
	public function getCompleteNotificationNamespaceId(): ?string {
		return $this->completeNotificationNamespaceId;
	}
    /** @param string|null $completeNotificationNamespaceId Push notifications when mission tasks are accomplished */
	public function setCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId) {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
	}
    /**
     * @param string|null $completeNotificationNamespaceId Push notifications when mission tasks are accomplished
     * @return MissionGroupModel
     */
	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): MissionGroupModel {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
		return $this;
	}
    /** @return int|null Base date and time for counting elapsed days */
	public function getAnchorTimestamp(): ?int {
		return $this->anchorTimestamp;
	}
    /** @param int|null $anchorTimestamp Base date and time for counting elapsed days */
	public function setAnchorTimestamp(?int $anchorTimestamp) {
		$this->anchorTimestamp = $anchorTimestamp;
	}
    /**
     * @param int|null $anchorTimestamp Base date and time for counting elapsed days
     * @return MissionGroupModel
     */
	public function withAnchorTimestamp(?int $anchorTimestamp): MissionGroupModel {
		$this->anchorTimestamp = $anchorTimestamp;
		return $this;
	}
    /** @return int|null Number of days to reset */
	public function getDays(): ?int {
		return $this->days;
	}
    /** @param int|null $days Number of days to reset */
	public function setDays(?int $days) {
		$this->days = $days;
	}
    /**
     * @param int|null $days Number of days to reset
     * @return MissionGroupModel
     */
	public function withDays(?int $days): MissionGroupModel {
		$this->days = $days;
		return $this;
	}

    public static function fromJson(?array $data): ?MissionGroupModel {
        if ($data === null) {
            return null;
        }
        return (new MissionGroupModel())
            ->withMissionGroupId(array_key_exists('missionGroupId', $data) && $data['missionGroupId'] !== null ? $data['missionGroupId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withTasks(!array_key_exists('tasks', $data) || $data['tasks'] === null ? null : array_map(
                function ($item) {
                    return MissionTaskModel::fromJson($item);
                },
                $data['tasks']
            ))
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withCompleteNotificationNamespaceId(array_key_exists('completeNotificationNamespaceId', $data) && $data['completeNotificationNamespaceId'] !== null ? $data['completeNotificationNamespaceId'] : null)
            ->withAnchorTimestamp(array_key_exists('anchorTimestamp', $data) && $data['anchorTimestamp'] !== null ? $data['anchorTimestamp'] : null)
            ->withDays(array_key_exists('days', $data) && $data['days'] !== null ? $data['days'] : null);
    }

    public function toJson(): array {
        return array(
            "missionGroupId" => $this->getMissionGroupId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "tasks" => $this->getTasks() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTasks()
            ),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "completeNotificationNamespaceId" => $this->getCompleteNotificationNamespaceId(),
            "anchorTimestamp" => $this->getAnchorTimestamp(),
            "days" => $this->getDays(),
        );
    }
}