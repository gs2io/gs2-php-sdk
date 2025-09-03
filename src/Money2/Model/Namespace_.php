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


class Namespace_ implements IModel {
	/**
     * @var string
	 */
	private $namespaceId;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var string
	 */
	private $description;
	/**
     * @var TransactionSetting
	 */
	private $transactionSetting;
	/**
     * @var string
	 */
	private $currencyUsagePriority;
	/**
     * @var bool
	 */
	private $sharedFreeCurrency;
	/**
     * @var PlatformSetting
	 */
	private $platformSetting;
	/**
     * @var ScriptSetting
	 */
	private $depositBalanceScript;
	/**
     * @var ScriptSetting
	 */
	private $withdrawBalanceScript;
	/**
     * @var ScriptSetting
	 */
	private $verifyReceiptScript;
	/**
     * @var string
	 */
	private $subscribeScript;
	/**
     * @var string
	 */
	private $renewScript;
	/**
     * @var string
	 */
	private $unsubscribeScript;
	/**
     * @var ScriptSetting
	 */
	private $takeOverScript;
	/**
     * @var NotificationSetting
	 */
	private $changeSubscriptionStatusNotification;
	/**
     * @var LogSetting
	 */
	private $logSetting;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getNamespaceId(): ?string {
		return $this->namespaceId;
	}
	public function setNamespaceId(?string $namespaceId) {
		$this->namespaceId = $namespaceId;
	}
	public function withNamespaceId(?string $namespaceId): Namespace_ {
		$this->namespaceId = $namespaceId;
		return $this;
	}
	public function getName(): ?string {
		return $this->name;
	}
	public function setName(?string $name) {
		$this->name = $name;
	}
	public function withName(?string $name): Namespace_ {
		$this->name = $name;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): Namespace_ {
		$this->description = $description;
		return $this;
	}
	public function getTransactionSetting(): ?TransactionSetting {
		return $this->transactionSetting;
	}
	public function setTransactionSetting(?TransactionSetting $transactionSetting) {
		$this->transactionSetting = $transactionSetting;
	}
	public function withTransactionSetting(?TransactionSetting $transactionSetting): Namespace_ {
		$this->transactionSetting = $transactionSetting;
		return $this;
	}
	public function getCurrencyUsagePriority(): ?string {
		return $this->currencyUsagePriority;
	}
	public function setCurrencyUsagePriority(?string $currencyUsagePriority) {
		$this->currencyUsagePriority = $currencyUsagePriority;
	}
	public function withCurrencyUsagePriority(?string $currencyUsagePriority): Namespace_ {
		$this->currencyUsagePriority = $currencyUsagePriority;
		return $this;
	}
	public function getSharedFreeCurrency(): ?bool {
		return $this->sharedFreeCurrency;
	}
	public function setSharedFreeCurrency(?bool $sharedFreeCurrency) {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
	}
	public function withSharedFreeCurrency(?bool $sharedFreeCurrency): Namespace_ {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
		return $this;
	}
	public function getPlatformSetting(): ?PlatformSetting {
		return $this->platformSetting;
	}
	public function setPlatformSetting(?PlatformSetting $platformSetting) {
		$this->platformSetting = $platformSetting;
	}
	public function withPlatformSetting(?PlatformSetting $platformSetting): Namespace_ {
		$this->platformSetting = $platformSetting;
		return $this;
	}
	public function getDepositBalanceScript(): ?ScriptSetting {
		return $this->depositBalanceScript;
	}
	public function setDepositBalanceScript(?ScriptSetting $depositBalanceScript) {
		$this->depositBalanceScript = $depositBalanceScript;
	}
	public function withDepositBalanceScript(?ScriptSetting $depositBalanceScript): Namespace_ {
		$this->depositBalanceScript = $depositBalanceScript;
		return $this;
	}
	public function getWithdrawBalanceScript(): ?ScriptSetting {
		return $this->withdrawBalanceScript;
	}
	public function setWithdrawBalanceScript(?ScriptSetting $withdrawBalanceScript) {
		$this->withdrawBalanceScript = $withdrawBalanceScript;
	}
	public function withWithdrawBalanceScript(?ScriptSetting $withdrawBalanceScript): Namespace_ {
		$this->withdrawBalanceScript = $withdrawBalanceScript;
		return $this;
	}
	public function getVerifyReceiptScript(): ?ScriptSetting {
		return $this->verifyReceiptScript;
	}
	public function setVerifyReceiptScript(?ScriptSetting $verifyReceiptScript) {
		$this->verifyReceiptScript = $verifyReceiptScript;
	}
	public function withVerifyReceiptScript(?ScriptSetting $verifyReceiptScript): Namespace_ {
		$this->verifyReceiptScript = $verifyReceiptScript;
		return $this;
	}
	public function getSubscribeScript(): ?string {
		return $this->subscribeScript;
	}
	public function setSubscribeScript(?string $subscribeScript) {
		$this->subscribeScript = $subscribeScript;
	}
	public function withSubscribeScript(?string $subscribeScript): Namespace_ {
		$this->subscribeScript = $subscribeScript;
		return $this;
	}
	public function getRenewScript(): ?string {
		return $this->renewScript;
	}
	public function setRenewScript(?string $renewScript) {
		$this->renewScript = $renewScript;
	}
	public function withRenewScript(?string $renewScript): Namespace_ {
		$this->renewScript = $renewScript;
		return $this;
	}
	public function getUnsubscribeScript(): ?string {
		return $this->unsubscribeScript;
	}
	public function setUnsubscribeScript(?string $unsubscribeScript) {
		$this->unsubscribeScript = $unsubscribeScript;
	}
	public function withUnsubscribeScript(?string $unsubscribeScript): Namespace_ {
		$this->unsubscribeScript = $unsubscribeScript;
		return $this;
	}
	public function getTakeOverScript(): ?ScriptSetting {
		return $this->takeOverScript;
	}
	public function setTakeOverScript(?ScriptSetting $takeOverScript) {
		$this->takeOverScript = $takeOverScript;
	}
	public function withTakeOverScript(?ScriptSetting $takeOverScript): Namespace_ {
		$this->takeOverScript = $takeOverScript;
		return $this;
	}
	public function getChangeSubscriptionStatusNotification(): ?NotificationSetting {
		return $this->changeSubscriptionStatusNotification;
	}
	public function setChangeSubscriptionStatusNotification(?NotificationSetting $changeSubscriptionStatusNotification) {
		$this->changeSubscriptionStatusNotification = $changeSubscriptionStatusNotification;
	}
	public function withChangeSubscriptionStatusNotification(?NotificationSetting $changeSubscriptionStatusNotification): Namespace_ {
		$this->changeSubscriptionStatusNotification = $changeSubscriptionStatusNotification;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): Namespace_ {
		$this->logSetting = $logSetting;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Namespace_ {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Namespace_ {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
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