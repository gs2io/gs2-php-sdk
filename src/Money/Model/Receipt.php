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
 * Receipt
 *
 * @see https://docs.gs2.io/api_reference/money/sdk/#receipt
 */
class Receipt implements IModel {
	/**
     * @var string Receipt GRN
	 */
	private $receiptId;
	/**
     * @var string Transaction ID
	 */
	private $transactionId;
	/**
     * @var string Purchase Token
	 */
	private $purchaseToken;
	/**
     * @var string User ID
	 */
	private $userId;
	/**
     * @var string Receipt Type
	 */
	private $type;
	/**
     * @var int Slot Number
	 */
	private $slot;
	/**
     * @var float Unit Price
	 */
	private $price;
	/**
     * @var int Paid Currency
	 */
	private $paid;
	/**
     * @var int Free Currency
	 */
	private $free;
	/**
     * @var int Total
	 */
	private $total;
	/**
     * @var string Contents ID
	 */
	private $contentsId;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Receipt GRN */
	public function getReceiptId(): ?string {
		return $this->receiptId;
	}
    /** @param string|null $receiptId Receipt GRN */
	public function setReceiptId(?string $receiptId) {
		$this->receiptId = $receiptId;
	}
    /**
     * @param string|null $receiptId Receipt GRN
     * @return Receipt
     */
	public function withReceiptId(?string $receiptId): Receipt {
		$this->receiptId = $receiptId;
		return $this;
	}
    /** @return string|null Transaction ID */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}
    /** @param string|null $transactionId Transaction ID */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}
    /**
     * @param string|null $transactionId Transaction ID
     * @return Receipt
     */
	public function withTransactionId(?string $transactionId): Receipt {
		$this->transactionId = $transactionId;
		return $this;
	}
    /** @return string|null Purchase Token */
	public function getPurchaseToken(): ?string {
		return $this->purchaseToken;
	}
    /** @param string|null $purchaseToken Purchase Token */
	public function setPurchaseToken(?string $purchaseToken) {
		$this->purchaseToken = $purchaseToken;
	}
    /**
     * @param string|null $purchaseToken Purchase Token
     * @return Receipt
     */
	public function withPurchaseToken(?string $purchaseToken): Receipt {
		$this->purchaseToken = $purchaseToken;
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
     * @return Receipt
     */
	public function withUserId(?string $userId): Receipt {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Receipt Type */
	public function getType(): ?string {
		return $this->type;
	}
    /** @param string|null $type Receipt Type */
	public function setType(?string $type) {
		$this->type = $type;
	}
    /**
     * @param string|null $type Receipt Type
     * @return Receipt
     */
	public function withType(?string $type): Receipt {
		$this->type = $type;
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
     * @return Receipt
     */
	public function withSlot(?int $slot): Receipt {
		$this->slot = $slot;
		return $this;
	}
    /** @return float|null Unit Price */
	public function getPrice(): ?float {
		return $this->price;
	}
    /** @param float|null $price Unit Price */
	public function setPrice(?float $price) {
		$this->price = $price;
	}
    /**
     * @param float|null $price Unit Price
     * @return Receipt
     */
	public function withPrice(?float $price): Receipt {
		$this->price = $price;
		return $this;
	}
    /** @return int|null Paid Currency */
	public function getPaid(): ?int {
		return $this->paid;
	}
    /** @param int|null $paid Paid Currency */
	public function setPaid(?int $paid) {
		$this->paid = $paid;
	}
    /**
     * @param int|null $paid Paid Currency
     * @return Receipt
     */
	public function withPaid(?int $paid): Receipt {
		$this->paid = $paid;
		return $this;
	}
    /** @return int|null Free Currency */
	public function getFree(): ?int {
		return $this->free;
	}
    /** @param int|null $free Free Currency */
	public function setFree(?int $free) {
		$this->free = $free;
	}
    /**
     * @param int|null $free Free Currency
     * @return Receipt
     */
	public function withFree(?int $free): Receipt {
		$this->free = $free;
		return $this;
	}
    /** @return int|null Total */
	public function getTotal(): ?int {
		return $this->total;
	}
    /** @param int|null $total Total */
	public function setTotal(?int $total) {
		$this->total = $total;
	}
    /**
     * @param int|null $total Total
     * @return Receipt
     */
	public function withTotal(?int $total): Receipt {
		$this->total = $total;
		return $this;
	}
    /** @return string|null Contents ID */
	public function getContentsId(): ?string {
		return $this->contentsId;
	}
    /** @param string|null $contentsId Contents ID */
	public function setContentsId(?string $contentsId) {
		$this->contentsId = $contentsId;
	}
    /**
     * @param string|null $contentsId Contents ID
     * @return Receipt
     */
	public function withContentsId(?string $contentsId): Receipt {
		$this->contentsId = $contentsId;
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
     * @return Receipt
     */
	public function withCreatedAt(?int $createdAt): Receipt {
		$this->createdAt = $createdAt;
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
     * @return Receipt
     */
	public function withRevision(?int $revision): Receipt {
		$this->revision = $revision;
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
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
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
            "revision" => $this->getRevision(),
        );
    }
}