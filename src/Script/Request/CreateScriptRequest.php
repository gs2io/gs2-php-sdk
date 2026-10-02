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

namespace Gs2\Script\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for createScript: Create script
 *
 * @see https://docs.gs2.io/api_reference/script/sdk/#createscript
 */
class CreateScriptRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Script name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var string Lua Script */
    private $script;
    /** @var bool Disable String-Number Conversion */
    private $disableStringNumberToNumber;
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
     * @return CreateScriptRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateScriptRequest {
		$this->namespaceName = $namespaceName;
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
     * @return CreateScriptRequest
     */
	public function withName(?string $name): CreateScriptRequest {
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
     * @return CreateScriptRequest
     */
	public function withDescription(?string $description): CreateScriptRequest {
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
     * @return CreateScriptRequest
     */
	public function withScript(?string $script): CreateScriptRequest {
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
     * @return CreateScriptRequest
     */
	public function withDisableStringNumberToNumber(?bool $disableStringNumberToNumber): CreateScriptRequest {
		$this->disableStringNumberToNumber = $disableStringNumberToNumber;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateScriptRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateScriptRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withScript(array_key_exists('script', $data) && $data['script'] !== null ? $data['script'] : null)
            ->withDisableStringNumberToNumber(array_key_exists('disableStringNumberToNumber', $data) ? $data['disableStringNumberToNumber'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "script" => $this->getScript(),
            "disableStringNumberToNumber" => $this->getDisableStringNumberToNumber(),
        );
    }
}