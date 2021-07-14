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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\ScriptSetting;
use Gs2\Formation\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var ScriptSetting */
    private $updateMoldScript;
    /** @var ScriptSetting */
    private $updateFormScript;
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

	public function getUpdateMoldScript(): ?ScriptSetting {
		return $this->updateMoldScript;
	}

	public function setUpdateMoldScript(?ScriptSetting $updateMoldScript) {
		$this->updateMoldScript = $updateMoldScript;
	}

	public function withUpdateMoldScript(?ScriptSetting $updateMoldScript): CreateNamespaceRequest {
		$this->updateMoldScript = $updateMoldScript;
		return $this;
	}

	public function getUpdateFormScript(): ?ScriptSetting {
		return $this->updateFormScript;
	}

	public function setUpdateFormScript(?ScriptSetting $updateFormScript) {
		$this->updateFormScript = $updateFormScript;
	}

	public function withUpdateFormScript(?ScriptSetting $updateFormScript): CreateNamespaceRequest {
		$this->updateFormScript = $updateFormScript;
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
            ->withUpdateMoldScript(empty($data['updateMoldScript']) ? null : ScriptSetting::fromJson($data['updateMoldScript']))
            ->withUpdateFormScript(empty($data['updateFormScript']) ? null : ScriptSetting::fromJson($data['updateFormScript']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "updateMoldScript" => $this->getUpdateMoldScript() !== null ? $this->getUpdateMoldScript()->toJson() : null,
            "updateFormScript" => $this->getUpdateFormScript() !== null ? $this->getUpdateFormScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}