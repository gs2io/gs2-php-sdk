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

namespace Gs2\Idle\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Idle\Model\TransactionSetting;
use Gs2\Idle\Model\TransactionSettingV2;
use Gs2\Idle\Model\ScriptSetting;
use Gs2\Idle\Model\LogSetting;

/**
 * Request for updateNamespace: Update Namespace
 *
 * @see https://docs.gs2.io/api_reference/idle/sdk/#updatenamespace
 */
class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var ScriptSetting Script setting executed when rewards are received */
    private $receiveScript;
    /** @var string Script GRN for dynamically determining idle reward Acquire Actions */
    private $overrideAcquireActionsScriptId;
    /** @var LogSetting Log Output Setting */
    private $logSetting;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return UpdateNamespaceRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
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
     * @return UpdateNamespaceRequest
     */
	public function withDescription(?string $description): UpdateNamespaceRequest {
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
     * @return UpdateNamespaceRequest
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): UpdateNamespaceRequest {
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
     * @return UpdateNamespaceRequest
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): UpdateNamespaceRequest {
		$this->transactionSettingV2 = $transactionSettingV2;
		return $this;
	}
    /** @return ScriptSetting|null Script setting executed when rewards are received */
	public function getReceiveScript(): ?ScriptSetting {
		return $this->receiveScript;
	}
    /** @param ScriptSetting|null $receiveScript Script setting executed when rewards are received */
	public function setReceiveScript(?ScriptSetting $receiveScript) {
		$this->receiveScript = $receiveScript;
	}
    /**
     * @param ScriptSetting|null $receiveScript Script setting executed when rewards are received
     * @return UpdateNamespaceRequest
     */
	public function withReceiveScript(?ScriptSetting $receiveScript): UpdateNamespaceRequest {
		$this->receiveScript = $receiveScript;
		return $this;
	}
    /** @return string|null Script GRN for dynamically determining idle reward Acquire Actions */
	public function getOverrideAcquireActionsScriptId(): ?string {
		return $this->overrideAcquireActionsScriptId;
	}
    /** @param string|null $overrideAcquireActionsScriptId Script GRN for dynamically determining idle reward Acquire Actions */
	public function setOverrideAcquireActionsScriptId(?string $overrideAcquireActionsScriptId) {
		$this->overrideAcquireActionsScriptId = $overrideAcquireActionsScriptId;
	}
    /**
     * @param string|null $overrideAcquireActionsScriptId Script GRN for dynamically determining idle reward Acquire Actions
     * @return UpdateNamespaceRequest
     */
	public function withOverrideAcquireActionsScriptId(?string $overrideAcquireActionsScriptId): UpdateNamespaceRequest {
		$this->overrideAcquireActionsScriptId = $overrideAcquireActionsScriptId;
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
     * @return UpdateNamespaceRequest
     */
	public function withLogSetting(?LogSetting $logSetting): UpdateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withReceiveScript(array_key_exists('receiveScript', $data) && $data['receiveScript'] !== null ? ScriptSetting::fromJson($data['receiveScript']) : null)
            ->withOverrideAcquireActionsScriptId(array_key_exists('overrideAcquireActionsScriptId', $data) && $data['overrideAcquireActionsScriptId'] !== null ? $data['overrideAcquireActionsScriptId'] : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "receiveScript" => $this->getReceiveScript() !== null ? $this->getReceiveScript()->toJson() : null,
            "overrideAcquireActionsScriptId" => $this->getOverrideAcquireActionsScriptId(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}