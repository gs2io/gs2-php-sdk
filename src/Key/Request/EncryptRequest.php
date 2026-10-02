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

namespace Gs2\Key\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for encrypt: Encrypt data
 *
 * @see https://docs.gs2.io/api_reference/key/sdk/#encrypt
 */
class EncryptRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Encryption Key name */
    private $keyName;
    /** @var string */
    private $data;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return EncryptRequest
     */
	public function withNamespaceName(?string $namespaceName): EncryptRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Encryption Key name */
	public function getKeyName(): ?string {
		return $this->keyName;
	}
    /** @param string|null $keyName Encryption Key name */
	public function setKeyName(?string $keyName) {
		$this->keyName = $keyName;
	}
    /**
     * @param string|null $keyName Encryption Key name
     * @return EncryptRequest
     */
	public function withKeyName(?string $keyName): EncryptRequest {
		$this->keyName = $keyName;
		return $this;
	}
    /** @return string|null */
	public function getData(): ?string {
		return $this->data;
	}
    /** @param string|null $data */
	public function setData(?string $data) {
		$this->data = $data;
	}
    /**
     * @param string|null $data
     * @return EncryptRequest
     */
	public function withData(?string $data): EncryptRequest {
		$this->data = $data;
		return $this;
	}

    public static function fromJson(?array $data): ?EncryptRequest {
        if ($data === null) {
            return null;
        }
        return (new EncryptRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withKeyName(array_key_exists('keyName', $data) && $data['keyName'] !== null ? $data['keyName'] : null)
            ->withData(array_key_exists('data', $data) && $data['data'] !== null ? $data['data'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "keyName" => $this->getKeyName(),
            "data" => $this->getData(),
        );
    }
}