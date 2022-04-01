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

namespace Gs2\Experience\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Experience\Model\ScriptSetting;
use Gs2\Experience\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var string */
    private $experienceCapScriptId;
    /** @var ScriptSetting */
    private $changeExperienceScript;
    /** @var ScriptSetting */
    private $changeRankScript;
    /** @var ScriptSetting */
    private $changeRankCapScript;
    /** @var ScriptSetting */
    private $overflowExperienceScript;
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

	public function getExperienceCapScriptId(): ?string {
		return $this->experienceCapScriptId;
	}

	public function setExperienceCapScriptId(?string $experienceCapScriptId) {
		$this->experienceCapScriptId = $experienceCapScriptId;
	}

	public function withExperienceCapScriptId(?string $experienceCapScriptId): CreateNamespaceRequest {
		$this->experienceCapScriptId = $experienceCapScriptId;
		return $this;
	}

	public function getChangeExperienceScript(): ?ScriptSetting {
		return $this->changeExperienceScript;
	}

	public function setChangeExperienceScript(?ScriptSetting $changeExperienceScript) {
		$this->changeExperienceScript = $changeExperienceScript;
	}

	public function withChangeExperienceScript(?ScriptSetting $changeExperienceScript): CreateNamespaceRequest {
		$this->changeExperienceScript = $changeExperienceScript;
		return $this;
	}

	public function getChangeRankScript(): ?ScriptSetting {
		return $this->changeRankScript;
	}

	public function setChangeRankScript(?ScriptSetting $changeRankScript) {
		$this->changeRankScript = $changeRankScript;
	}

	public function withChangeRankScript(?ScriptSetting $changeRankScript): CreateNamespaceRequest {
		$this->changeRankScript = $changeRankScript;
		return $this;
	}

	public function getChangeRankCapScript(): ?ScriptSetting {
		return $this->changeRankCapScript;
	}

	public function setChangeRankCapScript(?ScriptSetting $changeRankCapScript) {
		$this->changeRankCapScript = $changeRankCapScript;
	}

	public function withChangeRankCapScript(?ScriptSetting $changeRankCapScript): CreateNamespaceRequest {
		$this->changeRankCapScript = $changeRankCapScript;
		return $this;
	}

	public function getOverflowExperienceScript(): ?ScriptSetting {
		return $this->overflowExperienceScript;
	}

	public function setOverflowExperienceScript(?ScriptSetting $overflowExperienceScript) {
		$this->overflowExperienceScript = $overflowExperienceScript;
	}

	public function withOverflowExperienceScript(?ScriptSetting $overflowExperienceScript): CreateNamespaceRequest {
		$this->overflowExperienceScript = $overflowExperienceScript;
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
            ->withExperienceCapScriptId(array_key_exists('experienceCapScriptId', $data) && $data['experienceCapScriptId'] !== null ? $data['experienceCapScriptId'] : null)
            ->withChangeExperienceScript(array_key_exists('changeExperienceScript', $data) && $data['changeExperienceScript'] !== null ? ScriptSetting::fromJson($data['changeExperienceScript']) : null)
            ->withChangeRankScript(array_key_exists('changeRankScript', $data) && $data['changeRankScript'] !== null ? ScriptSetting::fromJson($data['changeRankScript']) : null)
            ->withChangeRankCapScript(array_key_exists('changeRankCapScript', $data) && $data['changeRankCapScript'] !== null ? ScriptSetting::fromJson($data['changeRankCapScript']) : null)
            ->withOverflowExperienceScript(array_key_exists('overflowExperienceScript', $data) && $data['overflowExperienceScript'] !== null ? ScriptSetting::fromJson($data['overflowExperienceScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "experienceCapScriptId" => $this->getExperienceCapScriptId(),
            "changeExperienceScript" => $this->getChangeExperienceScript() !== null ? $this->getChangeExperienceScript()->toJson() : null,
            "changeRankScript" => $this->getChangeRankScript() !== null ? $this->getChangeRankScript()->toJson() : null,
            "changeRankCapScript" => $this->getChangeRankCapScript() !== null ? $this->getChangeRankCapScript()->toJson() : null,
            "overflowExperienceScript" => $this->getOverflowExperienceScript() !== null ? $this->getOverflowExperienceScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}