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

namespace Gs2\Money\Model;

use Gs2\Core\Model\IModel;


/**
 * Wallet
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#wallet
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
     * @var int Paid Currency Amount
	 */
	private $paid;
	/**
     * @var int Free Currency Amount
	 */
	private $free;
	/**
     * @var array List of Wallet Details
	 */
	private $detail;
	/**
     * @var bool Share Free Currency
	 */
	private $shareFree;
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
    /** @return int|null Paid Currency Amount */
	public function getPaid(): ?int {
		return $this->paid;
	}
    /** @param int|null $paid Paid Currency Amount */
	public function setPaid(?int $paid) {
		$this->paid = $paid;
	}
    /**
     * @param int|null $paid Paid Currency Amount
     * @return Wallet
     */
	public function withPaid(?int $paid): Wallet {
		$this->paid = $paid;
		return $this;
	}
    /** @return int|null Free Currency Amount */
	public function getFree(): ?int {
		return $this->free;
	}
    /** @param int|null $free Free Currency Amount */
	public function setFree(?int $free) {
		$this->free = $free;
	}
    /**
     * @param int|null $free Free Currency Amount
     * @return Wallet
     */
	public function withFree(?int $free): Wallet {
		$this->free = $free;
		return $this;
	}
    /** @return array|null List of Wallet Details */
	public function getDetail(): ?array {
		return $this->detail;
	}
    /** @param array|null $detail List of Wallet Details */
	public function setDetail(?array $detail) {
		$this->detail = $detail;
	}
    /**
     * @param array|null $detail List of Wallet Details
     * @return Wallet
     */
	public function withDetail(?array $detail): Wallet {
		$this->detail = $detail;
		return $this;
	}
    /** @return bool|null Share Free Currency */
	public function getShareFree(): ?bool {
		return $this->shareFree;
	}
    /** @param bool|null $shareFree Share Free Currency */
	public function setShareFree(?bool $shareFree) {
		$this->shareFree = $shareFree;
	}
    /**
     * @param bool|null $shareFree Share Free Currency
     * @return Wallet
     */
	public function withShareFree(?bool $shareFree): Wallet {
		$this->shareFree = $shareFree;
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
            ->withPaid(array_key_exists('paid', $data) && $data['paid'] !== null ? $data['paid'] : null)
            ->withFree(array_key_exists('free', $data) && $data['free'] !== null ? $data['free'] : null)
            ->withDetail(!array_key_exists('detail', $data) || $data['detail'] === null ? null : array_map(
                function ($item) {
                    return WalletDetail::fromJson($item);
                },
                $data['detail']
            ))
            ->withShareFree(array_key_exists('shareFree', $data) ? $data['shareFree'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "walletId" => $this->getWalletId(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "paid" => $this->getPaid(),
            "free" => $this->getFree(),
            "detail" => $this->getDetail() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDetail()
            ),
            "shareFree" => $this->getShareFree(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}