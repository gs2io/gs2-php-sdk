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
     * @var int
	 */
	private $paid;
	/**
     * @var int
	 */
	private $free;
	/**
     * @var array
	 */
	private $detail;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;
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
	public function getPaid(): ?int {
		return $this->paid;
	}
	public function setPaid(?int $paid) {
		$this->paid = $paid;
	}
	public function withPaid(?int $paid): Wallet {
		$this->paid = $paid;
		return $this;
	}
	public function getFree(): ?int {
		return $this->free;
	}
	public function setFree(?int $free) {
		$this->free = $free;
	}
	public function withFree(?int $free): Wallet {
		$this->free = $free;
		return $this;
	}
	public function getDetail(): ?array {
		return $this->detail;
	}
	public function setDetail(?array $detail) {
		$this->detail = $detail;
	}
	public function withDetail(?array $detail): Wallet {
		$this->detail = $detail;
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
            ->withDetail(array_map(
                function ($item) {
                    return WalletDetail::fromJson($item);
                },
                array_key_exists('detail', $data) && $data['detail'] !== null ? $data['detail'] : []
            ))
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "walletId" => $this->getWalletId(),
            "userId" => $this->getUserId(),
            "slot" => $this->getSlot(),
            "paid" => $this->getPaid(),
            "free" => $this->getFree(),
            "detail" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getDetail() !== null && $this->getDetail() !== null ? $this->getDetail() : []
            ),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}