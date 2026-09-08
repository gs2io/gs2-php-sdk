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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Dictionary\Model\TransactionSetting;
use Gs2\Dictionary\Model\TransactionSettingV2;
use Gs2\Dictionary\Model\ScriptSetting;
use Gs2\Dictionary\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var TransactionSettingV2 */
    private $transactionSettingV2;
    /** @var ScriptSetting */
    private $entryScript;
    /** @var string */
    private $duplicateEntryScript;
    /** @var LogSetting */
    private $logSetting;
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
    /**
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): UpdateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getTransactionSettingV2(): ?TransactionSettingV2 {
		return $this->transactionSettingV2;
	}
	public function setTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2) {
		$this->transactionSettingV2 = $transactionSettingV2;
	}
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): UpdateNamespaceRequest {
		$this->transactionSettingV2 = $transactionSettingV2;
		return $this;
	}
	public function getEntryScript(): ?ScriptSetting {
		return $this->entryScript;
	}
	public function setEntryScript(?ScriptSetting $entryScript) {
		$this->entryScript = $entryScript;
	}
	public function withEntryScript(?ScriptSetting $entryScript): UpdateNamespaceRequest {
		$this->entryScript = $entryScript;
		return $this;
	}
	public function getDuplicateEntryScript(): ?string {
		return $this->duplicateEntryScript;
	}
	public function setDuplicateEntryScript(?string $duplicateEntryScript) {
		$this->duplicateEntryScript = $duplicateEntryScript;
	}
	public function withDuplicateEntryScript(?string $duplicateEntryScript): UpdateNamespaceRequest {
		$this->duplicateEntryScript = $duplicateEntryScript;
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

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withEntryScript(array_key_exists('entryScript', $data) && $data['entryScript'] !== null ? ScriptSetting::fromJson($data['entryScript']) : null)
            ->withDuplicateEntryScript(array_key_exists('duplicateEntryScript', $data) && $data['duplicateEntryScript'] !== null ? $data['duplicateEntryScript'] : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "entryScript" => $this->getEntryScript() !== null ? $this->getEntryScript()->toJson() : null,
            "duplicateEntryScript" => $this->getDuplicateEntryScript(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}