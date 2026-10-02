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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Money2\Model\TransactionSetting;
use Gs2\Money2\Model\TransactionSettingV2;
use Gs2\Money2\Model\AppleAppStoreSetting;
use Gs2\Money2\Model\GooglePlaySetting;
use Gs2\Money2\Model\FakeSetting;
use Gs2\Money2\Model\PlatformSetting;
use Gs2\Money2\Model\ScriptSetting;
use Gs2\Money2\Model\MobileNotificationMessage;
use Gs2\Money2\Model\NotificationSetting;
use Gs2\Money2\Model\LogSetting;

/**
 * Request for createNamespace: Create Namespace
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#createnamespace
 */
class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $name;
    /** @var string Consumption priority */
    private $currencyUsagePriority;
    /** @var string Description */
    private $description;
    /** @var TransactionSetting Transaction Setting */
    private $transactionSetting;
    /** @var TransactionSettingV2 Transaction Setting (V2) */
    private $transactionSettingV2;
    /** @var bool Share the free currency with different slots */
    private $sharedFreeCurrency;
    /** @var PlatformSetting Store platform settings */
    private $platformSetting;
    /** @var ScriptSetting Script setting to be executed when depositing wallet balance */
    private $depositBalanceScript;
    /** @var ScriptSetting Script setting to be executed when withdrawing wallet balance */
    private $withdrawBalanceScript;
    /** @var ScriptSetting Script setting to be executed when verifying a receipt */
    private $verifyReceiptScript;
    /** @var string GS2-Script script GRN to be executed when subscribing to a new contract (Not called when the user associated with the subscription is changed / Called when re-subscribing after contract expiration) */
    private $subscribeScript;
    /** @var string GS2-Script script GRN to be executed when renewing a contract */
    private $renewScript;
    /** @var string GS2-Script script GRN to be executed when unsubscribing from a contract (Not called when the user associated with the subscription is changed) */
    private $unsubscribeScript;
    /** @var ScriptSetting Script setting to be executed when changing the user associated with a subscription */
    private $takeOverScript;
    /** @var NotificationSetting Push notification when the subscription status changes */
    private $changeSubscriptionStatusNotification;
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
    /** @return string|null Consumption priority */
	public function getCurrencyUsagePriority(): ?string {
		return $this->currencyUsagePriority;
	}
    /** @param string|null $currencyUsagePriority Consumption priority */
	public function setCurrencyUsagePriority(?string $currencyUsagePriority) {
		$this->currencyUsagePriority = $currencyUsagePriority;
	}
    /**
     * @param string|null $currencyUsagePriority Consumption priority
     * @return CreateNamespaceRequest
     */
	public function withCurrencyUsagePriority(?string $currencyUsagePriority): CreateNamespaceRequest {
		$this->currencyUsagePriority = $currencyUsagePriority;
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
    /** @return bool|null Share the free currency with different slots */
	public function getSharedFreeCurrency(): ?bool {
		return $this->sharedFreeCurrency;
	}
    /** @param bool|null $sharedFreeCurrency Share the free currency with different slots */
	public function setSharedFreeCurrency(?bool $sharedFreeCurrency) {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
	}
    /**
     * @param bool|null $sharedFreeCurrency Share the free currency with different slots
     * @return CreateNamespaceRequest
     */
	public function withSharedFreeCurrency(?bool $sharedFreeCurrency): CreateNamespaceRequest {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
		return $this;
	}
    /** @return PlatformSetting|null Store platform settings */
	public function getPlatformSetting(): ?PlatformSetting {
		return $this->platformSetting;
	}
    /** @param PlatformSetting|null $platformSetting Store platform settings */
	public function setPlatformSetting(?PlatformSetting $platformSetting) {
		$this->platformSetting = $platformSetting;
	}
    /**
     * @param PlatformSetting|null $platformSetting Store platform settings
     * @return CreateNamespaceRequest
     */
	public function withPlatformSetting(?PlatformSetting $platformSetting): CreateNamespaceRequest {
		$this->platformSetting = $platformSetting;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when depositing wallet balance */
	public function getDepositBalanceScript(): ?ScriptSetting {
		return $this->depositBalanceScript;
	}
    /** @param ScriptSetting|null $depositBalanceScript Script setting to be executed when depositing wallet balance */
	public function setDepositBalanceScript(?ScriptSetting $depositBalanceScript) {
		$this->depositBalanceScript = $depositBalanceScript;
	}
    /**
     * @param ScriptSetting|null $depositBalanceScript Script setting to be executed when depositing wallet balance
     * @return CreateNamespaceRequest
     */
	public function withDepositBalanceScript(?ScriptSetting $depositBalanceScript): CreateNamespaceRequest {
		$this->depositBalanceScript = $depositBalanceScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when withdrawing wallet balance */
	public function getWithdrawBalanceScript(): ?ScriptSetting {
		return $this->withdrawBalanceScript;
	}
    /** @param ScriptSetting|null $withdrawBalanceScript Script setting to be executed when withdrawing wallet balance */
	public function setWithdrawBalanceScript(?ScriptSetting $withdrawBalanceScript) {
		$this->withdrawBalanceScript = $withdrawBalanceScript;
	}
    /**
     * @param ScriptSetting|null $withdrawBalanceScript Script setting to be executed when withdrawing wallet balance
     * @return CreateNamespaceRequest
     */
	public function withWithdrawBalanceScript(?ScriptSetting $withdrawBalanceScript): CreateNamespaceRequest {
		$this->withdrawBalanceScript = $withdrawBalanceScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when verifying a receipt */
	public function getVerifyReceiptScript(): ?ScriptSetting {
		return $this->verifyReceiptScript;
	}
    /** @param ScriptSetting|null $verifyReceiptScript Script setting to be executed when verifying a receipt */
	public function setVerifyReceiptScript(?ScriptSetting $verifyReceiptScript) {
		$this->verifyReceiptScript = $verifyReceiptScript;
	}
    /**
     * @param ScriptSetting|null $verifyReceiptScript Script setting to be executed when verifying a receipt
     * @return CreateNamespaceRequest
     */
	public function withVerifyReceiptScript(?ScriptSetting $verifyReceiptScript): CreateNamespaceRequest {
		$this->verifyReceiptScript = $verifyReceiptScript;
		return $this;
	}
    /** @return string|null GS2-Script script GRN to be executed when subscribing to a new contract (Not called when the user associated with the subscription is changed / Called when re-subscribing after contract expiration) */
	public function getSubscribeScript(): ?string {
		return $this->subscribeScript;
	}
    /** @param string|null $subscribeScript GS2-Script script GRN to be executed when subscribing to a new contract (Not called when the user associated with the subscription is changed / Called when re-subscribing after contract expiration) */
	public function setSubscribeScript(?string $subscribeScript) {
		$this->subscribeScript = $subscribeScript;
	}
    /**
     * @param string|null $subscribeScript GS2-Script script GRN to be executed when subscribing to a new contract (Not called when the user associated with the subscription is changed / Called when re-subscribing after contract expiration)
     * @return CreateNamespaceRequest
     */
	public function withSubscribeScript(?string $subscribeScript): CreateNamespaceRequest {
		$this->subscribeScript = $subscribeScript;
		return $this;
	}
    /** @return string|null GS2-Script script GRN to be executed when renewing a contract */
	public function getRenewScript(): ?string {
		return $this->renewScript;
	}
    /** @param string|null $renewScript GS2-Script script GRN to be executed when renewing a contract */
	public function setRenewScript(?string $renewScript) {
		$this->renewScript = $renewScript;
	}
    /**
     * @param string|null $renewScript GS2-Script script GRN to be executed when renewing a contract
     * @return CreateNamespaceRequest
     */
	public function withRenewScript(?string $renewScript): CreateNamespaceRequest {
		$this->renewScript = $renewScript;
		return $this;
	}
    /** @return string|null GS2-Script script GRN to be executed when unsubscribing from a contract (Not called when the user associated with the subscription is changed) */
	public function getUnsubscribeScript(): ?string {
		return $this->unsubscribeScript;
	}
    /** @param string|null $unsubscribeScript GS2-Script script GRN to be executed when unsubscribing from a contract (Not called when the user associated with the subscription is changed) */
	public function setUnsubscribeScript(?string $unsubscribeScript) {
		$this->unsubscribeScript = $unsubscribeScript;
	}
    /**
     * @param string|null $unsubscribeScript GS2-Script script GRN to be executed when unsubscribing from a contract (Not called when the user associated with the subscription is changed)
     * @return CreateNamespaceRequest
     */
	public function withUnsubscribeScript(?string $unsubscribeScript): CreateNamespaceRequest {
		$this->unsubscribeScript = $unsubscribeScript;
		return $this;
	}
    /** @return ScriptSetting|null Script setting to be executed when changing the user associated with a subscription */
	public function getTakeOverScript(): ?ScriptSetting {
		return $this->takeOverScript;
	}
    /** @param ScriptSetting|null $takeOverScript Script setting to be executed when changing the user associated with a subscription */
	public function setTakeOverScript(?ScriptSetting $takeOverScript) {
		$this->takeOverScript = $takeOverScript;
	}
    /**
     * @param ScriptSetting|null $takeOverScript Script setting to be executed when changing the user associated with a subscription
     * @return CreateNamespaceRequest
     */
	public function withTakeOverScript(?ScriptSetting $takeOverScript): CreateNamespaceRequest {
		$this->takeOverScript = $takeOverScript;
		return $this;
	}
    /** @return NotificationSetting|null Push notification when the subscription status changes */
	public function getChangeSubscriptionStatusNotification(): ?NotificationSetting {
		return $this->changeSubscriptionStatusNotification;
	}
    /** @param NotificationSetting|null $changeSubscriptionStatusNotification Push notification when the subscription status changes */
	public function setChangeSubscriptionStatusNotification(?NotificationSetting $changeSubscriptionStatusNotification) {
		$this->changeSubscriptionStatusNotification = $changeSubscriptionStatusNotification;
	}
    /**
     * @param NotificationSetting|null $changeSubscriptionStatusNotification Push notification when the subscription status changes
     * @return CreateNamespaceRequest
     */
	public function withChangeSubscriptionStatusNotification(?NotificationSetting $changeSubscriptionStatusNotification): CreateNamespaceRequest {
		$this->changeSubscriptionStatusNotification = $changeSubscriptionStatusNotification;
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
            ->withCurrencyUsagePriority(array_key_exists('currencyUsagePriority', $data) && $data['currencyUsagePriority'] !== null ? $data['currencyUsagePriority'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
            ->withTransactionSettingV2(array_key_exists('transactionSettingV2', $data) && $data['transactionSettingV2'] !== null ? TransactionSettingV2::fromJson($data['transactionSettingV2']) : null)
            ->withSharedFreeCurrency(array_key_exists('sharedFreeCurrency', $data) ? $data['sharedFreeCurrency'] : null)
            ->withPlatformSetting(array_key_exists('platformSetting', $data) && $data['platformSetting'] !== null ? PlatformSetting::fromJson($data['platformSetting']) : null)
            ->withDepositBalanceScript(array_key_exists('depositBalanceScript', $data) && $data['depositBalanceScript'] !== null ? ScriptSetting::fromJson($data['depositBalanceScript']) : null)
            ->withWithdrawBalanceScript(array_key_exists('withdrawBalanceScript', $data) && $data['withdrawBalanceScript'] !== null ? ScriptSetting::fromJson($data['withdrawBalanceScript']) : null)
            ->withVerifyReceiptScript(array_key_exists('verifyReceiptScript', $data) && $data['verifyReceiptScript'] !== null ? ScriptSetting::fromJson($data['verifyReceiptScript']) : null)
            ->withSubscribeScript(array_key_exists('subscribeScript', $data) && $data['subscribeScript'] !== null ? $data['subscribeScript'] : null)
            ->withRenewScript(array_key_exists('renewScript', $data) && $data['renewScript'] !== null ? $data['renewScript'] : null)
            ->withUnsubscribeScript(array_key_exists('unsubscribeScript', $data) && $data['unsubscribeScript'] !== null ? $data['unsubscribeScript'] : null)
            ->withTakeOverScript(array_key_exists('takeOverScript', $data) && $data['takeOverScript'] !== null ? ScriptSetting::fromJson($data['takeOverScript']) : null)
            ->withChangeSubscriptionStatusNotification(array_key_exists('changeSubscriptionStatusNotification', $data) && $data['changeSubscriptionStatusNotification'] !== null ? NotificationSetting::fromJson($data['changeSubscriptionStatusNotification']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "name" => $this->getName(),
            "currencyUsagePriority" => $this->getCurrencyUsagePriority(),
            "description" => $this->getDescription(),
            "transactionSetting" => $this->getTransactionSetting() !== null ? $this->getTransactionSetting()->toJson() : null,
            "transactionSettingV2" => $this->getTransactionSettingV2() !== null ? $this->getTransactionSettingV2()->toJson() : null,
            "sharedFreeCurrency" => $this->getSharedFreeCurrency(),
            "platformSetting" => $this->getPlatformSetting() !== null ? $this->getPlatformSetting()->toJson() : null,
            "depositBalanceScript" => $this->getDepositBalanceScript() !== null ? $this->getDepositBalanceScript()->toJson() : null,
            "withdrawBalanceScript" => $this->getWithdrawBalanceScript() !== null ? $this->getWithdrawBalanceScript()->toJson() : null,
            "verifyReceiptScript" => $this->getVerifyReceiptScript() !== null ? $this->getVerifyReceiptScript()->toJson() : null,
            "subscribeScript" => $this->getSubscribeScript(),
            "renewScript" => $this->getRenewScript(),
            "unsubscribeScript" => $this->getUnsubscribeScript(),
            "takeOverScript" => $this->getTakeOverScript() !== null ? $this->getTakeOverScript()->toJson() : null,
            "changeSubscriptionStatusNotification" => $this->getChangeSubscriptionStatusNotification() !== null ? $this->getChangeSubscriptionStatusNotification()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}