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


class Receipt implements IModel {
	/**
     * @var string
	 */
	private $receiptId;
	/**
     * @var string
	 */
	private $accountName;
	/**
     * @var string
	 */
	private $name;
	/**
     * @var int
	 */
	private $date;
	/**
     * @var string
	 */
	private $amount;
	/**
     * @var string
	 */
	private $pdfUrl;
	/**
     * @var int
	 */
	private $createdAt;
	/**
     * @var int
	 */
	private $updatedAt;

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

	public function getAccountName(): ?string {
		return $this->accountName;
	}

	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}

	public function withAccountName(?string $accountName): Receipt {
		$this->accountName = $accountName;
		return $this;
	}

	public function getName(): ?string {
		return $this->name;
	}

	public function setName(?string $name) {
		$this->name = $name;
	}

	public function withName(?string $name): Receipt {
		$this->name = $name;
		return $this;
	}

	public function getDate(): ?int {
		return $this->date;
	}

	public function setDate(?int $date) {
		$this->date = $date;
	}

	public function withDate(?int $date): Receipt {
		$this->date = $date;
		return $this;
	}

	public function getAmount(): ?string {
		return $this->amount;
	}

	public function setAmount(?string $amount) {
		$this->amount = $amount;
	}

	public function withAmount(?string $amount): Receipt {
		$this->amount = $amount;
		return $this;
	}

	public function getPdfUrl(): ?string {
		return $this->pdfUrl;
	}

	public function setPdfUrl(?string $pdfUrl) {
		$this->pdfUrl = $pdfUrl;
	}

	public function withPdfUrl(?string $pdfUrl): Receipt {
		$this->pdfUrl = $pdfUrl;
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

	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	public function withUpdatedAt(?int $updatedAt): Receipt {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Receipt {
        if ($data === null) {
            return null;
        }
        return (new Receipt())
            ->withReceiptId(empty($data['receiptId']) ? null : $data['receiptId'])
            ->withAccountName(empty($data['accountName']) ? null : $data['accountName'])
            ->withName(empty($data['name']) ? null : $data['name'])
            ->withDate(empty($data['date']) && $data['date'] !== 0 ? null : $data['date'])
            ->withAmount(empty($data['amount']) ? null : $data['amount'])
            ->withPdfUrl(empty($data['pdfUrl']) ? null : $data['pdfUrl'])
            ->withCreatedAt(empty($data['createdAt']) && $data['createdAt'] !== 0 ? null : $data['createdAt'])
            ->withUpdatedAt(empty($data['updatedAt']) && $data['updatedAt'] !== 0 ? null : $data['updatedAt']);
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