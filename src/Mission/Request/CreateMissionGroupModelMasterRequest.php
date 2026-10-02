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
 * Request for createMissionGroupModelMaster: Create Mission Group Model Master
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#createmissiongroupmodelmaster
 */
class CreateMissionGroupModelMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Mission Group Model name */
    private $name;
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateMissionGroupModelMasterRequest {
		$this->namespaceName = $namespaceName;
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withName(?string $name): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withMetadata(?string $metadata): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withDescription(?string $description): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withResetType(?string $resetType): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withResetDayOfMonth(?int $resetDayOfMonth): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withResetDayOfWeek(?string $resetDayOfWeek): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withResetHour(?int $resetHour): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withAnchorTimestamp(?int $anchorTimestamp): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withDays(?int $days): CreateMissionGroupModelMasterRequest {
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
     * @return CreateMissionGroupModelMasterRequest
     */
	public function withCompleteNotificationNamespaceId(?string $completeNotificationNamespaceId): CreateMissionGroupModelMasterRequest {
		$this->completeNotificationNamespaceId = $completeNotificationNamespaceId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateMissionGroupModelMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateMissionGroupModelMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
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
        );
    }
}