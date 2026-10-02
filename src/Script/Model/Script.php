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

namespace Gs2\Script\Model;

use Gs2\Core\Model\IModel;


/**
 * Script
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#script
 */
class Script implements IModel {
	/**
     * @var string Script GRN
	 */
	private $scriptId;
	/**
     * @var string Script name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var string Lua Script
	 */
	private $script;
	/**
     * @var bool Disable String-Number Conversion
	 */
	private $disableStringNumberToNumber;
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
    /** @return string|null Script GRN */
	public function getScriptId(): ?string {
		return $this->scriptId;
	}
    /** @param string|null $scriptId Script GRN */
	public function setScriptId(?string $scriptId) {
		$this->scriptId = $scriptId;
	}
    /**
     * @param string|null $scriptId Script GRN
     * @return Script
     */
	public function withScriptId(?string $scriptId): Script {
		$this->scriptId = $scriptId;
		return $this;
	}
    /** @return string|null Script name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Script name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Script name
     * @return Script
     */
	public function withName(?string $name): Script {
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
     * @return Script
     */
	public function withDescription(?string $description): Script {
		$this->description = $description;
		return $this;
	}
    /** @return string|null Lua Script */
	public function getScript(): ?string {
		return $this->script;
	}
    /** @param string|null $script Lua Script */
	public function setScript(?string $script) {
		$this->script = $script;
	}
    /**
     * @param string|null $script Lua Script
     * @return Script
     */
	public function withScript(?string $script): Script {
		$this->script = $script;
		return $this;
	}
    /** @return bool|null Disable String-Number Conversion */
	public function getDisableStringNumberToNumber(): ?bool {
		return $this->disableStringNumberToNumber;
	}
    /** @param bool|null $disableStringNumberToNumber Disable String-Number Conversion */
	public function setDisableStringNumberToNumber(?bool $disableStringNumberToNumber) {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
	}
    /**
     * @param bool|null $disableStringNumberToNumber Disable String-Number Conversion
     * @return Script
     */
	public function withDisableStringNumberToNumber(?bool $disableStringNumberToNumber): Script {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
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
     * @return Script
     */
	public function withCreatedAt(?int $createdAt): Script {
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
     * @return Script
     */
	public function withUpdatedAt(?int $updatedAt): Script {
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
     * @return Script
     */
	public function withRevision(?int $revision): Script {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Script {
        if ($data === null) {
            return null;
        }
        return (new Script())
            ->withScriptId(array_key_exists('scriptId', $data) && $data['scriptId'] !== null ? $data['scriptId'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withScript(array_key_exists('script', $data) && $data['script'] !== null ? $data['script'] : null)
            ->withDisableStringNumberToNumber(array_key_exists('disableStringNumberToNumber', $data) ? $data['disableStringNumberToNumber'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "scriptId" => $this->getScriptId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "script" => $this->getScript(),
            "disableStringNumberToNumber" => $this->getDisableStringNumberToNumber(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}