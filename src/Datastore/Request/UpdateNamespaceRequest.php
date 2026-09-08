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

namespace Gs2\Datastore\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Datastore\Model\TransactionSetting;
use Gs2\Datastore\Model\TransactionSettingV2;
use Gs2\Datastore\Model\LogSetting;
use Gs2\Datastore\Model\ScriptSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var TransactionSettingV2 */
    private $transactionSettingV2;
    /** @var LogSetting */
    private $logSetting;
    /** @var ScriptSetting */
    private $doneUploadScript;
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
	public function getDoneUploadScript(): ?ScriptSetting {
		return $this->doneUploadScript;
	}
	public function setDoneUploadScript(?ScriptSetting $doneUploadScript) {
		$this->doneUploadScript = $doneUploadScript;
	}
	public function withDoneUploadScript(?ScriptSetting $doneUploadScript): UpdateNamespaceRequest {
		$this->doneUploadScript = $doneUploadScript;
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
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withDoneUploadScript(array_key_exists('doneUploadScript', $data) && $data['doneUploadScript'] !== null ? ScriptSetting::fromJson($data['doneUploadScript']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "doneUploadScript" => $this->getDoneUploadScript() !== null ? $this->getDoneUploadScript()->toJson() : null,
        );
    }
}