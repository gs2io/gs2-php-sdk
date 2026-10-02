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
use Gs2\Core\Model\TriggerAsync;
use Gs2\Core\Model\TriggerDoneScript;
use Gs2\Chat\Model\MobileNotificationMessage;
use Gs2\Core\Model\TriggerNotification;
use Gs2\Core\Model\Uncommitted;
use Gs2\Core\Model\VerifyActionResult;
use Gs2\Core\Model\ConsumeActionResult;
use Gs2\Core\Model\AcquireActionResult;
use Gs2\Core\Model\TransactionResult;
use Gs2\Core\Model\ScriptTransactionResult;
use Gs2\Core\Model\ResultMetadata;

/**
 * Request for runTransaction: Execute transaction
 *
 * @see https://docs.gs2.io/api_reference/distributor/sdk/#runtransaction
 */
class RunTransactionRequest extends Gs2BasicRequest {
    /** @var string Owner ID */
    private $ownerId;
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Transaction */
    private $transaction;
    /** @var string Time offset token */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
    /** @return string|null Owner ID */
	public function getOwnerId(): ?string {
		return $this->ownerId;
	}
    /** @param string|null $ownerId Owner ID */
	public function setOwnerId(?string $ownerId) {
		$this->ownerId = $ownerId;
	}
    /**
     * @param string|null $ownerId Owner ID
     * @return RunTransactionRequest
     */
	public function withOwnerId(?string $ownerId): RunTransactionRequest {
		$this->ownerId = $ownerId;
		return $this;
	}
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
     * @return RunTransactionRequest
     */
	public function withNamespaceName(?string $namespaceName): RunTransactionRequest {
		$this->namespaceName = $namespaceName;
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
     * @return RunTransactionRequest
     */
	public function withUserId(?string $userId): RunTransactionRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Transaction */
	public function getTransaction(): ?string {
		return $this->transaction;
	}
    /** @param string|null $transaction Transaction */
	public function setTransaction(?string $transaction) {
		$this->transaction = $transaction;
	}
    /**
     * @param string|null $transaction Transaction
     * @return RunTransactionRequest
     */
	public function withTransaction(?string $transaction): RunTransactionRequest {
		$this->transaction = $transaction;
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
     * @return RunTransactionRequest
     */
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