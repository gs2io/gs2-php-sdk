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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for updateMissionGroupModelMaster: Update Mission Group Model Master
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#updatemissiongroupmodelmaster
 */
class UpdateMissionGroupModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Mission Group Model name */
    private $missionGroupName;
    /** @var string Metadata */
    private $metadata;
    /** @var string Description */
    private $description;
    /** @var string Reset timing */
    private $resetType;
    /** @var int Date to reset */
    private $resetDayOfMonth;
    /** @var string Day of the week to reset */
    private $resetDayOfWeek;
    /** @var int Hour of Reset */
    private $resetHour;
    /** @var int Base date and time for counting elapsed days */
    private $anchorTimestamp;
    /** @var int Number of days to reset */
    private $days;
    /** @var string Push notifications when mission tasks are accomplished */
    private $completeNotificationNamespaceId;
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateMissionGroupModelMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Mission Group Model name */
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
    /** @param string|null $missionGroupName Mission Group Model name */
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
    /**
     * @param string|null $missionGroupName Mission Group Model name
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withMissionGroupName(?string $missionGroupName): UpdateMissionGroupModelMasterRequest {
		$this->missionGroupName = $missionGroupName;
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withMetadata(?string $metadata): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withDescription(?string $description): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withResetType(?string $resetType): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withResetDayOfMonth(?int $resetDayOfMonth): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withResetDayOfWeek(?string $resetDayOfWeek): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withResetHour(?int $resetHour): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withAnchorTimestamp(?int $anchorTimestamp): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withDays(?int $days): UpdateMissionGroupModelMasterRequest {
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
     * @return UpdateMissionGroupModelMasterRequest
     */
	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): UpdateMissionGroupModelMasterRequest {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateMissionGroupModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateMissionGroupModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
            ->withMetadata(array_key_exists('metadata', $data) && $data['metadata'] !== null ? $data['metadata'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withResetType(array_key_exists('resetType', $data) && $data['resetType'] !== null ? $data['resetType'] : null)
            ->withResetDayOfMonth(array_key_exists('resetDayOfMonth', $data) && $data['resetDayOfMonth'] !== null ? $data['resetDayOfMonth'] : null)
            ->withResetDayOfWeek(array_key_exists('resetDayOfWeek', $data) && $data['resetDayOfWeek'] !== null ? $data['resetDayOfWeek'] : null)
            ->withResetHour(array_key_exists('resetHour', $data) && $data['resetHour'] !== null ? $data['resetHour'] : null)
            ->withAnchorTimestamp(array_key_exists('anchorTimestamp', $data) && $data['anchorTimestamp'] !== null ? $data['anchorTimestamp'] : null)
            ->withDays(array_key_exists('days', $data) && $data['days'] !== null ? $data['days'] : null)
            ->withCompleteNotificationNamespaceId(array_key_exists('completeNotificationNamespaceId', $data) && $data['completeNotificationNamespaceId'] !== null ? $data['completeNotificationNamespaceId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
            "metadata" => $this->getMetadata(),
            "description" => $this->getDescription(),
            "resetType" => $this->getResetType(),
            "resetDayOfMonth" => $this->getResetDayOfMonth(),
            "resetDayOfWeek" => $this->getResetDayOfWeek(),
            "resetHour" => $this->getResetHour(),
            "anchorTimestamp" => $this->getAnchorTimestamp(),
            "days" => $this->getDays(),
            "completeNotificationNamespaceId" => $this->getCompleteNotificationNamespaceId(),
        );
    }
}