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

namespace Gs2\Money\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Money\Model\TransactionSetting;
use Gs2\Money\Model\TransactionSettingV2;
use Gs2\Money\Model\ScriptSetting;
use Gs2\Money\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Settings */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var string Consumption Priority */
    private $priority;
    /** @var bool Share Free Currency */
    private $shareFree;
    /** @var string Currency Type */
    private $currency;
    /** @var string Apple App Store Bundle ID */
    private $appleKey;
    /** @var string Google PlayStore Private Key */
    private $googleKey;
    /** @var bool Enable Fake Receipt */
    private $enableFakeReceipt;
    /** @var ScriptSetting Create Wallet Script */
    private $createWalletScript;
    /** @var ScriptSetting Deposit Script */
    private $depositScript;
    /** @var ScriptSetting Withdraw Script */
    private $withdrawScript;
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
     * @return CreateNamespaceRequest
     */
	public function withPriority(?string $priority): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withShareFree(?bool $shareFree): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withCurrency(?string $currency): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withAppleKey(?string $appleKey): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withGoogleKey(?string $googleKey): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withEnableFakeReceipt(?bool $enableFakeReceipt): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withCreateWalletScript(?ScriptSetting $createWalletScript): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withDepositScript(?ScriptSetting $depositScript): CreateNamespaceRequest {
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
     * @return CreateNamespaceRequest
     */
	public function withWithdrawScript(?ScriptSetting $withdrawScript): CreateNamespaceRequest {
		$this->withdrawScript = $withdrawScript;
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
            ->withPriority(array_key_exists('priority', $data) && $data['priority'] !== null ? $data['priority'] : null)
            ->withShareFree(array_key_exists('shareFree', $data) ? $data['shareFree'] : null)
            ->withCurrency(array_key_exists('currency', $data) && $data['currency'] !== null ? $data['currency'] : null)
            ->withAppleKey(array_key_exists('appleKey', $data) && $data['appleKey'] !== null ? $data['appleKey'] : null)
            ->withGoogleKey(array_key_exists('googleKey', $data) && $data['googleKey'] !== null ? $data['googleKey'] : null)
            ->withEnableFakeReceipt(array_key_exists('enableFakeReceipt', $data) ? $data['enableFakeReceipt'] : null)
            ->withCreateWalletScript(array_key_exists('createWalletScript', $data) && $data['createWalletScript'] !== null ? ScriptSetting::fromJson($data['createWalletScript']) : null)
            ->withDepositScript(array_key_exists('depositScript', $data) && $data['depositScript'] !== null ? ScriptSetting::fromJson($data['depositScript']) : null)
            ->withWithdrawScript(array_key_exists('withdrawScript', $data) && $data['withdrawScript'] !== null ? ScriptSetting::fromJson($data['withdrawScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
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
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}