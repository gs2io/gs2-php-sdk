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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\TransactionSetting;
use Gs2\Quest\Model\TransactionSettingV2;
use Gs2\Quest\Model\ScriptSetting;
use Gs2\Quest\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#createnamespace
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
    /** @var ScriptSetting Script setting to be executed when the quest is started */
    private $startQuestScript;
    /** @var ScriptSetting Script setting to be executed when a quest is completed */
    private $completeQuestScript;
    /** @var ScriptSetting Script setting to be executed when a quest fails */
    private $failedQuestScript;
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
    /** @return ScriptSetting|null Script setting to be executed when the quest is started */
	public function getStartQuestScript(): ?ScriptSetting {
		return $this->startQuestScript;
	}
    /** @param ScriptSetting|null $startQuestScript Script setting to be executed when the quest is started */
	public function setStartQuestScript(?ScriptSetting $startQuestScript) {
		$this->startQuestScript = $startQuestScript;
	}
    /**
     * @param ScriptSetting|null $startQuestScript Script setting to be executed when the quest is started
     * @return CreateNamespaceRequest
     */
	public function withStartQuestScript(?ScriptSetting $startQuestScript): CreateNamespaceRequest {
		$this->startQuestScript = $startQuestScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a quest is completed */
	public function getCompleteQuestScript(): ?ScriptSetting {
		return $this->completeQuestScript;
	}
    /** @param ScriptSetting|null $completeQuestScript Script setting to be executed when a quest is completed */
	public function setCompleteQuestScript(?ScriptSetting $completeQuestScript) {
		$this->completeQuestScript = $completeQuestScript;
	}
    /**
     * @param ScriptSetting|null $completeQuestScript Script setting to be executed when a quest is completed
     * @return CreateNamespaceRequest
     */
	public function withCompleteQuestScript(?ScriptSetting $completeQuestScript): CreateNamespaceRequest {
		$this->completeQuestScript = $completeQuestScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when a quest fails */
	public function getFailedQuestScript(): ?ScriptSetting {
		return $this->failedQuestScript;
	}
    /** @param ScriptSetting|null $failedQuestScript Script setting to be executed when a quest fails */
	public function setFailedQuestScript(?ScriptSetting $failedQuestScript) {
		$this->failedQuestScript = $failedQuestScript;
	}
    /**
     * @param ScriptSetting|null $failedQuestScript Script setting to be executed when a quest fails
     * @return CreateNamespaceRequest
     */
	public function withFailedQuestScript(?ScriptSetting $failedQuestScript): CreateNamespaceRequest {
		$this->failedQuestScript = $failedQuestScript;
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
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withStartQuestScript(array_key_exists('startQuestScript', $data) && $data['startQuestScript'] !== null ? ScriptSetting::fromJson($data['startQuestScript']) : null)
            ->withCompleteQuestScript(array_key_exists('completeQuestScript', $data) && $data['completeQuestScript'] !== null ? ScriptSetting::fromJson($data['completeQuestScript']) : null)
            ->withFailedQuestScript(array_key_exists('failedQuestScript', $data) && $data['failedQuestScript'] !== null ? ScriptSetting::fromJson($data['failedQuestScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "startQuestScript" => $this->getStartQuestScript() !== null ? $this->getStartQuestScript()->toJson() : null,
            "completeQuestScript" => $this->getCompleteQuestScript() !== null ? $this->getCompleteQuestScript()->toJson() : null,
            "failedQuestScript" => $this->getFailedQuestScript() !== null ? $this->getFailedQuestScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
        );
    }
}