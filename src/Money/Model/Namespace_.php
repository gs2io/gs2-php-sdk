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
     * @var string
	 */
	private $priority;
	/**
     * @var bool
	 */
	private $shareFree;
	/**
     * @var string
	 */
	private $currency;
	/**
     * @var string
	 */
	private $appleKey;
	/**
     * @var string
	 */
	private $googleKey;
	/**
     * @var bool
	 */
	private $enableFakeReceipt;
	/**
     * @var ScriptSetting
	 */
	private $createWalletScript;
	/**
     * @var ScriptSetting
	 */
	private $depositScript;
	/**
     * @var ScriptSetting
	 */
	private $withdrawScript;
	/**
     * @var float
	 */
	private $balance;
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

	public function getPriority(): ?string {
		return $this->priority;
	}

	public function setPriority(?string $priority) {
		$this->priority = $priority;
	}

	public function withPriority(?string $priority): Namespace_ {
		$this->priority = $priority;
		return $this;
	}

	public function getShareFree(): ?bool {
		return $this->shareFree;
	}

	public function setShareFree(?bool $shareFree) {
		$this->shareFree = $shareFree;
	}

	public function withShareFree(?bool $shareFree): Namespace_ {
		$this->shareFree = $shareFree;
		return $this;
	}

	public function getCurrency(): ?string {
		return $this->currency;
	}

	public function setCurrency(?string $currency) {
		$this->currency = $currency;
	}

	public function withCurrency(?string $currency): Namespace_ {
		$this->currency = $currency;
		return $this;
	}

	public function getAppleKey(): ?string {
		return $this->appleKey;
	}

	public function setAppleKey(?string $appleKey) {
		$this->appleKey = $appleKey;
	}

	public function withAppleKey(?string $appleKey): Namespace_ {
		$this->appleKey = $appleKey;
		return $this;
	}

	public function getGoogleKey(): ?string {
		return $this->googleKey;
	}

	public function setGoogleKey(?string $googleKey) {
		$this->googleKey = $googleKey;
	}

	public function withGoogleKey(?string $googleKey): Namespace_ {
		$this->googleKey = $googleKey;
		return $this;
	}

	public function getEnableFakeReceipt(): ?bool {
		return $this->enableFakeReceipt;
	}

	public function setEnableFakeReceipt(?bool $enableFakeReceipt) {
		$this->enableFakeReceipt = $enableFakeReceipt;
	}

	public function withEnableFakeReceipt(?bool $enableFakeReceipt): Namespace_ {
		$this->enableFakeReceipt = $enableFakeReceipt;
		return $this;
	}

	public function getCreateWalletScript(): ?ScriptSetting {
		return $this->createWalletScript;
	}

	public function setCreateWalletScript(?ScriptSetting $createWalletScript) {
		$this->createWalletScript = $createWalletScript;
	}

	public function withCreateWalletScript(?ScriptSetting $createWalletScript): Namespace_ {
		$this->createWalletScript = $createWalletScript;
		return $this;
	}

	public function getDepositScript(): ?ScriptSetting {
		return $this->depositScript;
	}

	public function setDepositScript(?ScriptSetting $depositScript) {
		$this->depositScript = $depositScript;
	}

	public function withDepositScript(?ScriptSetting $depositScript): Namespace_ {
		$this->depositScript = $depositScript;
		return $this;
	}

	public function getWithdrawScript(): ?ScriptSetting {
		return $this->withdrawScript;
	}

	public function setWithdrawScript(?ScriptSetting $withdrawScript) {
		$this->withdrawScript = $withdrawScript;
	}

	public function withWithdrawScript(?ScriptSetting $withdrawScript): Namespace_ {
		$this->withdrawScript = $withdrawScript;
		return $this;
	}

	public function getBalance(): ?float {
		return $this->balance;
	}

	public function setBalance(?float $balance) {
		$this->balance = $balance;
	}

	public function withBalance(?float $balance): Namespace_ {
		$this->balance = $balance;
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

    public static function fromJson(?array $data): ?Namespace_ {
        if ($data === null) {
            return null;
        }
        return (new Namespace_())
            ->withNamespaceId(empty($data['namespaceId']) ? null : $data['namespaceId'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDescription(empty($data['description']) ? null : $data['description'])
            ->withPriority(empty($data['priority']) ? null : $data['priority'])
            ->withShareFree(empty($data['shareFree']) ? null : $data['shareFree'])
            ->withCurrency(empty($data['currency']) ? null : $data['currency'])
            ->withAppleKey(empty($data['appleKey']) ? null : $data['appleKey'])
            ->withGoogleKey(empty($data['googleKey']) ? null : $data['googleKey'])
            ->withEnableFakeReceipt(empty($data['enableFakeReceipt']) ? null : $data['enableFakeReceipt'])
            ->withCreateWalletScript(empty($data['createWalletScript']) ? null : ScriptSetting::fromJson($data['createWalletScript']))
            ->withDepositScript(empty($data['depositScript']) ? null : ScriptSetting::fromJson($data['depositScript']))
            ->withWithdrawScript(empty($data['withdrawScript']) ? null : ScriptSetting::fromJson($data['withdrawScript']))
            ->withBalance(empty($data['balance']) && $data['balance'] !== 0 ? null : $data['balance'])
            ->withLogSetting(empty($data['logSetting']) ? null : LogSetting::fromJson($data['logSetting']))
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
    }

    public function toJson(): array {
        return array(
            "namespaceId" => $this->getNamespaceId(),
            "name" => $this->getName(),
            "description" => $this->getDescription(),
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
        );
    }
}