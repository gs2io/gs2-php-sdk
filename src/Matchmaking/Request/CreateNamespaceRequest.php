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
use Gs2\Matchmaking\Model\TransactionSetting;
use Gs2\Matchmaking\Model\TransactionSettingV2;
use Gs2\Matchmaking\Model\ScriptSetting;
use Gs2\Matchmaking\Model\MobileNotificationMessage;
use Gs2\Matchmaking\Model\NotificationSetting;
use Gs2\Matchmaking\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/matchmaking/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Settings */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var bool Enable Rating */
    private $enableRating;
    /** @var string Disconnect Detection */
    private $enableDisconnectDetection;
    /** @var int Disconnect Detection Timeout (seconds) */
    private $disconnectDetectionTimeoutSeconds;
    /** @var string Create Gathering Trigger Type */
    private $createGatheringTriggerType;
    /** @var string GS2-Realtime Namespace to create rooms when creating a gathering */
    private $createGatheringTriggerRealtimeNamespaceId;
    /** @var string GS2-Script script GRN to be executed when creating a gathering */
    private $createGatheringTriggerScriptId;
    /** @var string Complete Matchmaking Trigger Type */
    private $completeMatchmakingTriggerType;
    /** @var string GS2-Realtime Namespace GRN to create rooms when matchmaking is complete */
    private $completeMatchmakingTriggerRealtimeNamespaceId;
    /** @var string GS2-Script script GRN to be executed when matchmaking is complete */
    private $completeMatchmakingTriggerScriptId;
    /** @var string Enable Season Rating Collaboration */
    private $enableCollaborateSeasonRating;
    /** @var string Season Rating Namespace GRN */
    private $collaborateSeasonRatingNamespaceId;
    /** @var int Season Rating Result TTL (seconds) */
    private $collaborateSeasonRatingTtl;
    /** @var ScriptSetting Script setting to be executed when the rating value changes */
    private $changeRatingScript;
    /** @var NotificationSetting Join Notification */
    private $joinNotification;
    /** @var NotificationSetting Leave Notification */
    private $leaveNotification;
    /** @var NotificationSetting Complete Notification */
    private $completeNotification;
    /** @var NotificationSetting Change Rating Notification */
    private $changeRatingNotification;
    /** @var LogSetting Log Output Setting */
    private $logSetting;
    /** @return string|null Namespace name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Namespace name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Namespace name
     * @return CreateNamespaceRequest
     */
	public function withName(?string $name): CreateNamespaceRequest {
		$this->name = $name;
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
     * @return CreateNamespaceRequest
     */
	public function withDescription(?string $description): CreateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
    /**
     * @return TransactionSetting|null Transaction Settings
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
     * @return CreateNamespaceRequest
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): CreateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
    /** @return TransactionSettingV2|null Transaction Setting (V2) */
	public function getTransactionSettingV2(): ?TransactionSettingV2 {
		return $this->transactionSettingV2;
	}
    /** @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2) */
	public function setTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2) {
		$this->transactionSettingV2 = $transactionSettingV2;
	}
    /**
     * @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2)
     * @return CreateNamespaceRequest
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): CreateNamespaceRequest {
		$this->transactionSettingV2 = $transactionSettingV2;
		return $this;
	}
    /** @return bool|null Enable Rating */
	public function getEnableRating(): ?bool {
		return $this->enableRating;
	}
    /** @param bool|null $enableRating Enable Rating */
	public function setEnableRating(?bool $enableRating) {
		$this->enableRating = $enableRating;
	}
    /**
     * @param bool|null $enableRating Enable Rating
     * @return CreateNamespaceRequest
     */
	public function withEnableRating(?bool $enableRating): CreateNamespaceRequest {
		$this->enableRating = $enableRating;
		return $this;
	}
    /** @return string|null Disconnect Detection */
	public function getEnableDisconnectDetection(): ?string {
		return $this->enableDisconnectDetection;
	}
    /** @param string|null $enableDisconnectDetection Disconnect Detection */
	public function setEnableDisconnectDetection(?string $enableDisconnectDetection) {
		$this->enableDisconnectDetection = $enableDisconnectDetection;
	}
    /**
     * @param string|null $enableDisconnectDetection Disconnect Detection
     * @return CreateNamespaceRequest
     */
	public function withEnableDisconnectDetection(?string $enableDisconnectDetection): CreateNamespaceRequest {
		$this->enableDisconnectDetection = $enableDisconnectDetection;
		return $this;
	}
    /** @return int|null Disconnect Detection Timeout (seconds) */
	public function getDisconnectDetectionTimeoutSeconds(): ?int {
		return $this->disconnectDetectionTimeoutSeconds;
	}
    /** @param int|null $disconnectDetectionTimeoutSeconds Disconnect Detection Timeout (seconds) */
	public function setDisconnectDetectionTimeoutSeconds(?int $disconnectDetectionTimeoutSeconds) {
		$this->disconnectDetectionTimeoutSeconds = $disconnectDetectionTimeoutSeconds;
	}
    /**
     * @param int|null $disconnectDetectionTimeoutSeconds Disconnect Detection Timeout (seconds)
     * @return CreateNamespaceRequest
     */
	public function withDisconnectDetectionTimeoutSeconds(?int $disconnectDetectionTimeoutSeconds): CreateNamespaceRequest {
		$this->disconnectDetectionTimeoutSeconds = $disconnectDetectionTimeoutSeconds;
		return $this;
	}
    /** @return string|null Create Gathering Trigger Type */
	public function getCreateGatheringTriggerType(): ?string {
		return $this->createGatheringTriggerType;
	}
    /** @param string|null $createGatheringTriggerType Create Gathering Trigger Type */
	public function setCreateGatheringTriggerType(?string $createGatheringTriggerType) {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
	}
    /**
     * @param string|null $createGatheringTriggerType Create Gathering Trigger Type
     * @return CreateNamespaceRequest
     */
	public function withCreateGatheringTriggerType(?string $createGatheringTriggerType): CreateNamespaceRequest {
		$this->createGatheringTriggerType = $createGatheringTriggerType;
		return $this;
	}
    /** @return string|null GS2-Realtime Namespace to create rooms when creating a gathering */
	public function getCreateGatheringTriggerRealtimeNamespaceId(): ?string {
		return $this->createGatheringTriggerRealtimeNamespaceId;
	}
    /** @param string|null $createGatheringTriggerRealtimeNamespaceId GS2-Realtime Namespace to create rooms when creating a gathering */
	public function setCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId) {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
	}
    /**
     * @param string|null $createGatheringTriggerRealtimeNamespaceId GS2-Realtime Namespace to create rooms when creating a gathering
     * @return CreateNamespaceRequest
     */
	public function withCreateGatheringTriggerRealtimeNamespaceId(?string $createGatheringTriggerRealtimeNamespaceId): CreateNamespaceRequest {
		$this->createGatheringTriggerRealtimeNamespaceId = $createGatheringTriggerRealtimeNamespaceId;
		return $this;
	}
    /** @return string|null GS2-Script script GRN to be executed when creating a gathering */
	public function getCreateGatheringTriggerScriptId(): ?string {
		return $this->createGatheringTriggerScriptId;
	}
    /** @param string|null $createGatheringTriggerScriptId GS2-Script script GRN to be executed when creating a gathering */
	public function setCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId) {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
	}
    /**
     * @param string|null $createGatheringTriggerScriptId GS2-Script script GRN to be executed when creating a gathering
     * @return CreateNamespaceRequest
     */
	public function withCreateGatheringTriggerScriptId(?string $createGatheringTriggerScriptId): CreateNamespaceRequest {
		$this->createGatheringTriggerScriptId = $createGatheringTriggerScriptId;
		return $this;
	}
    /** @return string|null Complete Matchmaking Trigger Type */
	public function getCompleteMatchmakingTriggerType(): ?string {
		return $this->completeMatchmakingTriggerType;
	}
    /** @param string|null $completeMatchmakingTriggerType Complete Matchmaking Trigger Type */
	public function setCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType) {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
	}
    /**
     * @param string|null $completeMatchmakingTriggerType Complete Matchmaking Trigger Type
     * @return CreateNamespaceRequest
     */
	public function withCompleteMatchmakingTriggerType(?string $completeMatchmakingTriggerType): CreateNamespaceRequest {
		$this->completeMatchmakingTriggerType = $completeMatchmakingTriggerType;
		return $this;
	}
    /** @return string|null GS2-Realtime Namespace GRN to create rooms when matchmaking is complete */
	public function getCompleteMatchmakingTriggerRealtimeNamespaceId(): ?string {
		return $this->completeMatchmakingTriggerRealtimeNamespaceId;
	}
    /** @param string|null $completeMatchmakingTriggerRealtimeNamespaceId GS2-Realtime Namespace GRN to create rooms when matchmaking is complete */
	public function setCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId) {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
	}
    /**
     * @param string|null $completeMatchmakingTriggerRealtimeNamespaceId GS2-Realtime Namespace GRN to create rooms when matchmaking is complete
     * @return CreateNamespaceRequest
     */
	public function withCompleteMatchmakingTriggerRealtimeNamespaceId(?string $completeMatchmakingTriggerRealtimeNamespaceId): CreateNamespaceRequest {
		$this->completeMatchmakingTriggerRealtimeNamespaceId = $completeMatchmakingTriggerRealtimeNamespaceId;
		return $this;
	}
    /** @return string|null GS2-Script script GRN to be executed when matchmaking is complete */
	public function getCompleteMatchmakingTriggerScriptId(): ?string {
		return $this->completeMatchmakingTriggerScriptId;
	}
    /** @param string|null $completeMatchmakingTriggerScriptId GS2-Script script GRN to be executed when matchmaking is complete */
	public function setCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId) {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
	}
    /**
     * @param string|null $completeMatchmakingTriggerScriptId GS2-Script script GRN to be executed when matchmaking is complete
     * @return CreateNamespaceRequest
     */
	public function withCompleteMatchmakingTriggerScriptId(?string $completeMatchmakingTriggerScriptId): CreateNamespaceRequest {
		$this->completeMatchmakingTriggerScriptId = $completeMatchmakingTriggerScriptId;
		return $this;
	}
    /** @return string|null Enable Season Rating Collaboration */
	public function getEnableCollaborateSeasonRating(): ?string {
		return $this->enableCollaborateSeasonRating;
	}
    /** @param string|null $enableCollaborateSeasonRating Enable Season Rating Collaboration */
	public function setEnableCollaborateSeasonRating(?string $enableCollaborateSeasonRating) {
		$this->enableCollaborateSeasonRating = $enableCollaborateSeasonRating;
	}
    /**
     * @param string|null $enableCollaborateSeasonRating Enable Season Rating Collaboration
     * @return CreateNamespaceRequest
     */
	public function withEnableCollaborateSeasonRating(?string $enableCollaborateSeasonRating): CreateNamespaceRequest {
		$this->enableCollaborateSeasonRating = $enableCollaborateSeasonRating;
		return $this;
	}
    /** @return string|null Season Rating Namespace GRN */
	public function getCollaborateSeasonRatingNamespaceId(): ?string {
		return $this->collaborateSeasonRatingNamespaceId;
	}
    /** @param string|null $collaborateSeasonRatingNamespaceId Season Rating Namespace GRN */
	public function setCollaborateSeasonRatingNamespaceId(?string $collaborateSeasonRatingNamespaceId) {
		$this->collaborateSeasonRatingNamespaceId = $collaborateSeasonRatingNamespaceId;
	}
    /**
     * @param string|null $collaborateSeasonRatingNamespaceId Season Rating Namespace GRN
     * @return CreateNamespaceRequest
     */
	public function withCollaborateSeasonRatingNamespaceId(?string $collaborateSeasonRatingNamespaceId): CreateNamespaceRequest {
		$this->collaborateSeasonRatingNamespaceId = $collaborateSeasonRatingNamespaceId;
		return $this;
	}
    /** @return int|null Season Rating Result TTL (seconds) */
	public function getCollaborateSeasonRatingTtl(): ?int {
		return $this->collaborateSeasonRatingTtl;
	}
    /** @param int|null $collaborateSeasonRatingTtl Season Rating Result TTL (seconds) */
	public function setCollaborateSeasonRatingTtl(?int $collaborateSeasonRatingTtl) {
		$this->collaborateSeasonRatingTtl = $collaborateSeasonRatingTtl;
	}
    /**
     * @param int|null $collaborateSeasonRatingTtl Season Rating Result TTL (seconds)
     * @return CreateNamespaceRequest
     */
	public function withCollaborateSeasonRatingTtl(?int $collaborateSeasonRatingTtl): CreateNamespaceRequest {
		$this->collaborateSeasonRatingTtl = $collaborateSeasonRatingTtl;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when the rating value changes */
	public function getChangeRatingScript(): ?ScriptSetting {
		return $this->changeRatingScript;
	}
    /** @param ScriptSetting|null $changeRatingScript Script setting to be executed when the rating value changes */
	public function setChangeRatingScript(?ScriptSetting $changeRatingScript) {
		$this->changeRatingScript = $changeRatingScript;
	}
    /**
     * @param ScriptSetting|null $changeRatingScript Script setting to be executed when the rating value changes
     * @return CreateNamespaceRequest
     */
	public function withChangeRatingScript(?ScriptSetting $changeRatingScript): CreateNamespaceRequest {
		$this->changeRatingScript = $changeRatingScript;
		return $this;
	}
    /** @return NotificationSetting|null Join Notification */
	public function getJoinNotification(): ?NotificationSetting {
		return $this->joinNotification;
	}
    /** @param NotificationSetting|null $joinNotification Join Notification */
	public function setJoinNotification(?NotificationSetting $joinNotification) {
		$this->joinNotification = $joinNotification;
	}
    /**
     * @param NotificationSetting|null $joinNotification Join Notification
     * @return CreateNamespaceRequest
     */
	public function withJoinNotification(?NotificationSetting $joinNotification): CreateNamespaceRequest {
		$this->joinNotification = $joinNotification;
		return $this;
	}
    /** @return NotificationSetting|null Leave Notification */
	public function getLeaveNotification(): ?NotificationSetting {
		return $this->leaveNotification;
	}
    /** @param NotificationSetting|null $leaveNotification Leave Notification */
	public function setLeaveNotification(?NotificationSetting $leaveNotification) {
		$this->leaveNotification = $leaveNotification;
	}
    /**
     * @param NotificationSetting|null $leaveNotification Leave Notification
     * @return CreateNamespaceRequest
     */
	public function withLeaveNotification(?NotificationSetting $leaveNotification): CreateNamespaceRequest {
		$this->leaveNotification = $leaveNotification;
		return $this;
	}
    /** @return NotificationSetting|null Complete Notification */
	public function getCompleteNotification(): ?NotificationSetting {
		return $this->completeNotification;
	}
    /** @param NotificationSetting|null $completeNotification Complete Notification */
	public function setCompleteNotification(?NotificationSetting $completeNotification) {
		$this->completeNotification = $completeNotification;
	}
    /**
     * @param NotificationSetting|null $completeNotification Complete Notification
     * @return CreateNamespaceRequest
     */
	public function withCompleteNotification(?NotificationSetting $completeNotification): CreateNamespaceRequest {
		$this->completeNotification = $completeNotification;
		return $this;
	}
    /** @return NotificationSetting|null Change Rating Notification */
	public function getChangeRatingNotification(): ?NotificationSetting {
		return $this->changeRatingNotification;
	}
    /** @param NotificationSetting|null $changeRatingNotification Change Rating Notification */
	public function setChangeRatingNotification(?NotificationSetting $changeRatingNotification) {
		$this->changeRatingNotification = $changeRatingNotification;
	}
    /**
     * @param NotificationSetting|null $changeRatingNotification Change Rating Notification
     * @return CreateNamespaceRequest
     */
	public function withChangeRatingNotification(?NotificationSetting $changeRatingNotification): CreateNamespaceRequest {
		$this->changeRatingNotification = $changeRatingNotification;
		return $this;
	}
    /** @return LogSetting|null Log Output Setting */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
    /** @param LogSetting|null $logSetting Log Output Setting */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
    /**
     * @param LogSetting|null $logSetting Log Output Setting
     * @return CreateNamespaceRequest
     */
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
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
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
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
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