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

namespace Gs2\StateMachine\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\StateMachine\Model\TransactionSetting;
use Gs2\StateMachine\Model\TransactionSettingV2;
use Gs2\StateMachine\Model\ScriptSetting;
use Gs2\StateMachine\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Whether to support speculative execution */
    private $supportSpeculativeExecution;
    /** @var TransactionSetting Transaction Settings */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var ScriptSetting Script setting to execute when starting the state machine */
    private $startScript;
    /** @var ScriptSetting Script setting to execute when the state machine is successfully completed */
    private $passScript;
    /** @var ScriptSetting Script setting to execute when the state machine fails */
    private $errorScript;
    /** @var int Lowest version of the state machine */
    private $lowestStateMachineVersion;
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
    /** @return string|null Whether to support speculative execution */
	public function getSupportSpeculativeExecution(): ?string {
		return $this->supportSpeculativeExecution;
	}
    /** @param string|null $supportSpeculativeExecution Whether to support speculative execution */
	public function setSupportSpeculativeExecution(?string $supportSpeculativeExecution) {
		$this->supportSpeculativeExecution = $supportSpeculativeExecution;
	}
    /**
     * @param string|null $supportSpeculativeExecution Whether to support speculative execution
     * @return CreateNamespaceRequest
     */
	public function withSupportSpeculativeExecution(?string $supportSpeculativeExecution): CreateNamespaceRequest {
		$this->supportSpeculativeExecution = $supportSpeculativeExecution;
		return $this;
	}
    /**
     * @return TransactionSetting|null Transaction Settings
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
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
    /** @return ScriptSetting|null Script setting to execute when starting the state machine */
	public function getStartScript(): ?ScriptSetting {
		return $this->startScript;
	}
    /** @param ScriptSetting|null $startScript Script setting to execute when starting the state machine */
	public function setStartScript(?ScriptSetting $startScript) {
		$this->startScript = $startScript;
	}
    /**
     * @param ScriptSetting|null $startScript Script setting to execute when starting the state machine
     * @return CreateNamespaceRequest
     */
	public function withStartScript(?ScriptSetting $startScript): CreateNamespaceRequest {
		$this->startScript = $startScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when the state machine is successfully completed */
	public function getPassScript(): ?ScriptSetting {
		return $this->passScript;
	}
    /** @param ScriptSetting|null $passScript Script setting to execute when the state machine is successfully completed */
	public function setPassScript(?ScriptSetting $passScript) {
		$this->passScript = $passScript;
	}
    /**
     * @param ScriptSetting|null $passScript Script setting to execute when the state machine is successfully completed
     * @return CreateNamespaceRequest
     */
	public function withPassScript(?ScriptSetting $passScript): CreateNamespaceRequest {
		$this->passScript = $passScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to execute when the state machine fails */
	public function getErrorScript(): ?ScriptSetting {
		return $this->errorScript;
	}
    /** @param ScriptSetting|null $errorScript Script setting to execute when the state machine fails */
	public function setErrorScript(?ScriptSetting $errorScript) {
		$this->errorScript = $errorScript;
	}
    /**
     * @param ScriptSetting|null $errorScript Script setting to execute when the state machine fails
     * @return CreateNamespaceRequest
     */
	public function withErrorScript(?ScriptSetting $errorScript): CreateNamespaceRequest {
		$this->errorScript = $errorScript;
		return $this;
	}
    /** @return int|null Lowest version of the state machine */
	public function getLowestStateMachineVersion(): ?int {
		return $this->lowestStateMachineVersion;
	}
    /** @param int|null $lowestStateMachineVersion Lowest version of the state machine */
	public function setLowestStateMachineVersion(?int $lowestStateMachineVersion) {
		$this->lowestStateMachineVersion = $lowestStateMachineVersion;
	}
    /**
     * @param int|null $lowestStateMachineVersion Lowest version of the state machine
     * @return CreateNamespaceRequest
     */
	public function withLowestStateMachineVersion(?int $lowestStateMachineVersion): CreateNamespaceRequest {
		$this->lowestStateMachineVersion = $lowestStateMachineVersion;
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
            ->withSupportSpeculativeExecution(array_key_exists('supportSpeculativeExecution', $data) && $data['supportSpeculativeExecution'] !== null ? $data['supportSpeculativeExecution'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withStartScript(array_key_exists('startScript', $data) && $data['startScript'] !== null ? ScriptSetting::fromJson($data['startScript']) : null)
            ->withPassScript(array_key_exists('passScript', $data) && $data['passScript'] !== null ? ScriptSetting::fromJson($data['passScript']) : null)
            ->withErrorScript(array_key_exists('errorScript', $data) && $data['errorScript'] !== null ? ScriptSetting::fromJson($data['errorScript']) : null)
            ->withLowestStateMachineVersion(array_key_exists('lowestStateMachineVersion', $data) && $data['lowestStateMachineVersion'] !== null ? $data['lowestStateMachineVersion'] : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "supportSpeculativeExecution" => $this->getSupportSpeculativeExecution(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "startScript" => $this->getStartScript() !== null ? $this->getStartScript()->toJson() : null,
            "passScript" => $this->getPassScript() !== null ? $this->getPassScript()->toJson() : null,
            "errorScript" => $this->getErrorScript() !== null ? $this->getErrorScript()->toJson() : null,
            "lowestStateMachineVersion" => $this->getLowestStateMachineVersion(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}