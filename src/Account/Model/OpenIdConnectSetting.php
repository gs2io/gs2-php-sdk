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


class OpenIdConnectSetting implements IModel {
	/**
     * @var string
	 */
	private $configurationPath;
	/**
     * @var string
	 */
	private $clientId;
	/**
     * @var string
	 */
	private $clientSecret;
	/**
     * @var string
	 */
	private $appleTeamId;
	/**
     * @var string
	 */
	private $appleKeyId;
	/**
     * @var string
	 */
	private $applePrivateKeyPem;
	/**
     * @var string
	 */
	private $doneEndpointUrl;
	/**
     * @var array
	 */
	private $additionalScopeValues;
	/**
     * @var array
	 */
	private $additionalReturnValues;
	public function getConfigurationPath(): ?string {
		return $this->configurationPath;
	}
	public function setConfigurationPath(?string $configurationPath) {
		$this->configurationPath = $configurationPath;
	}
	public function withConfigurationPath(?string $configurationPath): OpenIdConnectSetting {
		$this->configurationPath = $configurationPath;
		return $this;
	}
	public function getClientId(): ?string {
		return $this->clientId;
	}
	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}
	public function withClientId(?string $clientId): OpenIdConnectSetting {
		$this->clientId = $clientId;
		return $this;
	}
	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}
	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}
	public function withClientSecret(?string $clientSecret): OpenIdConnectSetting {
		$this->clientSecret = $clientSecret;
		return $this;
	}
	public function getAppleTeamId(): ?string {
		return $this->appleTeamId;
	}
	public function setAppleTeamId(?string $appleTeamId) {
		$this->appleTeamId = $appleTeamId;
	}
	public function withAppleTeamId(?string $appleTeamId): OpenIdConnectSetting {
		$this->appleTeamId = $appleTeamId;
		return $this;
	}
	public function getAppleKeyId(): ?string {
		return $this->appleKeyId;
	}
	public function setAppleKeyId(?string $appleKeyId) {
		$this->appleKeyId = $appleKeyId;
	}
	public function withAppleKeyId(?string $appleKeyId): OpenIdConnectSetting {
		$this->appleKeyId = $appleKeyId;
		return $this;
	}
	public function getApplePrivateKeyPem(): ?string {
		return $this->applePrivateKeyPem;
	}
	public function setApplePrivateKeyPem(?string $applePrivateKeyPem) {
		$this->applePrivateKeyPem = $applePrivateKeyPem;
	}
	public function withApplePrivateKeyPem(?string $applePrivateKeyPem): OpenIdConnectSetting {
		$this->applePrivateKeyPem = $applePrivateKeyPem;
		return $this;
	}
	public function getDoneEndpointUrl(): ?string {
		return $this->doneEndpointUrl;
	}
	public function setDoneEndpointUrl(?string $doneEndpointUrl) {
		$this->doneEndpointUrl = $doneEndpointUrl;
	}
	public function withDoneEndpointUrl(?string $doneEndpointUrl): OpenIdConnectSetting {
		$this->doneEndpointUrl = $doneEndpointUrl;
		return $this;
	}
	public function getAdditionalScopeValues(): ?array {
		return $this->additionalScopeValues;
	}
	public function setAdditionalScopeValues(?array $additionalScopeValues) {
		$this->additionalScopeValues = $additionalScopeValues;
	}
	public function withAdditionalScopeValues(?array $additionalScopeValues): OpenIdConnectSetting {
		$this->additionalScopeValues = $additionalScopeValues;
		return $this;
	}
	public function getAdditionalReturnValues(): ?array {
		return $this->additionalReturnValues;
	}
	public function setAdditionalReturnValues(?array $additionalReturnValues) {
		$this->additionalReturnValues = $additionalReturnValues;
	}
	public function withAdditionalReturnValues(?array $additionalReturnValues): OpenIdConnectSetting {
		$this->additionalReturnValues = $additionalReturnValues;
		return $this;
	}

    public static function fromJson(?array $data): ?OpenIdConnectSetting {
        if ($data === null) {
            return null;
        }
        return (new OpenIdConnectSetting())
            ->withConfigurationPath(array_key_exists('configurationPath', $data) && $data['configurationPath'] !== null ? $data['configurationPath'] : null)
            ->withClientId(array_key_exists('clientId', $data) && $data['clientId'] !== null ? $data['clientId'] : null)
            ->withClientSecret(array_key_exists('clientSecret', $data) && $data['clientSecret'] !== null ? $data['clientSecret'] : null)
            ->withAppleTeamId(array_key_exists('appleTeamId', $data) && $data['appleTeamId'] !== null ? $data['appleTeamId'] : null)
            ->withAppleKeyId(array_key_exists('appleKeyId', $data) && $data['appleKeyId'] !== null ? $data['appleKeyId'] : null)
            ->withApplePrivateKeyPem(array_key_exists('applePrivateKeyPem', $data) && $data['applePrivateKeyPem'] !== null ? $data['applePrivateKeyPem'] : null)
            ->withDoneEndpointUrl(array_key_exists('doneEndpointUrl', $data) && $data['doneEndpointUrl'] !== null ? $data['doneEndpointUrl'] : null)
            ->withAdditionalScopeValues(array_map(
                function ($item) {
                    return ScopeValue::fromJson($item);
                },
                array_key_exists('additionalScopeValues', $data) && $data['additionalScopeValues'] !== null ? $data['additionalScopeValues'] : []
            ))
            ->withAdditionalReturnValues(array_map(
                function ($item) {
                    return $item;
                },
                array_key_exists('additionalReturnValues', $data) && $data['additionalReturnValues'] !== null ? $data['additionalReturnValues'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "configurationPath" => $this->getConfigurationPath(),
            "clientId" => $this->getClientId(),
            "clientSecret" => $this->getClientSecret(),
            "appleTeamId" => $this->getAppleTeamId(),
            "appleKeyId" => $this->getAppleKeyId(),
            "applePrivateKeyPem" => $this->getApplePrivateKeyPem(),
            "doneEndpointUrl" => $this->getDoneEndpointUrl(),
            "additionalScopeValues" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAdditionalScopeValues() !== null && $this->getAdditionalScopeValues() !== null ? $this->getAdditionalScopeValues() : []
            ),
            "additionalReturnValues" => array_map(
                function ($item) {
                    return $item;
                },
                $this->getAdditionalReturnValues() !== null && $this->getAdditionalReturnValues() !== null ? $this->getAdditionalReturnValues() : []
            ),
        );
    }
}