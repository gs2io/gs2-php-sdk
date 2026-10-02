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
use Gs2\Exchange\Model\TransactionSettingV2;
use Gs2\Exchange\Model\ScriptSetting;
use Gs2\Exchange\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var bool Whether to enable exchanges that require a waiting time before receiving results */
    private $enableAwaitExchange;
    /** @var bool Allow direct exchange API calls */
    private $enableDirectExchange;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var ScriptSetting Script setting to be executed when attempting to perform the exchange */
    private $exchangeScript;
    /** @var ScriptSetting Script setting to be executed when an attempt is made to perform an incremental cost exchange */
    private $incrementalExchangeScript;
    /** @var ScriptSetting Script setting executed when the waiting period completes and the reward is about to be acquired in an await-type exchange */
    private $acquireAwaitScript;
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
    /** @return bool|null Whether to enable exchanges that require a waiting time before receiving results */
	public function getEnableAwaitExchange(): ?bool {
		return $this->enableAwaitExchange;
	}
    /** @param bool|null $enableAwaitExchange Whether to enable exchanges that require a waiting time before receiving results */
	public function setEnableAwaitExchange(?bool $enableAwaitExchange) {
		$this->enableAwaitExchange = $enableAwaitExchange;
	}
    /**
     * @param bool|null $enableAwaitExchange Whether to enable exchanges that require a waiting time before receiving results
     * @return CreateNamespaceRequest
     */
	public function withEnableAwaitExchange(?bool $enableAwaitExchange): CreateNamespaceRequest {
		$this->enableAwaitExchange = $enableAwaitExchange;
		return $this;
	}
    /** @return bool|null Allow direct exchange API calls */
	public function getEnableDirectExchange(): ?bool {
		return $this->enableDirectExchange;
	}
    /** @param bool|null $enableDirectExchange Allow direct exchange API calls */
	public function setEnableDirectExchange(?bool $enableDirectExchange) {
		$this->enableDirectExchange = $enableDirectExchange;
	}
    /**
     * @param bool|null $enableDirectExchange Allow direct exchange API calls
     * @return CreateNamespaceRequest
     */
	public function withEnableDirectExchange(?bool $enableDirectExchange): CreateNamespaceRequest {
		$this->enableDirectExchange = $enableDirectExchange;
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
    /** @return ScriptSetting|null Script setting to be executed when attempting to perform the exchange */
	public function getExchangeScript(): ?ScriptSetting {
		return $this->exchangeScript;
	}
    /** @param ScriptSetting|null $exchangeScript Script setting to be executed when attempting to perform the exchange */
	public function setExchangeScript(?ScriptSetting $exchangeScript) {
		$this->exchangeScript = $exchangeScript;
	}
    /**
     * @param ScriptSetting|null $exchangeScript Script setting to be executed when attempting to perform the exchange
     * @return CreateNamespaceRequest
     */
	public function withExchangeScript(?ScriptSetting $exchangeScript): CreateNamespaceRequest {
		$this->exchangeScript = $exchangeScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when an attempt is made to perform an incremental cost exchange */
	public function getIncrementalExchangeScript(): ?ScriptSetting {
		return $this->incrementalExchangeScript;
	}
    /** @param ScriptSetting|null $incrementalExchangeScript Script setting to be executed when an attempt is made to perform an incremental cost exchange */
	public function setIncrementalExchangeScript(?ScriptSetting $incrementalExchangeScript) {
		$this->incrementalExchangeScript = $incrementalExchangeScript;
	}
    /**
     * @param ScriptSetting|null $incrementalExchangeScript Script setting to be executed when an attempt is made to perform an incremental cost exchange
     * @return CreateNamespaceRequest
     */
	public function withIncrementalExchangeScript(?ScriptSetting $incrementalExchangeScript): CreateNamespaceRequest {
		$this->incrementalExchangeScript = $incrementalExchangeScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting executed when the waiting period completes and the reward is about to be acquired in an await-type exchange */
	public function getAcquireAwaitScript(): ?ScriptSetting {
		return $this->acquireAwaitScript;
	}
    /** @param ScriptSetting|null $acquireAwaitScript Script setting executed when the waiting period completes and the reward is about to be acquired in an await-type exchange */
	public function setAcquireAwaitScript(?ScriptSetting $acquireAwaitScript) {
		$this->acquireAwaitScript = $acquireAwaitScript;
	}
    /**
     * @param ScriptSetting|null $acquireAwaitScript Script setting executed when the waiting period completes and the reward is about to be acquired in an await-type exchange
     * @return CreateNamespaceRequest
     */
	public function withAcquireAwaitScript(?ScriptSetting $acquireAwaitScript): CreateNamespaceRequest {
		$this->acquireAwaitScript = $acquireAwaitScript;
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
            ->withEnableAwaitExchange(array_key_exists('enableAwaitExchange', $data) ? $data['enableAwaitExchange'] : null)
            ->withEnableDirectExchange(array_key_exists('enableDirectExchange', $data) ? $data['enableDirectExchange'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withExchangeScript(array_key_exists('exchangeScript', $data) && $data['exchangeScript'] !== null ? ScriptSetting::fromJson($data['exchangeScript']) : null)
            ->withIncrementalExchangeScript(array_key_exists('incrementalExchangeScript', $data) && $data['incrementalExchangeScript'] !== null ? ScriptSetting::fromJson($data['incrementalExchangeScript']) : null)
            ->withAcquireAwaitScript(array_key_exists('acquireAwaitScript', $data) && $data['acquireAwaitScript'] !== null ? ScriptSetting::fromJson($data['acquireAwaitScript']) : null)
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
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "exchangeScript" => $this->getExchangeScript() !== null ? $this->getExchangeScript()->toJson() : null,
            "incrementalExchangeScript" => $this->getIncrementalExchangeScript() !== null ? $this->getIncrementalExchangeScript()->toJson() : null,
            "acquireAwaitScript" => $this->getAcquireAwaitScript() !== null ? $this->getAcquireAwaitScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
        );
    }
}