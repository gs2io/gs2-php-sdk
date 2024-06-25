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

class DepositByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var int */
    private $slot;
    /** @var array */
    private $depositTransactions;
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
	public function withNamespaceName(?string $namespaceName): DepositByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): DepositByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getSlot(): ?int {
		return $this->slot;
	}
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}
	public function withSlot(?int $slot): DepositByUserIdRequest {
		$this->slot = $slot;
		return $this;
	}
	public function getDepositTransactions(): ?array {
		return $this->depositTransactions;
	}
	public function setDepositTransactions(?array $depositTransactions) {
		$this->depositTransactions = $depositTransactions;
	}
	public function withDepositTransactions(?array $depositTransactions): DepositByUserIdRequest {
		$this->depositTransactions = $depositTransactions;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
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
            ->withDepositTransactions(array_map(
                function ($item) {
                    return DepositTransaction::fromJson($item);
                },
                array_key_exists('depositTransactions', $data) && $data['depositTransactions'] !== null ? $data['depositTransactions'] : []
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "depositTransactions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDepositTransactions() !== null && $this->getDepositTransactions() !== null ? $this->getDepositTransactions() : []
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}