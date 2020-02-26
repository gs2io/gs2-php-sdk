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
 * レシート
 *
 * @author Game Server Services, Inc.
 *
 */
class Receipt implements IModel {
	/**
     * @var string レシート
	 */
	protected $receiptId;

	/**
	 * レシートを取得
	 *
	 * @return string|null レシート
	 */
	public function getReceiptId(): ?string {
		return $this->receiptId;
	}

	/**
	 * レシートを設定
	 *
	 * @param string|null $receiptId レシート
	 */
	public function setReceiptId(?string $receiptId) {
		$this->receiptId = $receiptId;
	}

	/**
	 * レシートを設定
	 *
	 * @param string|null $receiptId レシート
	 * @return Receipt $this
	 */
	public function withReceiptId(?string $receiptId): Receipt {
		$this->receiptId = $receiptId;
		return $this;
	}
	/**
     * @var string トランザクションID
	 */
	protected $transactionId;

	/**
	 * トランザクションIDを取得
	 *
	 * @return string|null トランザクションID
	 */
	public function getTransactionId(): ?string {
		return $this->transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string|null $transactionId トランザクションID
	 */
	public function setTransactionId(?string $transactionId) {
		$this->transactionId = $transactionId;
	}

	/**
	 * トランザクションIDを設定
	 *
	 * @param string|null $transactionId トランザクションID
	 * @return Receipt $this
	 */
	public function withTransactionId(?string $transactionId): Receipt {
		$this->transactionId = $transactionId;
		return $this;
	}
	/**
     * @var string ユーザーID
	 */
	protected $userId;

	/**
	 * ユーザーIDを取得
	 *
	 * @return string|null ユーザーID
	 */
	public function getUserId(): ?string {
		return $this->userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザーIDを設定
	 *
	 * @param string|null $userId ユーザーID
	 * @return Receipt $this
	 */
	public function withUserId(?string $userId): Receipt {
		$this->userId = $userId;
		return $this;
	}
	/**
     * @var string 種類
	 */
	protected $type;

	/**
	 * 種類を取得
	 *
	 * @return string|null 種類
	 */
	public function getType(): ?string {
		return $this->type;
	}

	/**
	 * 種類を設定
	 *
	 * @param string|null $type 種類
	 */
	public function setType(?string $type) {
		$this->type = $type;
	}

	/**
	 * 種類を設定
	 *
	 * @param string|null $type 種類
	 * @return Receipt $this
	 */
	public function withType(?string $type): Receipt {
		$this->type = $type;
		return $this;
	}
	/**
     * @var int スロット番号
	 */
	protected $slot;

	/**
	 * スロット番号を取得
	 *
	 * @return int|null スロット番号
	 */
	public function getSlot(): ?int {
		return $this->slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int|null $slot スロット番号
	 */
	public function setSlot(?int $slot) {
		$this->slot = $slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int|null $slot スロット番号
	 * @return Receipt $this
	 */
	public function withSlot(?int $slot): Receipt {
		$this->slot = $slot;
		return $this;
	}
	/**
     * @var float 単価
	 */
	protected $price;

	/**
	 * 単価を取得
	 *
	 * @return float|null 単価
	 */
	public function getPrice(): ?float {
		return $this->price;
	}

	/**
	 * 単価を設定
	 *
	 * @param float|null $price 単価
	 */
	public function setPrice(?float $price) {
		$this->price = $price;
	}

	/**
	 * 単価を設定
	 *
	 * @param float|null $price 単価
	 * @return Receipt $this
	 */
	public function withPrice(?float $price): Receipt {
		$this->price = $price;
		return $this;
	}
	/**
     * @var int 有償課金通貨
	 */
	protected $paid;

	/**
	 * 有償課金通貨を取得
	 *
	 * @return int|null 有償課金通貨
	 */
	public function getPaid(): ?int {
		return $this->paid;
	}

	/**
	 * 有償課金通貨を設定
	 *
	 * @param int|null $paid 有償課金通貨
	 */
	public function setPaid(?int $paid) {
		$this->paid = $paid;
	}

	/**
	 * 有償課金通貨を設定
	 *
	 * @param int|null $paid 有償課金通貨
	 * @return Receipt $this
	 */
	public function withPaid(?int $paid): Receipt {
		$this->paid = $paid;
		return $this;
	}
	/**
     * @var int 無償課金通貨
	 */
	protected $free;

	/**
	 * 無償課金通貨を取得
	 *
	 * @return int|null 無償課金通貨
	 */
	public function getFree(): ?int {
		return $this->free;
	}

	/**
	 * 無償課金通貨を設定
	 *
	 * @param int|null $free 無償課金通貨
	 */
	public function setFree(?int $free) {
		$this->free = $free;
	}

	/**
	 * 無償課金通貨を設定
	 *
	 * @param int|null $free 無償課金通貨
	 * @return Receipt $this
	 */
	public function withFree(?int $free): Receipt {
		$this->free = $free;
		return $this;
	}
	/**
     * @var int 総数
	 */
	protected $total;

	/**
	 * 総数を取得
	 *
	 * @return int|null 総数
	 */
	public function getTotal(): ?int {
		return $this->total;
	}

	/**
	 * 総数を設定
	 *
	 * @param int|null $total 総数
	 */
	public function setTotal(?int $total) {
		$this->total = $total;
	}

	/**
	 * 総数を設定
	 *
	 * @param int|null $total 総数
	 * @return Receipt $this
	 */
	public function withTotal(?int $total): Receipt {
		$this->total = $total;
		return $this;
	}
	/**
     * @var string ストアプラットフォームで販売されているコンテンツID
	 */
	protected $contentsId;

	/**
	 * ストアプラットフォームで販売されているコンテンツIDを取得
	 *
	 * @return string|null ストアプラットフォームで販売されているコンテンツID
	 */
	public function getContentsId(): ?string {
		return $this->contentsId;
	}

	/**
	 * ストアプラットフォームで販売されているコンテンツIDを設定
	 *
	 * @param string|null $contentsId ストアプラットフォームで販売されているコンテンツID
	 */
	public function setContentsId(?string $contentsId) {
		$this->contentsId = $contentsId;
	}

	/**
	 * ストアプラットフォームで販売されているコンテンツIDを設定
	 *
	 * @param string|null $contentsId ストアプラットフォームで販売されているコンテンツID
	 * @return Receipt $this
	 */
	public function withContentsId(?string $contentsId): Receipt {
		$this->contentsId = $contentsId;
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

    public function toJson(): array {
        return array(
            "receiptId" => $this->receiptId,
            "transactionId" => $this->transactionId,
            "userId" => $this->userId,
            "type" => $this->type,
            "slot" => $this->slot,
            "price" => $this->price,
            "paid" => $this->paid,
            "free" => $this->free,
            "total" => $this->total,
            "contentsId" => $this->contentsId,
            "createdAt" => $this->createdAt,
        );
    }

    public static function fromJson(array $data): Receipt {
        $model = new Receipt();
        $model->setReceiptId(isset($data["receiptId"]) ? $data["receiptId"] : null);
        $model->setTransactionId(isset($data["transactionId"]) ? $data["transactionId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setType(isset($data["type"]) ? $data["type"] : null);
        $model->setSlot(isset($data["slot"]) ? $data["slot"] : null);
        $model->setPrice(isset($data["price"]) ? $data["price"] : null);
        $model->setPaid(isset($data["paid"]) ? $data["paid"] : null);
        $model->setFree(isset($data["free"]) ? $data["free"] : null);
        $model->setTotal(isset($data["total"]) ? $data["total"] : null);
        $model->setContentsId(isset($data["contentsId"]) ? $data["contentsId"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        return $model;
    }
}