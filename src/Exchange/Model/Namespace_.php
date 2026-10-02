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

namespace Gs2\Exchange\Model;

use Gs2\Core\Model\IModel;


/**
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/exchange/sdk/#namespace
 */
class Namespace_ implements IModel {
	/**
     * @var string Namespace GRN
	 */
	private $namespaceId;
	/**
     * @var string Namespace name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var bool Allow direct exchange API calls
	 */
	private $enableDirectExchange;
	/**
     * @var bool Whether to enable exchanges that require a waiting time before receiving results
	 */
	private $enableAwaitExchange;
	/**
     * @var TransactionSetting Transaction Setting
	 */
	private $transactionSetting;
	/**
     * @var TransactionSettingV2 Transaction Setting (V2)
	 */
	private $transactionSettingV2;
	/**
     * @var ScriptSetting Script setting to be executed when attempting to perform the exchange
	 */
	private $exchangeScript;
	/**
     * @var ScriptSetting Script setting to be executed when an attempt is made to perform an incremental cost exchange
	 */
	private $incrementalExchangeScript;
	/**
     * @var ScriptSetting Script setting executed when the waiting period completes and the reward is about to be acquired in an await-type exchange
	 */
	private $acquireAwaitScript;
	/**
     * @var LogSetting Log Output Setting
	 */
	private $logSetting;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var string GS2-JobQueue Namespace GRN used to execute transactions
	 */
	private $queueNamespaceId;
	/**
     * @var string GS2-Key Namespace used to issue transactions
	 */
	private $keyId;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Namespace GRN */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
    /** @param string|null $namespaceId Namespace GRN */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
    /**
     * @param string|null $namespaceId Namespace GRN
     * @return Namespace_
     */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
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
     * @return Namespace_
     */
	public function withName(?string $name): Namespace_ {
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
     * @return Namespace_
     */
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
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
     * @return Namespace_
     */
	public function withEnableDirectExchange(?bool $enableDirectExchange): Namespace_ {
		$this->enableDirectExchange = $enableDirectExchange;
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
     * @return Namespace_
     */
	public function withEnableAwaitExchange(?bool $enableAwaitExchange): Namespace_ {
		$this->enableAwaitExchange = $enableAwaitExchange;
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
     * @return Namespace_
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): Namespace_ {
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
     * @return Namespace_
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): Namespace_ {
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
     * @return Namespace_
     */
	public function withExchangeScript(?ScriptSetting $exchangeScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withIncrementalExchangeScript(?ScriptSetting $incrementalExchangeScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withAcquireAwaitScript(?ScriptSetting $acquireAwaitScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Namespace_
     */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Namespace_
     */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
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
     * @return Namespace_
     * @deprecated
     */
	public function withQueueNamespaceId(?string $queueNamespaceId): Namespace_ {
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
     * @return Namespace_
     * @deprecated
     */
	public function withKeyId(?string $keyId): Namespace_ {
		$this->keyId = $keyId;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Namespace_
     */
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
            ->withEnableDirectExchange(array_key_exists('enableDirectExchange', $data) ? $data['enableDirectExchange'] : null)
            ->withEnableAwaitExchange(array_key_exists('enableAwaitExchange', $data) ? $data['enableAwaitExchange'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withExchangeScript(array_key_exists('exchangeScript', $data) && $data['exchangeScript'] !== null ? ScriptSetting::fromJson($data['exchangeScript']) : null)
            ->withIncrementalExchangeScript(array_key_exists('incrementalExchangeScript', $data) && $data['incrementalExchangeScript'] !== null ? ScriptSetting::fromJson($data['incrementalExchangeScript']) : null)
            ->withAcquireAwaitScript(array_key_exists('acquireAwaitScript', $data) && $data['acquireAwaitScript'] !== null ? ScriptSetting::fromJson($data['acquireAwaitScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withQueueNamespaceId(array_key_exists('queueNamespaceId', $data) && $data['queueNamespaceId'] !== null ? $data['queueNamespaceId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "enableDirectExchange" => $this->getEnableDirectExchange(),
            "enableAwaitExchange" => $this->getEnableAwaitExchange(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "exchangeScript" => $this->getExchangeScript() !== null ? $this->getExchangeScript()->toJson() : null,
            "incrementalExchangeScript" => $this->getIncrementalExchangeScript() !== null ? $this->getIncrementalExchangeScript()->toJson() : null,
            "acquireAwaitScript" => $this->getAcquireAwaitScript() !== null ? $this->getAcquireAwaitScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
            "revision" => $this->getRevision(),
        );
    }
}