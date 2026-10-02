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

namespace Gs2\Money2\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for allocateSubscriptionStatusByUserId: Allocate subscription status by User ID from receipt
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#allocatesubscriptionstatusbyuserid
 */
class AllocateSubscriptionStatusByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Receipt */
    private $receipt;
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
     * @return AllocateSubscriptionStatusByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): AllocateSubscriptionStatusByUserIdRequest {
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
     * @return AllocateSubscriptionStatusByUserIdRequest
     */
	public function withUserId(?string $userId): AllocateSubscriptionStatusByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Receipt */
	public function getReceipt(): ?string {
		return $this->receipt;
	}
    /** @param string|null $receipt Receipt */
	public function setReceipt(?string $receipt) {
		$this->receipt = $receipt;
	}
    /**
     * @param string|null $receipt Receipt
     * @return AllocateSubscriptionStatusByUserIdRequest
     */
	public function withReceipt(?string $receipt): AllocateSubscriptionStatusByUserIdRequest {
		$this->receipt = $receipt;
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
     * @return AllocateSubscriptionStatusByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AllocateSubscriptionStatusByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AllocateSubscriptionStatusByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AllocateSubscriptionStatusByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new AllocateSubscriptionStatusByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withReceipt(array_key_exists('receipt', $data) && $data['receipt'] !== null ? $data['receipt'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "receipt" => $this->getReceipt(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}