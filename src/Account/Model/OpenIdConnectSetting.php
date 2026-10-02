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


/**
 * OpenID Connect Configuration
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#openidconnectsetting
 */
class OpenIdConnectSetting implements IModel {
	/**
     * @var string OpenID Connect Configuration URL
	 */
	private $configurationPath;
	/**
     * @var string Client ID
	 */
	private $clientId;
	/**
     * @var string Client Secret
	 */
	private $clientSecret;
	/**
     * @var string Apple Developer Team ID
	 */
	private $appleTeamId;
	/**
     * @var string Key ID registered with Apple
	 */
	private $appleKeyId;
	/**
     * @var string Private Key received from Apple
	 */
	private $applePrivateKeyPem;
	/**
     * @var string Redirect URL after authentication is completed
	 */
	private $doneEndpointUrl;
	/**
     * @var array Additional scopes obtained with OpenID Connect
	 */
	private $additionalScopeValues;
	/**
     * @var array Additional claim name returned from OpenID Connect
	 */
	private $additionalReturnValues;
    /** @return string|null OpenID Connect Configuration URL */
	public function getConfigurationPath(): ?string {
		return $this->configurationPath;
	}
    /** @param string|null $configurationPath OpenID Connect Configuration URL */
	public function setConfigurationPath(?string $configurationPath) {
		$this->configurationPath = $configurationPath;
	}
    /**
     * @param string|null $configurationPath OpenID Connect Configuration URL
     * @return OpenIdConnectSetting
     */
	public function withConfigurationPath(?string $configurationPath): OpenIdConnectSetting {
		$this->configurationPath = $configurationPath;
		return $this;
	}
    /** @return string|null Client ID */
	public function getClientId(): ?string {
		return $this->clientId;
	}
    /** @param string|null $clientId Client ID */
	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}
    /**
     * @param string|null $clientId Client ID
     * @return OpenIdConnectSetting
     */
	public function withClientId(?string $clientId): OpenIdConnectSetting {
		$this->clientId = $clientId;
		return $this;
	}
    /** @return string|null Client Secret */
	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}
    /** @param string|null $clientSecret Client Secret */
	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}
    /**
     * @param string|null $clientSecret Client Secret
     * @return OpenIdConnectSetting
     */
	public function withClientSecret(?string $clientSecret): OpenIdConnectSetting {
		$this->clientSecret = $clientSecret;
		return $this;
	}
    /** @return string|null Apple Developer Team ID */
	public function getAppleTeamId(): ?string {
		return $this->appleTeamId;
	}
    /** @param string|null $appleTeamId Apple Developer Team ID */
	public function setAppleTeamId(?string $appleTeamId) {
		$this->appleTeamId = $appleTeamId;
	}
    /**
     * @param string|null $appleTeamId Apple Developer Team ID
     * @return OpenIdConnectSetting
     */
	public function withAppleTeamId(?string $appleTeamId): OpenIdConnectSetting {
		$this->appleTeamId = $appleTeamId;
		return $this;
	}
    /** @return string|null Key ID registered with Apple */
	public function getAppleKeyId(): ?string {
		return $this->appleKeyId;
	}
    /** @param string|null $appleKeyId Key ID registered with Apple */
	public function setAppleKeyId(?string $appleKeyId) {
		$this->appleKeyId = $appleKeyId;
	}
    /**
     * @param string|null $appleKeyId Key ID registered with Apple
     * @return OpenIdConnectSetting
     */
	public function withAppleKeyId(?string $appleKeyId): OpenIdConnectSetting {
		$this->appleKeyId = $appleKeyId;
		return $this;
	}
    /** @return string|null Private Key received from Apple */
	public function getApplePrivateKeyPem(): ?string {
		return $this->applePrivateKeyPem;
	}
    /** @param string|null $applePrivateKeyPem Private Key received from Apple */
	public function setApplePrivateKeyPem(?string $applePrivateKeyPem) {
		$this->applePrivateKeyPem = $applePrivateKeyPem;
	}
    /**
     * @param string|null $applePrivateKeyPem Private Key received from Apple
     * @return OpenIdConnectSetting
     */
	public function withApplePrivateKeyPem(?string $applePrivateKeyPem): OpenIdConnectSetting {
		$this->applePrivateKeyPem = $applePrivateKeyPem;
		return $this;
	}
    /** @return string|null Redirect URL after authentication is completed */
	public function getDoneEndpointUrl(): ?string {
		return $this->doneEndpointUrl;
	}
    /** @param string|null $doneEndpointUrl Redirect URL after authentication is completed */
	public function setDoneEndpointUrl(?string $doneEndpointUrl) {
		$this->doneEndpointUrl = $doneEndpointUrl;
	}
    /**
     * @param string|null $doneEndpointUrl Redirect URL after authentication is completed
     * @return OpenIdConnectSetting
     */
	public function withDoneEndpointUrl(?string $doneEndpointUrl): OpenIdConnectSetting {
		$this->doneEndpointUrl = $doneEndpointUrl;
		return $this;
	}
    /** @return array|null Additional scopes obtained with OpenID Connect */
	public function getAdditionalScopeValues(): ?array {
		return $this->additionalScopeValues;
	}
    /** @param array|null $additionalScopeValues Additional scopes obtained with OpenID Connect */
	public function setAdditionalScopeValues(?array $additionalScopeValues) {
		$this->additionalScopeValues = $additionalScopeValues;
	}
    /**
     * @param array|null $additionalScopeValues Additional scopes obtained with OpenID Connect
     * @return OpenIdConnectSetting
     */
	public function withAdditionalScopeValues(?array $additionalScopeValues): OpenIdConnectSetting {
		$this->additionalScopeValues = $additionalScopeValues;
		return $this;
	}
    /** @return array|null Additional claim name returned from OpenID Connect */
	public function getAdditionalReturnValues(): ?array {
		return $this->additionalReturnValues;
	}
    /** @param array|null $additionalReturnValues Additional claim name returned from OpenID Connect */
	public function setAdditionalReturnValues(?array $additionalReturnValues) {
		$this->additionalReturnValues = $additionalReturnValues;
	}
    /**
     * @param array|null $additionalReturnValues Additional claim name returned from OpenID Connect
     * @return OpenIdConnectSetting
     */
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
            ->withAdditionalScopeValues(!array_key_exists('additionalScopeValues', $data) || $data['additionalScopeValues'] === null ? null : array_map(
                function ($item) {
                    return ScopeValue::fromJson($item);
                },
                $data['additionalScopeValues']
            ))
            ->withAdditionalReturnValues(!array_key_exists('additionalReturnValues', $data) || $data['additionalReturnValues'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['additionalReturnValues']
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
            "additionalScopeValues" => $this->getAdditionalScopeValues() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAdditionalScopeValues()
            ),
            "additionalReturnValues" => $this->getAdditionalReturnValues() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getAdditionalReturnValues()
            ),
        );
    }
}