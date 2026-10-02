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
use Gs2\Chat\Model\TransactionSetting;
use Gs2\Chat\Model\TransactionSettingV2;
use Gs2\Chat\Model\ScriptSetting;
use Gs2\Chat\Model\MobileNotificationMessage;
use Gs2\Chat\Model\NotificationSetting;
use Gs2\Chat\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/chat/sdk/#createnamespace
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
    /** @var bool Whether to allow game players to create rooms */
    private $allowCreateRoom;
    /** @var int Message retention period (days) */
    private $messageLifeTimeDays;
    /** @var ScriptSetting Script setting to be executed when a message is posted */
    private $postMessageScript;
    /** @var ScriptSetting Script setting to be executed when a room is created */
    private $createRoomScript;
    /** @var ScriptSetting Script setting to be executed when a room is deleted */
    private $deleteRoomScript;
    /** @var ScriptSetting Script setting to be executed when subscribing to a room */
    private $subscribeRoomScript;
    /** @var ScriptSetting Script setting to be executed when unsubscribing from a room */
    private $unsubscribeRoomScript;
    /** @var NotificationSetting Push notifications when new posts are added to subscribed rooms */
    private $postNotification;
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
    /** @return bool|null Whether to allow game players to create rooms */
	public function getAllowCreateRoom(): ?bool {
		return $this->allowCreateRoom;
	}
    /** @param bool|null $allowCreateRoom Whether to allow game players to create rooms */
	public function setAllowCreateRoom(?bool $allowCreateRoom) {
		$this->allowCreateRoom = $allowCreateRoom;
	}
    /**
     * @param bool|null $allowCreateRoom Whether to allow game players to create rooms
     * @return CreateNamespaceRequest
     */
	public function withAllowCreateRoom(?bool $allowCreateRoom): CreateNamespaceRequest {
		$this->allowCreateRoom = $allowCreateRoom;
		return $this;
	}
    /** @return int|null Message retention period (days) */
	public function getMessageLifeTimeDays(): ?int {
		return $this->messageLifeTimeDays;
	}
    /** @param int|null $messageLifeTimeDays Message retention period (days) */
	public function setMessageLifeTimeDays(?int $messageLifeTimeDays) {
		$this->messageLifeTimeDays = $messageLifeTimeDays;
	}
    /**
     * @param int|null $messageLifeTimeDays Message retention period (days)
     * @return CreateNamespaceRequest
     */
	public function withMessageLifeTimeDays(?int $messageLifeTimeDays): CreateNamespaceRequest {
		$this->messageLifeTimeDays = $messageLifeTimeDays;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a message is posted */
	public function getPostMessageScript(): ?ScriptSetting {
		return $this->postMessageScript;
	}
    /** @param ScriptSetting|null $postMessageScript Script setting to be executed when a message is posted */
	public function setPostMessageScript(?ScriptSetting $postMessageScript) {
		$this->postMessageScript = $postMessageScript;
	}
    /**
     * @param ScriptSetting|null $postMessageScript Script setting to be executed when a message is posted
     * @return CreateNamespaceRequest
     */
	public function withPostMessageScript(?ScriptSetting $postMessageScript): CreateNamespaceRequest {
		$this->postMessageScript = $postMessageScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a room is created */
	public function getCreateRoomScript(): ?ScriptSetting {
		return $this->createRoomScript;
	}
    /** @param ScriptSetting|null $createRoomScript Script setting to be executed when a room is created */
	public function setCreateRoomScript(?ScriptSetting $createRoomScript) {
		$this->createRoomScript = $createRoomScript;
	}
    /**
     * @param ScriptSetting|null $createRoomScript Script setting to be executed when a room is created
     * @return CreateNamespaceRequest
     */
	public function withCreateRoomScript(?ScriptSetting $createRoomScript): CreateNamespaceRequest {
		$this->createRoomScript = $createRoomScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a room is deleted */
	public function getDeleteRoomScript(): ?ScriptSetting {
		return $this->deleteRoomScript;
	}
    /** @param ScriptSetting|null $deleteRoomScript Script setting to be executed when a room is deleted */
	public function setDeleteRoomScript(?ScriptSetting $deleteRoomScript) {
		$this->deleteRoomScript = $deleteRoomScript;
	}
    /**
     * @param ScriptSetting|null $deleteRoomScript Script setting to be executed when a room is deleted
     * @return CreateNamespaceRequest
     */
	public function withDeleteRoomScript(?ScriptSetting $deleteRoomScript): CreateNamespaceRequest {
		$this->deleteRoomScript = $deleteRoomScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when subscribing to a room */
	public function getSubscribeRoomScript(): ?ScriptSetting {
		return $this->subscribeRoomScript;
	}
    /** @param ScriptSetting|null $subscribeRoomScript Script setting to be executed when subscribing to a room */
	public function setSubscribeRoomScript(?ScriptSetting $subscribeRoomScript) {
		$this->subscribeRoomScript = $subscribeRoomScript;
	}
    /**
     * @param ScriptSetting|null $subscribeRoomScript Script setting to be executed when subscribing to a room
     * @return CreateNamespaceRequest
     */
	public function withSubscribeRoomScript(?ScriptSetting $subscribeRoomScript): CreateNamespaceRequest {
		$this->subscribeRoomScript = $subscribeRoomScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when unsubscribing from a room */
	public function getUnsubscribeRoomScript(): ?ScriptSetting {
		return $this->unsubscribeRoomScript;
	}
    /** @param ScriptSetting|null $unsubscribeRoomScript Script setting to be executed when unsubscribing from a room */
	public function setUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript) {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
	}
    /**
     * @param ScriptSetting|null $unsubscribeRoomScript Script setting to be executed when unsubscribing from a room
     * @return CreateNamespaceRequest
     */
	public function withUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript): CreateNamespaceRequest {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
		return $this;
	}
    /** @return NotificationSetting|null Push notifications when new posts are added to subscribed rooms */
	public function getPostNotification(): ?NotificationSetting {
		return $this->postNotification;
	}
    /** @param NotificationSetting|null $postNotification Push notifications when new posts are added to subscribed rooms */
	public function setPostNotification(?NotificationSetting $postNotification) {
		$this->postNotification = $postNotification;
	}
    /**
     * @param NotificationSetting|null $postNotification Push notifications when new posts are added to subscribed rooms
     * @return CreateNamespaceRequest
     */
	public function withPostNotification(?NotificationSetting $postNotification): CreateNamespaceRequest {
		$this->postNotification = $postNotification;
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
            ->withAllowCreateRoom(array_key_exists('allowCreateRoom', $data) ? $data['allowCreateRoom'] : null)
            ->withMessageLifeTimeDays(array_key_exists('messageLifeTimeDays', $data) && $data['messageLifeTimeDays'] !== null ? $data['messageLifeTimeDays'] : null)
            ->withPostMessageScript(array_key_exists('postMessageScript', $data) && $data['postMessageScript'] !== null ? ScriptSetting::fromJson($data['postMessageScript']) : null)
            ->withCreateRoomScript(array_key_exists('createRoomScript', $data) && $data['createRoomScript'] !== null ? ScriptSetting::fromJson($data['createRoomScript']) : null)
            ->withDeleteRoomScript(array_key_exists('deleteRoomScript', $data) && $data['deleteRoomScript'] !== null ? ScriptSetting::fromJson($data['deleteRoomScript']) : null)
            ->withSubscribeRoomScript(array_key_exists('subscribeRoomScript', $data) && $data['subscribeRoomScript'] !== null ? ScriptSetting::fromJson($data['subscribeRoomScript']) : null)
            ->withUnsubscribeRoomScript(array_key_exists('unsubscribeRoomScript', $data) && $data['unsubscribeRoomScript'] !== null ? ScriptSetting::fromJson($data['unsubscribeRoomScript']) : null)
            ->withPostNotification(array_key_exists('postNotification', $data) && $data['postNotification'] !== null ? NotificationSetting::fromJson($data['postNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "allowCreateRoom" => $this->getAllowCreateRoom(),
            "messageLifeTimeDays" => $this->getMessageLifeTimeDays(),
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