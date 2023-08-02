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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Experience\Model\TransactionSetting;
use Gs2\Experience\Model\ScriptSetting;
use Gs2\Experience\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var string */
    private $experienceCapScriptId;
    /** @var ScriptSetting */
    private $changeExperienceScript;
    /** @var ScriptSetting */
    private $changeRankScript;
    /** @var ScriptSetting */
    private $changeRankCapScript;
    /** @var ScriptSetting */
    private $overflowExperienceScript;
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
	public function getExperienceCapScriptId(): ?string {
		return $this->experienceCapScriptId;
	}
	public function setExperienceCapScriptId(?string $experienceCapScriptId) {
		$this->experienceCapScriptId = $experienceCapScriptId;
	}
	public function withExperienceCapScriptId(?string $experienceCapScriptId): UpdateNamespaceRequest {
		$this->experienceCapScriptId = $experienceCapScriptId;
		return $this;
	}
	public function getChangeExperienceScript(): ?ScriptSetting {
		return $this->changeExperienceScript;
	}
	public function setChangeExperienceScript(?ScriptSetting $changeExperienceScript) {
		$this->changeExperienceScript = $changeExperienceScript;
	}
	public function withChangeExperienceScript(?ScriptSetting $changeExperienceScript): UpdateNamespaceRequest {
		$this->changeExperienceScript = $changeExperienceScript;
		return $this;
	}
	public function getChangeRankScript(): ?ScriptSetting {
		return $this->changeRankScript;
	}
	public function setChangeRankScript(?ScriptSetting $changeRankScript) {
		$this->changeRankScript = $changeRankScript;
	}
	public function withChangeRankScript(?ScriptSetting $changeRankScript): UpdateNamespaceRequest {
		$this->changeRankScript = $changeRankScript;
		return $this;
	}
	public function getChangeRankCapScript(): ?ScriptSetting {
		return $this->changeRankCapScript;
	}
	public function setChangeRankCapScript(?ScriptSetting $changeRankCapScript) {
		$this->changeRankCapScript = $changeRankCapScript;
	}
	public function withChangeRankCapScript(?ScriptSetting $changeRankCapScript): UpdateNamespaceRequest {
		$this->changeRankCapScript = $changeRankCapScript;
		return $this;
	}
	public function getOverflowExperienceScript(): ?ScriptSetting {
		return $this->overflowExperienceScript;
	}
	public function setOverflowExperienceScript(?ScriptSetting $overflowExperienceScript) {
		$this->overflowExperienceScript = $overflowExperienceScript;
	}
	public function withOverflowExperienceScript(?ScriptSetting $overflowExperienceScript): UpdateNamespaceRequest {
		$this->overflowExperienceScript = $overflowExperienceScript;
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
            ->withExperienceCapScriptId(array_key_exists('experienceCapScriptId', $data) && $data['experienceCapScriptId'] !== null ? $data['experienceCapScriptId'] : null)
            ->withChangeExperienceScript(array_key_exists('changeExperienceScript', $data) && $data['changeExperienceScript'] !== null ? ScriptSetting::fromJson($data['changeExperienceScript']) : null)
            ->withChangeRankScript(array_key_exists('changeRankScript', $data) && $data['changeRankScript'] !== null ? ScriptSetting::fromJson($data['changeRankScript']) : null)
            ->withChangeRankCapScript(array_key_exists('changeRankCapScript', $data) && $data['changeRankCapScript'] !== null ? ScriptSetting::fromJson($data['changeRankCapScript']) : null)
            ->withOverflowExperienceScript(array_key_exists('overflowExperienceScript', $data) && $data['overflowExperienceScript'] !== null ? ScriptSetting::fromJson($data['overflowExperienceScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "experienceCapScriptId" => $this->getExperienceCapScriptId(),
            "changeExperienceScript" => $this->getChangeExperienceScript() !== null ? $this->getChangeExperienceScript()->toJson() : null,
            "changeRankScript" => $this->getChangeRankScript() !== null ? $this->getChangeRankScript()->toJson() : null,
            "changeRankCapScript" => $this->getChangeRankCapScript() !== null ? $this->getChangeRankCapScript()->toJson() : null,
            "overflowExperienceScript" => $this->getOverflowExperienceScript() !== null ? $this->getOverflowExperienceScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}