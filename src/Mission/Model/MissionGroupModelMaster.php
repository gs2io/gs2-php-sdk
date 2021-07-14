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


class MissionGroupModelMaster implements IModel {
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
     * @var string
	 */
	private $description;
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
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

	public function getMissionGroupId(): ?string {
		return $this->missionGroupId;
	}

	public function setMissionGroupId(?string $missionGroupId) {
		$this->missionGroupId = $missionGroupId;
	}

	public function withMissionGroupId(?string $missionGroupId): MissionGroupModelMaster {
		$this->missionGroupId = $missionGroupId;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): MissionGroupModelMaster {
		$this->name = $name;
		return $this;
	}

	public function getMetadata(): ?string {
		return $this->metadata;
	}

	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	public function withMetadata(?string $metadata): MissionGroupModelMaster {
		$this->metadata = $metadata;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): MissionGroupModelMaster {
		$this->description = $description;
		return $this;
	}

	public function getResetType(): ?string {
		return $this->resetType;
	}

	public function setResetType(?string $resetType) {
		$this->resetType = $resetType;
	}

	public function withResetType(?string $resetType): MissionGroupModelMaster {
		$this->resetType = $resetType;
		return $this;
	}

	public function getResetDayOfMonth(): ?int {
		return $this->resetDayOfMonth;
	}

	public function setResetDayOfMonth(?int $resetDayOfMonth) {
		$this->resetDayOfMonth = $resetDayOfMonth;
	}

	public function withResetDayOfMonth(?int $resetDayOfMonth): MissionGroupModelMaster {
		$this->resetDayOfMonth = $resetDayOfMonth;
		return $this;
	}

	public function getResetDayOfWeek(): ?string {
		return $this->resetDayOfWeek;
	}

	public function setResetDayOfWeek(?string $resetDayOfWeek) {
		$this->resetDayOfWeek = $resetDayOfWeek;
	}

	public function withResetDayOfWeek(?string $resetDayOfWeek): MissionGroupModelMaster {
		$this->resetDayOfWeek = $resetDayOfWeek;
		return $this;
	}

	public function getResetHour(): ?int {
		return $this->resetHour;
	}

	public function setResetHour(?int $resetHour) {
		$this->resetHour = $resetHour;
	}

	public function withResetHour(?int $resetHour): MissionGroupModelMaster {
		$this->resetHour = $resetHour;
		return $this;
	}

	public function getCompleteNotificationNamespaceId(): ?string {
		return $this->completeNotificationNamespaceId;
	}

	public function setCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId) {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
	}

	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): MissionGroupModelMaster {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): MissionGroupModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): MissionGroupModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?MissionGroupModelMaster {
        if ($data === null) {
            return null;
        }
        return (new MissionGroupModelMaster())
            ->withMissionGroupId(empty($data['missionGroupId']) ? null : $data['missionGroupId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withMetadata(empty($data['metadata']) ? null : $data['metadata'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withResetType(empty($data['resetType']) ? null : $data['resetType'])
            ->withResetDayOfMonth(empty($data['resetDayOfMonth']) ? null : $data['resetDayOfMonth'])
            ->withResetDayOfWeek(empty($data['resetDayOfWeek']) ? null : $data['resetDayOfWeek'])
            ->withResetHour(empty($data['resetHour']) ? null : $data['resetHour'])
            ->withCompleteNotificationNamespaceId(empty($data['completeNotificationNamespaceId']) ? null : $data['completeNotificationNamespaceId'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "missionGroupId" => $this->getMissionGroupId(),
            "name" => $this->getName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "completeNotificationNamespaceId" => $this->getCompleteNotificationNamespaceId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}