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


class DepositEvent implements IModel {
	/**
     * @var int
	 */
	private $slot;
	/**
     * @var array
	 */
	private $depositTransactions;
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
	public function withSlot(?int $slot): DepositEvent {
		$this->slot = $slot;
		return $this;
	}
	public function getDepositTransactions(): ?array {
		return $this->depositTransactions;
	}
	public function setDepositTransactions(?array $depositTransactions) {
		$this->depositTransactions = $depositTransactions;
	}
	public function withDepositTransactions(?array $depositTransactions): DepositEvent {
		$this->depositTransactions = $depositTransactions;
		return $this;
	}
	public function getStatus(): ?WalletSummary {
		return $this->status;
	}
	public function setStatus(?WalletSummary $status) {
		$this->status = $status;
	}
	public function withStatus(?WalletSummary $status): DepositEvent {
		$this->status = $status;
		return $this;
	}

    public static function fromJson(?array $data): ?DepositEvent {
        if ($data === null) {
            return null;
        }
        return (new DepositEvent())
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withDepositTransactions(!array_key_exists('depositTransactions', $data) || $data['depositTransactions'] === null ? null : array_map(
                function ($item) {
                    return DepositTransaction::fromJson($item);
                },
                $data['depositTransactions']
            ))
            ->withStatus(array_key_exists('status', $data) && $data['status'] !== null ? WalletSummary::fromJson($data['status']) : null);
    }

    public function toJson(): array {
        return array(
            "slot" => $this->getSlot(),
            "depositTransactions" => $this->getDepositTransactions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDepositTransactions()
            ),
            "status" => $this->getStatus() !== null ? $this->getStatus()->toJson() : null,
        );
    }
}