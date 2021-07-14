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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Account\Model\ScriptSetting;
use Gs2\Account\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var bool */
    private $changePasswordIfTakeOver;
    /** @var ScriptSetting */
    private $createAccountScript;
    /** @var ScriptSetting */
    private $authenticationScript;
    /** @var ScriptSetting */
    private $createTakeOverScript;
    /** @var ScriptSetting */
    private $doTakeOverScript;
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

	public function getChangePasswordIfTakeOver(): ?bool {
		return $this->changePasswordIfTakeOver;
	}

	public function setChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver) {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
	}

	public function withChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver): CreateNamespaceRequest {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
		return $this;
	}

	public function getCreateAccountScript(): ?ScriptSetting {
		return $this->createAccountScript;
	}

	public function setCreateAccountScript(?ScriptSetting $createAccountScript) {
		$this->createAccountScript = $createAccountScript;
	}

	public function withCreateAccountScript(?ScriptSetting $createAccountScript): CreateNamespaceRequest {
		$this->createAccountScript = $createAccountScript;
		return $this;
	}

	public function getAuthenticationScript(): ?ScriptSetting {
		return $this->authenticationScript;
	}

	public function setAuthenticationScript(?ScriptSetting $authenticationScript) {
		$this->authenticationScript = $authenticationScript;
	}

	public function withAuthenticationScript(?ScriptSetting $authenticationScript): CreateNamespaceRequest {
		$this->authenticationScript = $authenticationScript;
		return $this;
	}

	public function getCreateTakeOverScript(): ?ScriptSetting {
		return $this->createTakeOverScript;
	}

	public function setCreateTakeOverScript(?ScriptSetting $createTakeOverScript) {
		$this->createTakeOverScript = $createTakeOverScript;
	}

	public function withCreateTakeOverScript(?ScriptSetting $createTakeOverScript): CreateNamespaceRequest {
		$this->createTakeOverScript = $createTakeOverScript;
		return $this;
	}

	public function getDoTakeOverScript(): ?ScriptSetting {
		return $this->doTakeOverScript;
	}

	public function setDoTakeOverScript(?ScriptSetting $doTakeOverScript) {
		$this->doTakeOverScript = $doTakeOverScript;
	}

	public function withDoTakeOverScript(?ScriptSetting $doTakeOverScript): CreateNamespaceRequest {
		$this->doTakeOverScript = $doTakeOverScript;
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
            ->withChangePasswordIfTakeOver(empty($data['changePasswordIfTakeOver']) ? null : $data['changePasswordIfTakeOver'])
            ->withCreateAccountScript(empty($data['createAccountScript']) ? null : ScriptSetting::fromJson($data['createAccountScript']))
            ->withAuthenticationScript(empty($data['authenticationScript']) ? null : ScriptSetting::fromJson($data['authenticationScript']))
            ->withCreateTakeOverScript(empty($data['createTakeOverScript']) ? null : ScriptSetting::fromJson($data['createTakeOverScript']))
            ->withDoTakeOverScript(empty($data['doTakeOverScript']) ? null : ScriptSetting::fromJson($data['doTakeOverScript']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "changePasswordIfTakeOver" => $this->getChangePasswordIfTakeOver(),
            "createAccountScript" => $this->getCreateAccountScript() !== null ? $this->getCreateAccountScript()->toJson() : null,
            "authenticationScript" => $this->getAuthenticationScript() !== null ? $this->getAuthenticationScript()->toJson() : null,
            "createTakeOverScript" => $this->getCreateTakeOverScript() !== null ? $this->getCreateTakeOverScript()->toJson() : null,
            "doTakeOverScript" => $this->getDoTakeOverScript() !== null ? $this->getDoTakeOverScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}