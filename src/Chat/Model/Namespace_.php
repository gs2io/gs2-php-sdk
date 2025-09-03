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

namespace Gs2\Chat\Model;

use Gs2\Core\Model\IModel;


class Namespace_ implements IModel {
	/**
     * @var string
	 */
	private $namespaceId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var TransactionSetting
	 */
	private $transactionSetting;
	/**
     * @var bool
	 */
	private $allowCreateRoom;
	/**
     * @var int
	 */
	private $messageLifeTimeDays;
	/**
     * @var ScriptSetting
	 */
	private $postMessageScript;
	/**
     * @var ScriptSetting
	 */
	private $createRoomScript;
	/**
     * @var ScriptSetting
	 */
	private $deleteRoomScript;
	/**
     * @var ScriptSetting
	 */
	private $subscribeRoomScript;
	/**
     * @var ScriptSetting
	 */
	private $unsubscribeRoomScript;
	/**
     * @var NotificationSetting
	 */
	private $postNotification;
	/**
     * @var LogSetting
	 */
	private $logSetting;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
	public function withTransactionSetting(?TransactionSetting $transactionSetting): Namespace_ {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getAllowCreateRoom(): ?bool {
		return $this->allowCreateRoom;
	}
	public function setAllowCreateRoom(?bool $allowCreateRoom) {
		$this->allowCreateRoom = $allowCreateRoom;
	}
	public function withAllowCreateRoom(?bool $allowCreateRoom): Namespace_ {
		$this->allowCreateRoom = $allowCreateRoom;
		return $this;
	}
	public function getMessageLifeTimeDays(): ?int {
		return $this->messageLifeTimeDays;
	}
	public function setMessageLifeTimeDays(?int $messageLifeTimeDays) {
		$this->messageLifeTimeDays = $messageLifeTimeDays;
	}
	public function withMessageLifeTimeDays(?int $messageLifeTimeDays): Namespace_ {
		$this->messageLifeTimeDays = $messageLifeTimeDays;
		return $this;
	}
	public function getPostMessageScript(): ?ScriptSetting {
		return $this->postMessageScript;
	}
	public function setPostMessageScript(?ScriptSetting $postMessageScript) {
		$this->postMessageScript = $postMessageScript;
	}
	public function withPostMessageScript(?ScriptSetting $postMessageScript): Namespace_ {
		$this->postMessageScript = $postMessageScript;
		return $this;
	}
	public function getCreateRoomScript(): ?ScriptSetting {
		return $this->createRoomScript;
	}
	public function setCreateRoomScript(?ScriptSetting $createRoomScript) {
		$this->createRoomScript = $createRoomScript;
	}
	public function withCreateRoomScript(?ScriptSetting $createRoomScript): Namespace_ {
		$this->createRoomScript = $createRoomScript;
		return $this;
	}
	public function getDeleteRoomScript(): ?ScriptSetting {
		return $this->deleteRoomScript;
	}
	public function setDeleteRoomScript(?ScriptSetting $deleteRoomScript) {
		$this->deleteRoomScript = $deleteRoomScript;
	}
	public function withDeleteRoomScript(?ScriptSetting $deleteRoomScript): Namespace_ {
		$this->deleteRoomScript = $deleteRoomScript;
		return $this;
	}
	public function getSubscribeRoomScript(): ?ScriptSetting {
		return $this->subscribeRoomScript;
	}
	public function setSubscribeRoomScript(?ScriptSetting $subscribeRoomScript) {
		$this->subscribeRoomScript = $subscribeRoomScript;
	}
	public function withSubscribeRoomScript(?ScriptSetting $subscribeRoomScript): Namespace_ {
		$this->subscribeRoomScript = $subscribeRoomScript;
		return $this;
	}
	public function getUnsubscribeRoomScript(): ?ScriptSetting {
		return $this->unsubscribeRoomScript;
	}
	public function setUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript) {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
	}
	public function withUnsubscribeRoomScript(?ScriptSetting $unsubscribeRoomScript): Namespace_ {
		$this->unsubscribeRoomScript = $unsubscribeRoomScript;
		return $this;
	}
	public function getPostNotification(): ?NotificationSetting {
		return $this->postNotification;
	}
	public function setPostNotification(?NotificationSetting $postNotification) {
		$this->postNotification = $postNotification;
	}
	public function withPostNotification(?NotificationSetting $postNotification): Namespace_ {
		$this->postNotification = $postNotification;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Namespace_ {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(array_key_exists('namespaceId', $data) && $data['namespaceId'] !== null ? $data['namespaceId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withAllowCreateRoom(array_key_exists('allowCreateRoom', $data) ? $data['allowCreateRoom'] : null)
            ->withMessageLifeTimeDays(array_key_exists('messageLifeTimeDays', $data) && $data['messageLifeTimeDays'] !== null ? $data['messageLifeTimeDays'] : null)
            ->withPostMessageScript(array_key_exists('postMessageScript', $data) && $data['postMessageScript'] !== null ? ScriptSetting::fromJson($data['postMessageScript']) : null)
            ->withCreateRoomScript(array_key_exists('createRoomScript', $data) && $data['createRoomScript'] !== null ? ScriptSetting::fromJson($data['createRoomScript']) : null)
            ->withDeleteRoomScript(array_key_exists('deleteRoomScript', $data) && $data['deleteRoomScript'] !== null ? ScriptSetting::fromJson($data['deleteRoomScript']) : null)
            ->withSubscribeRoomScript(array_key_exists('subscribeRoomScript', $data) && $data['subscribeRoomScript'] !== null ? ScriptSetting::fromJson($data['subscribeRoomScript']) : null)
            ->withUnsubscribeRoomScript(array_key_exists('unsubscribeRoomScript', $data) && $data['unsubscribeRoomScript'] !== null ? ScriptSetting::fromJson($data['unsubscribeRoomScript']) : null)
            ->withPostNotification(array_key_exists('postNotification', $data) && $data['postNotification'] !== null ? NotificationSetting::fromJson($data['postNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "allowCreateRoom" => $this->getAllowCreateRoom(),
            "messageLifeTimeDays" => $this->getMessageLifeTimeDays(),
            "postMessageScript" => $this->getPostMessageScript() !== null ? $this->getPostMessageScript()->toJson() : null,
            "createRoomScript" => $this->getCreateRoomScript() !== null ? $this->getCreateRoomScript()->toJson() : null,
            "deleteRoomScript" => $this->getDeleteRoomScript() !== null ? $this->getDeleteRoomScript()->toJson() : null,
            "subscribeRoomScript" => $this->getSubscribeRoomScript() !== null ? $this->getSubscribeRoomScript()->toJson() : null,
            "unsubscribeRoomScript" => $this->getUnsubscribeRoomScript() !== null ? $this->getUnsubscribeRoomScript()->toJson() : null,
            "postNotification" => $this->getPostNotification() !== null ? $this->getPostNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}