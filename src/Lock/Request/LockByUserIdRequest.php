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

class LockByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $propertyId;
    /** @var string */
    private $userId;
    /** @var string */
    private $transactionId;
    /** @var int */
    private $ttl;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): LockByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getPropertyId(): ?string {
		return $this->propertyId;
	}

	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}

	public function withPropertyId(?string $propertyId): LockByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): LockByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): LockByUserIdRequest {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getTtl(): ?int {
		return $this->ttl;
	}

	public function setTtl(?int $ttl) {
		$this->ttl = $ttl;
	}

	public function withTtl(?int $ttl): LockByUserIdRequest {
		$this->ttl = $ttl;
		return $this;
	}

    public static function fromJson(?array $data): ?LockByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new LockByUserIdRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withPropertyId(empty($data['propertyId']) ? null : $data['propertyId'])
            ->withUserId(empty($data['userId']) ? null : $data['userId'])
            ->withTransactionId(empty($data['transactionId']) ? null : $data['transactionId'])
            ->withTtl(empty($data['ttl']) ? null : $data['ttl']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "propertyId" => $this->getPropertyId(),
            "userId" => $this->getUserId(),
            "transactionId" => $this->getTransactionId(),
            "ttl" => $this->getTtl(),
        );
    }
}