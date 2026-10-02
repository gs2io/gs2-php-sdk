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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


/**
 * Namespace
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#namespace
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
     * @var string Consumption priority
	 */
	private $currencyUsagePriority;
	/**
     * @var bool Share the free currency with different slots
	 */
	private $sharedFreeCurrency;
	/**
     * @var PlatformSetting Store platform settings
	 */
	private $platformSetting;
	/**
     * @var ScriptSetting Script setting to be executed when depositing wallet balance
	 */
	private $depositBalanceScript;
	/**
     * @var ScriptSetting Script setting to be executed when withdrawing wallet balance
	 */
	private $withdrawBalanceScript;
	/**
     * @var ScriptSetting Script setting to be executed when verifying a receipt
	 */
	private $verifyReceiptScript;
	/**
     * @var string GS2-Script script GRN to be executed when subscribing to a new contract (Not called when the user associated with the subscription is changed / Called when re-subscribing after contract expiration)
	 */
	private $subscribeScript;
	/**
     * @var string GS2-Script script GRN to be executed when renewing a contract
	 */
	private $renewScript;
	/**
     * @var string GS2-Script script GRN to be executed when unsubscribing from a contract (Not called when the user associated with the subscription is changed)
	 */
	private $unsubscribeScript;
	/**
     * @var ScriptSetting Script setting to be executed when changing the user associated with a subscription
	 */
	private $takeOverScript;
	/**
     * @var NotificationSetting Push notification when the subscription status changes
	 */
	private $changeSubscriptionStatusNotification;
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
     * @return Namespace_
     */
	public function withCurrencyUsagePriority(?string $currencyUsagePriority): Namespace_ {
		$this->currencyUsagePriority = $currencyUsagePriority;
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
     * @return Namespace_
     */
	public function withSharedFreeCurrency(?bool $sharedFreeCurrency): Namespace_ {
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
     * @return Namespace_
     */
	public function withPlatformSetting(?PlatformSetting $platformSetting): Namespace_ {
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
     * @return Namespace_
     */
	public function withDepositBalanceScript(?ScriptSetting $depositBalanceScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withWithdrawBalanceScript(?ScriptSetting $withdrawBalanceScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withVerifyReceiptScript(?ScriptSetting $verifyReceiptScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withSubscribeScript(?string $subscribeScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withRenewScript(?string $renewScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withUnsubscribeScript(?string $unsubscribeScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withTakeOverScript(?ScriptSetting $takeOverScript): Namespace_ {
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
     * @return Namespace_
     */
	public function withChangeSubscriptionStatusNotification(?NotificationSetting $changeSubscriptionStatusNotification): Namespace_ {
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
            ->withCurrencyUsagePriority(array_key_exists('currencyUsagePriority', $data) && $data['currencyUsagePriority'] !== null ? $data['currencyUsagePriority'] : null)
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
            "currencyUsagePriority" => $this->getCurrencyUsagePriority(),
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
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}