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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\SkillTree\Model\TransactionSetting;
use Gs2\SkillTree\Model\ScriptSetting;
use Gs2\SkillTree\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var ScriptSetting */
    private $releaseScript;
    /** @var ScriptSetting */
    private $restrainScript;
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
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
	public function withTransactionSetting(?TransactionSetting $transactionSetting): CreateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getReleaseScript(): ?ScriptSetting {
		return $this->releaseScript;
	}
	public function setReleaseScript(?ScriptSetting $releaseScript) {
		$this->releaseScript = $releaseScript;
	}
	public function withReleaseScript(?ScriptSetting $releaseScript): CreateNamespaceRequest {
		$this->releaseScript = $releaseScript;
		return $this;
	}
	public function getRestrainScript(): ?ScriptSetting {
		return $this->restrainScript;
	}
	public function setRestrainScript(?ScriptSetting $restrainScript) {
		$this->restrainScript = $restrainScript;
	}
	public function withRestrainScript(?ScriptSetting $restrainScript): CreateNamespaceRequest {
		$this->restrainScript = $restrainScript;
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
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withReleaseScript(array_key_exists('releaseScript', $data) && $data['releaseScript'] !== null ? ScriptSetting::fromJson($data['releaseScript']) : null)
            ->withRestrainScript(array_key_exists('restrainScript', $data) && $data['restrainScript'] !== null ? ScriptSetting::fromJson($data['restrainScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "releaseScript" => $this->getReleaseScript() !== null ? $this->getReleaseScript()->toJson() : null,
            "restrainScript" => $this->getRestrainScript() !== null ? $this->getRestrainScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}