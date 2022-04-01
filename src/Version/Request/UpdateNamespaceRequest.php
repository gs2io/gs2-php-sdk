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

namespace Gs2\Version\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Version\Model\ScriptSetting;
use Gs2\Version\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var string */
    private $assumeUserId;
    /** @var ScriptSetting */
    private $acceptVersionScript;
    /** @var string */
    private $checkVersionTriggerScriptId;
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

	public function getAssumeUserId(): ?string {
		return $this->assumeUserId;
	}

	public function setAssumeUserId(?string $assumeUserId) {
		$this->assumeUserId = $assumeUserId;
	}

	public function withAssumeUserId(?string $assumeUserId): UpdateNamespaceRequest {
		$this->assumeUserId = $assumeUserId;
		return $this;
	}

	public function getAcceptVersionScript(): ?ScriptSetting {
		return $this->acceptVersionScript;
	}

	public function setAcceptVersionScript(?ScriptSetting $acceptVersionScript) {
		$this->acceptVersionScript = $acceptVersionScript;
	}

	public function withAcceptVersionScript(?ScriptSetting $acceptVersionScript): UpdateNamespaceRequest {
		$this->acceptVersionScript = $acceptVersionScript;
		return $this;
	}

	public function getCheckVersionTriggerScriptId(): ?string {
		return $this->checkVersionTriggerScriptId;
	}

	public function setCheckVersionTriggerScriptId(?string $checkVersionTriggerScriptId) {
		$this->checkVersionTriggerScriptId = $checkVersionTriggerScriptId;
	}

	public function withCheckVersionTriggerScriptId(?string $checkVersionTriggerScriptId): UpdateNamespaceRequest {
		$this->checkVersionTriggerScriptId = $checkVersionTriggerScriptId;
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
            ->withAssumeUserId(array_key_exists('assumeUserId', $data) && $data['assumeUserId'] !== null ? $data['assumeUserId'] : null)
            ->withAcceptVersionScript(array_key_exists('acceptVersionScript', $data) && $data['acceptVersionScript'] !== null ? ScriptSetting::fromJson($data['acceptVersionScript']) : null)
            ->withCheckVersionTriggerScriptId(array_key_exists('checkVersionTriggerScriptId', $data) && $data['checkVersionTriggerScriptId'] !== null ? $data['checkVersionTriggerScriptId'] : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "assumeUserId" => $this->getAssumeUserId(),
            "acceptVersionScript" => $this->getAcceptVersionScript() !== null ? $this->getAcceptVersionScript()->toJson() : null,
            "checkVersionTriggerScriptId" => $this->getCheckVersionTriggerScriptId(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}