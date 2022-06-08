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
use Gs2\Money\Model\ScriptSetting;
use Gs2\Money\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $description;
    /** @var string */
    private $priority;
    /** @var string */
    private $appleKey;
    /** @var string */
    private $googleKey;
    /** @var bool */
    private $enableFakeReceipt;
    /** @var ScriptSetting */
    private $createWalletScript;
    /** @var ScriptSetting */
    private $depositScript;
    /** @var ScriptSetting */
    private $withdrawScript;
    /** @var LogSetting */
    private $logSetting;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UpdateNamespaceRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getDescription(): ?string {
		return $this->description;
	}
	public function setDescription(?string $description) {
		$this->description = $description;
	}
	public function withDescription(?string $description): UpdateNamespaceRequest {
		$this->description = $description;
		return $this;
	}
	public function getPriority(): ?string {
		return $this->priority;
	}
	public function setPriority(?string $priority) {
		$this->priority = $priority;
	}
	public function withPriority(?string $priority): UpdateNamespaceRequest {
		$this->priority = $priority;
		return $this;
	}
	public function getAppleKey(): ?string {
		return $this->appleKey;
	}
	public function setAppleKey(?string $appleKey) {
		$this->appleKey = $appleKey;
	}
	public function withAppleKey(?string $appleKey): UpdateNamespaceRequest {
		$this->appleKey = $appleKey;
		return $this;
	}
	public function getGoogleKey(): ?string {
		return $this->googleKey;
	}
	public function setGoogleKey(?string $googleKey) {
		$this->googleKey = $googleKey;
	}
	public function withGoogleKey(?string $googleKey): UpdateNamespaceRequest {
		$this->googleKey = $googleKey;
		return $this;
	}
	public function getEnableFakeReceipt(): ?bool {
		return $this->enableFakeReceipt;
	}
	public function setEnableFakeReceipt(?bool $enableFakeReceipt) {
		$this->enableFakeReceipt = $enableFakeReceipt;
	}
	public function withEnableFakeReceipt(?bool $enableFakeReceipt): UpdateNamespaceRequest {
		$this->enableFakeReceipt = $enableFakeReceipt;
		return $this;
	}
	public function getCreateWalletScript(): ?ScriptSetting {
		return $this->createWalletScript;
	}
	public function setCreateWalletScript(?ScriptSetting $createWalletScript) {
		$this->createWalletScript = $createWalletScript;
	}
	public function withCreateWalletScript(?ScriptSetting $createWalletScript): UpdateNamespaceRequest {
		$this->createWalletScript = $createWalletScript;
		return $this;
	}
	public function getDepositScript(): ?ScriptSetting {
		return $this->depositScript;
	}
	public function setDepositScript(?ScriptSetting $depositScript) {
		$this->depositScript = $depositScript;
	}
	public function withDepositScript(?ScriptSetting $depositScript): UpdateNamespaceRequest {
		$this->depositScript = $depositScript;
		return $this;
	}
	public function getWithdrawScript(): ?ScriptSetting {
		return $this->withdrawScript;
	}
	public function setWithdrawScript(?ScriptSetting $withdrawScript) {
		$this->withdrawScript = $withdrawScript;
	}
	public function withWithdrawScript(?ScriptSetting $withdrawScript): UpdateNamespaceRequest {
		$this->withdrawScript = $withdrawScript;
		return $this;
	}
	public function getLogSetting(): ?LogSetting {
		return $this->logSetting;
	}
	public function setLogSetting(?LogSetting $logSetting) {
		$this->logSetting = $logSetting;
	}
	public function withLogSetting(?LogSetting $logSetting): UpdateNamespaceRequest {
		$this->logSetting = $logSetting;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateNamespaceRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateNamespaceRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPriority(array_key_exists('priority', $data) && $data['priority'] !== null ? $data['priority'] : null)
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
            "namespaceName" => $this->getNamespaceName(),
            "description" => $this->getDescription(),
            "priority" => $this->getPriority(),
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