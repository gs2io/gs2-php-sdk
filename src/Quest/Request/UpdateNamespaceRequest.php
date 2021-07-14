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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\ScriptSetting;
use Gs2\Quest\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var ScriptSetting */
    private $startQuestScript;
    /** @var ScriptSetting */
    private $completeQuestScript;
    /** @var ScriptSetting */
    private $failedQuestScript;
    /** @var string */
    private $queueNamespaceId;
    /** @var string */
    private $keyId;
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

	public function getStartQuestScript(): ?ScriptSetting {
		return $this->startQuestScript;
	}

	public function setStartQuestScript(?ScriptSetting $startQuestScript) {
		$this->startQuestScript = $startQuestScript;
	}

	public function withStartQuestScript(?ScriptSetting $startQuestScript): UpdateNamespaceRequest {
		$this->startQuestScript = $startQuestScript;
		return $this;
	}

	public function getCompleteQuestScript(): ?ScriptSetting {
		return $this->completeQuestScript;
	}

	public function setCompleteQuestScript(?ScriptSetting $completeQuestScript) {
		$this->completeQuestScript = $completeQuestScript;
	}

	public function withCompleteQuestScript(?ScriptSetting $completeQuestScript): UpdateNamespaceRequest {
		$this->completeQuestScript = $completeQuestScript;
		return $this;
	}

	public function getFailedQuestScript(): ?ScriptSetting {
		return $this->failedQuestScript;
	}

	public function setFailedQuestScript(?ScriptSetting $failedQuestScript) {
		$this->failedQuestScript = $failedQuestScript;
	}

	public function withFailedQuestScript(?ScriptSetting $failedQuestScript): UpdateNamespaceRequest {
		$this->failedQuestScript = $failedQuestScript;
		return $this;
	}

	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	public function withQueueNamespaceId(?string $queueNamespaceId): UpdateNamespaceRequest {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): UpdateNamespaceRequest {
		$this->keyId = $keyId;
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
            ->withStartQuestScript(empty($data['startQuestScript']) ? null : ScriptSetting::fromJson($data['startQuestScript']))
            ->withCompleteQuestScript(empty($data['completeQuestScript']) ? null : ScriptSetting::fromJson($data['completeQuestScript']))
            ->withFailedQuestScript(empty($data['failedQuestScript']) ? null : ScriptSetting::fromJson($data['failedQuestScript']))
            ->withQueueNamespaceId(empty($data['queueNamespaceId']) ? null : $data['queueNamespaceId'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId'])
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "startQuestScript" => $this->getStartQuestScript() !== null ? $this->getStartQuestScript()->toJson() : null,
            "completeQuestScript" => $this->getCompleteQuestScript() !== null ? $this->getCompleteQuestScript()->toJson() : null,
            "failedQuestScript" => $this->getFailedQuestScript() !== null ? $this->getFailedQuestScript()->toJson() : null,
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}