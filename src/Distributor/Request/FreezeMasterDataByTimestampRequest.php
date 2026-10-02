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
 * Request for freezeMasterDataByTimestamp: Freeze master data at the specified timestamp
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#freezemasterdatabytimestamp
 */
class FreezeMasterDataByTimestampRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var int Timestamp to freeze master data */
    private $timestamp;
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
     * @return FreezeMasterDataByTimestampRequest
     */
	public function withNamespaceName(?string $namespaceName): FreezeMasterDataByTimestampRequest {
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
     * @return FreezeMasterDataByTimestampRequest
     */
	public function withAccessToken(?string $accessToken): FreezeMasterDataByTimestampRequest {
		$this->accessToken = $accessToken;
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
     * @return FreezeMasterDataByTimestampRequest
     */
	public function withTimestamp(?int $timestamp): FreezeMasterDataByTimestampRequest {
		$this->timestamp = $timestamp;
		return $this;
	}

    public static function fromJson(?array $data): ?FreezeMasterDataByTimestampRequest {
        if ($data === null) {
            return null;
        }
        return (new FreezeMasterDataByTimestampRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTimestamp(array_key_exists('timestamp', $data) && $data['timestamp'] !== null ? $data['timestamp'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "timestamp" => $this->getTimestamp(),
        );
    }
}