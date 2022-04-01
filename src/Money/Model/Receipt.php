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


class Receipt implements IModel {
	/**
     * @var string
	 */
	private $receiptId;
	/**
     * @var string
	 */
	private $transactionId;
	/**
     * @var string
	 */
	private $purchaseToken;
	/**
     * @var string
	 */
	private $userId;
	/**
     * @var string
	 */
	private $type;
	/**
     * @var int
	 */
	private $slot;
	/**
     * @var float
	 */
	private $price;
	/**
     * @var int
	 */
	private $paid;
	/**
     * @var int
	 */
	private $free;
	/**
     * @var int
	 */
	private $total;
	/**
     * @var string
	 */
	private $contentsId;
	/**
     * @var int
	 */
	private $createdAt;

	public function getReceiptId(): ?string {
		return $this->receiptId;
	}

	public function setReceiptId(?string $receiptId) {
		$this->receiptId = $receiptId;
	}

	public function withReceiptId(?string $receiptId): Receipt {
		$this->receiptId = $receiptId;
		return $this;
	}

	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	public function withTransactionId(?string $transactionId): Receipt {
		$this->transactionId = $transactionId;
		return $this;
	}

	public function getPurchaseToken(): ?string {
		return $this->purchaseToken;
	}

	public function setPurchaseToken(?string $purchaseToken) {
		$this->purchaseToken = $purchaseToken;
	}

	public function withPurchaseToken(?string $purchaseToken): Receipt {
		$this->purchaseToken = $purchaseToken;
		return $this;
	}

	public function getUserId(): ?string {
		return $this->userId;
	}

	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	public function withUserId(?string $userId): Receipt {
		$this->userId = $userId;
		return $this;
	}

	public function getType(): ?string {
		return $this->type;
	}

	public function setType(?string $type) {
		$this->type = $type;
	}

	public function withType(?string $type): Receipt {
		$this->type = $type;
		return $this;
	}

	public function getSlot(): ?int {
		return $this->slot;
	}

	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}

	public function withSlot(?int $slot): Receipt {
		$this->slot = $slot;
		return $this;
	}

	public function getPrice(): ?float {
		return $this->price;
	}

	public function setPrice(?float $price) {
		$this->price = $price;
	}

	public function withPrice(?float $price): Receipt {
		$this->price = $price;
		return $this;
	}

	public function getPaid(): ?int {
		return $this->paid;
	}

	public function setPaid(?int $paid) {
		$this->paid = $paid;
	}

	public function withPaid(?int $paid): Receipt {
		$this->paid = $paid;
		return $this;
	}

	public function getFree(): ?int {
		return $this->free;
	}

	public function setFree(?int $free) {
		$this->free = $free;
	}

	public function withFree(?int $free): Receipt {
		$this->free = $free;
		return $this;
	}

	public function getTotal(): ?int {
		return $this->total;
	}

	public function setTotal(?int $total) {
		$this->total = $total;
	}

	public function withTotal(?int $total): Receipt {
		$this->total = $total;
		return $this;
	}

	public function getContentsId(): ?string {
		return $this->contentsId;
	}

	public function setContentsId(?string $contentsId) {
		$this->contentsId = $contentsId;
	}

	public function withContentsId(?string $contentsId): Receipt {
		$this->contentsId = $contentsId;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Receipt {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Receipt {
        if ($data === null) {
            return null;
        }
        return (new Receipt())
            ->withReceiptId(array_key_exists('receiptId', $data) && $data['receiptId'] !== null ? $data['receiptId'] : null)
            ->withTransactionId(array_key_exists('transactionId', $data) && $data['transactionId'] !== null ? $data['transactionId'] : null)
            ->withPurchaseToken(array_key_exists('purchaseToken', $data) && $data['purchaseToken'] !== null ? $data['purchaseToken'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withSlot(array_key_exists('slot', $data) && $data['slot'] !== null ? $data['slot'] : null)
            ->withPrice(array_key_exists('price', $data) && $data['price'] !== null ? $data['price'] : null)
            ->withPaid(array_key_exists('paid', $data) && $data['paid'] !== null ? $data['paid'] : null)
            ->withFree(array_key_exists('free', $data) && $data['free'] !== null ? $data['free'] : null)
            ->withTotal(array_key_exists('total', $data) && $data['total'] !== null ? $data['total'] : null)
            ->withContentsId(array_key_exists('contentsId', $data) && $data['contentsId'] !== null ? $data['contentsId'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null);
    }

    public function toJson(): array {
        return array(
            "receiptId" => $this->getReceiptId(),
            "transactionId" => $this->getTransactionId(),
            "purchaseToken" => $this->getPurchaseToken(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "slot" => $this->getSlot(),
            "price" => $this->getPrice(),
            "paid" => $this->getPaid(),
            "free" => $this->getFree(),
            "total" => $this->getTotal(),
            "contentsId" => $this->getContentsId(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}