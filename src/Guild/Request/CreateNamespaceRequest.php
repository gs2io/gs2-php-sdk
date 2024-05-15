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
use Gs2\Guild\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
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
            ->withJoinNotification(array_key_exists('joinNotification', $data) && $data['joinNotification'] !== null ? NotificationSetting::fromJson($data['joinNotification']) : null)
            ->withLeaveNotification(array_key_exists('leaveNotification', $data) && $data['leaveNotification'] !== null ? NotificationSetting::fromJson($data['leaveNotification']) : null)
            ->withChangeMemberNotification(array_key_exists('changeMemberNotification', $data) && $data['changeMemberNotification'] !== null ? NotificationSetting::fromJson($data['changeMemberNotification']) : null)
            ->withReceiveRequestNotification(array_key_exists('receiveRequestNotification', $data) && $data['receiveRequestNotification'] !== null ? NotificationSetting::fromJson($data['receiveRequestNotification']) : null)
            ->withRemoveRequestNotification(array_key_exists('removeRequestNotification', $data) && $data['removeRequestNotification'] !== null ? NotificationSetting::fromJson($data['removeRequestNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "joinNotification" => $this->getJoinNotification() !== null ? $this->getJoinNotification()->toJson() : null,
            "leaveNotification" => $this->getLeaveNotification() !== null ? $this->getLeaveNotification()->toJson() : null,
            "changeMemberNotification" => $this->getChangeMemberNotification() !== null ? $this->getChangeMemberNotification()->toJson() : null,
            "receiveRequestNotification" => $this->getReceiveRequestNotification() !== null ? $this->getReceiveRequestNotification()->toJson() : null,
            "removeRequestNotification" => $this->getRemoveRequestNotification() !== null ? $this->getRemoveRequestNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}