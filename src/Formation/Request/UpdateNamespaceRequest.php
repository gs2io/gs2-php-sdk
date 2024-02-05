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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\TransactionSetting;
use Gs2\Formation\Model\ScriptSetting;
use Gs2\Formation\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var ScriptSetting */
    private $updateMoldScript;
    /** @var ScriptSetting */
    private $updateFormScript;
    /** @var ScriptSetting */
    private $updatePropertyFormScript;
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
	public function getUpdateMoldScript(): ?ScriptSetting {
		return $this->updateMoldScript;
	}
	public function setUpdateMoldScript(?ScriptSetting $updateMoldScript) {
		$this->updateMoldScript = $updateMoldScript;
	}
	public function withUpdateMoldScript(?ScriptSetting $updateMoldScript): UpdateNamespaceRequest {
		$this->updateMoldScript = $updateMoldScript;
		return $this;
	}
	public function getUpdateFormScript(): ?ScriptSetting {
		return $this->updateFormScript;
	}
	public function setUpdateFormScript(?ScriptSetting $updateFormScript) {
		$this->updateFormScript = $updateFormScript;
	}
	public function withUpdateFormScript(?ScriptSetting $updateFormScript): UpdateNamespaceRequest {
		$this->updateFormScript = $updateFormScript;
		return $this;
	}
	public function getUpdatePropertyFormScript(): ?ScriptSetting {
		return $this->updatePropertyFormScript;
	}
	public function setUpdatePropertyFormScript(?ScriptSetting $updatePropertyFormScript) {
		$this->updatePropertyFormScript = $updatePropertyFormScript;
	}
	public function withUpdatePropertyFormScript(?ScriptSetting $updatePropertyFormScript): UpdateNamespaceRequest {
		$this->updatePropertyFormScript = $updatePropertyFormScript;
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
            ->withUpdateMoldScript(array_key_exists('updateMoldScript', $data) && $data['updateMoldScript'] !== null ? ScriptSetting::fromJson($data['updateMoldScript']) : null)
            ->withUpdateFormScript(array_key_exists('updateFormScript', $data) && $data['updateFormScript'] !== null ? ScriptSetting::fromJson($data['updateFormScript']) : null)
            ->withUpdatePropertyFormScript(array_key_exists('updatePropertyFormScript', $data) && $data['updatePropertyFormScript'] !== null ? ScriptSetting::fromJson($data['updatePropertyFormScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "updateMoldScript" => $this->getUpdateMoldScript() !== null ? $this->getUpdateMoldScript()->toJson() : null,
            "updateFormScript" => $this->getUpdateFormScript() !== null ? $this->getUpdateFormScript()->toJson() : null,
            "updatePropertyFormScript" => $this->getUpdatePropertyFormScript() !== null ? $this->getUpdatePropertyFormScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}