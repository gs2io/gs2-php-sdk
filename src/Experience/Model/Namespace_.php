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

namespace Gs2\Experience\Model;

use Gs2\Core\Model\IModel;


/**
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/experience/sdk/#namespace
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
     * @var TransactionSetting Transaction Setting
	 */
	private $transactionSetting;
	/**
     * @var TransactionSettingV2 Transaction Setting (V2)
	 */
	private $transactionSettingV2;
	/**
     * @var string Script GRN to dynamically determine rank caps
	 */
	private $rankCapScriptId;
	/**
     * @var ScriptSetting Script setting to be executed when experience value changes
	 */
	private $changeExperienceScript;
	/**
     * @var ScriptSetting Script setting to be executed when rank changes
	 */
	private $changeRankScript;
	/**
     * @var ScriptSetting Script setting to be executed when rank cap changes
	 */
	private $changeRankCapScript;
	/**
     * @var string GRN of the script executed when experience overflows
	 */
	private $overflowExperienceScript;
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
     * @return Namespace_
     */
	public function withRankCapScriptId(?string $rankCapScriptId): Namespace_ {
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
     * @return Namespace_
     */
	public function withChangeExperienceScript(?ScriptSetting $changeExperienceScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withChangeRankScript(?ScriptSetting $changeRankScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withChangeRankCapScript(?ScriptSetting $changeRankCapScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withOverflowExperienceScript(?string $overflowExperienceScript): Namespace_ {
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
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withRankCapScriptId(array_key_exists('rankCapScriptId', $data) && $data['rankCapScriptId'] !== null ? $data['rankCapScriptId'] : null)
            ->withChangeExperienceScript(array_key_exists('changeExperienceScript', $data) && $data['changeExperienceScript'] !== null ? ScriptSetting::fromJson($data['changeExperienceScript']) : null)
            ->withChangeRankScript(array_key_exists('changeRankScript', $data) && $data['changeRankScript'] !== null ? ScriptSetting::fromJson($data['changeRankScript']) : null)
            ->withChangeRankCapScript(array_key_exists('changeRankCapScript', $data) && $data['changeRankCapScript'] !== null ? ScriptSetting::fromJson($data['changeRankCapScript']) : null)
            ->withOverflowExperienceScript(array_key_exists('overflowExperienceScript', $data) && $data['overflowExperienceScript'] !== null ? $data['overflowExperienceScript'] : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "rankCapScriptId" => $this->getRankCapScriptId(),
            "changeExperienceScript" => $this->getChangeExperienceScript() !== null ? $this->getChangeExperienceScript()->toJson() : null,
            "changeRankScript" => $this->getChangeRankScript() !== null ? $this->getChangeRankScript()->toJson() : null,
            "changeRankCapScript" => $this->getChangeRankCapScript() !== null ? $this->getChangeRankCapScript()->toJson() : null,
            "overflowExperienceScript" => $this->getOverflowExperienceScript(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}