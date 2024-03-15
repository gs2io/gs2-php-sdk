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

namespace Gs2\Inventory\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Inventory\Model\ScriptSetting;
use Gs2\Inventory\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var ScriptSetting */
    private $acquireScript;
    /** @var ScriptSetting */
    private $overflowScript;
    /** @var ScriptSetting */
    private $consumeScript;
    /** @var ScriptSetting */
    private $simpleItemAcquireScript;
    /** @var ScriptSetting */
    private $simpleItemConsumeScript;
    /** @var ScriptSetting */
    private $bigItemAcquireScript;
    /** @var ScriptSetting */
    private $bigItemConsumeScript;
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
	public function getAcquireScript(): ?ScriptSetting {
		return $this->acquireScript;
	}
	public function setAcquireScript(?ScriptSetting $acquireScript) {
		$this->acquireScript = $acquireScript;
	}
	public function withAcquireScript(?ScriptSetting $acquireScript): UpdateNamespaceRequest {
		$this->acquireScript = $acquireScript;
		return $this;
	}
	public function getOverflowScript(): ?ScriptSetting {
		return $this->overflowScript;
	}
	public function setOverflowScript(?ScriptSetting $overflowScript) {
		$this->overflowScript = $overflowScript;
	}
	public function withOverflowScript(?ScriptSetting $overflowScript): UpdateNamespaceRequest {
		$this->overflowScript = $overflowScript;
		return $this;
	}
	public function getConsumeScript(): ?ScriptSetting {
		return $this->consumeScript;
	}
	public function setConsumeScript(?ScriptSetting $consumeScript) {
		$this->consumeScript = $consumeScript;
	}
	public function withConsumeScript(?ScriptSetting $consumeScript): UpdateNamespaceRequest {
		$this->consumeScript = $consumeScript;
		return $this;
	}
	public function getSimpleItemAcquireScript(): ?ScriptSetting {
		return $this->simpleItemAcquireScript;
	}
	public function setSimpleItemAcquireScript(?ScriptSetting $simpleItemAcquireScript) {
		$this->simpleItemAcquireScript = $simpleItemAcquireScript;
	}
	public function withSimpleItemAcquireScript(?ScriptSetting $simpleItemAcquireScript): UpdateNamespaceRequest {
		$this->simpleItemAcquireScript = $simpleItemAcquireScript;
		return $this;
	}
	public function getSimpleItemConsumeScript(): ?ScriptSetting {
		return $this->simpleItemConsumeScript;
	}
	public function setSimpleItemConsumeScript(?ScriptSetting $simpleItemConsumeScript) {
		$this->simpleItemConsumeScript = $simpleItemConsumeScript;
	}
	public function withSimpleItemConsumeScript(?ScriptSetting $simpleItemConsumeScript): UpdateNamespaceRequest {
		$this->simpleItemConsumeScript = $simpleItemConsumeScript;
		return $this;
	}
	public function getBigItemAcquireScript(): ?ScriptSetting {
		return $this->bigItemAcquireScript;
	}
	public function setBigItemAcquireScript(?ScriptSetting $bigItemAcquireScript) {
		$this->bigItemAcquireScript = $bigItemAcquireScript;
	}
	public function withBigItemAcquireScript(?ScriptSetting $bigItemAcquireScript): UpdateNamespaceRequest {
		$this->bigItemAcquireScript = $bigItemAcquireScript;
		return $this;
	}
	public function getBigItemConsumeScript(): ?ScriptSetting {
		return $this->bigItemConsumeScript;
	}
	public function setBigItemConsumeScript(?ScriptSetting $bigItemConsumeScript) {
		$this->bigItemConsumeScript = $bigItemConsumeScript;
	}
	public function withBigItemConsumeScript(?ScriptSetting $bigItemConsumeScript): UpdateNamespaceRequest {
		$this->bigItemConsumeScript = $bigItemConsumeScript;
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
            ->withAcquireScript(array_key_exists('acquireScript', $data) && $data['acquireScript'] !== null ? ScriptSetting::fromJson($data['acquireScript']) : null)
            ->withOverflowScript(array_key_exists('overflowScript', $data) && $data['overflowScript'] !== null ? ScriptSetting::fromJson($data['overflowScript']) : null)
            ->withConsumeScript(array_key_exists('consumeScript', $data) && $data['consumeScript'] !== null ? ScriptSetting::fromJson($data['consumeScript']) : null)
            ->withSimpleItemAcquireScript(array_key_exists('simpleItemAcquireScript', $data) && $data['simpleItemAcquireScript'] !== null ? ScriptSetting::fromJson($data['simpleItemAcquireScript']) : null)
            ->withSimpleItemConsumeScript(array_key_exists('simpleItemConsumeScript', $data) && $data['simpleItemConsumeScript'] !== null ? ScriptSetting::fromJson($data['simpleItemConsumeScript']) : null)
            ->withBigItemAcquireScript(array_key_exists('bigItemAcquireScript', $data) && $data['bigItemAcquireScript'] !== null ? ScriptSetting::fromJson($data['bigItemAcquireScript']) : null)
            ->withBigItemConsumeScript(array_key_exists('bigItemConsumeScript', $data) && $data['bigItemConsumeScript'] !== null ? ScriptSetting::fromJson($data['bigItemConsumeScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "acquireScript" => $this->getAcquireScript() !== null ? $this->getAcquireScript()->toJson() : null,
            "overflowScript" => $this->getOverflowScript() !== null ? $this->getOverflowScript()->toJson() : null,
            "consumeScript" => $this->getConsumeScript() !== null ? $this->getConsumeScript()->toJson() : null,
            "simpleItemAcquireScript" => $this->getSimpleItemAcquireScript() !== null ? $this->getSimpleItemAcquireScript()->toJson() : null,
            "simpleItemConsumeScript" => $this->getSimpleItemConsumeScript() !== null ? $this->getSimpleItemConsumeScript()->toJson() : null,
            "bigItemAcquireScript" => $this->getBigItemAcquireScript() !== null ? $this->getBigItemAcquireScript()->toJson() : null,
            "bigItemConsumeScript" => $this->getBigItemConsumeScript() !== null ? $this->getBigItemConsumeScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}