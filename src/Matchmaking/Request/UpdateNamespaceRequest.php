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

namespace Gs2\Matchmaking\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Matchmaking\Model\NotificationSetting;
use Gs2\Matchmaking\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var bool */
    private $enableRating;
    /** @var string */
    private $createGatheringTriggerType;
    /** @var string */
    private $createGatheringTriggerRealtimeNamespaceId;
    /** @var string */
    private $createGatheringTriggerScriptId;
    /** @var string */
    private $completeMatchmakingTriggerType;
    /** @var string */
    private $completeMatchmakingTriggerRealtimeNamespaceId;
    /** @var string */
    private $completeMatchmakingTriggerScriptId;
    /** @var NotificationSetting */
    private $joinNotification;
    /** @var NotificationSetting */
    private $leaveNotification;
    /** @var NotificationSetting */
    private $completeNotification;
    /** @var LogSetting */
    private $logSetting;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}

	public function getEnableRating(): ?bool {
		return $this->enableRating;
	}

	public function setEnableRating(?bool $enableRating) {
		$this->enableRating = $enableRating;
	}

	public function withEnableRating(?bool $enableRating): UpdateNamespaceRequest {
		$this->enableRating = $enableRating;
		return $this;
	}

	public function getCreateGatheringTriggerType(): ?string {
		return $this->createGatheringTriggerType;
	}

	public function setCreateGatheringTriggerType(?string $createGatheringTriggerType) {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
	}

	public function withCreateGatheringTriggerType(?string $createGatheringTriggerType): UpdateNamespaceRequest {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
		return $this;
	}

	public function getCreateGatheringTriggerRealtimeNamespaceId(): ?string {
		return $this->createGatheringTriggerRealtimeNamespaceId;
	}

	public function setCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId) {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
	}

	public function withCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId): UpdateNamespaceRequest {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
		return $this;
	}

	public function getCreateGatheringTriggerScriptId(): ?string {
		return $this->createGatheringTriggerScriptId;
	}

	public function setCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId) {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
	}

	public function withCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId): UpdateNamespaceRequest {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
		return $this;
	}

	public function getCompleteMatchmakingTriggerType(): ?string {
		return $this->completeMatchmakingTriggerType;
	}

	public function setCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType) {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
	}

	public function withCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType): UpdateNamespaceRequest {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
		return $this;
	}

	public function getCompleteMatchmakingTriggerRealtimeNamespaceId(): ?string {
		return $this->completeMatchmakingTriggerRealtimeNamespaceId;
	}

	public function setCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId) {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
	}

	public function withCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId): UpdateNamespaceRequest {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
		return $this;
	}

	public function getCompleteMatchmakingTriggerScriptId(): ?string {
		return $this->completeMatchmakingTriggerScriptId;
	}

	public function setCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId) {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
	}

	public function withCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId): UpdateNamespaceRequest {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
		return $this;
	}

	public function getJoinNotification(): ?NotificationSetting {
		return $this->joinNotification;
	}

	public function setJoinNotification(?NotificationSetting $joinNotification) {
		$this->joinNotification = $joinNotification;
	}

	public function withJoinNotification(?NotificationSetting $joinNotification): UpdateNamespaceRequest {
		$this->joinNotification = $joinNotification;
		return $this;
	}

	public function getLeaveNotification(): ?NotificationSetting {
		return $this->leaveNotification;
	}

	public function setLeaveNotification(?NotificationSetting $leaveNotification) {
		$this->leaveNotification = $leaveNotification;
	}

	public function withLeaveNotification(?NotificationSetting $leaveNotification): UpdateNamespaceRequest {
		$this->leaveNotification = $leaveNotification;
		return $this;
	}

	public function getCompleteNotification(): ?NotificationSetting {
		return $this->completeNotification;
	}

	public function setCompleteNotification(?NotificationSetting $completeNotification) {
		$this->completeNotification = $completeNotification;
	}

	public function withCompleteNotification(?NotificationSetting $completeNotification): UpdateNamespaceRequest {
		$this->completeNotification = $completeNotification;
		return $this;
	}

	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	public function withLogSetting(?LogSetting $logSetting): UpdateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withEnableRating(empty($data['enableRating']) ? null : $data['enableRating'])
            ->withCreateGatheringTriggerType(empty($data['createGatheringTriggerType']) ? null : $data['createGatheringTriggerType'])
            ->withCreateGatheringTriggerRealtimeNamespaceId(empty($data['createGatheringTriggerRealtimeNamespaceId']) ? null : $data['createGatheringTriggerRealtimeNamespaceId'])
            ->withCreateGatheringTriggerScriptId(empty($data['createGatheringTriggerScriptId']) ? null : $data['createGatheringTriggerScriptId'])
            ->withCompleteMatchmakingTriggerType(empty($data['completeMatchmakingTriggerType']) ? null : $data['completeMatchmakingTriggerType'])
            ->withCompleteMatchmakingTriggerRealtimeNamespaceId(empty($data['completeMatchmakingTriggerRealtimeNamespaceId']) ? null : $data['completeMatchmakingTriggerRealtimeNamespaceId'])
            ->withCompleteMatchmakingTriggerScriptId(empty($data['completeMatchmakingTriggerScriptId']) ? null : $data['completeMatchmakingTriggerScriptId'])
            ->withJoinNotification(empty($data['joinNotification']) ? null : NotificationSetting::fromJson($data['joinNotification']))
            ->withLeaveNotification(empty($data['leaveNotification']) ? null : NotificationSetting::fromJson($data['leaveNotification']))
            ->withCompleteNotification(empty($data['completeNotification']) ? null : NotificationSetting::fromJson($data['completeNotification']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "enableRating" => $this->getEnableRating(),
            "createGatheringTriggerType" => $this->getCreateGatheringTriggerType(),
            "createGatheringTriggerRealtimeNamespaceId" => $this->getCreateGatheringTriggerRealtimeNamespaceId(),
            "createGatheringTriggerScriptId" => $this->getCreateGatheringTriggerScriptId(),
            "completeMatchmakingTriggerType" => $this->getCompleteMatchmakingTriggerType(),
            "completeMatchmakingTriggerRealtimeNamespaceId" => $this->getCompleteMatchmakingTriggerRealtimeNamespaceId(),
            "completeMatchmakingTriggerScriptId" => $this->getCompleteMatchmakingTriggerScriptId(),
            "joinNotification" => $this->getJoinNotification() !== null ? $this->getJoinNotification()->toJson() : null,
            "leaveNotification" => $this->getLeaveNotification() !== null ? $this->getLeaveNotification()->toJson() : null,
            "completeNotification" => $this->getCompleteNotification() !== null ? $this->getCompleteNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}