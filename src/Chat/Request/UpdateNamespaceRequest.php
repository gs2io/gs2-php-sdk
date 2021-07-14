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

namespace Gs2\Chat\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Chat\Model\ScriptSetting;
use Gs2\Chat\Model\NotificationSetting;
use Gs2\Chat\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var bool */
    private $allowCreateRoom;
    /** @var ScriptSetting */
    private $postMessageScript;
    /** @var ScriptSetting */
    private $createRoomScript;
    /** @var ScriptSetting */
    private $deleteRoomScript;
    /** @var ScriptSetting */
    private $subscribeRoomScript;
    /** @var ScriptSetting */
    private $unsubscribeRoomScript;
    /** @var NotificationSetting */
    private $postNotification;
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

	public function getAllowCreateRoom(): ?bool {
		return $this->allowCreateRoom;
	}

	public function setAllowCreateRoom(?bool $allowCreateRoom) {
		$this->allowCreateRoom = $allowCreateRoom;
	}

	public function withAllowCreateRoom(?bool $allowCreateRoom): UpdateNamespaceRequest {
		$this->allowCreateRoom = $allowCreateRoom;
		return $this;
	}

	public function getPostMessageScript(): ?ScriptSetting {
		return $this->postMessageScript;
	}

	public function setPostMessageScript(?ScriptSetting $postMessageScript) {
		$this->postMessageScript = $postMessageScript;
	}

	public function withPostMessageScript(?ScriptSetting $postMessageScript): UpdateNamespaceRequest {
		$this->postMessageScript = $postMessageScript;
		return $this;
	}

	public function getCreateRoomScript(): ?ScriptSetting {
		return $this->createRoomScript;
	}

	public function setCreateRoomScript(?ScriptSetting $createRoomScript) {
		$this->createRoomScript = $createRoomScript;
	}

	public function withCreateRoomScript(?ScriptSetting $createRoomScript): UpdateNamespaceRequest {
		$this->createRoomScript = $createRoomScript;
		return $this;
	}

	public function getDeleteRoomScript(): ?ScriptSetting {
		return $this->deleteRoomScript;
	}

	public function setDeleteRoomScript(?ScriptSetting $deleteRoomScript) {
		$this->deleteRoomScript = $deleteRoomScript;
	}

	public function withDeleteRoomScript(?ScriptSetting $deleteRoomScript): UpdateNamespaceRequest {
		$this->deleteRoomScript = $deleteRoomScript;
		return $this;
	}

	public function getSubscribeRoomScript(): ?ScriptSetting {
		return $this->subscribeRoomScript;
	}

	public function setSubscribeRoomScript(?ScriptSetting $subscribeRoomScript) {
		$this->subscribeRoomScript = $subscribeRoomScript;
	}

	public function withSubscribeRoomScript(?ScriptSetting $subscribeRoomScript): UpdateNamespaceRequest {
		$this->subscribeRoomScript = $subscribeRoomScript;
		return $this;
	}

	public function getUnsubscribeRoomScript(): ?ScriptSetting {
		return $this->unsubscribeRoomScript;
	}

	public function setUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript) {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
	}

	public function withUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript): UpdateNamespaceRequest {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
		return $this;
	}

	public function getPostNotification(): ?NotificationSetting {
		return $this->postNotification;
	}

	public function setPostNotification(?NotificationSetting $postNotification) {
		$this->postNotification = $postNotification;
	}

	public function withPostNotification(?NotificationSetting $postNotification): UpdateNamespaceRequest {
		$this->postNotification = $postNotification;
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
            ->withAllowCreateRoom(empty($data['allowCreateRoom']) ? null : $data['allowCreateRoom'])
            ->withPostMessageScript(empty($data['postMessageScript']) ? null : ScriptSetting::fromJson($data['postMessageScript']))
            ->withCreateRoomScript(empty($data['createRoomScript']) ? null : ScriptSetting::fromJson($data['createRoomScript']))
            ->withDeleteRoomScript(empty($data['deleteRoomScript']) ? null : ScriptSetting::fromJson($data['deleteRoomScript']))
            ->withSubscribeRoomScript(empty($data['subscribeRoomScript']) ? null : ScriptSetting::fromJson($data['subscribeRoomScript']))
            ->withUnsubscribeRoomScript(empty($data['unsubscribeRoomScript']) ? null : ScriptSetting::fromJson($data['unsubscribeRoomScript']))
            ->withPostNotification(empty($data['postNotification']) ? null : NotificationSetting::fromJson($data['postNotification']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "allowCreateRoom" => $this->getAllowCreateRoom(),
            "postMessageScript" => $this->getPostMessageScript() !== null ? $this->getPostMessageScript()->toJson() : null,
            "createRoomScript" => $this->getCreateRoomScript() !== null ? $this->getCreateRoomScript()->toJson() : null,
            "deleteRoomScript" => $this->getDeleteRoomScript() !== null ? $this->getDeleteRoomScript()->toJson() : null,
            "subscribeRoomScript" => $this->getSubscribeRoomScript() !== null ? $this->getSubscribeRoomScript()->toJson() : null,
            "unsubscribeRoomScript" => $this->getUnsubscribeRoomScript() !== null ? $this->getUnsubscribeRoomScript()->toJson() : null,
            "postNotification" => $this->getPostNotification() !== null ? $this->getPostNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}