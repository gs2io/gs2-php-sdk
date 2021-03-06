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
            ->withAcquireScript(empty($data['acquireScript']) ? null : ScriptSetting::fromJson($data['acquireScript']))
            ->withOverflowScript(empty($data['overflowScript']) ? null : ScriptSetting::fromJson($data['overflowScript']))
            ->withConsumeScript(empty($data['consumeScript']) ? null : ScriptSetting::fromJson($data['consumeScript']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "acquireScript" => $this->getAcquireScript() !== null ? $this->getAcquireScript()->toJson() : null,
            "overflowScript" => $this->getOverflowScript() !== null ? $this->getOverflowScript()->toJson() : null,
            "consumeScript" => $this->getConsumeScript() !== null ? $this->getConsumeScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}