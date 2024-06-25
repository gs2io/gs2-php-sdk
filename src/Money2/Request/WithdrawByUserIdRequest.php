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

class WithdrawByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var int */
    private $slot;
    /** @var int */
    private $withdrawCount;
    /** @var bool */
    private $paidOnly;
    /** @var string */
    private $timeOffsetToken;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): WithdrawByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): WithdrawByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getSlot(): ?int {
		return $this->slot;
	}
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}
	public function withSlot(?int $slot): WithdrawByUserIdRequest {
		$this->slot = $slot;
		return $this;
	}
	public function getWithdrawCount(): ?int {
		return $this->withdrawCount;
	}
	public function setWithdrawCount(?int $withdrawCount) {
		$this->withdrawCount = $withdrawCount;
	}
	public function withWithdrawCount(?int $withdrawCount): WithdrawByUserIdRequest {
		$this->withdrawCount = $withdrawCount;
		return $this;
	}
	public function getPaidOnly(): ?bool {
		return $this->paidOnly;
	}
	public function setPaidOnly(?bool $paidOnly) {
		$this->paidOnly = $paidOnly;
	}
	public function withPaidOnly(?bool $paidOnly): WithdrawByUserIdRequest {
		$this->paidOnly = $paidOnly;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
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