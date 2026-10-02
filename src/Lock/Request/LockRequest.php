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

namespace Gs2\Lock\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for lock: Acquire Mutex
 *
 * @see https://docs.gs2.io/api_reference/lock/sdk/#lock
 */
class LockRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Property ID */
    private $propertyId;
    /** @var string User ID */
    private $accessToken;
    /** @var string Transaction ID */
    private $transactionId;
    /** @var int Duration of lock acquisition (seconds) */
    private $ttl;
    /** @var string */
    private $duplicationAvoider;
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
     * @return LockRequest
     */
	public function withNamespaceName(?string $namespaceName): LockRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return LockRequest
     */
	public function withPropertyId(?string $propertyId): LockRequest {
		$this->propertyId = $propertyId;
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
     * @return LockRequest
     */
	public function withAccessToken(?string $accessToken): LockRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
    /** @param string|null $transactionId Transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
    /**
     * @param string|null $transactionId Transaction ID
     * @return LockRequest
     */
	public function withTransactionId(?string $transactionId): LockRequest {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return int|null Duration of lock acquisition (seconds) */
	public function getTtl(): ?int {
		return $this->ttl;
	}
    /** @param int|null $ttl Duration of lock acquisition (seconds) */
	public function setTtl(?int $ttl) {
		$this->ttl = $ttl;
	}
    /**
     * @param int|null $ttl Duration of lock acquisition (seconds)
     * @return LockRequest
     */
	public function withTtl(?int $ttl): LockRequest {
		$this->ttl = $ttl;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): LockRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?LockRequest {
        if ($data === null) {
            return null;
        }
        return (new LockRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withTtl(array_key_exists('ttl', $data) && $data['ttl'] !== null ? $data['ttl'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "propertyId" => $this->getPropertyId(),
            "accessToken" => $this->getAccessToken(),
            "transactionId" => $this->getTransactionId(),
            "ttl" => $this->getTtl(),
        );
    }
}