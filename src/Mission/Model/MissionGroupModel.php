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


class MissionGroupModel implements IModel {
	/**
     * @var string
	 */
	private $missionGroupId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $metadata;
	/**
     * @var array
	 */
	private $tasks;
	/**
     * @var string
	 */
	private $resetType;
	/**
     * @var int
	 */
	private $resetDayOfMonth;
	/**
     * @var string
	 */
	private $resetDayOfWeek;
	/**
     * @var int
	 */
	private $resetHour;
	/**
     * @var string
	 */
	private $completeNotificationNamespaceId;

	public function getMissionGroupId(): ?string {
		return $this->missionGroupId;
	}

	public function setMissionGroupId(?string $missionGroupId) {
		$this->missionGroupId = $missionGroupId;
	}

	public function withMissionGroupId(?string $missionGroupId): MissionGroupModel {
		$this->missionGroupId = $missionGroupId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): MissionGroupModel {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): MissionGroupModel {
		$this->metadata = $metadata;
		return $this;
	}

	public function getTasks(): ?array {
		return $this->tasks;
	}

	public function setTasks(?array $tasks) {
		$this->tasks = $tasks;
	}

	public function withTasks(?array $tasks): MissionGroupModel {
		$this->tasks = $tasks;
		return $this;
	}

	public function getResetType(): ?string {
		return $this->resetType;
	}

	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	public function withResetType(?string $resetType): MissionGroupModel {
		$this->resetType = $resetType;
		return $this;
	}

	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}

	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	public function withResetDayOfMonth(?int $resetDayOfMonth): MissionGroupModel {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}

	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}

	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	public function withResetDayOfWeek(?string $resetDayOfWeek): MissionGroupModel {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}

	public function getResetHour(): ?int {
		return $this->resetHour;
	}

	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}

	public function withResetHour(?int $resetHour): MissionGroupModel {
		$this->resetHour = $resetHour;
		return $this;
	}

	public function getCompleteNotificationNamespaceId(): ?string {
		return $this->completeNotificationNamespaceId;
	}

	public function setCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId) {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
	}

	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): MissionGroupModel {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?MissionGroupModel {
        if ($data === null) {
            return null;
        }
        return (new MissionGroupModel())
            ->withMissionGroupId(empty($data['missionGroupId']) ? null : $data['missionGroupId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withTasks(array_map(
                function ($item) {
                    return MissionTaskModel::fromJson($item);
                },
                array_key_exists('tasks', $data) && $data['tasks'] !== null ? $data['tasks'] : []
            ))
            ->withResetType(empty($data['resetType']) ? null : $data['resetType'])
            ->withResetDayOfMonth(empty($data['resetDayOfMonth']) && $data['resetDayOfMonth'] !== 0 ? null : $data['resetDayOfMonth'])
            ->withResetDayOfWeek(empty($data['resetDayOfWeek']) ? null : $data['resetDayOfWeek'])
            ->withResetHour(empty($data['resetHour']) && $data['resetHour'] !== 0 ? null : $data['resetHour'])
            ->withCompleteNotificationNamespaceId(empty($data['completeNotificationNamespaceId']) ? null : $data['completeNotificationNamespaceId']);
    }

    public function toJson(): array {
        return array(
            "missionGroupId" => $this->getMissionGroupId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "tasks" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getTasks() !== null && $this->getTasks() !== null ? $this->getTasks() : []
            ),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "completeNotificationNamespaceId" => $this->getCompleteNotificationNamespaceId(),
        );
    }
}