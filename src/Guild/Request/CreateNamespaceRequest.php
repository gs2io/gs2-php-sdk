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
use Gs2\Guild\Model\NotificationSetting;
use Gs2\Guild\Model\ScriptSetting;
use Gs2\Guild\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var NotificationSetting */
    private $changeNotification;
    /** @var NotificationSetting */
    private $joinNotification;
    /** @var NotificationSetting */
    private $leaveNotification;
    /** @var NotificationSetting */
    private $changeMemberNotification;
    /** @var NotificationSetting */
    private $receiveRequestNotification;
    /** @var NotificationSetting */
    private $removeRequestNotification;
    /** @var ScriptSetting */
    private $createGuildScript;
    /** @var ScriptSetting */
    private $updateGuildScript;
    /** @var ScriptSetting */
    private $joinGuildScript;
    /** @var ScriptSetting */
    private $receiveJoinRequestScript;
    /** @var ScriptSetting */
    private $leaveGuildScript;
    /** @var ScriptSetting */
    private $changeRoleScript;
    /** @var ScriptSetting */
    private $deleteGuildScript;
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
	public function getChangeNotification(): ?NotificationSetting {
		return $this->changeNotification;
	}
	public function setChangeNotification(?NotificationSetting $changeNotification) {
		$this->changeNotification = $changeNotification;
	}
	public function withChangeNotification(?NotificationSetting $changeNotification): CreateNamespaceRequest {
		$this->changeNotification = $changeNotification;
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
	public function getChangeMemberNotification(): ?NotificationSetting {
		return $this->changeMemberNotification;
	}
	public function setChangeMemberNotification(?NotificationSetting $changeMemberNotification) {
		$this->changeMemberNotification = $changeMemberNotification;
	}
	public function withChangeMemberNotification(?NotificationSetting $changeMemberNotification): CreateNamespaceRequest {
		$this->changeMemberNotification = $changeMemberNotification;
		return $this;
	}
	public function getReceiveRequestNotification(): ?NotificationSetting {
		return $this->receiveRequestNotification;
	}
	public function setReceiveRequestNotification(?NotificationSetting $receiveRequestNotification) {
		$this->receiveRequestNotification = $receiveRequestNotification;
	}
	public function withReceiveRequestNotification(?NotificationSetting $receiveRequestNotification): CreateNamespaceRequest {
		$this->receiveRequestNotification = $receiveRequestNotification;
		return $this;
	}
	public function getRemoveRequestNotification(): ?NotificationSetting {
		return $this->removeRequestNotification;
	}
	public function setRemoveRequestNotification(?NotificationSetting $removeRequestNotification) {
		$this->removeRequestNotification = $removeRequestNotification;
	}
	public function withRemoveRequestNotification(?NotificationSetting $removeRequestNotification): CreateNamespaceRequest {
		$this->removeRequestNotification = $removeRequestNotification;
		return $this;
	}
	public function getCreateGuildScript(): ?ScriptSetting {
		return $this->createGuildScript;
	}
	public function setCreateGuildScript(?ScriptSetting $createGuildScript) {
		$this->createGuildScript = $createGuildScript;
	}
	public function withCreateGuildScript(?ScriptSetting $createGuildScript): CreateNamespaceRequest {
		$this->createGuildScript = $createGuildScript;
		return $this;
	}
	public function getUpdateGuildScript(): ?ScriptSetting {
		return $this->updateGuildScript;
	}
	public function setUpdateGuildScript(?ScriptSetting $updateGuildScript) {
		$this->updateGuildScript = $updateGuildScript;
	}
	public function withUpdateGuildScript(?ScriptSetting $updateGuildScript): CreateNamespaceRequest {
		$this->updateGuildScript = $updateGuildScript;
		return $this;
	}
	public function getJoinGuildScript(): ?ScriptSetting {
		return $this->joinGuildScript;
	}
	public function setJoinGuildScript(?ScriptSetting $joinGuildScript) {
		$this->joinGuildScript = $joinGuildScript;
	}
	public function withJoinGuildScript(?ScriptSetting $joinGuildScript): CreateNamespaceRequest {
		$this->joinGuildScript = $joinGuildScript;
		return $this;
	}
	public function getReceiveJoinRequestScript(): ?ScriptSetting {
		return $this->receiveJoinRequestScript;
	}
	public function setReceiveJoinRequestScript(?ScriptSetting $receiveJoinRequestScript) {
		$this->receiveJoinRequestScript = $receiveJoinRequestScript;
	}
	public function withReceiveJoinRequestScript(?ScriptSetting $receiveJoinRequestScript): CreateNamespaceRequest {
		$this->receiveJoinRequestScript = $receiveJoinRequestScript;
		return $this;
	}
	public function getLeaveGuildScript(): ?ScriptSetting {
		return $this->leaveGuildScript;
	}
	public function setLeaveGuildScript(?ScriptSetting $leaveGuildScript) {
		$this->leaveGuildScript = $leaveGuildScript;
	}
	public function withLeaveGuildScript(?ScriptSetting $leaveGuildScript): CreateNamespaceRequest {
		$this->leaveGuildScript = $leaveGuildScript;
		return $this;
	}
	public function getChangeRoleScript(): ?ScriptSetting {
		return $this->changeRoleScript;
	}
	public function setChangeRoleScript(?ScriptSetting $changeRoleScript) {
		$this->changeRoleScript = $changeRoleScript;
	}
	public function withChangeRoleScript(?ScriptSetting $changeRoleScript): CreateNamespaceRequest {
		$this->changeRoleScript = $changeRoleScript;
		return $this;
	}
	public function getDeleteGuildScript(): ?ScriptSetting {
		return $this->deleteGuildScript;
	}
	public function setDeleteGuildScript(?ScriptSetting $deleteGuildScript) {
		$this->deleteGuildScript = $deleteGuildScript;
	}
	public function withDeleteGuildScript(?ScriptSetting $deleteGuildScript): CreateNamespaceRequest {
		$this->deleteGuildScript = $deleteGuildScript;
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
            ->withChangeNotification(array_key_exists('changeNotification', $data) && $data['changeNotification'] !== null ? NotificationSetting::fromJson($data['changeNotification']) : null)
            ->withJoinNotification(array_key_exists('joinNotification', $data) && $data['joinNotification'] !== null ? NotificationSetting::fromJson($data['joinNotification']) : null)
            ->withLeaveNotification(array_key_exists('leaveNotification', $data) && $data['leaveNotification'] !== null ? NotificationSetting::fromJson($data['leaveNotification']) : null)
            ->withChangeMemberNotification(array_key_exists('changeMemberNotification', $data) && $data['changeMemberNotification'] !== null ? NotificationSetting::fromJson($data['changeMemberNotification']) : null)
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
            "changeNotification" => $this->getChangeNotification() !== null ? $this->getChangeNotification()->toJson() : null,
            "joinNotification" => $this->getJoinNotification() !== null ? $this->getJoinNotification()->toJson() : null,
            "leaveNotification" => $this->getLeaveNotification() !== null ? $this->getLeaveNotification()->toJson() : null,
            "changeMemberNotification" => $this->getChangeMemberNotification() !== null ? $this->getChangeMemberNotification()->toJson() : null,
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