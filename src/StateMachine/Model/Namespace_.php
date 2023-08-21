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

namespace Gs2\StateMachine\Model;

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
     * @var ScriptSetting
	 */
	private $startScript;
	/**
     * @var ScriptSetting
	 */
	private $passScript;
	/**
     * @var ScriptSetting
	 */
	private $errorScript;
	/**
     * @var int
	 */
	private $lowestStateMachineVersion;
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
	public function getStartScript(): ?ScriptSetting {
		return $this->startScript;
	}
	public function setStartScript(?ScriptSetting $startScript) {
		$this->startScript = $startScript;
	}
	public function withStartScript(?ScriptSetting $startScript): Namespace_ {
		$this->startScript = $startScript;
		return $this;
	}
	public function getPassScript(): ?ScriptSetting {
		return $this->passScript;
	}
	public function setPassScript(?ScriptSetting $passScript) {
		$this->passScript = $passScript;
	}
	public function withPassScript(?ScriptSetting $passScript): Namespace_ {
		$this->passScript = $passScript;
		return $this;
	}
	public function getErrorScript(): ?ScriptSetting {
		return $this->errorScript;
	}
	public function setErrorScript(?ScriptSetting $errorScript) {
		$this->errorScript = $errorScript;
	}
	public function withErrorScript(?ScriptSetting $errorScript): Namespace_ {
		$this->errorScript = $errorScript;
		return $this;
	}
	public function getLowestStateMachineVersion(): ?int {
		return $this->lowestStateMachineVersion;
	}
	public function setLowestStateMachineVersion(?int $lowestStateMachineVersion) {
		$this->lowestStateMachineVersion = $lowestStateMachineVersion;
	}
	public function withLowestStateMachineVersion(?int $lowestStateMachineVersion): Namespace_ {
		$this->lowestStateMachineVersion = $lowestStateMachineVersion;
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
            ->withStartScript(array_key_exists('startScript', $data) && $data['startScript'] !== null ? ScriptSetting::fromJson($data['startScript']) : null)
            ->withPassScript(array_key_exists('passScript', $data) && $data['passScript'] !== null ? ScriptSetting::fromJson($data['passScript']) : null)
            ->withErrorScript(array_key_exists('errorScript', $data) && $data['errorScript'] !== null ? ScriptSetting::fromJson($data['errorScript']) : null)
            ->withLowestStateMachineVersion(array_key_exists('lowestStateMachineVersion', $data) && $data['lowestStateMachineVersion'] !== null ? $data['lowestStateMachineVersion'] : null)
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
            "startScript" => $this->getStartScript() !== null ? $this->getStartScript()->toJson() : null,
            "passScript" => $this->getPassScript() !== null ? $this->getPassScript()->toJson() : null,
            "errorScript" => $this->getErrorScript() !== null ? $this->getErrorScript()->toJson() : null,
            "lowestStateMachineVersion" => $this->getLowestStateMachineVersion(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}