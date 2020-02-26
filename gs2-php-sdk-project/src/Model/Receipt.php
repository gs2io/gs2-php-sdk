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

/**
 * 領収書
 *
 * @author Game Server Services, Inc.
 *
 */
class Receipt implements IModel {
	/**
     * @var string 領収書
	 */
	protected $receiptId;

	/**
	 * 領収書を取得
	 *
	 * @return string|null 領収書
	 */
	public function getReceiptId(): ?string {
		return $this->receiptId;
	}

	/**
	 * 領収書を設定
	 *
	 * @param string|null $receiptId 領収書
	 */
	public function setReceiptId(?string $receiptId) {
		$this->receiptId = $receiptId;
	}

	/**
	 * 領収書を設定
	 *
	 * @param string|null $receiptId 領収書
	 * @return Receipt $this
	 */
	public function withReceiptId(?string $receiptId): Receipt {
		$this->receiptId = $receiptId;
		return $this;
	}
	/**
     * @var string GS2アカウントの名前
	 */
	protected $accountName;

	/**
	 * GS2アカウントの名前を取得
	 *
	 * @return string|null GS2アカウントの名前
	 */
	public function getAccountName(): ?string {
		return $this->accountName;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $accountName GS2アカウントの名前
	 */
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}

	/**
	 * GS2アカウントの名前を設定
	 *
	 * @param string|null $accountName GS2アカウントの名前
	 * @return Receipt $this
	 */
	public function withAccountName(?string $accountName): Receipt {
		$this->accountName = $accountName;
		return $this;
	}
	/**
     * @var string 請求書名
	 */
	protected $name;

	/**
	 * 請求書名を取得
	 *
	 * @return string|null 請求書名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * 請求書名を設定
	 *
	 * @param string|null $name 請求書名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * 請求書名を設定
	 *
	 * @param string|null $name 請求書名
	 * @return Receipt $this
	 */
	public function withName(?string $name): Receipt {
		$this->name = $name;
		return $this;
	}
	/**
     * @var int 請求月
	 */
	protected $date;

	/**
	 * 請求月を取得
	 *
	 * @return int|null 請求月
	 */
	public function getDate(): ?int {
		return $this->date;
	}

	/**
	 * 請求月を設定
	 *
	 * @param int|null $date 請求月
	 */
	public function setDate(?int $date) {
		$this->date = $date;
	}

	/**
	 * 請求月を設定
	 *
	 * @param int|null $date 請求月
	 * @return Receipt $this
	 */
	public function withDate(?int $date): Receipt {
		$this->date = $date;
		return $this;
	}
	/**
     * @var string 請求金額
	 */
	protected $amount;

	/**
	 * 請求金額を取得
	 *
	 * @return string|null 請求金額
	 */
	public function getAmount(): ?string {
		return $this->amount;
	}

	/**
	 * 請求金額を設定
	 *
	 * @param string|null $amount 請求金額
	 */
	public function setAmount(?string $amount) {
		$this->amount = $amount;
	}

	/**
	 * 請求金額を設定
	 *
	 * @param string|null $amount 請求金額
	 * @return Receipt $this
	 */
	public function withAmount(?string $amount): Receipt {
		$this->amount = $amount;
		return $this;
	}
	/**
     * @var string PDF URL
	 */
	protected $pdfUrl;

	/**
	 * PDF URLを取得
	 *
	 * @return string|null PDF URL
	 */
	public function getPdfUrl(): ?string {
		return $this->pdfUrl;
	}

	/**
	 * PDF URLを設定
	 *
	 * @param string|null $pdfUrl PDF URL
	 */
	public function setPdfUrl(?string $pdfUrl) {
		$this->pdfUrl = $pdfUrl;
	}

	/**
	 * PDF URLを設定
	 *
	 * @param string|null $pdfUrl PDF URL
	 * @return Receipt $this
	 */
	public function withPdfUrl(?string $pdfUrl): Receipt {
		$this->pdfUrl = $pdfUrl;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return Receipt $this
	 */
	public function withCreatedAt(?int $createdAt): Receipt {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return Receipt $this
	 */
	public function withUpdatedAt(?int $updatedAt): Receipt {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "receiptId" => $this->receiptId,
            "accountName" => $this->accountName,
            "name" => $this->name,
            "date" => $this->date,
            "amount" => $this->amount,
            "pdfUrl" => $this->pdfUrl,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Receipt {
        $model = new Receipt();
        $model->setReceiptId(isset($data["receiptId"]) ? $data["receiptId"] : null);
        $model->setAccountName(isset($data["accountName"]) ? $data["accountName"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDate(isset($data["date"]) ? $data["date"] : null);
        $model->setAmount(isset($data["amount"]) ? $data["amount"] : null);
        $model->setPdfUrl(isset($data["pdfUrl"]) ? $data["pdfUrl"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}