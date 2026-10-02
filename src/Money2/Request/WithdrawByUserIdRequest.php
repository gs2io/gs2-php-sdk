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
 * Request for withdrawByUserId: Withdraw balance from Wallet by User ID
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#withdrawbyuserid
 */
class WithdrawByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Slot Number */
    private $slot;
    /** @var int Quantity of premium currency to be consumed */
    private $withdrawCount;
    /** @var bool Whether to target only paid currency */
    private $paidOnly;
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
     * @return WithdrawByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): WithdrawByUserIdRequest {
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
     * @return WithdrawByUserIdRequest
     */
	public function withUserId(?string $userId): WithdrawByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getSlot(): ?int {
		return $this->slot;
	}
    /** @param int|null $slot Slot Number */
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}
    /**
     * @param int|null $slot Slot Number
     * @return WithdrawByUserIdRequest
     */
	public function withSlot(?int $slot): WithdrawByUserIdRequest {
		$this->slot = $slot;
		return $this;
	}
    /** @return int|null Quantity of premium currency to be consumed */
	public function getWithdrawCount(): ?int {
		return $this->withdrawCount;
	}
    /** @param int|null $withdrawCount Quantity of premium currency to be consumed */
	public function setWithdrawCount(?int $withdrawCount) {
		$this->withdrawCount = $withdrawCount;
	}
    /**
     * @param int|null $withdrawCount Quantity of premium currency to be consumed
     * @return WithdrawByUserIdRequest
     */
	public function withWithdrawCount(?int $withdrawCount): WithdrawByUserIdRequest {
		$this->withdrawCount = $withdrawCount;
		return $this;
	}
    /** @return bool|null Whether to target only paid currency */
	public function getPaidOnly(): ?bool {
		return $this->paidOnly;
	}
    /** @param bool|null $paidOnly Whether to target only paid currency */
	public function setPaidOnly(?bool $paidOnly) {
		$this->paidOnly = $paidOnly;
	}
    /**
     * @param bool|null $paidOnly Whether to target only paid currency
     * @return WithdrawByUserIdRequest
     */
	public function withPaidOnly(?bool $paidOnly): WithdrawByUserIdRequest {
		$this->paidOnly = $paidOnly;
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
     * @return WithdrawByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): WithdrawByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): WithdrawByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new WithdrawByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withWithdrawCount(array_key_exists('withdrawCount', $data) && $data['withdrawCount'] !== null ? $data['withdrawCount'] : null)
            ->withPaidOnly(array_key_exists('paidOnly', $data) ? $data['paidOnly'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "withdrawCount" => $this->getWithdrawCount(),
            "paidOnly" => $this->getPaidOnly(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}