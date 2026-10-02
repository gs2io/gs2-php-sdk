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
use Gs2\Account\Model\TransactionSettingV2;
use Gs2\Account\Model\ScriptSetting;
use Gs2\Account\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var bool Whether to change the password when taking over the account */
    private $changePasswordIfTakeOver;
    /** @var bool Whether to use different user IDs for login and data retention */
    private $differentUserIdForLoginAndDataRetention;
    /** @var ScriptSetting Script setting to be executed when creating an account */
    private $createAccountScript;
    /** @var ScriptSetting Script setting to be executed when authenticating */
    private $authenticationScript;
    /** @var ScriptSetting Script setting to be executed when registering Takeover Information */
    private $createTakeOverScript;
    /** @var ScriptSetting Script setting to be executed when executing account takeover */
    private $doTakeOverScript;
    /** @var ScriptSetting Script setting to be executed when adding Account Ban Status */
    private $banScript;
    /** @var ScriptSetting Script setting to be executed when removing Account Ban Status */
    private $unBanScript;
    /** @var LogSetting Log Output Setting */
    private $logSetting;
    /** @return string|null Namespace name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Namespace name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Namespace name
     * @return CreateNamespaceRequest
     */
	public function withName(?string $name): CreateNamespaceRequest {
		$this->name = $name;
		return $this;
	}
    /** @return string|null Description */
	public function getDescription(): ?string {
		return $this->description;
	}
    /** @param string|null $description Description */
	public function setDescription(?string $description) {
		$this->description = $description;
	}
    /**
     * @param string|null $description Description
     * @return CreateNamespaceRequest
     */
	public function withDescription(?string $description): CreateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
    /**
     * @return TransactionSetting|null Transaction Setting
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Setting
     * @return CreateNamespaceRequest
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): CreateNamespaceRequest {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
    /** @return TransactionSettingV2|null Transaction Setting (V2) */
	public function getTransactionSettingV2(): ?TransactionSettingV2 {
		return $this->transactionSettingV2;
	}
    /** @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2) */
	public function setTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2) {
		$this->transactionSettingV2 = $transactionSettingV2;
	}
    /**
     * @param TransactionSettingV2|null $transactionSettingV2 Transaction Setting (V2)
     * @return CreateNamespaceRequest
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): CreateNamespaceRequest {
		$this->transactionSettingV2 = $transactionSettingV2;
		return $this;
	}
    /** @return bool|null Whether to change the password when taking over the account */
	public function getChangePasswordIfTakeOver(): ?bool {
		return $this->changePasswordIfTakeOver;
	}
    /** @param bool|null $changePasswordIfTakeOver Whether to change the password when taking over the account */
	public function setChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver) {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
	}
    /**
     * @param bool|null $changePasswordIfTakeOver Whether to change the password when taking over the account
     * @return CreateNamespaceRequest
     */
	public function withChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver): CreateNamespaceRequest {
		$this->changePasswordIfTakeOver = $changePasswordIfTakeOver;
		return $this;
	}
    /** @return bool|null Whether to use different user IDs for login and data retention */
	public function getDifferentUserIdForLoginAndDataRetention(): ?bool {
		return $this->differentUserIdForLoginAndDataRetention;
	}
    /** @param bool|null $differentUserIdForLoginAndDataRetention Whether to use different user IDs for login and data retention */
	public function setDifferentUserIdForLoginAndDataRetention(?bool $differentUserIdForLoginAndDataRetention) {
		$this->differentUserIdForLoginAndDataRetention = $differentUserIdForLoginAndDataRetention;
	}
    /**
     * @param bool|null $differentUserIdForLoginAndDataRetention Whether to use different user IDs for login and data retention
     * @return CreateNamespaceRequest
     */
	public function withDifferentUserIdForLoginAndDataRetention(?bool $differentUserIdForLoginAndDataRetention): CreateNamespaceRequest {
		$this->differentUserIdForLoginAndDataRetention = $differentUserIdForLoginAndDataRetention;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when creating an account */
	public function getCreateAccountScript(): ?ScriptSetting {
		return $this->createAccountScript;
	}
    /** @param ScriptSetting|null $createAccountScript Script setting to be executed when creating an account */
	public function setCreateAccountScript(?ScriptSetting $createAccountScript) {
		$this->createAccountScript = $createAccountScript;
	}
    /**
     * @param ScriptSetting|null $createAccountScript Script setting to be executed when creating an account
     * @return CreateNamespaceRequest
     */
	public function withCreateAccountScript(?ScriptSetting $createAccountScript): CreateNamespaceRequest {
		$this->createAccountScript = $createAccountScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when authenticating */
	public function getAuthenticationScript(): ?ScriptSetting {
		return $this->authenticationScript;
	}
    /** @param ScriptSetting|null $authenticationScript Script setting to be executed when authenticating */
	public function setAuthenticationScript(?ScriptSetting $authenticationScript) {
		$this->authenticationScript = $authenticationScript;
	}
    /**
     * @param ScriptSetting|null $authenticationScript Script setting to be executed when authenticating
     * @return CreateNamespaceRequest
     */
	public function withAuthenticationScript(?ScriptSetting $authenticationScript): CreateNamespaceRequest {
		$this->authenticationScript = $authenticationScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when registering Takeover Information */
	public function getCreateTakeOverScript(): ?ScriptSetting {
		return $this->createTakeOverScript;
	}
    /** @param ScriptSetting|null $createTakeOverScript Script setting to be executed when registering Takeover Information */
	public function setCreateTakeOverScript(?ScriptSetting $createTakeOverScript) {
		$this->createTakeOverScript = $createTakeOverScript;
	}
    /**
     * @param ScriptSetting|null $createTakeOverScript Script setting to be executed when registering Takeover Information
     * @return CreateNamespaceRequest
     */
	public function withCreateTakeOverScript(?ScriptSetting $createTakeOverScript): CreateNamespaceRequest {
		$this->createTakeOverScript = $createTakeOverScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when executing account takeover */
	public function getDoTakeOverScript(): ?ScriptSetting {
		return $this->doTakeOverScript;
	}
    /** @param ScriptSetting|null $doTakeOverScript Script setting to be executed when executing account takeover */
	public function setDoTakeOverScript(?ScriptSetting $doTakeOverScript) {
		$this->doTakeOverScript = $doTakeOverScript;
	}
    /**
     * @param ScriptSetting|null $doTakeOverScript Script setting to be executed when executing account takeover
     * @return CreateNamespaceRequest
     */
	public function withDoTakeOverScript(?ScriptSetting $doTakeOverScript): CreateNamespaceRequest {
		$this->doTakeOverScript = $doTakeOverScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when adding Account Ban Status */
	public function getBanScript(): ?ScriptSetting {
		return $this->banScript;
	}
    /** @param ScriptSetting|null $banScript Script setting to be executed when adding Account Ban Status */
	public function setBanScript(?ScriptSetting $banScript) {
		$this->banScript = $banScript;
	}
    /**
     * @param ScriptSetting|null $banScript Script setting to be executed when adding Account Ban Status
     * @return CreateNamespaceRequest
     */
	public function withBanScript(?ScriptSetting $banScript): CreateNamespaceRequest {
		$this->banScript = $banScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when removing Account Ban Status */
	public function getUnBanScript(): ?ScriptSetting {
		return $this->unBanScript;
	}
    /** @param ScriptSetting|null $unBanScript Script setting to be executed when removing Account Ban Status */
	public function setUnBanScript(?ScriptSetting $unBanScript) {
		$this->unBanScript = $unBanScript;
	}
    /**
     * @param ScriptSetting|null $unBanScript Script setting to be executed when removing Account Ban Status
     * @return CreateNamespaceRequest
     */
	public function withUnBanScript(?ScriptSetting $unBanScript): CreateNamespaceRequest {
		$this->unBanScript = $unBanScript;
		return $this;
	}
    /** @return LogSetting|null Log Output Setting */
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
    /** @param LogSetting|null $logSetting Log Output Setting */
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
    /**
     * @param LogSetting|null $logSetting Log Output Setting
     * @return CreateNamespaceRequest
     */
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
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
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
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
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