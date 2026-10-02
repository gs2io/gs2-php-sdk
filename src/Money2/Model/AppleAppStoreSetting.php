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
 * Apple App Store Setting
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#appleappstoresetting
 */
class AppleAppStoreSetting implements IModel {
	/**
     * @var string Apple App Store Bundle ID
	 */
	private $bundleId;
	/**
     * @var string Shared secret key used to encrypt the receipt issued by AppStore Connect
	 */
	private $sharedSecretKey;
	/**
     * @var string Issuer ID of in-app purchases registered with AppStore Connect
	 */
	private $issuerId;
	/**
     * @var string Key ID registered with Apple
	 */
	private $keyId;
	/**
     * @var string Private Key received from Apple
	 */
	private $privateKeyPem;
    /** @return string|null Apple App Store Bundle ID */
	public function getBundleId(): ?string {
		return $this->bundleId;
	}
    /** @param string|null $bundleId Apple App Store Bundle ID */
	public function setBundleId(?string $bundleId) {
		$this->bundleId = $bundleId;
	}
    /**
     * @param string|null $bundleId Apple App Store Bundle ID
     * @return AppleAppStoreSetting
     */
	public function withBundleId(?string $bundleId): AppleAppStoreSetting {
		$this->bundleId = $bundleId;
		return $this;
	}
    /** @return string|null Shared secret key used to encrypt the receipt issued by AppStore Connect */
	public function getSharedSecretKey(): ?string {
		return $this->sharedSecretKey;
	}
    /** @param string|null $sharedSecretKey Shared secret key used to encrypt the receipt issued by AppStore Connect */
	public function setSharedSecretKey(?string $sharedSecretKey) {
		$this->sharedSecretKey = $sharedSecretKey;
	}
    /**
     * @param string|null $sharedSecretKey Shared secret key used to encrypt the receipt issued by AppStore Connect
     * @return AppleAppStoreSetting
     */
	public function withSharedSecretKey(?string $sharedSecretKey): AppleAppStoreSetting {
		$this->sharedSecretKey = $sharedSecretKey;
		return $this;
	}
    /** @return string|null Issuer ID of in-app purchases registered with AppStore Connect */
	public function getIssuerId(): ?string {
		return $this->issuerId;
	}
    /** @param string|null $issuerId Issuer ID of in-app purchases registered with AppStore Connect */
	public function setIssuerId(?string $issuerId) {
		$this->issuerId = $issuerId;
	}
    /**
     * @param string|null $issuerId Issuer ID of in-app purchases registered with AppStore Connect
     * @return AppleAppStoreSetting
     */
	public function withIssuerId(?string $issuerId): AppleAppStoreSetting {
		$this->issuerId = $issuerId;
		return $this;
	}
    /** @return string|null Key ID registered with Apple */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Key ID registered with Apple */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Key ID registered with Apple
     * @return AppleAppStoreSetting
     */
	public function withKeyId(?string $keyId): AppleAppStoreSetting {
		$this->keyId = $keyId;
		return $this;
	}
    /** @return string|null Private Key received from Apple */
	public function getPrivateKeyPem(): ?string {
		return $this->privateKeyPem;
	}
    /** @param string|null $privateKeyPem Private Key received from Apple */
	public function setPrivateKeyPem(?string $privateKeyPem) {
		$this->privateKeyPem = $privateKeyPem;
	}
    /**
     * @param string|null $privateKeyPem Private Key received from Apple
     * @return AppleAppStoreSetting
     */
	public function withPrivateKeyPem(?string $privateKeyPem): AppleAppStoreSetting {
		$this->privateKeyPem = $privateKeyPem;
		return $this;
	}

    public static function fromJson(?array $data): ?AppleAppStoreSetting {
        if ($data === null) {
            return null;
        }
        return (new AppleAppStoreSetting())
            ->withBundleId(array_key_exists('bundleId', $data) && $data['bundleId'] !== null ? $data['bundleId'] : null)
            ->withSharedSecretKey(array_key_exists('sharedSecretKey', $data) && $data['sharedSecretKey'] !== null ? $data['sharedSecretKey'] : null)
            ->withIssuerId(array_key_exists('issuerId', $data) && $data['issuerId'] !== null ? $data['issuerId'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null)
            ->withPrivateKeyPem(array_key_exists('privateKeyPem', $data) && $data['privateKeyPem'] !== null ? $data['privateKeyPem'] : null);
    }

    public function toJson(): array {
        return array(
            "bundleId" => $this->getBundleId(),
            "sharedSecretKey" => $this->getSharedSecretKey(),
            "issuerId" => $this->getIssuerId(),
            "keyId" => $this->getKeyId(),
            "privateKeyPem" => $this->getPrivateKeyPem(),
        );
    }
}