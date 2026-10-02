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

namespace Gs2\Account\Model;

use Gs2\Core\Model\IModel;


/**
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#namespace
 */
class Namespace_ implements IModel {
	/**
     * @var string Namespace GRN
	 */
	private $namespaceId;
	/**
     * @var string Namespace name
	 */
	private $name;
	/**
     * @var string Description
	 */
	private $description;
	/**
     * @var TransactionSetting Transaction Setting
	 */
	private $transactionSetting;
	/**
     * @var TransactionSettingV2 Transaction Setting (V2)
	 */
	private $transactionSettingV2;
	/**
     * @var bool Whether to change the password when taking over the account
	 */
	private $changePasswordIfTakeOver;
	/**
     * @var bool Whether to use different user IDs for login and data retention
	 */
	private $differentUserIdForLoginAndDataRetention;
	/**
     * @var ScriptSetting Script setting to be executed when creating an account
	 */
	private $createAccountScript;
	/**
     * @var ScriptSetting Script setting to be executed when authenticating
	 */
	private $authenticationScript;
	/**
     * @var ScriptSetting Script setting to be executed when registering Takeover Information
	 */
	private $createTakeOverScript;
	/**
     * @var ScriptSetting Script setting to be executed when executing account takeover
	 */
	private $doTakeOverScript;
	/**
     * @var ScriptSetting Script setting to be executed when adding Account Ban Status
	 */
	private $banScript;
	/**
     * @var ScriptSetting Script setting to be executed when removing Account Ban Status
	 */
	private $unBanScript;
	/**
     * @var LogSetting Log Output Setting
	 */
	private $logSetting;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Namespace GRN */
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
    /** @param string|null $namespaceId Namespace GRN */
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
    /**
     * @param string|null $namespaceId Namespace GRN
     * @return Namespace_
     */
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
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
     * @return Namespace_
     */
	public function withName(?string $name): Namespace_ {
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
     * @return Namespace_
     */
	public function withDescription(?string $description): Namespace_ {
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
     * @return Namespace_
     * @deprecated
     */
	public function withTransactionSetting(?TransactionSetting $transactionSetting): Namespace_ {
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
     * @return Namespace_
     */
	public function withTransactionSettingV2(?TransactionSettingV2 $transactionSettingV2): Namespace_ {
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
     * @return Namespace_
     */
	public function withChangePasswordIfTakeOver(?bool $changePasswordIfTakeOver): Namespace_ {
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
     * @return Namespace_
     */
	public function withDifferentUserIdForLoginAndDataRetention(?bool $differentUserIdForLoginAndDataRetention): Namespace_ {
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
     * @return Namespace_
     */
	public function withCreateAccountScript(?ScriptSetting $createAccountScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withAuthenticationScript(?ScriptSetting $authenticationScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withCreateTakeOverScript(?ScriptSetting $createTakeOverScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withDoTakeOverScript(?ScriptSetting $doTakeOverScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withBanScript(?ScriptSetting $banScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withUnBanScript(?ScriptSetting $unBanScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Namespace_
     */
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Namespace_
     */
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Namespace_
     */
	public function withRevision(?int $revision): Namespace_ {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(array_key_exists('namespaceId', $data) && $data['namespaceId'] !== null ? $data['namespaceId'] : null)
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
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}