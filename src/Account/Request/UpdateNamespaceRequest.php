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

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
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

	public function getChangePasswordIfTakeOver(): ?bool {
		return $this->changePasswordIfTakeOver;
	}

	public function setChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver) {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
	}

	public function withChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver): UpdateNamespaceRequest {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
		return $this;
	}

	public function getCreateAccountScript(): ?ScriptSetting {
		return $this->createAccountScript;
	}

	public function setCreateAccountScript(?ScriptSetting $createAccountScript) {
		$this->createAccountScript = $createAccountScript;
	}

	public function withCreateAccountScript(?ScriptSetting $createAccountScript): UpdateNamespaceRequest {
		$this->createAccountScript = $createAccountScript;
		return $this;
	}

	public function getAuthenticationScript(): ?ScriptSetting {
		return $this->authenticationScript;
	}

	public function setAuthenticationScript(?ScriptSetting $authenticationScript) {
		$this->authenticationScript = $authenticationScript;
	}

	public function withAuthenticationScript(?ScriptSetting $authenticationScript): UpdateNamespaceRequest {
		$this->authenticationScript = $authenticationScript;
		return $this;
	}

	public function getCreateTakeOverScript(): ?ScriptSetting {
		return $this->createTakeOverScript;
	}

	public function setCreateTakeOverScript(?ScriptSetting $createTakeOverScript) {
		$this->createTakeOverScript = $createTakeOverScript;
	}

	public function withCreateTakeOverScript(?ScriptSetting $createTakeOverScript): UpdateNamespaceRequest {
		$this->createTakeOverScript = $createTakeOverScript;
		return $this;
	}

	public function getDoTakeOverScript(): ?ScriptSetting {
		return $this->doTakeOverScript;
	}

	public function setDoTakeOverScript(?ScriptSetting $doTakeOverScript) {
		$this->doTakeOverScript = $doTakeOverScript;
	}

	public function withDoTakeOverScript(?ScriptSetting $doTakeOverScript): UpdateNamespaceRequest {
		$this->doTakeOverScript = $doTakeOverScript;
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
            ->withChangePasswordIfTakeOver($data['changePasswordIfTakeOver'])
            ->withCreateAccountScript(empty($data['createAccountScript']) ? null : ScriptSetting::fromJson($data['createAccountScript']))
            ->withAuthenticationScript(empty($data['authenticationScript']) ? null : ScriptSetting::fromJson($data['authenticationScript']))
            ->withCreateTakeOverScript(empty($data['createTakeOverScript']) ? null : ScriptSetting::fromJson($data['createTakeOverScript']))
            ->withDoTakeOverScript(empty($data['doTakeOverScript']) ? null : ScriptSetting::fromJson($data['doTakeOverScript']))
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
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