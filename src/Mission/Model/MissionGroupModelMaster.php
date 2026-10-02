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
 * Mission Group Model Master
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#missiongroupmodelmaster
 */
class MissionGroupModelMaster implements IModel {
	/**
     * @var string Mission Group Model Master GRN
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
     * @var string Description
	 */
	private $description;
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
     * @var int Base date and time for counting elapsed days
	 */
	private $anchorTimestamp;
	/**
     * @var int Number of days to reset
	 */
	private $days;
	/**
     * @var string Push notifications when mission tasks are accomplished
	 */
	private $completeNotificationNamespaceId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Mission Group Model Master GRN */
	public function getMissionGroupId(): ?string {
		return $this->missionGroupId;
	}
    /** @param string|null $missionGroupId Mission Group Model Master GRN */
	public function setMissionGroupId(?string $missionGroupId) {
		$this->missionGroupId = $missionGroupId;
	}
    /**
     * @param string|null $missionGroupId Mission Group Model Master GRN
     * @return MissionGroupModelMaster
     */
	public function withMissionGroupId(?string $missionGroupId): MissionGroupModelMaster {
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
     * @return MissionGroupModelMaster
     */
	public function withName(?string $name): MissionGroupModelMaster {
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
     * @return MissionGroupModelMaster
     */
	public function withMetadata(?string $metadata): MissionGroupModelMaster {
		$this->metadata = $metadata;
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
     * @return MissionGroupModelMaster
     */
	public function withDescription(?string $description): MissionGroupModelMaster {
		$this->description = $description;
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
     * @return MissionGroupModelMaster
     */
	public function withResetType(?string $resetType): MissionGroupModelMaster {
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
     * @return MissionGroupModelMaster
     */
	public function withResetDayOfMonth(?int $resetDayOfMonth): MissionGroupModelMaster {
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
     * @return MissionGroupModelMaster
     */
	public function withResetDayOfWeek(?string $resetDayOfWeek): MissionGroupModelMaster {
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
     * @return MissionGroupModelMaster
     */
	public function withResetHour(?int $resetHour): MissionGroupModelMaster {
		$this->resetHour = $resetHour;
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
     * @return MissionGroupModelMaster
     */
	public function withAnchorTimestamp(?int $anchorTimestamp): MissionGroupModelMaster {
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
     * @return MissionGroupModelMaster
     */
	public function withDays(?int $days): MissionGroupModelMaster {
		$this->days = $days;
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
     * @return MissionGroupModelMaster
     */
	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): MissionGroupModelMaster {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return MissionGroupModelMaster
     */
	public function withCreatedAt(?int $createdAt): MissionGroupModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return MissionGroupModelMaster
     */
	public function withUpdatedAt(?int $updatedAt): MissionGroupModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return MissionGroupModelMaster
     */
	public function withRevision(?int $revision): MissionGroupModelMaster {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?MissionGroupModelMaster {
        if ($data === null) {
            return null;
        }
        return (new MissionGroupModelMaster())
            ->withMissionGroupId(array_key_exists('missionGroupId', $data) && $data['missionGroupId'] !== null ? $data['missionGroupId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withAnchorTimestamp(array_key_exists('anchorTimestamp', $data) && $data['anchorTimestamp'] !== null ? $data['anchorTimestamp'] : null)
            ->withDays(array_key_exists('days', $data) && $data['days'] !== null ? $data['days'] : null)
            ->withCompleteNotificationNamespaceId(array_key_exists('completeNotificationNamespaceId', $data) && $data['completeNotificationNamespaceId'] !== null ? $data['completeNotificationNamespaceId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "anchorTimestamp" => $this->getAnchorTimestamp(),
            "days" => $this->getDays(),
            "completeNotificationNamespaceId" => $this->getCompleteNotificationNamespaceId(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}