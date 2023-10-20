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


class Namespace_ implements IModel {
	/**
     * @var string
	 */
	private $namespaceId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var TransactionSetting
	 */
	private $transactionSetting;
	/**
     * @var string
	 */
	private $rankCapScriptId;
	/**
     * @var ScriptSetting
	 */
	private $changeExperienceScript;
	/**
     * @var ScriptSetting
	 */
	private $changeRankScript;
	/**
     * @var ScriptSetting
	 */
	private $changeRankCapScript;
	/**
     * @var ScriptSetting
	 */
	private $overflowExperienceScript;
	/**
     * @var LogSetting
	 */
	private $logSetting;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
	public function withTransactionSetting(?TransactionSetting $transactionSetting): Namespace_ {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getRankCapScriptId(): ?string {
		return $this->rankCapScriptId;
	}
	public function setRankCapScriptId(?string $rankCapScriptId) {
		$this->rankCapScriptId = $rankCapScriptId;
	}
	public function withRankCapScriptId(?string $rankCapScriptId): Namespace_ {
		$this->rankCapScriptId = $rankCapScriptId;
		return $this;
	}
	public function getChangeExperienceScript(): ?ScriptSetting {
		return $this->changeExperienceScript;
	}
	public function setChangeExperienceScript(?ScriptSetting $changeExperienceScript) {
		$this->changeExperienceScript = $changeExperienceScript;
	}
	public function withChangeExperienceScript(?ScriptSetting $changeExperienceScript): Namespace_ {
		$this->changeExperienceScript = $changeExperienceScript;
		return $this;
	}
	public function getChangeRankScript(): ?ScriptSetting {
		return $this->changeRankScript;
	}
	public function setChangeRankScript(?ScriptSetting $changeRankScript) {
		$this->changeRankScript = $changeRankScript;
	}
	public function withChangeRankScript(?ScriptSetting $changeRankScript): Namespace_ {
		$this->changeRankScript = $changeRankScript;
		return $this;
	}
	public function getChangeRankCapScript(): ?ScriptSetting {
		return $this->changeRankCapScript;
	}
	public function setChangeRankCapScript(?ScriptSetting $changeRankCapScript) {
		$this->changeRankCapScript = $changeRankCapScript;
	}
	public function withChangeRankCapScript(?ScriptSetting $changeRankCapScript): Namespace_ {
		$this->changeRankCapScript = $changeRankCapScript;
		return $this;
	}
	public function getOverflowExperienceScript(): ?ScriptSetting {
		return $this->overflowExperienceScript;
	}
	public function setOverflowExperienceScript(?ScriptSetting $overflowExperienceScript) {
		$this->overflowExperienceScript = $overflowExperienceScript;
	}
	public function withOverflowExperienceScript(?ScriptSetting $overflowExperienceScript): Namespace_ {
		$this->overflowExperienceScript = $overflowExperienceScript;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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
            ->withRankCapScriptId(array_key_exists('rankCapScriptId', $data) && $data['rankCapScriptId'] !== null ? $data['rankCapScriptId'] : null)
            ->withChangeExperienceScript(array_key_exists('changeExperienceScript', $data) && $data['changeExperienceScript'] !== null ? ScriptSetting::fromJson($data['changeExperienceScript']) : null)
            ->withChangeRankScript(array_key_exists('changeRankScript', $data) && $data['changeRankScript'] !== null ? ScriptSetting::fromJson($data['changeRankScript']) : null)
            ->withChangeRankCapScript(array_key_exists('changeRankCapScript', $data) && $data['changeRankCapScript'] !== null ? ScriptSetting::fromJson($data['changeRankCapScript']) : null)
            ->withOverflowExperienceScript(array_key_exists('overflowExperienceScript', $data) && $data['overflowExperienceScript'] !== null ? ScriptSetting::fromJson($data['overflowExperienceScript']) : null)
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
            "rankCapScriptId" => $this->getRankCapScriptId(),
            "changeExperienceScript" => $this->getChangeExperienceScript() !== null ? $this->getChangeExperienceScript()->toJson() : null,
            "changeRankScript" => $this->getChangeRankScript() !== null ? $this->getChangeRankScript()->toJson() : null,
            "changeRankCapScript" => $this->getChangeRankCapScript() !== null ? $this->getChangeRankCapScript()->toJson() : null,
            "overflowExperienceScript" => $this->getOverflowExperienceScript() !== null ? $this->getOverflowExperienceScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}