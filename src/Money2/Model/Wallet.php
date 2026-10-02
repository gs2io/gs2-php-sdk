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


/**
 * Wallet
 *
 * @see https://docs.gs2.io/api_reference/money2/sdk/#wallet
 */
class Wallet implements IModel {
	/**
     * @var string Wallet GRN
	 */
	private $walletId;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var int Slot Number
	 */
	private $slot;
	/**
     * @var WalletSummary Wallet Status
	 */
	private $summary;
	/**
     * @var array List of deposit transactions
	 */
	private $depositTransactions;
	/**
     * @var bool Share free currency
	 */
	private $sharedFreeCurrency;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Wallet GRN */
	public function getWalletId(): ?string {
		return $this->walletId;
	}
    /** @param string|null $walletId Wallet GRN */
	public function setWalletId(?string $walletId) {
		$this->walletId = $walletId;
	}
    /**
     * @param string|null $walletId Wallet GRN
     * @return Wallet
     */
	public function withWalletId(?string $walletId): Wallet {
		$this->walletId = $walletId;
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
     * @return Wallet
     */
	public function withUserId(?string $userId): Wallet {
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
     * @return Wallet
     */
	public function withSlot(?int $slot): Wallet {
		$this->slot = $slot;
		return $this;
	}
    /** @return WalletSummary|null Wallet Status */
	public function getSummary(): ?WalletSummary {
		return $this->summary;
	}
    /** @param WalletSummary|null $summary Wallet Status */
	public function setSummary(?WalletSummary $summary) {
		$this->summary = $summary;
	}
    /**
     * @param WalletSummary|null $summary Wallet Status
     * @return Wallet
     */
	public function withSummary(?WalletSummary $summary): Wallet {
		$this->summary = $summary;
		return $this;
	}
    /** @return array|null List of deposit transactions */
	public function getDepositTransactions(): ?array {
		return $this->depositTransactions;
	}
    /** @param array|null $depositTransactions List of deposit transactions */
	public function setDepositTransactions(?array $depositTransactions) {
		$this->depositTransactions = $depositTransactions;
	}
    /**
     * @param array|null $depositTransactions List of deposit transactions
     * @return Wallet
     */
	public function withDepositTransactions(?array $depositTransactions): Wallet {
		$this->depositTransactions = $depositTransactions;
		return $this;
	}
    /** @return bool|null Share free currency */
	public function getSharedFreeCurrency(): ?bool {
		return $this->sharedFreeCurrency;
	}
    /** @param bool|null $sharedFreeCurrency Share free currency */
	public function setSharedFreeCurrency(?bool $sharedFreeCurrency) {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
	}
    /**
     * @param bool|null $sharedFreeCurrency Share free currency
     * @return Wallet
     */
	public function withSharedFreeCurrency(?bool $sharedFreeCurrency): Wallet {
		$this->sharedFreeCurrency = $sharedFreeCurrency;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Wallet
     */
	public function withCreatedAt(?int $createdAt): Wallet {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Last Updated Timestamp */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}
    /** @param int|null $updatedAt Last Updated Timestamp */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}
    /**
     * @param int|null $updatedAt Last Updated Timestamp
     * @return Wallet
     */
	public function withUpdatedAt(?int $updatedAt): Wallet {
		$this->updatedAt = $updatedAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Wallet
     */
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
            ->withDepositTransactions(!array_key_exists('depositTransactions', $data) || $data['depositTransactions'] === null ? null : array_map(
                function ($item) {
                    return DepositTransaction::fromJson($item);
                },
                $data['depositTransactions']
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
            "depositTransactions" => $this->getDepositTransactions() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDepositTransactions()
            ),
            "sharedFreeCurrency" => $this->getSharedFreeCurrency(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}