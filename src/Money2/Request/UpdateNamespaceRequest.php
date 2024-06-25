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
use Gs2\Money2\Model\AppleAppStoreSetting;
use Gs2\Money2\Model\GooglePlaySetting;
use Gs2\Money2\Model\FakeSetting;
use Gs2\Money2\Model\PlatformSetting;
use Gs2\Money2\Model\ScriptSetting;
use Gs2\Money2\Model\LogSetting;

class UpdateNamespaceRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $currencyUsagePriority;
    /** @var string */
    private $description;
    /** @var PlatformSetting */
    private $platformSetting;
    /** @var ScriptSetting */
    private $changeBalanceScript;
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
	public function getCurrencyUsagePriority(): ?string {
		return $this->currencyUsagePriority;
	}
	public function setCurrencyUsagePriority(?string $currencyUsagePriority) {
		$this->currencyUsagePriority = $currencyUsagePriority;
	}
	public function withCurrencyUsagePriority(?string $currencyUsagePriority): UpdateNamespaceRequest {
		$this->currencyUsagePriority = $currencyUsagePriority;
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
	public function getPlatformSetting(): ?PlatformSetting {
		return $this->platformSetting;
	}
	public function setPlatformSetting(?PlatformSetting $platformSetting) {
		$this->platformSetting = $platformSetting;
	}
	public function withPlatformSetting(?PlatformSetting $platformSetting): UpdateNamespaceRequest {
		$this->platformSetting = $platformSetting;
		return $this;
	}
	public function getChangeBalanceScript(): ?ScriptSetting {
		return $this->changeBalanceScript;
	}
	public function setChangeBalanceScript(?ScriptSetting $changeBalanceScript) {
		$this->changeBalanceScript = $changeBalanceScript;
	}
	public function withChangeBalanceScript(?ScriptSetting $changeBalanceScript): UpdateNamespaceRequest {
		$this->changeBalanceScript = $changeBalanceScript;
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
            ->withCurrencyUsagePriority(array_key_exists('currencyUsagePriority', $data) && $data['currencyUsagePriority'] !== null ? $data['currencyUsagePriority'] : null)
            ->withDescription(array_key_exists('description', $data) && $data['description'] !== null ? $data['description'] : null)
            ->withPlatformSetting(array_key_exists('platformSetting', $data) && $data['platformSetting'] !== null ? PlatformSetting::fromJson($data['platformSetting']) : null)
            ->withChangeBalanceScript(array_key_exists('changeBalanceScript', $data) && $data['changeBalanceScript'] !== null ? ScriptSetting::fromJson($data['changeBalanceScript']) : null)
            ->withLogSetting(array_key_exists('logSetting', $data) && $data['logSetting'] !== null ? LogSetting::fromJson($data['logSetting']) : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "currencyUsagePriority" => $this->getCurrencyUsagePriority(),
            "description" => $this->getDescription(),
            "platformSetting" => $this->getPlatformSetting() !== null ? $this->getPlatformSetting()->toJson() : null,
            "changeBalanceScript" => $this->getChangeBalanceScript() !== null ? $this->getChangeBalanceScript()->toJson() : null,
            "logSetting" => $this->getLogSetting() !== null ? $this->getLogSetting()->toJson() : null,
        );
    }
}