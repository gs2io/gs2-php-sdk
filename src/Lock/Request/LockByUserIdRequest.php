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
 * Request for lockByUserId: Acquire Mutex by User ID
 *
 * @see https://docs.gs2.io/api_reference/lock/sdk/#lockbyuserid
 */
class LockByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Property ID */
    private $propertyId;
    /** @var string User ID */
    private $userId;
    /** @var string Transaction ID */
    private $transactionId;
    /** @var int Duration of lock acquisition (seconds) */
    private $ttl;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return LockByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): LockByUserIdRequest {
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
     * @return LockByUserIdRequest
     */
	public function withPropertyId(?string $propertyId): LockByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return LockByUserIdRequest
     */
	public function withUserId(?string $userId): LockByUserIdRequest {
		$this->userId = $userId;
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
     * @return LockByUserIdRequest
     */
	public function withTransactionId(?string $transactionId): LockByUserIdRequest {
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
     * @return LockByUserIdRequest
     */
	public function withTtl(?int $ttl): LockByUserIdRequest {
		$this->ttl = $ttl;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return LockByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): LockByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): LockByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?LockByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new LockByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withTtl(array_key_exists('ttl', $data) && $data['ttl'] !== null ? $data['ttl'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "propertyId" => $this->getPropertyId(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "ttl" => $this->getTtl(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}