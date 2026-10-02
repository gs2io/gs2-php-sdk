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

namespace Gs2\Project\Model;

use Gs2\Core\Model\IModel;


/** Receipt */
class Receipt implements IModel {
	/**
     * @var string Receipt GRN
	 */
	private $receiptId;
	/**
     * @var string GS2 Account Name
	 */
	private $accountName;
	/**
     * @var string Invoice Name
	 */
	private $name;
	/**
     * @var int Billing month
	 */
	private $date;
	/**
     * @var string amount billed or claimed
	 */
	private $amount;
	/**
     * @var string PDF URL
	 */
	private $pdfUrl;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Last Updated Timestamp
	 */
	private $updatedAt;
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
    /** @return string|null GS2 Account Name */
	public function getAccountName(): ?string {
		return $this->accountName;
	}
    /** @param string|null $accountName GS2 Account Name */
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}
    /**
     * @param string|null $accountName GS2 Account Name
     * @return Receipt
     */
	public function withAccountName(?string $accountName): Receipt {
		$this->accountName = $accountName;
		return $this;
	}
    /** @return string|null Invoice Name */
	public function getName(): ?string {
		return $this->name;
	}
    /** @param string|null $name Invoice Name */
	public function setName(?string $name) {
		$this->name = $name;
	}
    /**
     * @param string|null $name Invoice Name
     * @return Receipt
     */
	public function withName(?string $name): Receipt {
		$this->name = $name;
		return $this;
	}
    /** @return int|null Billing month */
	public function getDate(): ?int {
		return $this->date;
	}
    /** @param int|null $date Billing month */
	public function setDate(?int $date) {
		$this->date = $date;
	}
    /**
     * @param int|null $date Billing month
     * @return Receipt
     */
	public function withDate(?int $date): Receipt {
		$this->date = $date;
		return $this;
	}
    /** @return string|null amount billed or claimed */
	public function getAmount(): ?string {
		return $this->amount;
	}
    /** @param string|null $amount amount billed or claimed */
	public function setAmount(?string $amount) {
		$this->amount = $amount;
	}
    /**
     * @param string|null $amount amount billed or claimed
     * @return Receipt
     */
	public function withAmount(?string $amount): Receipt {
		$this->amount = $amount;
		return $this;
	}
    /** @return string|null PDF URL */
	public function getPdfUrl(): ?string {
		return $this->pdfUrl;
	}
    /** @param string|null $pdfUrl PDF URL */
	public function setPdfUrl(?string $pdfUrl) {
		$this->pdfUrl = $pdfUrl;
	}
    /**
     * @param string|null $pdfUrl PDF URL
     * @return Receipt
     */
	public function withPdfUrl(?string $pdfUrl): Receipt {
		$this->pdfUrl = $pdfUrl;
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
     * @return Receipt
     */
	public function withUpdatedAt(?int $updatedAt): Receipt {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Receipt {
        if ($data === null) {
            return null;
        }
        return (new Receipt())
            ->withReceiptId(array_key_exists('receiptId', $data) && $data['receiptId'] !== null ? $data['receiptId'] : null)
            ->withAccountName(array_key_exists('accountName', $data) && $data['accountName'] !== null ? $data['accountName'] : null)
            ->withName(array_key_exists('name', $data) && $data['name'] !== null ? $data['name'] : null)
            ->withDate(array_key_exists('date', $data) && $data['date'] !== null ? $data['date'] : null)
            ->withAmount(array_key_exists('amount', $data) && $data['amount'] !== null ? $data['amount'] : null)
            ->withPdfUrl(array_key_exists('pdfUrl', $data) && $data['pdfUrl'] !== null ? $data['pdfUrl'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withUpdatedAt(array_key_exists('updatedAt', $data) && $data['updatedAt'] !== null ? $data['updatedAt'] : null);
    }

    public function toJson(): array {
        return array(
            "receiptId" => $this->getReceiptId(),
            "accountName" => $this->getAccountName(),
            "name" => $this->getName(),
            "date" => $this->getDate(),
            "amount" => $this->getAmount(),
            "pdfUrl" => $this->getPdfUrl(),
            "createdAt" => $this->getCreatedAt(),
            "updatedAt" => $this->getUpdatedAt(),
        );
    }
}