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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Dictionary\Model\ScriptSetting;
use Gs2\Dictionary\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var ScriptSetting */
    private $entryScript;
    /** @var ScriptSetting */
    private $duplicateEntryScript;
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

	public function getEntryScript(): ?ScriptSetting {
		return $this->entryScript;
	}

	public function setEntryScript(?ScriptSetting $entryScript) {
		$this->entryScript = $entryScript;
	}

	public function withEntryScript(?ScriptSetting $entryScript): UpdateNamespaceRequest {
		$this->entryScript = $entryScript;
		return $this;
	}

	public function getDuplicateEntryScript(): ?ScriptSetting {
		return $this->duplicateEntryScript;
	}

	public function setDuplicateEntryScript(?ScriptSetting $duplicateEntryScript) {
		$this->duplicateEntryScript = $duplicateEntryScript;
	}

	public function withDuplicateEntryScript(?ScriptSetting $duplicateEntryScript): UpdateNamespaceRequest {
		$this->duplicateEntryScript = $duplicateEntryScript;
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
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withEntryScript(empty($data['entryScript']) ? null : ScriptSetting::fromJson($data['entryScript']))
            ->withDuplicateEntryScript(empty($data['duplicateEntryScript']) ? null : ScriptSetting::fromJson($data['duplicateEntryScript']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "entryScript" => $this->getEntryScript() !== null ? $this->getEntryScript()->toJson() : null,
            "duplicateEntryScript" => $this->getDuplicateEntryScript() !== null ? $this->getDuplicateEntryScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}