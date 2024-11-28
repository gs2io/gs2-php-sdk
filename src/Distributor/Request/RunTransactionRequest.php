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

class RunTransactionRequest extends Gs2BasicRequest {
    /** @var string */
    private $ownerId;
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $transaction;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}
	public function withOwnerId(?string $ownerId): RunTransactionRequest {
		$this->ownerId = $ownerId;
		return $this;
	}
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): RunTransactionRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): RunTransactionRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getTransaction(): ?string {
		return $this->transaction;
	}
	public function setTransaction(?string $transaction) {
		$this->transaction = $transaction;
	}
	public function withTransaction(?string $transaction): RunTransactionRequest {
		$this->transaction = $transaction;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
	public function withTimeOffsetToken(?string $timeOffsetToken): RunTransactionRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): RunTransactionRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?RunTransactionRequest {
        if ($data === null) {
            return null;
        }
        return (new RunTransactionRequest())
            ->withOwnerId(array_key_exists('ownerId', $data) && $data['ownerId'] !== null ? $data['ownerId'] : null)
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withTransaction(array_key_exists('transaction', $data) && $data['transaction'] !== null ? $data['transaction'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "ownerId" => $this->getOwnerId(),
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "transaction" => $this->getTransaction(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}