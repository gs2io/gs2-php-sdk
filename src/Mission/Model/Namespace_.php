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

namespace Gs2\Mission\Model;

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
     * @var ScriptSetting
	 */
	private $missionCompleteScript;
	/**
     * @var ScriptSetting
	 */
	private $counterIncrementScript;
	/**
     * @var ScriptSetting
	 */
	private $receiveRewardsScript;
	/**
     * @var NotificationSetting
	 */
	private $completeNotification;
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
     * @var string
	 */
	private $queueNamespaceId;
	/**
     * @var string
	 */
	private $keyId;
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
	public function getMissionCompleteScript(): ?ScriptSetting {
		return $this->missionCompleteScript;
	}
	public function setMissionCompleteScript(?ScriptSetting $missionCompleteScript) {
		$this->missionCompleteScript = $missionCompleteScript;
	}
	public function withMissionCompleteScript(?ScriptSetting $missionCompleteScript): Namespace_ {
		$this->missionCompleteScript = $missionCompleteScript;
		return $this;
	}
	public function getCounterIncrementScript(): ?ScriptSetting {
		return $this->counterIncrementScript;
	}
	public function setCounterIncrementScript(?ScriptSetting $counterIncrementScript) {
		$this->counterIncrementScript = $counterIncrementScript;
	}
	public function withCounterIncrementScript(?ScriptSetting $counterIncrementScript): Namespace_ {
		$this->counterIncrementScript = $counterIncrementScript;
		return $this;
	}
	public function getReceiveRewardsScript(): ?ScriptSetting {
		return $this->receiveRewardsScript;
	}
	public function setReceiveRewardsScript(?ScriptSetting $receiveRewardsScript) {
		$this->receiveRewardsScript = $receiveRewardsScript;
	}
	public function withReceiveRewardsScript(?ScriptSetting $receiveRewardsScript): Namespace_ {
		$this->receiveRewardsScript = $receiveRewardsScript;
		return $this;
	}
	public function getCompleteNotification(): ?NotificationSetting {
		return $this->completeNotification;
	}
	public function setCompleteNotification(?NotificationSetting $completeNotification) {
		$this->completeNotification = $completeNotification;
	}
	public function withCompleteNotification(?NotificationSetting $completeNotification): Namespace_ {
		$this->completeNotification = $completeNotification;
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
    /**
     * @deprecated
     */
	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}
    /**
     * @deprecated
     */
	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}
    /**
     * @deprecated
     */
	public function withQueueNamespaceId(?string $queueNamespaceId): Namespace_ {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}
    /**
     * @deprecated
     */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /**
     * @deprecated
     */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @deprecated
     */
	public function withKeyId(?string $keyId): Namespace_ {
		$this->keyId = $keyId;
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
            ->withMissionCompleteScript(array_key_exists('missionCompleteScript', $data) && $data['missionCompleteScript'] !== null ? ScriptSetting::fromJson($data['missionCompleteScript']) : null)
            ->withCounterIncrementScript(array_key_exists('counterIncrementScript', $data) && $data['counterIncrementScript'] !== null ? ScriptSetting::fromJson($data['counterIncrementScript']) : null)
            ->withReceiveRewardsScript(array_key_exists('receiveRewardsScript', $data) && $data['receiveRewardsScript'] !== null ? ScriptSetting::fromJson($data['receiveRewardsScript']) : null)
            ->withCompleteNotification(array_key_exists('completeNotification', $data) && $data['completeNotification'] !== null ? NotificationSetting::fromJson($data['completeNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "missionCompleteScript" => $this->getMissionCompleteScript() !== null ? $this->getMissionCompleteScript()->toJson() : null,
            "counterIncrementScript" => $this->getCounterIncrementScript() !== null ? $this->getCounterIncrementScript()->toJson() : null,
            "receiveRewardsScript" => $this->getReceiveRewardsScript() !== null ? $this->getReceiveRewardsScript()->toJson() : null,
            "completeNotification" => $this->getCompleteNotification() !== null ? $this->getCompleteNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
        );
    }
}