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
use Gs2\Matchmaking\Model\ScriptSetting;
use Gs2\Matchmaking\Model\NotificationSetting;
use Gs2\Matchmaking\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var bool */
    private $enableRating;
    /** @var string */
    private $enableDisconnectDetection;
    /** @var int */
    private $disconnectDetectionTimeoutSeconds;
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
    /** @var string */
    private $enableCollaborateSeasonRating;
    /** @var string */
    private $collaborateSeasonRatingNamespaceId;
    /** @var int */
    private $collaborateSeasonRatingTtl;
    /** @var ScriptSetting */
    private $changeRatingScript;
    /** @var NotificationSetting */
    private $joinNotification;
    /** @var NotificationSetting */
    private $leaveNotification;
    /** @var NotificationSetting */
    private $completeNotification;
    /** @var NotificationSetting */
    private $changeRatingNotification;
    /** @var LogSetting */
    private $logSetting;
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): CreateNamespaceRequest {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): CreateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
	public function getEnableRating(): ?bool {
		return $this->enableRating;
	}
	public function setEnableRating(?bool $enableRating) {
		$this->enableRating = $enableRating;
	}
	public function withEnableRating(?bool $enableRating): CreateNamespaceRequest {
		$this->enableRating = $enableRating;
		return $this;
	}
	public function getEnableDisconnectDetection(): ?string {
		return $this->enableDisconnectDetection;
	}
	public function setEnableDisconnectDetection(?string $enableDisconnectDetection) {
		$this->enableDisconnectDetection = $enableDisconnectDetection;
	}
	public function withEnableDisconnectDetection(?string $enableDisconnectDetection): CreateNamespaceRequest {
		$this->enableDisconnectDetection = $enableDisconnectDetection;
		return $this;
	}
	public function getDisconnectDetectionTimeoutSeconds(): ?int {
		return $this->disconnectDetectionTimeoutSeconds;
	}
	public function setDisconnectDetectionTimeoutSeconds(?int $disconnectDetectionTimeoutSeconds) {
		$this->disconnectDetectionTimeoutSeconds = $disconnectDetectionTimeoutSeconds;
	}
	public function withDisconnectDetectionTimeoutSeconds(?int $disconnectDetectionTimeoutSeconds): CreateNamespaceRequest {
		$this->disconnectDetectionTimeoutSeconds = $disconnectDetectionTimeoutSeconds;
		return $this;
	}
	public function getCreateGatheringTriggerType(): ?string {
		return $this->createGatheringTriggerType;
	}
	public function setCreateGatheringTriggerType(?string $createGatheringTriggerType) {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
	}
	public function withCreateGatheringTriggerType(?string $createGatheringTriggerType): CreateNamespaceRequest {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
		return $this;
	}
	public function getCreateGatheringTriggerRealtimeNamespaceId(): ?string {
		return $this->createGatheringTriggerRealtimeNamespaceId;
	}
	public function setCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId) {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
	}
	public function withCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId): CreateNamespaceRequest {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
		return $this;
	}
	public function getCreateGatheringTriggerScriptId(): ?string {
		return $this->createGatheringTriggerScriptId;
	}
	public function setCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId) {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
	}
	public function withCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId): CreateNamespaceRequest {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
		return $this;
	}
	public function getCompleteMatchmakingTriggerType(): ?string {
		return $this->completeMatchmakingTriggerType;
	}
	public function setCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType) {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
	}
	public function withCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType): CreateNamespaceRequest {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
		return $this;
	}
	public function getCompleteMatchmakingTriggerRealtimeNamespaceId(): ?string {
		return $this->completeMatchmakingTriggerRealtimeNamespaceId;
	}
	public function setCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId) {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
	}
	public function withCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId): CreateNamespaceRequest {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
		return $this;
	}
	public function getCompleteMatchmakingTriggerScriptId(): ?string {
		return $this->completeMatchmakingTriggerScriptId;
	}
	public function setCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId) {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
	}
	public function withCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId): CreateNamespaceRequest {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
		return $this;
	}
	public function getEnableCollaborateSeasonRating(): ?string {
		return $this->enableCollaborateSeasonRating;
	}
	public function setEnableCollaborateSeasonRating(?string $enableCollaborateSeasonRating) {
		$this->enableCollaborateSeasonRating = $enableCollaborateSeasonRating;
	}
	public function withEnableCollaborateSeasonRating(?string $enableCollaborateSeasonRating): CreateNamespaceRequest {
		$this->enableCollaborateSeasonRating = $enableCollaborateSeasonRating;
		return $this;
	}
	public function getCollaborateSeasonRatingNamespaceId(): ?string {
		return $this->collaborateSeasonRatingNamespaceId;
	}
	public function setCollaborateSeasonRatingNamespaceId(?string $collaborateSeasonRatingNamespaceId) {
		$this->collaborateSeasonRatingNamespaceId = $collaborateSeasonRatingNamespaceId;
	}
	public function withCollaborateSeasonRatingNamespaceId(?string $collaborateSeasonRatingNamespaceId): CreateNamespaceRequest {
		$this->collaborateSeasonRatingNamespaceId = $collaborateSeasonRatingNamespaceId;
		return $this;
	}
	public function getCollaborateSeasonRatingTtl(): ?int {
		return $this->collaborateSeasonRatingTtl;
	}
	public function setCollaborateSeasonRatingTtl(?int $collaborateSeasonRatingTtl) {
		$this->collaborateSeasonRatingTtl = $collaborateSeasonRatingTtl;
	}
	public function withCollaborateSeasonRatingTtl(?int $collaborateSeasonRatingTtl): CreateNamespaceRequest {
		$this->collaborateSeasonRatingTtl = $collaborateSeasonRatingTtl;
		return $this;
	}
	public function getChangeRatingScript(): ?ScriptSetting {
		return $this->changeRatingScript;
	}
	public function setChangeRatingScript(?ScriptSetting $changeRatingScript) {
		$this->changeRatingScript = $changeRatingScript;
	}
	public function withChangeRatingScript(?ScriptSetting $changeRatingScript): CreateNamespaceRequest {
		$this->changeRatingScript = $changeRatingScript;
		return $this;
	}
	public function getJoinNotification(): ?NotificationSetting {
		return $this->joinNotification;
	}
	public function setJoinNotification(?NotificationSetting $joinNotification) {
		$this->joinNotification = $joinNotification;
	}
	public function withJoinNotification(?NotificationSetting $joinNotification): CreateNamespaceRequest {
		$this->joinNotification = $joinNotification;
		return $this;
	}
	public function getLeaveNotification(): ?NotificationSetting {
		return $this->leaveNotification;
	}
	public function setLeaveNotification(?NotificationSetting $leaveNotification) {
		$this->leaveNotification = $leaveNotification;
	}
	public function withLeaveNotification(?NotificationSetting $leaveNotification): CreateNamespaceRequest {
		$this->leaveNotification = $leaveNotification;
		return $this;
	}
	public function getCompleteNotification(): ?NotificationSetting {
		return $this->completeNotification;
	}
	public function setCompleteNotification(?NotificationSetting $completeNotification) {
		$this->completeNotification = $completeNotification;
	}
	public function withCompleteNotification(?NotificationSetting $completeNotification): CreateNamespaceRequest {
		$this->completeNotification = $completeNotification;
		return $this;
	}
	public function getChangeRatingNotification(): ?NotificationSetting {
		return $this->changeRatingNotification;
	}
	public function setChangeRatingNotification(?NotificationSetting $changeRatingNotification) {
		$this->changeRatingNotification = $changeRatingNotification;
	}
	public function withChangeRatingNotification(?NotificationSetting $changeRatingNotification): CreateNamespaceRequest {
		$this->changeRatingNotification = $changeRatingNotification;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): CreateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateNamespaceRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withEnableRating(array_key_exists('enableRating', $data) ? $data['enableRating'] : null)
            ->withEnableDisconnectDetection(array_key_exists('enableDisconnectDetection', $data) && $data['enableDisconnectDetection'] !== null ? $data['enableDisconnectDetection'] : null)
            ->withDisconnectDetectionTimeoutSeconds(array_key_exists('disconnectDetectionTimeoutSeconds', $data) && $data['disconnectDetectionTimeoutSeconds'] !== null ? $data['disconnectDetectionTimeoutSeconds'] : null)
            ->withCreateGatheringTriggerType(array_key_exists('createGatheringTriggerType', $data) && $data['createGatheringTriggerType'] !== null ? $data['createGatheringTriggerType'] : null)
            ->withCreateGatheringTriggerRealtimeNamespaceId(array_key_exists('createGatheringTriggerRealtimeNamespaceId', $data) && $data['createGatheringTriggerRealtimeNamespaceId'] !== null ? $data['createGatheringTriggerRealtimeNamespaceId'] : null)
            ->withCreateGatheringTriggerScriptId(array_key_exists('createGatheringTriggerScriptId', $data) && $data['createGatheringTriggerScriptId'] !== null ? $data['createGatheringTriggerScriptId'] : null)
            ->withCompleteMatchmakingTriggerType(array_key_exists('completeMatchmakingTriggerType', $data) && $data['completeMatchmakingTriggerType'] !== null ? $data['completeMatchmakingTriggerType'] : null)
            ->withCompleteMatchmakingTriggerRealtimeNamespaceId(array_key_exists('completeMatchmakingTriggerRealtimeNamespaceId', $data) && $data['completeMatchmakingTriggerRealtimeNamespaceId'] !== null ? $data['completeMatchmakingTriggerRealtimeNamespaceId'] : null)
            ->withCompleteMatchmakingTriggerScriptId(array_key_exists('completeMatchmakingTriggerScriptId', $data) && $data['completeMatchmakingTriggerScriptId'] !== null ? $data['completeMatchmakingTriggerScriptId'] : null)
            ->withEnableCollaborateSeasonRating(array_key_exists('enableCollaborateSeasonRating', $data) && $data['enableCollaborateSeasonRating'] !== null ? $data['enableCollaborateSeasonRating'] : null)
            ->withCollaborateSeasonRatingNamespaceId(array_key_exists('collaborateSeasonRatingNamespaceId', $data) && $data['collaborateSeasonRatingNamespaceId'] !== null ? $data['collaborateSeasonRatingNamespaceId'] : null)
            ->withCollaborateSeasonRatingTtl(array_key_exists('collaborateSeasonRatingTtl', $data) && $data['collaborateSeasonRatingTtl'] !== null ? $data['collaborateSeasonRatingTtl'] : null)
            ->withChangeRatingScript(array_key_exists('changeRatingScript', $data) && $data['changeRatingScript'] !== null ? ScriptSetting::fromJson($data['changeRatingScript']) : null)
            ->withJoinNotification(array_key_exists('joinNotification', $data) && $data['joinNotification'] !== null ? NotificationSetting::fromJson($data['joinNotification']) : null)
            ->withLeaveNotification(array_key_exists('leaveNotification', $data) && $data['leaveNotification'] !== null ? NotificationSetting::fromJson($data['leaveNotification']) : null)
            ->withCompleteNotification(array_key_exists('completeNotification', $data) && $data['completeNotification'] !== null ? NotificationSetting::fromJson($data['completeNotification']) : null)
            ->withChangeRatingNotification(array_key_exists('changeRatingNotification', $data) && $data['changeRatingNotification'] !== null ? NotificationSetting::fromJson($data['changeRatingNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "enableRating" => $this->getEnableRating(),
            "enableDisconnectDetection" => $this->getEnableDisconnectDetection(),
            "disconnectDetectionTimeoutSeconds" => $this->getDisconnectDetectionTimeoutSeconds(),
            "createGatheringTriggerType" => $this->getCreateGatheringTriggerType(),
            "createGatheringTriggerRealtimeNamespaceId" => $this->getCreateGatheringTriggerRealtimeNamespaceId(),
            "createGatheringTriggerScriptId" => $this->getCreateGatheringTriggerScriptId(),
            "completeMatchmakingTriggerType" => $this->getCompleteMatchmakingTriggerType(),
            "completeMatchmakingTriggerRealtimeNamespaceId" => $this->getCompleteMatchmakingTriggerRealtimeNamespaceId(),
            "completeMatchmakingTriggerScriptId" => $this->getCompleteMatchmakingTriggerScriptId(),
            "enableCollaborateSeasonRating" => $this->getEnableCollaborateSeasonRating(),
            "collaborateSeasonRatingNamespaceId" => $this->getCollaborateSeasonRatingNamespaceId(),
            "collaborateSeasonRatingTtl" => $this->getCollaborateSeasonRatingTtl(),
            "changeRatingScript" => $this->getChangeRatingScript() !== null ? $this->getChangeRatingScript()->toJson() : null,
            "joinNotification" => $this->getJoinNotification() !== null ? $this->getJoinNotification()->toJson() : null,
            "leaveNotification" => $this->getLeaveNotification() !== null ? $this->getLeaveNotification()->toJson() : null,
            "completeNotification" => $this->getCompleteNotification() !== null ? $this->getCompleteNotification()->toJson() : null,
            "changeRatingNotification" => $this->getChangeRatingNotification() !== null ? $this->getChangeRatingNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}