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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Exchange\Model\TransactionSetting;
use Gs2\Exchange\Model\ScriptSetting;
use Gs2\Exchange\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var bool */
    private $enableAwaitExchange;
    /** @var bool */
    private $enableDirectExchange;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var ScriptSetting */
    private $exchangeScript;
    /** @var ScriptSetting */
    private $incrementalExchangeScript;
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
	public function getEnableAwaitExchange(): ?bool {
		return $this->enableAwaitExchange;
	}
	public function setEnableAwaitExchange(?bool $enableAwaitExchange) {
		$this->enableAwaitExchange = $enableAwaitExchange;
	}
	public function withEnableAwaitExchange(?bool $enableAwaitExchange): CreateNamespaceRequest {
		$this->enableAwaitExchange = $enableAwaitExchange;
		return $this;
	}
	public function getEnableDirectExchange(): ?bool {
		return $this->enableDirectExchange;
	}
	public function setEnableDirectExchange(?bool $enableDirectExchange) {
		$this->enableDirectExchange = $enableDirectExchange;
	}
	public function withEnableDirectExchange(?bool $enableDirectExchange): CreateNamespaceRequest {
		$this->enableDirectExchange = $enableDirectExchange;
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
	public function getExchangeScript(): ?ScriptSetting {
		return $this->exchangeScript;
	}
	public function setExchangeScript(?ScriptSetting $exchangeScript) {
		$this->exchangeScript = $exchangeScript;
	}
	public function withExchangeScript(?ScriptSetting $exchangeScript): CreateNamespaceRequest {
		$this->exchangeScript = $exchangeScript;
		return $this;
	}
	public function getIncrementalExchangeScript(): ?ScriptSetting {
		return $this->incrementalExchangeScript;
	}
	public function setIncrementalExchangeScript(?ScriptSetting $incrementalExchangeScript) {
		$this->incrementalExchangeScript = $incrementalExchangeScript;
	}
	public function withIncrementalExchangeScript(?ScriptSetting $incrementalExchangeScript): CreateNamespaceRequest {
		$this->incrementalExchangeScript = $incrementalExchangeScript;
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
            ->withEnableAwaitExchange(array_key_exists('enableAwaitExchange', $data) ? $data['enableAwaitExchange'] : null)
            ->withEnableDirectExchange(array_key_exists('enableDirectExchange', $data) ? $data['enableDirectExchange'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withExchangeScript(array_key_exists('exchangeScript', $data) && $data['exchangeScript'] !== null ? ScriptSetting::fromJson($data['exchangeScript']) : null)
            ->withIncrementalExchangeScript(array_key_exists('incrementalExchangeScript', $data) && $data['incrementalExchangeScript'] !== null ? ScriptSetting::fromJson($data['incrementalExchangeScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "enableAwaitExchange" => $this->getEnableAwaitExchange(),
            "enableDirectExchange" => $this->getEnableDirectExchange(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "exchangeScript" => $this->getExchangeScript() !== null ? $this->getExchangeScript()->toJson() : null,
            "incrementalExchangeScript" => $this->getIncrementalExchangeScript() !== null ? $this->getIncrementalExchangeScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
        );
    }
}