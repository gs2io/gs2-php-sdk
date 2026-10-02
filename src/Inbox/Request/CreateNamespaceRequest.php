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
use Gs2\Inbox\Model\TransactionSetting;
use Gs2\Inbox\Model\TransactionSettingV2;
use Gs2\Inbox\Model\ScriptSetting;
use Gs2\Inbox\Model\MobileNotificationMessage;
use Gs2\Inbox\Model\NotificationSetting;
use Gs2\Inbox\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/inbox/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var bool Automatic Deletion */
    private $isAutomaticDeletingEnabled;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var ScriptSetting Script setting to be executed when a message is received */
    private $receiveMessageScript;
    /** @var ScriptSetting Script setting to be executed when a message is opened */
    private $readMessageScript;
    /** @var ScriptSetting Script setting to be executed when a message is deleted */
    private $deleteMessageScript;
    /** @var NotificationSetting Receive Notification */
    private $receiveNotification;
    /** @var LogSetting Log Output Setting */
    private $logSetting;
    /** @var string GS2-JobQueue Namespace GRN used to execute transactions */
    private $queueNamespaceId;
    /** @var string GS2-Key Namespace used to issue transactions */
    private $keyId;
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
    /** @return bool|null Automatic Deletion */
	public function getIsAutomaticDeletingEnabled(): ?bool {
		return $this->isAutomaticDeletingEnabled;
	}
    /** @param bool|null $isAutomaticDeletingEnabled Automatic Deletion */
	public function setIsAutomaticDeletingEnabled(?bool $isAutomaticDeletingEnabled) {
		$this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
	}
    /**
     * @param bool|null $isAutomaticDeletingEnabled Automatic Deletion
     * @return CreateNamespaceRequest
     */
	public function withIsAutomaticDeletingEnabled(?bool $isAutomaticDeletingEnabled): CreateNamespaceRequest {
		$this->isAutomaticDeletingEnabled = $isAutomaticDeletingEnabled;
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
    /** @return ScriptSetting|null Script setting to be executed when a message is received */
	public function getReceiveMessageScript(): ?ScriptSetting {
		return $this->receiveMessageScript;
	}
    /** @param ScriptSetting|null $receiveMessageScript Script setting to be executed when a message is received */
	public function setReceiveMessageScript(?ScriptSetting $receiveMessageScript) {
		$this->receiveMessageScript = $receiveMessageScript;
	}
    /**
     * @param ScriptSetting|null $receiveMessageScript Script setting to be executed when a message is received
     * @return CreateNamespaceRequest
     */
	public function withReceiveMessageScript(?ScriptSetting $receiveMessageScript): CreateNamespaceRequest {
		$this->receiveMessageScript = $receiveMessageScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a message is opened */
	public function getReadMessageScript(): ?ScriptSetting {
		return $this->readMessageScript;
	}
    /** @param ScriptSetting|null $readMessageScript Script setting to be executed when a message is opened */
	public function setReadMessageScript(?ScriptSetting $readMessageScript) {
		$this->readMessageScript = $readMessageScript;
	}
    /**
     * @param ScriptSetting|null $readMessageScript Script setting to be executed when a message is opened
     * @return CreateNamespaceRequest
     */
	public function withReadMessageScript(?ScriptSetting $readMessageScript): CreateNamespaceRequest {
		$this->readMessageScript = $readMessageScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a message is deleted */
	public function getDeleteMessageScript(): ?ScriptSetting {
		return $this->deleteMessageScript;
	}
    /** @param ScriptSetting|null $deleteMessageScript Script setting to be executed when a message is deleted */
	public function setDeleteMessageScript(?ScriptSetting $deleteMessageScript) {
		$this->deleteMessageScript = $deleteMessageScript;
	}
    /**
     * @param ScriptSetting|null $deleteMessageScript Script setting to be executed when a message is deleted
     * @return CreateNamespaceRequest
     */
	public function withDeleteMessageScript(?ScriptSetting $deleteMessageScript): CreateNamespaceRequest {
		$this->deleteMessageScript = $deleteMessageScript;
		return $this;
	}
    /** @return NotificationSetting|null Receive Notification */
	public function getReceiveNotification(): ?NotificationSetting {
		return $this->receiveNotification;
	}
    /** @param NotificationSetting|null $receiveNotification Receive Notification */
	public function setReceiveNotification(?NotificationSetting $receiveNotification) {
		$this->receiveNotification = $receiveNotification;
	}
    /**
     * @param NotificationSetting|null $receiveNotification Receive Notification
     * @return CreateNamespaceRequest
     */
	public function withReceiveNotification(?NotificationSetting $receiveNotification): CreateNamespaceRequest {
		$this->receiveNotification = $receiveNotification;
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
    /**
     * @return string|null GS2-JobQueue Namespace GRN used to execute transactions
     * @deprecated
     */
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}
    /**
     * @param string|null $queueNamespaceId GS2-JobQueue Namespace GRN used to execute transactions
     * @deprecated
     */
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}
    /**
     * @param string|null $queueNamespaceId GS2-JobQueue Namespace GRN used to execute transactions
     * @return CreateNamespaceRequest
     * @deprecated
     */
	public function withQueueNamespaceId(?string $queueNamespaceId): CreateNamespaceRequest {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}
    /**
     * @return string|null GS2-Key Namespace used to issue transactions
     * @deprecated
     */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /**
     * @param string|null $keyId GS2-Key Namespace used to issue transactions
     * @deprecated
     */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId GS2-Key Namespace used to issue transactions
     * @return CreateNamespaceRequest
     * @deprecated
     */
	public function withKeyId(?string $keyId): CreateNamespaceRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateNamespaceRequest())
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withIsAutomaticDeletingEnabled(array_key_exists('isAutomaticDeletingEnabled', $data) ? $data['isAutomaticDeletingEnabled'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withReceiveMessageScript(array_key_exists('receiveMessageScript', $data) && $data['receiveMessageScript'] !== null ? ScriptSetting::fromJson($data['receiveMessageScript']) : null)
            ->withReadMessageScript(array_key_exists('readMessageScript', $data) && $data['readMessageScript'] !== null ? ScriptSetting::fromJson($data['readMessageScript']) : null)
            ->withDeleteMessageScript(array_key_exists('deleteMessageScript', $data) && $data['deleteMessageScript'] !== null ? ScriptSetting::fromJson($data['deleteMessageScript']) : null)
            ->withReceiveNotification(array_key_exists('receiveNotification', $data) && $data['receiveNotification'] !== null ? NotificationSetting::fromJson($data['receiveNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "isAutomaticDeletingEnabled" => $this->getIsAutomaticDeletingEnabled(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "receiveMessageScript" => $this->getReceiveMessageScript() !== null ? $this->getReceiveMessageScript()->toJson() : null,
            "readMessageScript" => $this->getReadMessageScript() !== null ? $this->getReadMessageScript()->toJson() : null,
            "deleteMessageScript" => $this->getDeleteMessageScript() !== null ? $this->getDeleteMessageScript()->toJson() : null,
            "receiveNotification" => $this->getReceiveNotification() !== null ? $this->getReceiveNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
        );
    }
}