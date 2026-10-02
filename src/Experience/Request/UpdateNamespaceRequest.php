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
use Gs2\Experience\Model\TransactionSettingV2;
use Gs2\Experience\Model\ScriptSetting;
use Gs2\Experience\Model\LogSetting;

/**
 * Request for updateNamespace: Update Namespace
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#updatenamespace
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
    /** @var string Script GRN to dynamically determine rank caps */
    private $rankCapScriptId;
    /** @var ScriptSetting Script setting to be executed when experience value changes */
    private $changeExperienceScript;
    /** @var ScriptSetting Script setting to be executed when rank changes */
    private $changeRankScript;
    /** @var ScriptSetting Script setting to be executed when rank cap changes */
    private $changeRankCapScript;
    /** @var string GRN of the script executed when experience overflows */
    private $overflowExperienceScript;
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
    /** @return string|null Script GRN to dynamically determine rank caps */
	public function getRankCapScriptId(): ?string {
		return $this->rankCapScriptId;
	}
    /** @param string|null $rankCapScriptId Script GRN to dynamically determine rank caps */
	public function setRankCapScriptId(?string $rankCapScriptId) {
		$this->rankCapScriptId = $rankCapScriptId;
	}
    /**
     * @param string|null $rankCapScriptId Script GRN to dynamically determine rank caps
     * @return UpdateNamespaceRequest
     */
	public function withRankCapScriptId(?string $rankCapScriptId): UpdateNamespaceRequest {
		$this->rankCapScriptId = $rankCapScriptId;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when experience value changes */
	public function getChangeExperienceScript(): ?ScriptSetting {
		return $this->changeExperienceScript;
	}
    /** @param ScriptSetting|null $changeExperienceScript Script setting to be executed when experience value changes */
	public function setChangeExperienceScript(?ScriptSetting $changeExperienceScript) {
		$this->changeExperienceScript = $changeExperienceScript;
	}
    /**
     * @param ScriptSetting|null $changeExperienceScript Script setting to be executed when experience value changes
     * @return UpdateNamespaceRequest
     */
	public function withChangeExperienceScript(?ScriptSetting $changeExperienceScript): UpdateNamespaceRequest {
		$this->changeExperienceScript = $changeExperienceScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when rank changes */
	public function getChangeRankScript(): ?ScriptSetting {
		return $this->changeRankScript;
	}
    /** @param ScriptSetting|null $changeRankScript Script setting to be executed when rank changes */
	public function setChangeRankScript(?ScriptSetting $changeRankScript) {
		$this->changeRankScript = $changeRankScript;
	}
    /**
     * @param ScriptSetting|null $changeRankScript Script setting to be executed when rank changes
     * @return UpdateNamespaceRequest
     */
	public function withChangeRankScript(?ScriptSetting $changeRankScript): UpdateNamespaceRequest {
		$this->changeRankScript = $changeRankScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when rank cap changes */
	public function getChangeRankCapScript(): ?ScriptSetting {
		return $this->changeRankCapScript;
	}
    /** @param ScriptSetting|null $changeRankCapScript Script setting to be executed when rank cap changes */
	public function setChangeRankCapScript(?ScriptSetting $changeRankCapScript) {
		$this->changeRankCapScript = $changeRankCapScript;
	}
    /**
     * @param ScriptSetting|null $changeRankCapScript Script setting to be executed when rank cap changes
     * @return UpdateNamespaceRequest
     */
	public function withChangeRankCapScript(?ScriptSetting $changeRankCapScript): UpdateNamespaceRequest {
		$this->changeRankCapScript = $changeRankCapScript;
		return $this;
	}
    /** @return string|null GRN of the script executed when experience overflows */
	public function getOverflowExperienceScript(): ?string {
		return $this->overflowExperienceScript;
	}
    /** @param string|null $overflowExperienceScript GRN of the script executed when experience overflows */
	public function setOverflowExperienceScript(?string $overflowExperienceScript) {
		$this->overflowExperienceScript = $overflowExperienceScript;
	}
    /**
     * @param string|null $overflowExperienceScript GRN of the script executed when experience overflows
     * @return UpdateNamespaceRequest
     */
	public function withOverflowExperienceScript(?string $overflowExperienceScript): UpdateNamespaceRequest {
		$this->overflowExperienceScript = $overflowExperienceScript;
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
            ->withRankCapScriptId(array_key_exists('rankCapScriptId', $data) && $data['rankCapScriptId'] !== null ? $data['rankCapScriptId'] : null)
            ->withChangeExperienceScript(array_key_exists('changeExperienceScript', $data) && $data['changeExperienceScript'] !== null ? ScriptSetting::fromJson($data['changeExperienceScript']) : null)
            ->withChangeRankScript(array_key_exists('changeRankScript', $data) && $data['changeRankScript'] !== null ? ScriptSetting::fromJson($data['changeRankScript']) : null)
            ->withChangeRankCapScript(array_key_exists('changeRankCapScript', $data) && $data['changeRankCapScript'] !== null ? ScriptSetting::fromJson($data['changeRankCapScript']) : null)
            ->withOverflowExperienceScript(array_key_exists('overflowExperienceScript', $data) && $data['overflowExperienceScript'] !== null ? $data['overflowExperienceScript'] : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "rankCapScriptId" => $this->getRankCapScriptId(),
            "changeExperienceScript" => $this->getChangeExperienceScript() !== null ? $this->getChangeExperienceScript()->toJson() : null,
            "changeRankScript" => $this->getChangeRankScript() !== null ? $this->getChangeRankScript()->toJson() : null,
            "changeRankCapScript" => $this->getChangeRankCapScript() !== null ? $this->getChangeRankCapScript()->toJson() : null,
            "overflowExperienceScript" => $this->getOverflowExperienceScript(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}