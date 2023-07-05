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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class UnlockIncrementalExchangeByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $rateName;
    /** @var string */
    private $userId;
    /** @var string */
    private $lockTransactionId;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): UnlockIncrementalExchangeByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getRateName(): ?string {
		return $this->rateName;
	}
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
	public function withRateName(?string $rateName): UnlockIncrementalExchangeByUserIdRequest {
		$this->rateName = $rateName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): UnlockIncrementalExchangeByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getLockTransactionId(): ?string {
		return $this->lockTransactionId;
	}
	public function setLockTransactionId(?string $lockTransactionId) {
		$this->lockTransactionId = $lockTransactionId;
	}
	public function withLockTransactionId(?string $lockTransactionId): UnlockIncrementalExchangeByUserIdRequest {
		$this->lockTransactionId = $lockTransactionId;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UnlockIncrementalExchangeByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UnlockIncrementalExchangeByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UnlockIncrementalExchangeByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withLockTransactionId(array_key_exists('lockTransactionId', $data) && $data['lockTransactionId'] !== null ? $data['lockTransactionId'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "rateName" => $this->getRateName(),
            "userId" => $this->getUserId(),
            "lockTransactionId" => $this->getLockTransactionId(),
        );
    }
}