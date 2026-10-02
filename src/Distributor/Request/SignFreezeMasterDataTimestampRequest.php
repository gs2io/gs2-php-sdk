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
 * Request for signFreezeMasterDataTimestamp: Sign a timestamp for freezing master data
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#signfreezemasterdatatimestamp
 */
class SignFreezeMasterDataTimestampRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var int Timestamp to freeze master data */
    private $timestamp;
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
     * @return SignFreezeMasterDataTimestampRequest
     */
	public function withNamespaceName(?string $namespaceName): SignFreezeMasterDataTimestampRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return int|null Timestamp to freeze master data */
	public function getTimestamp(): ?int {
		return $this->timestamp;
	}
    /** @param int|null $timestamp Timestamp to freeze master data */
	public function setTimestamp(?int $timestamp) {
		$this->timestamp = $timestamp;
	}
    /**
     * @param int|null $timestamp Timestamp to freeze master data
     * @return SignFreezeMasterDataTimestampRequest
     */
	public function withTimestamp(?int $timestamp): SignFreezeMasterDataTimestampRequest {
		$this->timestamp = $timestamp;
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
     * @return SignFreezeMasterDataTimestampRequest
     */
	public function withKeyId(?string $keyId): SignFreezeMasterDataTimestampRequest {
		$this->keyId = $keyId;
		return $this;
	}

    public static function fromJson(?array $data): ?SignFreezeMasterDataTimestampRequest {
        if ($data === null) {
            return null;
        }
        return (new SignFreezeMasterDataTimestampRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "timestamp" => $this->getTimestamp(),
            "keyId" => $this->getKeyId(),
        );
    }
}