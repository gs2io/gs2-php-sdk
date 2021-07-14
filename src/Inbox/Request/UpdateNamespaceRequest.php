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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Inbox\Model\ScriptSetting;
use Gs2\Inbox\Model\NotificationSetting;
use Gs2\Inbox\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var bool */
    private $isAutomaticDeletingEnabled;
    /** @var ScriptSetting */
    private $receiveMessageScript;
    /** @var ScriptSetting */
    private $readMessageScript;
    /** @var ScriptSetting */
    private $deleteMessageScript;
    /** @var string */
    private $queueNamespaceId;
    /** @var string */
    private $keyId;
    /** @var NotificationSetting */
    private $receiveNotification;
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

	public function getIsAutomaticDeletingEnabled(): ?bool {
		return $this->isAutomaticDeletingEnabled;
	}

	public function setIsAutomaticDeletingEnabled(?bool $isAutomaticDeletingEnabled) {
		$this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
	}

	public function withIsAutomaticDeletingEnabled(?bool $isAutomaticDeletingEnabled): UpdateNamespaceRequest {
		$this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
		return $this;
	}

	public function getReceiveMessageScript(): ?ScriptSetting {
		return $this->receiveMessageScript;
	}

	public function setReceiveMessageScript(?ScriptSetting $receiveMessageScript) {
		$this->receiveMessageScript = $receiveMessageScript;
	}

	public function withReceiveMessageScript(?ScriptSetting $receiveMessageScript): UpdateNamespaceRequest {
		$this->receiveMessageScript = $receiveMessageScript;
		return $this;
	}

	public function getReadMessageScript(): ?ScriptSetting {
		return $this->readMessageScript;
	}

	public function setReadMessageScript(?ScriptSetting $readMessageScript) {
		$this->readMessageScript = $readMessageScript;
	}

	public function withReadMessageScript(?ScriptSetting $readMessageScript): UpdateNamespaceRequest {
		$this->readMessageScript = $readMessageScript;
		return $this;
	}

	public function getDeleteMessageScript(): ?ScriptSetting {
		return $this->deleteMessageScript;
	}

	public function setDeleteMessageScript(?ScriptSetting $deleteMessageScript) {
		$this->deleteMessageScript = $deleteMessageScript;
	}

	public function withDeleteMessageScript(?ScriptSetting $deleteMessageScript): UpdateNamespaceRequest {
		$this->deleteMessageScript = $deleteMessageScript;
		return $this;
	}

	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	public function withQueueNamespaceId(?string $queueNamespaceId): UpdateNamespaceRequest {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): UpdateNamespaceRequest {
		$this->keyId = $keyId;
		return $this;
	}

	public function getReceiveNotification(): ?NotificationSetting {
		return $this->receiveNotification;
	}

	public function setReceiveNotification(?NotificationSetting $receiveNotification) {
		$this->receiveNotification = $receiveNotification;
	}

	public function withReceiveNotification(?NotificationSetting $receiveNotification): UpdateNamespaceRequest {
		$this->receiveNotification = $receiveNotification;
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
            ->withIsAutomaticDeletingEnabled(empty($data['isAutomaticDeletingEnabled']) ? null : $data['isAutomaticDeletingEnabled'])
            ->withReceiveMessageScript(empty($data['receiveMessageScript']) ? null : ScriptSetting::fromJson($data['receiveMessageScript']))
            ->withReadMessageScript(empty($data['readMessageScript']) ? null : ScriptSetting::fromJson($data['readMessageScript']))
            ->withDeleteMessageScript(empty($data['deleteMessageScript']) ? null : ScriptSetting::fromJson($data['deleteMessageScript']))
            ->withQueueNamespaceId(empty($data['queueNamespaceId']) ? null : $data['queueNamespaceId'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId'])
            ->withReceiveNotification(empty($data['receiveNotification']) ? null : NotificationSetting::fromJson($data['receiveNotification']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "isAutomaticDeletingEnabled" => $this->getIsAutomaticDeletingEnabled(),
            "receiveMessageScript" => $this->getReceiveMessageScript() !== null ? $this->getReceiveMessageScript()->toJson() : null,
            "readMessageScript" => $this->getReadMessageScript() !== null ? $this->getReadMessageScript()->toJson() : null,
            "deleteMessageScript" => $this->getDeleteMessageScript() !== null ? $this->getDeleteMessageScript()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
            "receiveNotification" => $this->getReceiveNotification() !== null ? $this->getReceiveNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}