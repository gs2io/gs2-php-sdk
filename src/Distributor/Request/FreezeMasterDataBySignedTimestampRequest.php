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

namespace Gs2\Distributor\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for freezeMasterDataBySignedTimestamp: Freeze master data at the specified signed timestamp
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#freezemasterdatabysignedtimestamp
 */
class FreezeMasterDataBySignedTimestampRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Body */
    private $body;
    /** @var string Signature */
    private $signature;
    /** @var string GS2-Key encryption key GRN used for signature calculation */
    private $keyId;
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
     * @return FreezeMasterDataBySignedTimestampRequest
     */
	public function withNamespaceName(?string $namespaceName): FreezeMasterDataBySignedTimestampRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return FreezeMasterDataBySignedTimestampRequest
     */
	public function withAccessToken(?string $accessToken): FreezeMasterDataBySignedTimestampRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Body */
	public function getBody(): ?string {
		return $this->body;
	}
    /** @param string|null $body Body */
	public function setBody(?string $body) {
		$this->body = $body;
	}
    /**
     * @param string|null $body Body
     * @return FreezeMasterDataBySignedTimestampRequest
     */
	public function withBody(?string $body): FreezeMasterDataBySignedTimestampRequest {
		$this->body = $body;
		return $this;
	}
    /** @return string|null Signature */
	public function getSignature(): ?string {
		return $this->signature;
	}
    /** @param string|null $signature Signature */
	public function setSignature(?string $signature) {
		$this->signature = $signature;
	}
    /**
     * @param string|null $signature Signature
     * @return FreezeMasterDataBySignedTimestampRequest
     */
	public function withSignature(?string $signature): FreezeMasterDataBySignedTimestampRequest {
		$this->signature = $signature;
		return $this;
	}
    /** @return string|null GS2-Key encryption key GRN used for signature calculation */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId GS2-Key encryption key GRN used for signature calculation */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId GS2-Key encryption key GRN used for signature calculation
     * @return FreezeMasterDataBySignedTimestampRequest
     */
	public function withKeyId(?string $keyId): FreezeMasterDataBySignedTimestampRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?FreezeMasterDataBySignedTimestampRequest {
        if ($data === null) {
            return null;
        }
        return (new FreezeMasterDataBySignedTimestampRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withBody(array_key_exists('body', $data) && $data['body'] !== null ? $data['body'] : null)
            ->withSignature(array_key_exists('signature', $data) && $data['signature'] !== null ? $data['signature'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "body" => $this->getBody(),
            "signature" => $this->getSignature(),
            "keyId" => $this->getKeyId(),
        );
    }
}