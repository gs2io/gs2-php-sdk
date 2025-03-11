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


class AppleAppStoreSetting implements IModel {
	/**
     * @var string
	 */
	private $bundleId;
	/**
     * @var string
	 */
	private $sharedSecretKey;
	/**
     * @var string
	 */
	private $issuerId;
	/**
     * @var string
	 */
	private $keyId;
	/**
     * @var string
	 */
	private $privateKeyPem;
	public function getBundleId(): ?string {
		return $this->bundleId;
	}
	public function setBundleId(?string $bundleId) {
		$this->bundleId = $bundleId;
	}
	public function withBundleId(?string $bundleId): AppleAppStoreSetting {
		$this->bundleId = $bundleId;
		return $this;
	}
	public function getSharedSecretKey(): ?string {
		return $this->sharedSecretKey;
	}
	public function setSharedSecretKey(?string $sharedSecretKey) {
		$this->sharedSecretKey = $sharedSecretKey;
	}
	public function withSharedSecretKey(?string $sharedSecretKey): AppleAppStoreSetting {
		$this->sharedSecretKey = $sharedSecretKey;
		return $this;
	}
	public function getIssuerId(): ?string {
		return $this->issuerId;
	}
	public function setIssuerId(?string $issuerId) {
		$this->issuerId = $issuerId;
	}
	public function withIssuerId(?string $issuerId): AppleAppStoreSetting {
		$this->issuerId = $issuerId;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): AppleAppStoreSetting {
		$this->keyId = $keyId;
		return $this;
	}
	public function getPrivateKeyPem(): ?string {
		return $this->privateKeyPem;
	}
	public function setPrivateKeyPem(?string $privateKeyPem) {
		$this->privateKeyPem = $privateKeyPem;
	}
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