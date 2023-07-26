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

namespace Gs2\StateMachine\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\StateMachine\Model\ScriptSetting;
use Gs2\StateMachine\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var ScriptSetting */
    private $startScript;
    /** @var ScriptSetting */
    private $passScript;
    /** @var ScriptSetting */
    private $errorScript;
    /** @var int */
    private $lowestStateMachineVersion;
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
	public function getStartScript(): ?ScriptSetting {
		return $this->startScript;
	}
	public function setStartScript(?ScriptSetting $startScript) {
		$this->startScript = $startScript;
	}
	public function withStartScript(?ScriptSetting $startScript): UpdateNamespaceRequest {
		$this->startScript = $startScript;
		return $this;
	}
	public function getPassScript(): ?ScriptSetting {
		return $this->passScript;
	}
	public function setPassScript(?ScriptSetting $passScript) {
		$this->passScript = $passScript;
	}
	public function withPassScript(?ScriptSetting $passScript): UpdateNamespaceRequest {
		$this->passScript = $passScript;
		return $this;
	}
	public function getErrorScript(): ?ScriptSetting {
		return $this->errorScript;
	}
	public function setErrorScript(?ScriptSetting $errorScript) {
		$this->errorScript = $errorScript;
	}
	public function withErrorScript(?ScriptSetting $errorScript): UpdateNamespaceRequest {
		$this->errorScript = $errorScript;
		return $this;
	}
	public function getLowestStateMachineVersion(): ?int {
		return $this->lowestStateMachineVersion;
	}
	public function setLowestStateMachineVersion(?int $lowestStateMachineVersion) {
		$this->lowestStateMachineVersion = $lowestStateMachineVersion;
	}
	public function withLowestStateMachineVersion(?int $lowestStateMachineVersion): UpdateNamespaceRequest {
		$this->lowestStateMachineVersion = $lowestStateMachineVersion;
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
            ->withStartScript(array_key_exists('startScript', $data) && $data['startScript'] !== null ? ScriptSetting::fromJson($data['startScript']) : null)
            ->withPassScript(array_key_exists('passScript', $data) && $data['passScript'] !== null ? ScriptSetting::fromJson($data['passScript']) : null)
            ->withErrorScript(array_key_exists('errorScript', $data) && $data['errorScript'] !== null ? ScriptSetting::fromJson($data['errorScript']) : null)
            ->withLowestStateMachineVersion(array_key_exists('lowestStateMachineVersion', $data) && $data['lowestStateMachineVersion'] !== null ? $data['lowestStateMachineVersion'] : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "startScript" => $this->getStartScript() !== null ? $this->getStartScript()->toJson() : null,
            "passScript" => $this->getPassScript() !== null ? $this->getPassScript()->toJson() : null,
            "errorScript" => $this->getErrorScript() !== null ? $this->getErrorScript()->toJson() : null,
            "lowestStateMachineVersion" => $this->getLowestStateMachineVersion(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}