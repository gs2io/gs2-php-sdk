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

class UpdateScriptRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $scriptName;
    /** @var string */
    private $description;
    /** @var string */
    private $script;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): UpdateScriptRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getScriptName(): ?string {
		return $this->scriptName;
	}

	public function setScriptName(?string $scriptName) {
		$this->scriptName = $scriptName;
	}

	public function withScriptName(?string $scriptName): UpdateScriptRequest {
		$this->scriptName = $scriptName;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): UpdateScriptRequest {
		$this->description = $description;
		return $this;
	}

	public function getScript(): ?string {
		return $this->script;
	}

	public function setScript(?string $script) {
		$this->script = $script;
	}

	public function withScript(?string $script): UpdateScriptRequest {
		$this->script = $script;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateScriptRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateScriptRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withScriptName(array_key_exists('scriptName', $data) && $data['scriptName'] !== null ? $data['scriptName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withScript(array_key_exists('script', $data) && $data['script'] !== null ? $data['script'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "scriptName" => $this->getScriptName(),
            "description" => $this->getDescription(),
            "script" => $this->getScript(),
        );
    }
}