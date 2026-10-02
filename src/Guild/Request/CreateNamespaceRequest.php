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

namespace Gs2\Guild\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Guild\Model\TransactionSetting;
use Gs2\Guild\Model\TransactionSettingV2;
use Gs2\Guild\Model\MobileNotificationMessage;
use Gs2\Guild\Model\NotificationSetting;
use Gs2\Guild\Model\ScriptSetting;
use Gs2\Guild\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/guild/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var NotificationSetting Guild Change Notification */
    private $changeNotification;
    /** @var NotificationSetting Member Join Notification */
    private $joinNotification;
    /** @var NotificationSetting Member Leave Notification */
    private $leaveNotification;
    /** @var NotificationSetting Member Change Notification */
    private $changeMemberNotification;
    /** @var bool Whether to ignore changes in metadata when issuing notifications when member metadata is updated */
    private $changeMemberNotificationIgnoreChangeMetadata;
    /** @var NotificationSetting Receive Request Notification */
    private $receiveRequestNotification;
    /** @var NotificationSetting Remove Request Notification */
    private $removeRequestNotification;
    /** @var ScriptSetting Script setting to execute when creating a Guild */
    private $createGuildScript;
    /** @var ScriptSetting Script setting to execute when updating a guild */
    private $updateGuildScript;
    /** @var ScriptSetting Script setting to execute when joining a guild */
    private $joinGuildScript;
    /** @var ScriptSetting Script setting to execute when receiving a guild join request */
    private $receiveJoinRequestScript;
    /** @var ScriptSetting Script setting to execute when leaving a guild */
    private $leaveGuildScript;
    /** @var ScriptSetting Script setting to execute when changing the role assigned to a member */
    private $changeRoleScript;
    /** @var ScriptSetting Script setting to execute when deleting a guild */
    private $deleteGuildScript;
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
     * @return TransactionSetting|null Transaction Setting
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
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
    /** @return NotificationSetting|null Guild Change Notification */
	public function getChangeNotification(): ?NotificationSetting {
		return $this->changeNotification;
	}
    /** @param NotificationSetting|null $changeNotification Guild Change Notification */
	public function setChangeNotification(?NotificationSetting $changeNotification) {
		$this->changeNotification = $changeNotification;
	}
    /**
     * @param NotificationSetting|null $changeNotification Guild Change Notification
     * @return CreateNamespaceRequest
     */
	public function withChangeNotification(?NotificationSetting $changeNotification): CreateNamespaceRequest {
		$this->changeNotification = $changeNotification;
		return $this;
	}
    /** @return NotificationSetting|null Member Join Notification */
	public function getJoinNotification(): ?NotificationSetting {
		return $this->joinNotification;
	}
    /** @param NotificationSetting|null $joinNotification Member Join Notification */
	public function setJoinNotification(?NotificationSetting $joinNotification) {
		$this->joinNotification = $joinNotification;
	}
    /**
     * @param NotificationSetting|null $joinNotification Member Join Notification
     * @return CreateNamespaceRequest
     */
	public function withJoinNotification(?NotificationSetting $joinNotification): CreateNamespaceRequest {
		$this->joinNotification = $joinNotification;
		return $this;
	}
    /** @return NotificationSetting|null Member Leave Notification */
	public function getLeaveNotification(): ?NotificationSetting {
		return $this->leaveNotification;
	}
    /** @param NotificationSetting|null $leaveNotification Member Leave Notification */
	public function setLeaveNotification(?NotificationSetting $leaveNotification) {
		$this->leaveNotification = $leaveNotification;
	}
    /**
     * @param NotificationSetting|null $leaveNotification Member Leave Notification
     * @return CreateNamespaceRequest
     */
	public function withLeaveNotification(?NotificationSetting $leaveNotification): CreateNamespaceRequest {
		$this->leaveNotification = $leaveNotification;
		return $this;
	}
    /** @return NotificationSetting|null Member Change Notification */
	public function getChangeMemberNotification(): ?NotificationSetting {
		return $this->changeMemberNotification;
	}
    /** @param NotificationSetting|null $changeMemberNotification Member Change Notification */
	public function setChangeMemberNotification(?NotificationSetting $changeMemberNotification) {
		$this->changeMemberNotification = $changeMemberNotification;
	}
    /**
     * @param NotificationSetting|null $changeMemberNotification Member Change Notification
     * @return CreateNamespaceRequest
     */
	public function withChangeMemberNotification(?NotificationSetting $changeMemberNotification): CreateNamespaceRequest {
		$this->changeMemberNotification = $changeMemberNotification;
		return $this;
	}
    /** @return bool|null Whether to ignore changes in metadata when issuing notifications when member metadata is updated */
	public function getChangeMemberNotificationIgnoreChangeMetadata(): ?bool {
		return $this->changeMemberNotificationIgnoreChangeMetadata;
	}
    /** @param bool|null $changeMemberNotificationIgnoreChangeMetadata Whether to ignore changes in metadata when issuing notifications when member metadata is updated */
	public function setChangeMemberNotificationIgnoreChangeMetadata(?bool $changeMemberNotificationIgnoreChangeMetadata) {
		$this->changeMemberNotificationIgnoreChangeMetadata = $changeMemberNotificationIgnoreChangeMetadata;
	}
    /**
     * @param bool|null $changeMemberNotificationIgnoreChangeMetadata Whether to ignore changes in metadata when issuing notifications when member metadata is updated
     * @return CreateNamespaceRequest
     */
	public function withChangeMemberNotificationIgnoreChangeMetadata(?bool $changeMemberNotificationIgnoreChangeMetadata): CreateNamespaceRequest {
		$this->changeMemberNotificationIgnoreChangeMetadata = $changeMemberNotificationIgnoreChangeMetadata;
		return $this;
	}
    /** @return NotificationSetting|null Receive Request Notification */
	public function getReceiveRequestNotification(): ?NotificationSetting {
		return $this->receiveRequestNotification;
	}
    /** @param NotificationSetting|null $receiveRequestNotification Receive Request Notification */
	public function setReceiveRequestNotification(?NotificationSetting $receiveRequestNotification) {
		$this->receiveRequestNotification = $receiveRequestNotification;
	}
    /**
     * @param NotificationSetting|null $receiveRequestNotification Receive Request Notification
     * @return CreateNamespaceRequest
     */
	public function withReceiveRequestNotification(?NotificationSetting $receiveRequestNotification): CreateNamespaceRequest {
		$this->receiveRequestNotification = $receiveRequestNotification;
		return $this;
	}
    /** @return NotificationSetting|null Remove Request Notification */
	public function getRemoveRequestNotification(): ?NotificationSetting {
		return $this->removeRequestNotification;
	}
    /** @param NotificationSetting|null $removeRequestNotification Remove Request Notification */
	public function setRemoveRequestNotification(?NotificationSetting $removeRequestNotification) {
		$this->removeRequestNotification = $removeRequestNotification;
	}
    /**
     * @param NotificationSetting|null $removeRequestNotification Remove Request Notification
     * @return CreateNamespaceRequest
     */
	public function withRemoveRequestNotification(?NotificationSetting $removeRequestNotification): CreateNamespaceRequest {
		$this->removeRequestNotification = $removeRequestNotification;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when creating a Guild */
	public function getCreateGuildScript(): ?ScriptSetting {
		return $this->createGuildScript;
	}
    /** @param ScriptSetting|null $createGuildScript Script setting to execute when creating a Guild */
	public function setCreateGuildScript(?ScriptSetting $createGuildScript) {
		$this->createGuildScript = $createGuildScript;
	}
    /**
     * @param ScriptSetting|null $createGuildScript Script setting to execute when creating a Guild
     * @return CreateNamespaceRequest
     */
	public function withCreateGuildScript(?ScriptSetting $createGuildScript): CreateNamespaceRequest {
		$this->createGuildScript = $createGuildScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when updating a guild */
	public function getUpdateGuildScript(): ?ScriptSetting {
		return $this->updateGuildScript;
	}
    /** @param ScriptSetting|null $updateGuildScript Script setting to execute when updating a guild */
	public function setUpdateGuildScript(?ScriptSetting $updateGuildScript) {
		$this->updateGuildScript = $updateGuildScript;
	}
    /**
     * @param ScriptSetting|null $updateGuildScript Script setting to execute when updating a guild
     * @return CreateNamespaceRequest
     */
	public function withUpdateGuildScript(?ScriptSetting $updateGuildScript): CreateNamespaceRequest {
		$this->updateGuildScript = $updateGuildScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when joining a guild */
	public function getJoinGuildScript(): ?ScriptSetting {
		return $this->joinGuildScript;
	}
    /** @param ScriptSetting|null $joinGuildScript Script setting to execute when joining a guild */
	public function setJoinGuildScript(?ScriptSetting $joinGuildScript) {
		$this->joinGuildScript = $joinGuildScript;
	}
    /**
     * @param ScriptSetting|null $joinGuildScript Script setting to execute when joining a guild
     * @return CreateNamespaceRequest
     */
	public function withJoinGuildScript(?ScriptSetting $joinGuildScript): CreateNamespaceRequest {
		$this->joinGuildScript = $joinGuildScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when receiving a guild join request */
	public function getReceiveJoinRequestScript(): ?ScriptSetting {
		return $this->receiveJoinRequestScript;
	}
    /** @param ScriptSetting|null $receiveJoinRequestScript Script setting to execute when receiving a guild join request */
	public function setReceiveJoinRequestScript(?ScriptSetting $receiveJoinRequestScript) {
		$this->receiveJoinRequestScript = $receiveJoinRequestScript;
	}
    /**
     * @param ScriptSetting|null $receiveJoinRequestScript Script setting to execute when receiving a guild join request
     * @return CreateNamespaceRequest
     */
	public function withReceiveJoinRequestScript(?ScriptSetting $receiveJoinRequestScript): CreateNamespaceRequest {
		$this->receiveJoinRequestScript = $receiveJoinRequestScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when leaving a guild */
	public function getLeaveGuildScript(): ?ScriptSetting {
		return $this->leaveGuildScript;
	}
    /** @param ScriptSetting|null $leaveGuildScript Script setting to execute when leaving a guild */
	public function setLeaveGuildScript(?ScriptSetting $leaveGuildScript) {
		$this->leaveGuildScript = $leaveGuildScript;
	}
    /**
     * @param ScriptSetting|null $leaveGuildScript Script setting to execute when leaving a guild
     * @return CreateNamespaceRequest
     */
	public function withLeaveGuildScript(?ScriptSetting $leaveGuildScript): CreateNamespaceRequest {
		$this->leaveGuildScript = $leaveGuildScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when changing the role assigned to a member */
	public function getChangeRoleScript(): ?ScriptSetting {
		return $this->changeRoleScript;
	}
    /** @param ScriptSetting|null $changeRoleScript Script setting to execute when changing the role assigned to a member */
	public function setChangeRoleScript(?ScriptSetting $changeRoleScript) {
		$this->changeRoleScript = $changeRoleScript;
	}
    /**
     * @param ScriptSetting|null $changeRoleScript Script setting to execute when changing the role assigned to a member
     * @return CreateNamespaceRequest
     */
	public function withChangeRoleScript(?ScriptSetting $changeRoleScript): CreateNamespaceRequest {
		$this->changeRoleScript = $changeRoleScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when deleting a guild */
	public function getDeleteGuildScript(): ?ScriptSetting {
		return $this->deleteGuildScript;
	}
    /** @param ScriptSetting|null $deleteGuildScript Script setting to execute when deleting a guild */
	public function setDeleteGuildScript(?ScriptSetting $deleteGuildScript) {
		$this->deleteGuildScript = $deleteGuildScript;
	}
    /**
     * @param ScriptSetting|null $deleteGuildScript Script setting to execute when deleting a guild
     * @return CreateNamespaceRequest
     */
	public function withDeleteGuildScript(?ScriptSetting $deleteGuildScript): CreateNamespaceRequest {
		$this->deleteGuildScript = $deleteGuildScript;
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
            ->withChangeNotification(array_key_exists('changeNotification', $data) && $data['changeNotification'] !== null ? NotificationSetting::fromJson($data['changeNotification']) : null)
            ->withJoinNotification(array_key_exists('joinNotification', $data) && $data['joinNotification'] !== null ? NotificationSetting::fromJson($data['joinNotification']) : null)
            ->withLeaveNotification(array_key_exists('leaveNotification', $data) && $data['leaveNotification'] !== null ? NotificationSetting::fromJson($data['leaveNotification']) : null)
            ->withChangeMemberNotification(array_key_exists('changeMemberNotification', $data) && $data['changeMemberNotification'] !== null ? NotificationSetting::fromJson($data['changeMemberNotification']) : null)
            ->withChangeMemberNotificationIgnoreChangeMetadata(array_key_exists('changeMemberNotificationIgnoreChangeMetadata', $data) ? $data['changeMemberNotificationIgnoreChangeMetadata'] : null)
            ->withReceiveRequestNotification(array_key_exists('receiveRequestNotification', $data) && $data['receiveRequestNotification'] !== null ? NotificationSetting::fromJson($data['receiveRequestNotification']) : null)
            ->withRemoveRequestNotification(array_key_exists('removeRequestNotification', $data) && $data['removeRequestNotification'] !== null ? NotificationSetting::fromJson($data['removeRequestNotification']) : null)
            ->withCreateGuildScript(array_key_exists('createGuildScript', $data) && $data['createGuildScript'] !== null ? ScriptSetting::fromJson($data['createGuildScript']) : null)
            ->withUpdateGuildScript(array_key_exists('updateGuildScript', $data) && $data['updateGuildScript'] !== null ? ScriptSetting::fromJson($data['updateGuildScript']) : null)
            ->withJoinGuildScript(array_key_exists('joinGuildScript', $data) && $data['joinGuildScript'] !== null ? ScriptSetting::fromJson($data['joinGuildScript']) : null)
            ->withReceiveJoinRequestScript(array_key_exists('receiveJoinRequestScript', $data) && $data['receiveJoinRequestScript'] !== null ? ScriptSetting::fromJson($data['receiveJoinRequestScript']) : null)
            ->withLeaveGuildScript(array_key_exists('leaveGuildScript', $data) && $data['leaveGuildScript'] !== null ? ScriptSetting::fromJson($data['leaveGuildScript']) : null)
            ->withChangeRoleScript(array_key_exists('changeRoleScript', $data) && $data['changeRoleScript'] !== null ? ScriptSetting::fromJson($data['changeRoleScript']) : null)
            ->withDeleteGuildScript(array_key_exists('deleteGuildScript', $data) && $data['deleteGuildScript'] !== null ? ScriptSetting::fromJson($data['deleteGuildScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "changeNotification" => $this->getChangeNotification() !== null ? $this->getChangeNotification()->toJson() : null,
            "joinNotification" => $this->getJoinNotification() !== null ? $this->getJoinNotification()->toJson() : null,
            "leaveNotification" => $this->getLeaveNotification() !== null ? $this->getLeaveNotification()->toJson() : null,
            "changeMemberNotification" => $this->getChangeMemberNotification() !== null ? $this->getChangeMemberNotification()->toJson() : null,
            "changeMemberNotificationIgnoreChangeMetadata" => $this->getChangeMemberNotificationIgnoreChangeMetadata(),
            "receiveRequestNotification" => $this->getReceiveRequestNotification() !== null ? $this->getReceiveRequestNotification()->toJson() : null,
            "removeRequestNotification" => $this->getRemoveRequestNotification() !== null ? $this->getRemoveRequestNotification()->toJson() : null,
            "createGuildScript" => $this->getCreateGuildScript() !== null ? $this->getCreateGuildScript()->toJson() : null,
            "updateGuildScript" => $this->getUpdateGuildScript() !== null ? $this->getUpdateGuildScript()->toJson() : null,
            "joinGuildScript" => $this->getJoinGuildScript() !== null ? $this->getJoinGuildScript()->toJson() : null,
            "receiveJoinRequestScript" => $this->getReceiveJoinRequestScript() !== null ? $this->getReceiveJoinRequestScript()->toJson() : null,
            "leaveGuildScript" => $this->getLeaveGuildScript() !== null ? $this->getLeaveGuildScript()->toJson() : null,
            "changeRoleScript" => $this->getChangeRoleScript() !== null ? $this->getChangeRoleScript()->toJson() : null,
            "deleteGuildScript" => $this->getDeleteGuildScript() !== null ? $this->getDeleteGuildScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}