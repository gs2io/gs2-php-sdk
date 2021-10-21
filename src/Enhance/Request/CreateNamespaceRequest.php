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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\ScriptSetting;
use Gs2\Enhance\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var bool */
    private $enableDirectEnhance;
    /** @var string */
    private $queueNamespaceId;
    /** @var string */
    private $keyId;
    /** @var ScriptSetting */
    private $enhanceScript;
    /** @var LogSetting */
    private $logSetting;

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): CreateNamespaceRequest {
		$this->name = $name;
		return $this;
	}

	public function getDescription(): ?string {
		return $this->description;
	}

	public function setDescription(?string $description) {
		$this->description = $description;
	}

	public function withDescription(?string $description): CreateNamespaceRequest {
		$this->description = $description;
		return $this;
	}

	public function getEnableDirectEnhance(): ?bool {
		return $this->enableDirectEnhance;
	}

	public function setEnableDirectEnhance(?bool $enableDirectEnhance) {
		$this->enableDirectEnhance = $enableDirectEnhance;
	}

	public function withEnableDirectEnhance(?bool $enableDirectEnhance): CreateNamespaceRequest {
		$this->enableDirectEnhance = $enableDirectEnhance;
		return $this;
	}

	public function getQueueNamespaceId(): ?string {
		return $this->queueNamespaceId;
	}

	public function setQueueNamespaceId(?string $queueNamespaceId) {
		$this->queueNamespaceId = $queueNamespaceId;
	}

	public function withQueueNamespaceId(?string $queueNamespaceId): CreateNamespaceRequest {
		$this->queueNamespaceId = $queueNamespaceId;
		return $this;
	}

	public function getKeyId(): ?string {
		return $this->keyId;
	}

	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}

	public function withKeyId(?string $keyId): CreateNamespaceRequest {
		$this->keyId = $keyId;
		return $this;
	}

	public function getEnhanceScript(): ?ScriptSetting {
		return $this->enhanceScript;
	}

	public function setEnhanceScript(?ScriptSetting $enhanceScript) {
		$this->enhanceScript = $enhanceScript;
	}

	public function withEnhanceScript(?ScriptSetting $enhanceScript): CreateNamespaceRequest {
		$this->enhanceScript = $enhanceScript;
		return $this;
	}

	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}

	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}

	public function withLogSetting(?LogSetting $logSetting): CreateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateNamespaceRequest())
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withEnableDirectEnhance($data['enableDirectEnhance'])
            ->withQueueNamespaceId(empty($data['queueNamespaceId']) ? null : $data['queueNamespaceId'])
            ->withKeyId(empty($data['keyId']) ? null : $data['keyId'])
            ->withEnhanceScript(empty($data['enhanceScript']) ? null : ScriptSetting::fromJson($data['enhanceScript']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "enableDirectEnhance" => $this->getEnableDirectEnhance(),
            "queueNamespaceId" => $this->getQueueNamespaceId(),
            "keyId" => $this->getKeyId(),
            "enhanceScript" => $this->getEnhanceScript() !== null ? $this->getEnhanceScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}