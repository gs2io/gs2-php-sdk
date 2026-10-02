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
use Gs2\Money2\Model\DepositTransaction;

/**
 * Request for depositByUserId: Deposit balance to Wallet by User ID
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#depositbyuserid
 */
class DepositByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Slot Number */
    private $slot;
    /** @var array List of Deposit transactions */
    private $depositTransactions;
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
     * @return DepositByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): DepositByUserIdRequest {
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
     * @return DepositByUserIdRequest
     */
	public function withUserId(?string $userId): DepositByUserIdRequest {
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
     * @return DepositByUserIdRequest
     */
	public function withSlot(?int $slot): DepositByUserIdRequest {
		$this->slot = $slot;
		return $this;
	}
    /** @return array|null List of Deposit transactions */
	public function getDepositTransactions(): ?array {
		return $this->depositTransactions;
	}
    /** @param array|null $depositTransactions List of Deposit transactions */
	public function setDepositTransactions(?array $depositTransactions) {
		$this->depositTransactions = $depositTransactions;
	}
    /**
     * @param array|null $depositTransactions List of Deposit transactions
     * @return DepositByUserIdRequest
     */
	public function withDepositTransactions(?array $depositTransactions): DepositByUserIdRequest {
		$this->depositTransactions = $depositTransactions;
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
     * @return DepositByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): DepositByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): DepositByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?DepositByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new DepositByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withDepositTransactions(!array_key_exists('depositTransactions', $data) || $data['depositTransactions'] === null ? null : array_map(
                function ($item) {
                    return DepositTransaction::fromJson($item);
                },
                $data['depositTransactions']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "depositTransactions" => $this->getDepositTransactions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDepositTransactions()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}