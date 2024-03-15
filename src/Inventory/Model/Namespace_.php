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

namespace Gs2\Inventory\Model;

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
	private $acquireScript;
	/**
     * @var ScriptSetting
	 */
	private $overflowScript;
	/**
     * @var ScriptSetting
	 */
	private $consumeScript;
	/**
     * @var ScriptSetting
	 */
	private $simpleItemAcquireScript;
	/**
     * @var ScriptSetting
	 */
	private $simpleItemConsumeScript;
	/**
     * @var ScriptSetting
	 */
	private $bigItemAcquireScript;
	/**
     * @var ScriptSetting
	 */
	private $bigItemConsumeScript;
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
	public function getAcquireScript(): ?ScriptSetting {
		return $this->acquireScript;
	}
	public function setAcquireScript(?ScriptSetting $acquireScript) {
		$this->acquireScript = $acquireScript;
	}
	public function withAcquireScript(?ScriptSetting $acquireScript): Namespace_ {
		$this->acquireScript = $acquireScript;
		return $this;
	}
	public function getOverflowScript(): ?ScriptSetting {
		return $this->overflowScript;
	}
	public function setOverflowScript(?ScriptSetting $overflowScript) {
		$this->overflowScript = $overflowScript;
	}
	public function withOverflowScript(?ScriptSetting $overflowScript): Namespace_ {
		$this->overflowScript = $overflowScript;
		return $this;
	}
	public function getConsumeScript(): ?ScriptSetting {
		return $this->consumeScript;
	}
	public function setConsumeScript(?ScriptSetting $consumeScript) {
		$this->consumeScript = $consumeScript;
	}
	public function withConsumeScript(?ScriptSetting $consumeScript): Namespace_ {
		$this->consumeScript = $consumeScript;
		return $this;
	}
	public function getSimpleItemAcquireScript(): ?ScriptSetting {
		return $this->simpleItemAcquireScript;
	}
	public function setSimpleItemAcquireScript(?ScriptSetting $simpleItemAcquireScript) {
		$this->simpleItemAcquireScript = $simpleItemAcquireScript;
	}
	public function withSimpleItemAcquireScript(?ScriptSetting $simpleItemAcquireScript): Namespace_ {
		$this->simpleItemAcquireScript = $simpleItemAcquireScript;
		return $this;
	}
	public function getSimpleItemConsumeScript(): ?ScriptSetting {
		return $this->simpleItemConsumeScript;
	}
	public function setSimpleItemConsumeScript(?ScriptSetting $simpleItemConsumeScript) {
		$this->simpleItemConsumeScript = $simpleItemConsumeScript;
	}
	public function withSimpleItemConsumeScript(?ScriptSetting $simpleItemConsumeScript): Namespace_ {
		$this->simpleItemConsumeScript = $simpleItemConsumeScript;
		return $this;
	}
	public function getBigItemAcquireScript(): ?ScriptSetting {
		return $this->bigItemAcquireScript;
	}
	public function setBigItemAcquireScript(?ScriptSetting $bigItemAcquireScript) {
		$this->bigItemAcquireScript = $bigItemAcquireScript;
	}
	public function withBigItemAcquireScript(?ScriptSetting $bigItemAcquireScript): Namespace_ {
		$this->bigItemAcquireScript = $bigItemAcquireScript;
		return $this;
	}
	public function getBigItemConsumeScript(): ?ScriptSetting {
		return $this->bigItemConsumeScript;
	}
	public function setBigItemConsumeScript(?ScriptSetting $bigItemConsumeScript) {
		$this->bigItemConsumeScript = $bigItemConsumeScript;
	}
	public function withBigItemConsumeScript(?ScriptSetting $bigItemConsumeScript): Namespace_ {
		$this->bigItemConsumeScript = $bigItemConsumeScript;
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
            ->withAcquireScript(array_key_exists('acquireScript', $data) && $data['acquireScript'] !== null ? ScriptSetting::fromJson($data['acquireScript']) : null)
            ->withOverflowScript(array_key_exists('overflowScript', $data) && $data['overflowScript'] !== null ? ScriptSetting::fromJson($data['overflowScript']) : null)
            ->withConsumeScript(array_key_exists('consumeScript', $data) && $data['consumeScript'] !== null ? ScriptSetting::fromJson($data['consumeScript']) : null)
            ->withSimpleItemAcquireScript(array_key_exists('simpleItemAcquireScript', $data) && $data['simpleItemAcquireScript'] !== null ? ScriptSetting::fromJson($data['simpleItemAcquireScript']) : null)
            ->withSimpleItemConsumeScript(array_key_exists('simpleItemConsumeScript', $data) && $data['simpleItemConsumeScript'] !== null ? ScriptSetting::fromJson($data['simpleItemConsumeScript']) : null)
            ->withBigItemAcquireScript(array_key_exists('bigItemAcquireScript', $data) && $data['bigItemAcquireScript'] !== null ? ScriptSetting::fromJson($data['bigItemAcquireScript']) : null)
            ->withBigItemConsumeScript(array_key_exists('bigItemConsumeScript', $data) && $data['bigItemConsumeScript'] !== null ? ScriptSetting::fromJson($data['bigItemConsumeScript']) : null)
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
            "acquireScript" => $this->getAcquireScript() !== null ? $this->getAcquireScript()->toJson() : null,
            "overflowScript" => $this->getOverflowScript() !== null ? $this->getOverflowScript()->toJson() : null,
            "consumeScript" => $this->getConsumeScript() !== null ? $this->getConsumeScript()->toJson() : null,
            "simpleItemAcquireScript" => $this->getSimpleItemAcquireScript() !== null ? $this->getSimpleItemAcquireScript()->toJson() : null,
            "simpleItemConsumeScript" => $this->getSimpleItemConsumeScript() !== null ? $this->getSimpleItemConsumeScript()->toJson() : null,
            "bigItemAcquireScript" => $this->getBigItemAcquireScript() !== null ? $this->getBigItemAcquireScript()->toJson() : null,
            "bigItemConsumeScript" => $this->getBigItemConsumeScript() !== null ? $this->getBigItemConsumeScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}