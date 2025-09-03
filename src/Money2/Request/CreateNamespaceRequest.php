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
use Gs2\Money2\Model\AppleAppStoreSetting;
use Gs2\Money2\Model\GooglePlaySetting;
use Gs2\Money2\Model\FakeSetting;
use Gs2\Money2\Model\PlatformSetting;
use Gs2\Money2\Model\ScriptSetting;
use Gs2\Money2\Model\NotificationSetting;
use Gs2\Money2\Model\LogSetting;

class CreateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $name;
    /** @var string */
    private $currencyUsagePriority;
    /** @var string */
    private $description;
    /** @var TransactionSetting */
    private $transactionSetting;
    /** @var bool */
    private $sharedFreeCurrency;
    /** @var PlatformSetting */
    private $platformSetting;
    /** @var ScriptSetting */
    private $depositBalanceScript;
    /** @var ScriptSetting */
    private $withdrawBalanceScript;
    /** @var ScriptSetting */
    private $verifyReceiptScript;
    /** @var string */
    private $subscribeScript;
    /** @var string */
    private $renewScript;
    /** @var string */
    private $unsubscribeScript;
    /** @var ScriptSetting */
    private $takeOverScript;
    /** @var NotificationSetting */
    private $changeSubscriptionStatusNotification;
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
	public function getCurrencyUsagePriority(): ?string {
		return $this->currencyUsagePriority;
	}
	public function setCurrencyUsagePriority(?string $currencyUsagePriority) {
		$this->currencyUsagePriority = $currencyUsagePriority;
	}
	public function withCurrencyUsagePriority(?string $currencyUsagePriority): CreateNamespaceRequest {
		$this->currencyUsagePriority = $currencyUsagePriority;
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
	public function getSharedFreeCurrency(): ?bool {
		return $this->sharedFreeCurrency;
	}
	public function setSharedFreeCurrency(?bool $sharedFreeCurrency) {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
	}
	public function withSharedFreeCurrency(?bool $sharedFreeCurrency): CreateNamespaceRequest {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
		return $this;
	}
	public function getPlatformSetting(): ?PlatformSetting {
		return $this->platformSetting;
	}
	public function setPlatformSetting(?PlatformSetting $platformSetting) {
		$this->platformSetting = $platformSetting;
	}
	public function withPlatformSetting(?PlatformSetting $platformSetting): CreateNamespaceRequest {
		$this->platformSetting = $platformSetting;
		return $this;
	}
	public function getDepositBalanceScript(): ?ScriptSetting {
		return $this->depositBalanceScript;
	}
	public function setDepositBalanceScript(?ScriptSetting $depositBalanceScript) {
		$this->depositBalanceScript = $depositBalanceScript;
	}
	public function withDepositBalanceScript(?ScriptSetting $depositBalanceScript): CreateNamespaceRequest {
		$this->depositBalanceScript = $depositBalanceScript;
		return $this;
	}
	public function getWithdrawBalanceScript(): ?ScriptSetting {
		return $this->withdrawBalanceScript;
	}
	public function setWithdrawBalanceScript(?ScriptSetting $withdrawBalanceScript) {
		$this->withdrawBalanceScript = $withdrawBalanceScript;
	}
	public function withWithdrawBalanceScript(?ScriptSetting $withdrawBalanceScript): CreateNamespaceRequest {
		$this->withdrawBalanceScript = $withdrawBalanceScript;
		return $this;
	}
	public function getVerifyReceiptScript(): ?ScriptSetting {
		return $this->verifyReceiptScript;
	}
	public function setVerifyReceiptScript(?ScriptSetting $verifyReceiptScript) {
		$this->verifyReceiptScript = $verifyReceiptScript;
	}
	public function withVerifyReceiptScript(?ScriptSetting $verifyReceiptScript): CreateNamespaceRequest {
		$this->verifyReceiptScript = $verifyReceiptScript;
		return $this;
	}
	public function getSubscribeScript(): ?string {
		return $this->subscribeScript;
	}
	public function setSubscribeScript(?string $subscribeScript) {
		$this->subscribeScript = $subscribeScript;
	}
	public function withSubscribeScript(?string $subscribeScript): CreateNamespaceRequest {
		$this->subscribeScript = $subscribeScript;
		return $this;
	}
	public function getRenewScript(): ?string {
		return $this->renewScript;
	}
	public function setRenewScript(?string $renewScript) {
		$this->renewScript = $renewScript;
	}
	public function withRenewScript(?string $renewScript): CreateNamespaceRequest {
		$this->renewScript = $renewScript;
		return $this;
	}
	public function getUnsubscribeScript(): ?string {
		return $this->unsubscribeScript;
	}
	public function setUnsubscribeScript(?string $unsubscribeScript) {
		$this->unsubscribeScript = $unsubscribeScript;
	}
	public function withUnsubscribeScript(?string $unsubscribeScript): CreateNamespaceRequest {
		$this->unsubscribeScript = $unsubscribeScript;
		return $this;
	}
	public function getTakeOverScript(): ?ScriptSetting {
		return $this->takeOverScript;
	}
	public function setTakeOverScript(?ScriptSetting $takeOverScript) {
		$this->takeOverScript = $takeOverScript;
	}
	public function withTakeOverScript(?ScriptSetting $takeOverScript): CreateNamespaceRequest {
		$this->takeOverScript = $takeOverScript;
		return $this;
	}
	public function getChangeSubscriptionStatusNotification(): ?NotificationSetting {
		return $this->changeSubscriptionStatusNotification;
	}
	public function setChangeSubscriptionStatusNotification(?NotificationSetting $changeSubscriptionStatusNotification) {
		$this->changeSubscriptionStatusNotification = $changeSubscriptionStatusNotification;
	}
	public function withChangeSubscriptionStatusNotification(?NotificationSetting $changeSubscriptionStatusNotification): CreateNamespaceRequest {
		$this->changeSubscriptionStatusNotification = $changeSubscriptionStatusNotification;
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
            ->withCurrencyUsagePriority(array_key_exists('currencyUsagePriority', $data) && $data['currencyUsagePriority'] !== null ? $data['currencyUsagePriority'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withTransactionSetting(array_key_exists('transactionSetting', $data) && $data['transactionSetting'] !== null ? TransactionSetting::fromJson($data['transactionSetting']) : null)
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