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
use Gs2\Account\Model\TransactionSetting;
use Gs2\Account\Model\ScriptSetting;
use Gs2\Account\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var bool */
    private $changePasswordIfTakeOver;
    /** @var bool */
    private $differentUserIdForLoginAndDataRetention;
    /** @var ScriptSetting */
    private $createAccountScript;
    /** @var ScriptSetting */
    private $authenticationScript;
    /** @var ScriptSetting */
    private $createTakeOverScript;
    /** @var ScriptSetting */
    private $doTakeOverScript;
    /** @var ScriptSetting */
    private $banScript;
    /** @var ScriptSetting */
    private $unBanScript;
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
	public function getDifferentUserIdForLoginAndDataRetention(): ?bool {
		return $this->differentUserIdForLoginAndDataRetention;
	}
	public function setDifferentUserIdForLoginAndDataRetention(?bool $differentUserIdForLoginAndDataRetention) {
		$this->differentUserIdForLoginAndDataRetention = $differentUserIdForLoginAndDataRetention;
	}
	public function withDifferentUserIdForLoginAndDataRetention(?bool $differentUserIdForLoginAndDataRetention): CreateNamespaceRequest {
		$this->differentUserIdForLoginAndDataRetention = $differentUserIdForLoginAndDataRetention;
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
	public function getBanScript(): ?ScriptSetting {
		return $this->banScript;
	}
	public function setBanScript(?ScriptSetting $banScript) {
		$this->banScript = $banScript;
	}
	public function withBanScript(?ScriptSetting $banScript): CreateNamespaceRequest {
		$this->banScript = $banScript;
		return $this;
	}
	public function getUnBanScript(): ?ScriptSetting {
		return $this->unBanScript;
	}
	public function setUnBanScript(?ScriptSetting $unBanScript) {
		$this->unBanScript = $unBanScript;
	}
	public function withUnBanScript(?ScriptSetting $unBanScript): CreateNamespaceRequest {
		$this->unBanScript = $unBanScript;
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
            ->withChangePasswordIfTakeOver(array_key_exists('changePasswordIfTakeOver', $data) ? $data['changePasswordIfTakeOver'] : null)
            ->withDifferentUserIdForLoginAndDataRetention(array_key_exists('differentUserIdForLoginAndDataRetention', $data) ? $data['differentUserIdForLoginAndDataRetention'] : null)
            ->withCreateAccountScript(array_key_exists('createAccountScript', $data) && $data['createAccountScript'] !== null ? ScriptSetting::fromJson($data['createAccountScript']) : null)
            ->withAuthenticationScript(array_key_exists('authenticationScript', $data) && $data['authenticationScript'] !== null ? ScriptSetting::fromJson($data['authenticationScript']) : null)
            ->withCreateTakeOverScript(array_key_exists('createTakeOverScript', $data) && $data['createTakeOverScript'] !== null ? ScriptSetting::fromJson($data['createTakeOverScript']) : null)
            ->withDoTakeOverScript(array_key_exists('doTakeOverScript', $data) && $data['doTakeOverScript'] !== null ? ScriptSetting::fromJson($data['doTakeOverScript']) : null)
            ->withBanScript(array_key_exists('banScript', $data) && $data['banScript'] !== null ? ScriptSetting::fromJson($data['banScript']) : null)
            ->withUnBanScript(array_key_exists('unBanScript', $data) && $data['unBanScript'] !== null ? ScriptSetting::fromJson($data['unBanScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "changePasswordIfTakeOver" => $this->getChangePasswordIfTakeOver(),
            "differentUserIdForLoginAndDataRetention" => $this->getDifferentUserIdForLoginAndDataRetention(),
            "createAccountScript" => $this->getCreateAccountScript() !== null ? $this->getCreateAccountScript()->toJson() : null,
            "authenticationScript" => $this->getAuthenticationScript() !== null ? $this->getAuthenticationScript()->toJson() : null,
            "createTakeOverScript" => $this->getCreateTakeOverScript() !== null ? $this->getCreateTakeOverScript()->toJson() : null,
            "doTakeOverScript" => $this->getDoTakeOverScript() !== null ? $this->getDoTakeOverScript()->toJson() : null,
            "banScript" => $this->getBanScript() !== null ? $this->getBanScript()->toJson() : null,
            "unBanScript" => $this->getUnBanScript() !== null ? $this->getUnBanScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}