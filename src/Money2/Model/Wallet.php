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


class Wallet implements IModel {
	/**
     * @var string
	 */
	private $walletId;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var int
	 */
	private $slot;
	/**
     * @var WalletSummary
	 */
	private $summary;
	/**
     * @var array
	 */
	private $depositTransactions;
	/**
     * @var bool
	 */
	private $sharedFreeCurrency;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
	/**
     * @var int
	 */
	private $revision;
	public function getWalletId(): ?string {
		return $this->walletId;
	}
	public function setWalletId(?string $walletId) {
		$this->walletId = $walletId;
	}
	public function withWalletId(?string $walletId): Wallet {
		$this->walletId = $walletId;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): Wallet {
		$this->userId = $userId;
		return $this;
	}
	public function getSlot(): ?int {
		return $this->slot;
	}
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}
	public function withSlot(?int $slot): Wallet {
		$this->slot = $slot;
		return $this;
	}
	public function getSummary(): ?WalletSummary {
		return $this->summary;
	}
	public function setSummary(?WalletSummary $summary) {
		$this->summary = $summary;
	}
	public function withSummary(?WalletSummary $summary): Wallet {
		$this->summary = $summary;
		return $this;
	}
	public function getDepositTransactions(): ?array {
		return $this->depositTransactions;
	}
	public function setDepositTransactions(?array $depositTransactions) {
		$this->depositTransactions = $depositTransactions;
	}
	public function withDepositTransactions(?array $depositTransactions): Wallet {
		$this->depositTransactions = $depositTransactions;
		return $this;
	}
	public function getSharedFreeCurrency(): ?bool {
		return $this->sharedFreeCurrency;
	}
	public function setSharedFreeCurrency(?bool $sharedFreeCurrency) {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
	}
	public function withSharedFreeCurrency(?bool $sharedFreeCurrency): Wallet {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
		return $this;
	}
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
	public function withCreatedAt(?int $createdAt): Wallet {
		$this->createdAt = $createdAt;
		return $this;
	}
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
	public function withUpdatedAt(?int $updatedAt): Wallet {
		$this->updatedAt = $updatedAt;
		return $this;
	}
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Wallet {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Wallet {
        if ($data === null) {
            return null;
        }
        return (new Wallet())
            ->withWalletId(array_key_exists('walletId', $data) && $data['walletId'] !== null ? $data['walletId'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withSummary(array_key_exists('summary', $data) && $data['summary'] !== null ? WalletSummary::fromJson($data['summary']) : null)
            ->withDepositTransactions(array_map(
                function ($item) {
                    return DepositTransaction::fromJson($item);
                },
                array_key_exists('depositTransactions', $data) && $data['depositTransactions'] !== null ? $data['depositTransactions'] : []
            ))
            ->withSharedFreeCurrency(array_key_exists('sharedFreeCurrency', $data) ? $data['sharedFreeCurrency'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "walletId" => $this->getWalletId(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "summary" => $this->getSummary() !== null ? $this->getSummary()->toJson() : null,
            "depositTransactions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDepositTransactions() !== null && $this->getDepositTransactions() !== null ? $this->getDepositTransactions() : []
            ),
            "sharedFreeCurrency" => $this->getSharedFreeCurrency(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}