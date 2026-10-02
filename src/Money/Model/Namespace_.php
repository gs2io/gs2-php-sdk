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

namespace Gs2\Money\Model;

use Gs2\Core\Model\IModel;


/**
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#namespace
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
     * @var TransactionSetting Transaction Settings
	 */
	private $transactionSetting;
	/**
     * @var TransactionSettingV2 Transaction Setting (V2)
	 */
	private $transactionSettingV2;
	/**
     * @var string Consumption Priority
	 */
	private $priority;
	/**
     * @var bool Share Free Currency
	 */
	private $shareFree;
	/**
     * @var string Currency Type
	 */
	private $currency;
	/**
     * @var string Apple App Store Bundle ID
	 */
	private $appleKey;
	/**
     * @var string Google PlayStore Private Key
	 */
	private $googleKey;
	/**
     * @var bool Enable Fake Receipt
	 */
	private $enableFakeReceipt;
	/**
     * @var ScriptSetting Create Wallet Script
	 */
	private $createWalletScript;
	/**
     * @var ScriptSetting Deposit Script
	 */
	private $depositScript;
	/**
     * @var ScriptSetting Withdraw Script
	 */
	private $withdrawScript;
	/**
     * @var float Unused Balance
	 */
	private $balance;
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
     * @return TransactionSetting|null Transaction Settings
     * @deprecated
     */
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
     * @deprecated
     */
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
    /**
     * @param TransactionSetting|null $transactionSetting Transaction Settings
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
    /** @return string|null Consumption Priority */
	public function getPriority(): ?string {
		return $this->priority;
	}
    /** @param string|null $priority Consumption Priority */
	public function setPriority(?string $priority) {
		$this->priority = $priority;
	}
    /**
     * @param string|null $priority Consumption Priority
     * @return Namespace_
     */
	public function withPriority(?string $priority): Namespace_ {
		$this->priority = $priority;
		return $this;
	}
    /** @return bool|null Share Free Currency */
	public function getShareFree(): ?bool {
		return $this->shareFree;
	}
    /** @param bool|null $shareFree Share Free Currency */
	public function setShareFree(?bool $shareFree) {
		$this->shareFree = $shareFree;
	}
    /**
     * @param bool|null $shareFree Share Free Currency
     * @return Namespace_
     */
	public function withShareFree(?bool $shareFree): Namespace_ {
		$this->shareFree = $shareFree;
		return $this;
	}
    /** @return string|null Currency Type */
	public function getCurrency(): ?string {
		return $this->currency;
	}
    /** @param string|null $currency Currency Type */
	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}
    /**
     * @param string|null $currency Currency Type
     * @return Namespace_
     */
	public function withCurrency(?string $currency): Namespace_ {
		$this->currency = $currency;
		return $this;
	}
    /** @return string|null Apple App Store Bundle ID */
	public function getAppleKey(): ?string {
		return $this->appleKey;
	}
    /** @param string|null $appleKey Apple App Store Bundle ID */
	public function setAppleKey(?string $appleKey) {
		$this->appleKey = $appleKey;
	}
    /**
     * @param string|null $appleKey Apple App Store Bundle ID
     * @return Namespace_
     */
	public function withAppleKey(?string $appleKey): Namespace_ {
		$this->appleKey = $appleKey;
		return $this;
	}
    /** @return string|null Google PlayStore Private Key */
	public function getGoogleKey(): ?string {
		return $this->googleKey;
	}
    /** @param string|null $googleKey Google PlayStore Private Key */
	public function setGoogleKey(?string $googleKey) {
		$this->googleKey = $googleKey;
	}
    /**
     * @param string|null $googleKey Google PlayStore Private Key
     * @return Namespace_
     */
	public function withGoogleKey(?string $googleKey): Namespace_ {
		$this->googleKey = $googleKey;
		return $this;
	}
    /** @return bool|null Enable Fake Receipt */
	public function getEnableFakeReceipt(): ?bool {
		return $this->enableFakeReceipt;
	}
    /** @param bool|null $enableFakeReceipt Enable Fake Receipt */
	public function setEnableFakeReceipt(?bool $enableFakeReceipt) {
		$this->enableFakeReceipt = $enableFakeReceipt;
	}
    /**
     * @param bool|null $enableFakeReceipt Enable Fake Receipt
     * @return Namespace_
     */
	public function withEnableFakeReceipt(?bool $enableFakeReceipt): Namespace_ {
		$this->enableFakeReceipt = $enableFakeReceipt;
		return $this;
	}
    /** @return ScriptSetting|null Create Wallet Script */
	public function getCreateWalletScript(): ?ScriptSetting {
		return $this->createWalletScript;
	}
    /** @param ScriptSetting|null $createWalletScript Create Wallet Script */
	public function setCreateWalletScript(?ScriptSetting $createWalletScript) {
		$this->createWalletScript = $createWalletScript;
	}
    /**
     * @param ScriptSetting|null $createWalletScript Create Wallet Script
     * @return Namespace_
     */
	public function withCreateWalletScript(?ScriptSetting $createWalletScript): Namespace_ {
		$this->createWalletScript = $createWalletScript;
		return $this;
	}
    /** @return ScriptSetting|null Deposit Script */
	public function getDepositScript(): ?ScriptSetting {
		return $this->depositScript;
	}
    /** @param ScriptSetting|null $depositScript Deposit Script */
	public function setDepositScript(?ScriptSetting $depositScript) {
		$this->depositScript = $depositScript;
	}
    /**
     * @param ScriptSetting|null $depositScript Deposit Script
     * @return Namespace_
     */
	public function withDepositScript(?ScriptSetting $depositScript): Namespace_ {
		$this->depositScript = $depositScript;
		return $this;
	}
    /** @return ScriptSetting|null Withdraw Script */
	public function getWithdrawScript(): ?ScriptSetting {
		return $this->withdrawScript;
	}
    /** @param ScriptSetting|null $withdrawScript Withdraw Script */
	public function setWithdrawScript(?ScriptSetting $withdrawScript) {
		$this->withdrawScript = $withdrawScript;
	}
    /**
     * @param ScriptSetting|null $withdrawScript Withdraw Script
     * @return Namespace_
     */
	public function withWithdrawScript(?ScriptSetting $withdrawScript): Namespace_ {
		$this->withdrawScript = $withdrawScript;
		return $this;
	}
    /** @return float|null Unused Balance */
	public function getBalance(): ?float {
		return $this->balance;
	}
    /** @param float|null $balance Unused Balance */
	public function setBalance(?float $balance) {
		$this->balance = $balance;
	}
    /**
     * @param float|null $balance Unused Balance
     * @return Namespace_
     */
	public function withBalance(?float $balance): Namespace_ {
		$this->balance = $balance;
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
            ->withPriority(array_key_exists('priority', $data) && $data['priority'] !== null ? $data['priority'] : null)
            ->withShareFree(array_key_exists('shareFree', $data) ? $data['shareFree'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withAppleKey(array_key_exists('appleKey', $data) && $data['appleKey'] !== null ? $data['appleKey'] : null)
            ->withGoogleKey(array_key_exists('googleKey', $data) && $data['googleKey'] !== null ? $data['googleKey'] : null)
            ->withEnableFakeReceipt(array_key_exists('enableFakeReceipt', $data) ? $data['enableFakeReceipt'] : null)
            ->withCreateWalletScript(array_key_exists('createWalletScript', $data) && $data['createWalletScript'] !== null ? ScriptSetting::fromJson($data['createWalletScript']) : null)
            ->withDepositScript(array_key_exists('depositScript', $data) && $data['depositScript'] !== null ? ScriptSetting::fromJson($data['depositScript']) : null)
            ->withWithdrawScript(array_key_exists('withdrawScript', $data) && $data['withdrawScript'] !== null ? ScriptSetting::fromJson($data['withdrawScript']) : null)
            ->withBalance(array_key_exists('balance', $data) && $data['balance'] !== null ? $data['balance'] : null)
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
            "priority" => $this->getPriority(),
            "shareFree" => $this->getShareFree(),
            "currency" => $this->getCurrency(),
            "appleKey" => $this->getAppleKey(),
            "googleKey" => $this->getGoogleKey(),
            "enableFakeReceipt" => $this->getEnableFakeReceipt(),
            "createWalletScript" => $this->getCreateWalletScript() !== null ? $this->getCreateWalletScript()->toJson() : null,
            "depositScript" => $this->getDepositScript() !== null ? $this->getDepositScript()->toJson() : null,
            "withdrawScript" => $this->getWithdrawScript() !== null ? $this->getWithdrawScript()->toJson() : null,
            "balance" => $this->getBalance(),
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}