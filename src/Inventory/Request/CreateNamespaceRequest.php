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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Inventory\Model\TransactionSetting;
use Gs2\Inventory\Model\TransactionSettingV2;
use Gs2\Inventory\Model\ScriptSetting;
use Gs2\Inventory\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/inventory/sdk/#createnamespace
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
    /** @var ScriptSetting Script setting to be executed when an Items is acquired */
    private $acquireScript;
    /** @var ScriptSetting Script setting to execute when unable to obtain due to reaching the acquisition limit */
    private $overflowScript;
    /** @var ScriptSetting Script setting to be executed when consuming Items */
    private $consumeScript;
    /** @var ScriptSetting Script setting to be executed when acquiring Simple Items */
    private $simpleItemAcquireScript;
    /** @var ScriptSetting Script setting to be executed when consuming Simple Items */
    private $simpleItemConsumeScript;
    /** @var ScriptSetting Script setting to be executed when acquiring Big Items */
    private $bigItemAcquireScript;
    /** @var ScriptSetting Script setting to be executed when consuming Big Items */
    private $bigItemConsumeScript;
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
    /** @return ScriptSetting|null Script setting to be executed when an Items is acquired */
	public function getAcquireScript(): ?ScriptSetting {
		return $this->acquireScript;
	}
    /** @param ScriptSetting|null $acquireScript Script setting to be executed when an Items is acquired */
	public function setAcquireScript(?ScriptSetting $acquireScript) {
		$this->acquireScript = $acquireScript;
	}
    /**
     * @param ScriptSetting|null $acquireScript Script setting to be executed when an Items is acquired
     * @return CreateNamespaceRequest
     */
	public function withAcquireScript(?ScriptSetting $acquireScript): CreateNamespaceRequest {
		$this->acquireScript = $acquireScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when unable to obtain due to reaching the acquisition limit */
	public function getOverflowScript(): ?ScriptSetting {
		return $this->overflowScript;
	}
    /** @param ScriptSetting|null $overflowScript Script setting to execute when unable to obtain due to reaching the acquisition limit */
	public function setOverflowScript(?ScriptSetting $overflowScript) {
		$this->overflowScript = $overflowScript;
	}
    /**
     * @param ScriptSetting|null $overflowScript Script setting to execute when unable to obtain due to reaching the acquisition limit
     * @return CreateNamespaceRequest
     */
	public function withOverflowScript(?ScriptSetting $overflowScript): CreateNamespaceRequest {
		$this->overflowScript = $overflowScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when consuming Items */
	public function getConsumeScript(): ?ScriptSetting {
		return $this->consumeScript;
	}
    /** @param ScriptSetting|null $consumeScript Script setting to be executed when consuming Items */
	public function setConsumeScript(?ScriptSetting $consumeScript) {
		$this->consumeScript = $consumeScript;
	}
    /**
     * @param ScriptSetting|null $consumeScript Script setting to be executed when consuming Items
     * @return CreateNamespaceRequest
     */
	public function withConsumeScript(?ScriptSetting $consumeScript): CreateNamespaceRequest {
		$this->consumeScript = $consumeScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when acquiring Simple Items */
	public function getSimpleItemAcquireScript(): ?ScriptSetting {
		return $this->simpleItemAcquireScript;
	}
    /** @param ScriptSetting|null $simpleItemAcquireScript Script setting to be executed when acquiring Simple Items */
	public function setSimpleItemAcquireScript(?ScriptSetting $simpleItemAcquireScript) {
		$this->simpleItemAcquireScript = $simpleItemAcquireScript;
	}
    /**
     * @param ScriptSetting|null $simpleItemAcquireScript Script setting to be executed when acquiring Simple Items
     * @return CreateNamespaceRequest
     */
	public function withSimpleItemAcquireScript(?ScriptSetting $simpleItemAcquireScript): CreateNamespaceRequest {
		$this->simpleItemAcquireScript = $simpleItemAcquireScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when consuming Simple Items */
	public function getSimpleItemConsumeScript(): ?ScriptSetting {
		return $this->simpleItemConsumeScript;
	}
    /** @param ScriptSetting|null $simpleItemConsumeScript Script setting to be executed when consuming Simple Items */
	public function setSimpleItemConsumeScript(?ScriptSetting $simpleItemConsumeScript) {
		$this->simpleItemConsumeScript = $simpleItemConsumeScript;
	}
    /**
     * @param ScriptSetting|null $simpleItemConsumeScript Script setting to be executed when consuming Simple Items
     * @return CreateNamespaceRequest
     */
	public function withSimpleItemConsumeScript(?ScriptSetting $simpleItemConsumeScript): CreateNamespaceRequest {
		$this->simpleItemConsumeScript = $simpleItemConsumeScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when acquiring Big Items */
	public function getBigItemAcquireScript(): ?ScriptSetting {
		return $this->bigItemAcquireScript;
	}
    /** @param ScriptSetting|null $bigItemAcquireScript Script setting to be executed when acquiring Big Items */
	public function setBigItemAcquireScript(?ScriptSetting $bigItemAcquireScript) {
		$this->bigItemAcquireScript = $bigItemAcquireScript;
	}
    /**
     * @param ScriptSetting|null $bigItemAcquireScript Script setting to be executed when acquiring Big Items
     * @return CreateNamespaceRequest
     */
	public function withBigItemAcquireScript(?ScriptSetting $bigItemAcquireScript): CreateNamespaceRequest {
		$this->bigItemAcquireScript = $bigItemAcquireScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when consuming Big Items */
	public function getBigItemConsumeScript(): ?ScriptSetting {
		return $this->bigItemConsumeScript;
	}
    /** @param ScriptSetting|null $bigItemConsumeScript Script setting to be executed when consuming Big Items */
	public function setBigItemConsumeScript(?ScriptSetting $bigItemConsumeScript) {
		$this->bigItemConsumeScript = $bigItemConsumeScript;
	}
    /**
     * @param ScriptSetting|null $bigItemConsumeScript Script setting to be executed when consuming Big Items
     * @return CreateNamespaceRequest
     */
	public function withBigItemConsumeScript(?ScriptSetting $bigItemConsumeScript): CreateNamespaceRequest {
		$this->bigItemConsumeScript = $bigItemConsumeScript;
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
            ->withAcquireScript(array_key_exists('acquireScript', $data) && $data['acquireScript'] !== null ? ScriptSetting::fromJson($data['acquireScript']) : null)
            ->withOverflowScript(array_key_exists('overflowScript', $data) && $data['overflowScript'] !== null ? ScriptSetting::fromJson($data['overflowScript']) : null)
            ->withConsumeScript(array_key_exists('consumeScript', $data) && $data['consumeScript'] !== null ? ScriptSetting::fromJson($data['consumeScript']) : null)
            ->withSimpleItemAcquireScript(array_key_exists('simpleItemAcquireScript', $data) && $data['simpleItemAcquireScript'] !== null ? ScriptSetting::fromJson($data['simpleItemAcquireScript']) : null)
            ->withSimpleItemConsumeScript(array_key_exists('simpleItemConsumeScript', $data) && $data['simpleItemConsumeScript'] !== null ? ScriptSetting::fromJson($data['simpleItemConsumeScript']) : null)
            ->withBigItemAcquireScript(array_key_exists('bigItemAcquireScript', $data) && $data['bigItemAcquireScript'] !== null ? ScriptSetting::fromJson($data['bigItemAcquireScript']) : null)
            ->withBigItemConsumeScript(array_key_exists('bigItemConsumeScript', $data) && $data['bigItemConsumeScript'] !== null ? ScriptSetting::fromJson($data['bigItemConsumeScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "acquireScript" => $this->getAcquireScript() !== null ? $this->getAcquireScript()->toJson() : null,
            "overflowScript" => $this->getOverflowScript() !== null ? $this->getOverflowScript()->toJson() : null,
            "consumeScript" => $this->getConsumeScript() !== null ? $this->getConsumeScript()->toJson() : null,
            "simpleItemAcquireScript" => $this->getSimpleItemAcquireScript() !== null ? $this->getSimpleItemAcquireScript()->toJson() : null,
            "simpleItemConsumeScript" => $this->getSimpleItemConsumeScript() !== null ? $this->getSimpleItemConsumeScript()->toJson() : null,
            "bigItemAcquireScript" => $this->getBigItemAcquireScript() !== null ? $this->getBigItemAcquireScript()->toJson() : null,
            "bigItemConsumeScript" => $this->getBigItemConsumeScript() !== null ? $this->getBigItemConsumeScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}