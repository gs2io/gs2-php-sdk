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
     * @var string
	 */
	private $queueNamespaceId;
	/**
     * @var string
	 */
	private $keyId;
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

	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	public function withQueueNamespaceId(?string $queueNamespaceId): Namespace_ {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): Namespace_ {
		$this->keyId = $keyId;
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

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(empty($data['namespaceId']) ? null : $data['namespaceId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withMissionCompleteScript(empty($data['missionCompleteScript']) ? null : ScriptSetting::fromJson($data['missionCompleteScript']))
            ->withCounterIncrementScript(empty($data['counterIncrementScript']) ? null : ScriptSetting::fromJson($data['counterIncrementScript']))
            ->withReceiveRewardsScript(empty($data['receiveRewardsScript']) ? null : ScriptSetting::fromJson($data['receiveRewardsScript']))
            ->withQueueNamespaceId(empty($data['queueNamespaceId']) ? null : $data['queueNamespaceId'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId'])
            ->withCompleteNotification(empty($data['completeNotification']) ? null : NotificationSetting::fromJson($data['completeNotification']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']))
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "missionCompleteScript" => $this->getMissionCompleteScript() !== null ? $this->getMissionCompleteScript()->toJson() : null,
            "counterIncrementScript" => $this->getCounterIncrementScript() !== null ? $this->getCounterIncrementScript()->toJson() : null,
            "receiveRewardsScript" => $this->getReceiveRewardsScript() !== null ? $this->getReceiveRewardsScript()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
            "completeNotification" => $this->getCompleteNotification() !== null ? $this->getCompleteNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}