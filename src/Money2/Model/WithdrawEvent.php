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

namespace Gs2\Money2\Model;

use Gs2\Core\Model\IModel;


class WithdrawEvent implements IModel {
	/**
     * @var int
	 */
	private $slot;
	/**
     * @var array
	 */
	private $withdrawDetails;
	/**
     * @var WalletSummary
	 */
	private $status;
	public function getSlot(): ?int {
		return $this->slot;
	}
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}
	public function withSlot(?int $slot): WithdrawEvent {
		$this->slot = $slot;
		return $this;
	}
	public function getWithdrawDetails(): ?array {
		return $this->withdrawDetails;
	}
	public function setWithdrawDetails(?array $withdrawDetails) {
		$this->withdrawDetails = $withdrawDetails;
	}
	public function withWithdrawDetails(?array $withdrawDetails): WithdrawEvent {
		$this->withdrawDetails = $withdrawDetails;
		return $this;
	}
	public function getStatus(): ?WalletSummary {
		return $this->status;
	}
	public function setStatus(?WalletSummary $status) {
		$this->status = $status;
	}
	public function withStatus(?WalletSummary $status): WithdrawEvent {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?WithdrawEvent {
        if ($data === null) {
            return null;
        }
        return (new WithdrawEvent())
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withWithdrawDetails(!array_key_exists('withdrawDetails', $data) || $data['withdrawDetails'] === null ? null : array_map(
                function ($item) {
                    return DepositTransaction::fromJson($item);
                },
                $data['withdrawDetails']
            ))
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? WalletSummary::fromJson($data['status']) : null);
    }

    public function toJson(): array {
        return array(
            "slot" => $this->getSlot(),
            "withdrawDetails" => $this->getWithdrawDetails() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getWithdrawDetails()
            ),
            "status" => $this->getStatus() !== null ? $this->getStatus()->toJson() : null,
        );
    }
}