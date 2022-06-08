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
use Gs2\Quest\Model\ScriptSetting;
use Gs2\Quest\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var ScriptSetting */
    private $startQuestScript;
    /** @var ScriptSetting */
    private $completeQuestScript;
    /** @var ScriptSetting */
    private $failedQuestScript;
    /** @var LogSetting */
    private $logSetting;
    /** @var string */
    private $queueNamespaceId;
    /** @var string */
    private $keyId;
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
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
	public function withTransactionSetting(?TransactionSetting $transactionSetting): CreateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getStartQuestScript(): ?ScriptSetting {
		return $this->startQuestScript;
	}
	public function setStartQuestScript(?ScriptSetting $startQuestScript) {
		$this->startQuestScript = $startQuestScript;
	}
	public function withStartQuestScript(?ScriptSetting $startQuestScript): CreateNamespaceRequest {
		$this->startQuestScript = $startQuestScript;
		return $this;
	}
	public function getCompleteQuestScript(): ?ScriptSetting {
		return $this->completeQuestScript;
	}
	public function setCompleteQuestScript(?ScriptSetting $completeQuestScript) {
		$this->completeQuestScript = $completeQuestScript;
	}
	public function withCompleteQuestScript(?ScriptSetting $completeQuestScript): CreateNamespaceRequest {
		$this->completeQuestScript = $completeQuestScript;
		return $this;
	}
	public function getFailedQuestScript(): ?ScriptSetting {
		return $this->failedQuestScript;
	}
	public function setFailedQuestScript(?ScriptSetting $failedQuestScript) {
		$this->failedQuestScript = $failedQuestScript;
	}
	public function withFailedQuestScript(?ScriptSetting $failedQuestScript): CreateNamespaceRequest {
		$this->failedQuestScript = $failedQuestScript;
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
	public function withQueueNamespaceId(?string $queueNamespaceId): CreateNamespaceRequest {
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
            "startQuestScript" => $this->getStartQuestScript() !== null ? $this->getStartQuestScript()->toJson() : null,
            "completeQuestScript" => $this->getCompleteQuestScript() !== null ? $this->getCompleteQuestScript()->toJson() : null,
            "failedQuestScript" => $this->getFailedQuestScript() !== null ? $this->getFailedQuestScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
        );
    }
}