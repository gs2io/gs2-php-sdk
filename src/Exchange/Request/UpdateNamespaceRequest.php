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

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
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
    /** @var ScriptSetting */
    private $acquireAwaitScript;
    /** @var LogSetting */
    private $logSetting;
    /** @var string */
    private $queueNamespaceId;
    /** @var string */
    private $keyId;
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
	public function getEnableAwaitExchange(): ?bool {
		return $this->enableAwaitExchange;
	}
	public function setEnableAwaitExchange(?bool $enableAwaitExchange) {
		$this->enableAwaitExchange = $enableAwaitExchange;
	}
	public function withEnableAwaitExchange(?bool $enableAwaitExchange): UpdateNamespaceRequest {
		$this->enableAwaitExchange = $enableAwaitExchange;
		return $this;
	}
	public function getEnableDirectExchange(): ?bool {
		return $this->enableDirectExchange;
	}
	public function setEnableDirectExchange(?bool $enableDirectExchange) {
		$this->enableDirectExchange = $enableDirectExchange;
	}
	public function withEnableDirectExchange(?bool $enableDirectExchange): UpdateNamespaceRequest {
		$this->enableDirectExchange = $enableDirectExchange;
		return $this;
	}
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
	public function withTransactionSetting(?TransactionSetting $transactionSetting): UpdateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getExchangeScript(): ?ScriptSetting {
		return $this->exchangeScript;
	}
	public function setExchangeScript(?ScriptSetting $exchangeScript) {
		$this->exchangeScript = $exchangeScript;
	}
	public function withExchangeScript(?ScriptSetting $exchangeScript): UpdateNamespaceRequest {
		$this->exchangeScript = $exchangeScript;
		return $this;
	}
	public function getIncrementalExchangeScript(): ?ScriptSetting {
		return $this->incrementalExchangeScript;
	}
	public function setIncrementalExchangeScript(?ScriptSetting $incrementalExchangeScript) {
		$this->incrementalExchangeScript = $incrementalExchangeScript;
	}
	public function withIncrementalExchangeScript(?ScriptSetting $incrementalExchangeScript): UpdateNamespaceRequest {
		$this->incrementalExchangeScript = $incrementalExchangeScript;
		return $this;
	}
	public function getAcquireAwaitScript(): ?ScriptSetting {
		return $this->acquireAwaitScript;
	}
	public function setAcquireAwaitScript(?ScriptSetting $acquireAwaitScript) {
		$this->acquireAwaitScript = $acquireAwaitScript;
	}
	public function withAcquireAwaitScript(?ScriptSetting $acquireAwaitScript): UpdateNamespaceRequest {
		$this->acquireAwaitScript = $acquireAwaitScript;
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
	public function withQueueNamespaceId(?string $queueNamespaceId): UpdateNamespaceRequest {
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
	public function withKeyId(?string $keyId): UpdateNamespaceRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withEnableAwaitExchange(array_key_exists('enableAwaitExchange', $data) ? $data['enableAwaitExchange'] : null)
            ->withEnableDirectExchange(array_key_exists('enableDirectExchange', $data) ? $data['enableDirectExchange'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withExchangeScript(array_key_exists('exchangeScript', $data) && $data['exchangeScript'] !== null ? ScriptSetting::fromJson($data['exchangeScript']) : null)
            ->withIncrementalExchangeScript(array_key_exists('incrementalExchangeScript', $data) && $data['incrementalExchangeScript'] !== null ? ScriptSetting::fromJson($data['incrementalExchangeScript']) : null)
            ->withAcquireAwaitScript(array_key_exists('acquireAwaitScript', $data) && $data['acquireAwaitScript'] !== null ? ScriptSetting::fromJson($data['acquireAwaitScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "enableAwaitExchange" => $this->getEnableAwaitExchange(),
            "enableDirectExchange" => $this->getEnableDirectExchange(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "exchangeScript" => $this->getExchangeScript() !== null ? $this->getExchangeScript()->toJson() : null,
            "incrementalExchangeScript" => $this->getIncrementalExchangeScript() !== null ? $this->getIncrementalExchangeScript()->toJson() : null,
            "acquireAwaitScript" => $this->getAcquireAwaitScript() !== null ? $this->getAcquireAwaitScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
        );
    }
}