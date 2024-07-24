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

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
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
    private $joinGuildScript;
    /** @var ScriptSetting */
    private $leaveGuildScript;
    /** @var ScriptSetting */
    private $changeRoleScript;
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
	public function getChangeMemberNotification(): ?NotificationSetting {
		return $this->changeMemberNotification;
	}
	public function setChangeMemberNotification(?NotificationSetting $changeMemberNotification) {
		$this->changeMemberNotification = $changeMemberNotification;
	}
	public function withChangeMemberNotification(?NotificationSetting $changeMemberNotification): UpdateNamespaceRequest {
		$this->changeMemberNotification = $changeMemberNotification;
		return $this;
	}
	public function getReceiveRequestNotification(): ?NotificationSetting {
		return $this->receiveRequestNotification;
	}
	public function setReceiveRequestNotification(?NotificationSetting $receiveRequestNotification) {
		$this->receiveRequestNotification = $receiveRequestNotification;
	}
	public function withReceiveRequestNotification(?NotificationSetting $receiveRequestNotification): UpdateNamespaceRequest {
		$this->receiveRequestNotification = $receiveRequestNotification;
		return $this;
	}
	public function getRemoveRequestNotification(): ?NotificationSetting {
		return $this->removeRequestNotification;
	}
	public function setRemoveRequestNotification(?NotificationSetting $removeRequestNotification) {
		$this->removeRequestNotification = $removeRequestNotification;
	}
	public function withRemoveRequestNotification(?NotificationSetting $removeRequestNotification): UpdateNamespaceRequest {
		$this->removeRequestNotification = $removeRequestNotification;
		return $this;
	}
	public function getCreateGuildScript(): ?ScriptSetting {
		return $this->createGuildScript;
	}
	public function setCreateGuildScript(?ScriptSetting $createGuildScript) {
		$this->createGuildScript = $createGuildScript;
	}
	public function withCreateGuildScript(?ScriptSetting $createGuildScript): UpdateNamespaceRequest {
		$this->createGuildScript = $createGuildScript;
		return $this;
	}
	public function getJoinGuildScript(): ?ScriptSetting {
		return $this->joinGuildScript;
	}
	public function setJoinGuildScript(?ScriptSetting $joinGuildScript) {
		$this->joinGuildScript = $joinGuildScript;
	}
	public function withJoinGuildScript(?ScriptSetting $joinGuildScript): UpdateNamespaceRequest {
		$this->joinGuildScript = $joinGuildScript;
		return $this;
	}
	public function getLeaveGuildScript(): ?ScriptSetting {
		return $this->leaveGuildScript;
	}
	public function setLeaveGuildScript(?ScriptSetting $leaveGuildScript) {
		$this->leaveGuildScript = $leaveGuildScript;
	}
	public function withLeaveGuildScript(?ScriptSetting $leaveGuildScript): UpdateNamespaceRequest {
		$this->leaveGuildScript = $leaveGuildScript;
		return $this;
	}
	public function getChangeRoleScript(): ?ScriptSetting {
		return $this->changeRoleScript;
	}
	public function setChangeRoleScript(?ScriptSetting $changeRoleScript) {
		$this->changeRoleScript = $changeRoleScript;
	}
	public function withChangeRoleScript(?ScriptSetting $changeRoleScript): UpdateNamespaceRequest {
		$this->changeRoleScript = $changeRoleScript;
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
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withJoinNotification(array_key_exists('joinNotification', $data) && $data['joinNotification'] !== null ? NotificationSetting::fromJson($data['joinNotification']) : null)
            ->withLeaveNotification(array_key_exists('leaveNotification', $data) && $data['leaveNotification'] !== null ? NotificationSetting::fromJson($data['leaveNotification']) : null)
            ->withChangeMemberNotification(array_key_exists('changeMemberNotification', $data) && $data['changeMemberNotification'] !== null ? NotificationSetting::fromJson($data['changeMemberNotification']) : null)
            ->withReceiveRequestNotification(array_key_exists('receiveRequestNotification', $data) && $data['receiveRequestNotification'] !== null ? NotificationSetting::fromJson($data['receiveRequestNotification']) : null)
            ->withRemoveRequestNotification(array_key_exists('removeRequestNotification', $data) && $data['removeRequestNotification'] !== null ? NotificationSetting::fromJson($data['removeRequestNotification']) : null)
            ->withCreateGuildScript(array_key_exists('createGuildScript', $data) && $data['createGuildScript'] !== null ? ScriptSetting::fromJson($data['createGuildScript']) : null)
            ->withJoinGuildScript(array_key_exists('joinGuildScript', $data) && $data['joinGuildScript'] !== null ? ScriptSetting::fromJson($data['joinGuildScript']) : null)
            ->withLeaveGuildScript(array_key_exists('leaveGuildScript', $data) && $data['leaveGuildScript'] !== null ? ScriptSetting::fromJson($data['leaveGuildScript']) : null)
            ->withChangeRoleScript(array_key_exists('changeRoleScript', $data) && $data['changeRoleScript'] !== null ? ScriptSetting::fromJson($data['changeRoleScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "joinNotification" => $this->getJoinNotification() !== null ? $this->getJoinNotification()->toJson() : null,
            "leaveNotification" => $this->getLeaveNotification() !== null ? $this->getLeaveNotification()->toJson() : null,
            "changeMemberNotification" => $this->getChangeMemberNotification() !== null ? $this->getChangeMemberNotification()->toJson() : null,
            "receiveRequestNotification" => $this->getReceiveRequestNotification() !== null ? $this->getReceiveRequestNotification()->toJson() : null,
            "removeRequestNotification" => $this->getRemoveRequestNotification() !== null ? $this->getRemoveRequestNotification()->toJson() : null,
            "createGuildScript" => $this->getCreateGuildScript() !== null ? $this->getCreateGuildScript()->toJson() : null,
            "joinGuildScript" => $this->getJoinGuildScript() !== null ? $this->getJoinGuildScript()->toJson() : null,
            "leaveGuildScript" => $this->getLeaveGuildScript() !== null ? $this->getLeaveGuildScript()->toJson() : null,
            "changeRoleScript" => $this->getChangeRoleScript() !== null ? $this->getChangeRoleScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}