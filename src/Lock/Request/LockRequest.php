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

class LockRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $propertyId;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $transactionId;
    /** @var int */
    private $ttl;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): LockRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): LockRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): LockRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
	public function withTransactionId(?string $transactionId): LockRequest {
		$this->transactionId = $transactionId;
		return $this;
	}
	public function getTtl(): ?int {
		return $this->ttl;
	}
	public function setTtl(?int $ttl) {
		$this->ttl = $ttl;
	}
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