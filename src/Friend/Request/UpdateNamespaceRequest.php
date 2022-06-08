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

namespace Gs2\Friend\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Friend\Model\ScriptSetting;
use Gs2\Friend\Model\NotificationSetting;
use Gs2\Friend\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var ScriptSetting */
    private $followScript;
    /** @var ScriptSetting */
    private $unfollowScript;
    /** @var ScriptSetting */
    private $sendRequestScript;
    /** @var ScriptSetting */
    private $cancelRequestScript;
    /** @var ScriptSetting */
    private $acceptRequestScript;
    /** @var ScriptSetting */
    private $rejectRequestScript;
    /** @var ScriptSetting */
    private $deleteFriendScript;
    /** @var ScriptSetting */
    private $updateProfileScript;
    /** @var NotificationSetting */
    private $followNotification;
    /** @var NotificationSetting */
    private $receiveRequestNotification;
    /** @var NotificationSetting */
    private $acceptRequestNotification;
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
	public function getFollowScript(): ?ScriptSetting {
		return $this->followScript;
	}
	public function setFollowScript(?ScriptSetting $followScript) {
		$this->followScript = $followScript;
	}
	public function withFollowScript(?ScriptSetting $followScript): UpdateNamespaceRequest {
		$this->followScript = $followScript;
		return $this;
	}
	public function getUnfollowScript(): ?ScriptSetting {
		return $this->unfollowScript;
	}
	public function setUnfollowScript(?ScriptSetting $unfollowScript) {
		$this->unfollowScript = $unfollowScript;
	}
	public function withUnfollowScript(?ScriptSetting $unfollowScript): UpdateNamespaceRequest {
		$this->unfollowScript = $unfollowScript;
		return $this;
	}
	public function getSendRequestScript(): ?ScriptSetting {
		return $this->sendRequestScript;
	}
	public function setSendRequestScript(?ScriptSetting $sendRequestScript) {
		$this->sendRequestScript = $sendRequestScript;
	}
	public function withSendRequestScript(?ScriptSetting $sendRequestScript): UpdateNamespaceRequest {
		$this->sendRequestScript = $sendRequestScript;
		return $this;
	}
	public function getCancelRequestScript(): ?ScriptSetting {
		return $this->cancelRequestScript;
	}
	public function setCancelRequestScript(?ScriptSetting $cancelRequestScript) {
		$this->cancelRequestScript = $cancelRequestScript;
	}
	public function withCancelRequestScript(?ScriptSetting $cancelRequestScript): UpdateNamespaceRequest {
		$this->cancelRequestScript = $cancelRequestScript;
		return $this;
	}
	public function getAcceptRequestScript(): ?ScriptSetting {
		return $this->acceptRequestScript;
	}
	public function setAcceptRequestScript(?ScriptSetting $acceptRequestScript) {
		$this->acceptRequestScript = $acceptRequestScript;
	}
	public function withAcceptRequestScript(?ScriptSetting $acceptRequestScript): UpdateNamespaceRequest {
		$this->acceptRequestScript = $acceptRequestScript;
		return $this;
	}
	public function getRejectRequestScript(): ?ScriptSetting {
		return $this->rejectRequestScript;
	}
	public function setRejectRequestScript(?ScriptSetting $rejectRequestScript) {
		$this->rejectRequestScript = $rejectRequestScript;
	}
	public function withRejectRequestScript(?ScriptSetting $rejectRequestScript): UpdateNamespaceRequest {
		$this->rejectRequestScript = $rejectRequestScript;
		return $this;
	}
	public function getDeleteFriendScript(): ?ScriptSetting {
		return $this->deleteFriendScript;
	}
	public function setDeleteFriendScript(?ScriptSetting $deleteFriendScript) {
		$this->deleteFriendScript = $deleteFriendScript;
	}
	public function withDeleteFriendScript(?ScriptSetting $deleteFriendScript): UpdateNamespaceRequest {
		$this->deleteFriendScript = $deleteFriendScript;
		return $this;
	}
	public function getUpdateProfileScript(): ?ScriptSetting {
		return $this->updateProfileScript;
	}
	public function setUpdateProfileScript(?ScriptSetting $updateProfileScript) {
		$this->updateProfileScript = $updateProfileScript;
	}
	public function withUpdateProfileScript(?ScriptSetting $updateProfileScript): UpdateNamespaceRequest {
		$this->updateProfileScript = $updateProfileScript;
		return $this;
	}
	public function getFollowNotification(): ?NotificationSetting {
		return $this->followNotification;
	}
	public function setFollowNotification(?NotificationSetting $followNotification) {
		$this->followNotification = $followNotification;
	}
	public function withFollowNotification(?NotificationSetting $followNotification): UpdateNamespaceRequest {
		$this->followNotification = $followNotification;
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
	public function getAcceptRequestNotification(): ?NotificationSetting {
		return $this->acceptRequestNotification;
	}
	public function setAcceptRequestNotification(?NotificationSetting $acceptRequestNotification) {
		$this->acceptRequestNotification = $acceptRequestNotification;
	}
	public function withAcceptRequestNotification(?NotificationSetting $acceptRequestNotification): UpdateNamespaceRequest {
		$this->acceptRequestNotification = $acceptRequestNotification;
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
            ->withFollowScript(array_key_exists('followScript', $data) && $data['followScript'] !== null ? ScriptSetting::fromJson($data['followScript']) : null)
            ->withUnfollowScript(array_key_exists('unfollowScript', $data) && $data['unfollowScript'] !== null ? ScriptSetting::fromJson($data['unfollowScript']) : null)
            ->withSendRequestScript(array_key_exists('sendRequestScript', $data) && $data['sendRequestScript'] !== null ? ScriptSetting::fromJson($data['sendRequestScript']) : null)
            ->withCancelRequestScript(array_key_exists('cancelRequestScript', $data) && $data['cancelRequestScript'] !== null ? ScriptSetting::fromJson($data['cancelRequestScript']) : null)
            ->withAcceptRequestScript(array_key_exists('acceptRequestScript', $data) && $data['acceptRequestScript'] !== null ? ScriptSetting::fromJson($data['acceptRequestScript']) : null)
            ->withRejectRequestScript(array_key_exists('rejectRequestScript', $data) && $data['rejectRequestScript'] !== null ? ScriptSetting::fromJson($data['rejectRequestScript']) : null)
            ->withDeleteFriendScript(array_key_exists('deleteFriendScript', $data) && $data['deleteFriendScript'] !== null ? ScriptSetting::fromJson($data['deleteFriendScript']) : null)
            ->withUpdateProfileScript(array_key_exists('updateProfileScript', $data) && $data['updateProfileScript'] !== null ? ScriptSetting::fromJson($data['updateProfileScript']) : null)
            ->withFollowNotification(array_key_exists('followNotification', $data) && $data['followNotification'] !== null ? NotificationSetting::fromJson($data['followNotification']) : null)
            ->withReceiveRequestNotification(array_key_exists('receiveRequestNotification', $data) && $data['receiveRequestNotification'] !== null ? NotificationSetting::fromJson($data['receiveRequestNotification']) : null)
            ->withAcceptRequestNotification(array_key_exists('acceptRequestNotification', $data) && $data['acceptRequestNotification'] !== null ? NotificationSetting::fromJson($data['acceptRequestNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "followScript" => $this->getFollowScript() !== null ? $this->getFollowScript()->toJson() : null,
            "unfollowScript" => $this->getUnfollowScript() !== null ? $this->getUnfollowScript()->toJson() : null,
            "sendRequestScript" => $this->getSendRequestScript() !== null ? $this->getSendRequestScript()->toJson() : null,
            "cancelRequestScript" => $this->getCancelRequestScript() !== null ? $this->getCancelRequestScript()->toJson() : null,
            "acceptRequestScript" => $this->getAcceptRequestScript() !== null ? $this->getAcceptRequestScript()->toJson() : null,
            "rejectRequestScript" => $this->getRejectRequestScript() !== null ? $this->getRejectRequestScript()->toJson() : null,
            "deleteFriendScript" => $this->getDeleteFriendScript() !== null ? $this->getDeleteFriendScript()->toJson() : null,
            "updateProfileScript" => $this->getUpdateProfileScript() !== null ? $this->getUpdateProfileScript()->toJson() : null,
            "followNotification" => $this->getFollowNotification() !== null ? $this->getFollowNotification()->toJson() : null,
            "receiveRequestNotification" => $this->getReceiveRequestNotification() !== null ? $this->getReceiveRequestNotification()->toJson() : null,
            "acceptRequestNotification" => $this->getAcceptRequestNotification() !== null ? $this->getAcceptRequestNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}