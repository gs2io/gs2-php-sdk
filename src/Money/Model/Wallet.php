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
 * ウォレット
 *
 * @author Game Server Services, Inc.
 *
 */
class Wallet implements IModel {
	/**
     * @var string ウォレット
	 */
	protected $walletId;

	/**
	 * ウォレットを取得
	 *
	 * @return string|null ウォレット
	 */
	public function getWalletId(): ?string {
		return $this->walletId;
	}

	/**
	 * ウォレットを設定
	 *
	 * @param string|null $walletId ウォレット
	 */
	public function setWalletId(?string $walletId) {
		$this->walletId = $walletId;
	}

	/**
	 * ウォレットを設定
	 *
	 * @param string|null $walletId ウォレット
	 * @return Wallet $this
	 */
	public function withWalletId(?string $walletId): Wallet {
		$this->walletId = $walletId;
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
	 * @return Wallet $this
	 */
	public function withUserId(?string $userId): Wallet {
		$this->userId = $userId;
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
	 * @return Wallet $this
	 */
	public function withSlot(?int $slot): Wallet {
		$this->slot = $slot;
		return $this;
	}
	/**
     * @var int 有償課金通貨所持量
	 */
	protected $paid;

	/**
	 * 有償課金通貨所持量を取得
	 *
	 * @return int|null 有償課金通貨所持量
	 */
	public function getPaid(): ?int {
		return $this->paid;
	}

	/**
	 * 有償課金通貨所持量を設定
	 *
	 * @param int|null $paid 有償課金通貨所持量
	 */
	public function setPaid(?int $paid) {
		$this->paid = $paid;
	}

	/**
	 * 有償課金通貨所持量を設定
	 *
	 * @param int|null $paid 有償課金通貨所持量
	 * @return Wallet $this
	 */
	public function withPaid(?int $paid): Wallet {
		$this->paid = $paid;
		return $this;
	}
	/**
     * @var int 無償課金通貨所持量
	 */
	protected $free;

	/**
	 * 無償課金通貨所持量を取得
	 *
	 * @return int|null 無償課金通貨所持量
	 */
	public function getFree(): ?int {
		return $this->free;
	}

	/**
	 * 無償課金通貨所持量を設定
	 *
	 * @param int|null $free 無償課金通貨所持量
	 */
	public function setFree(?int $free) {
		$this->free = $free;
	}

	/**
	 * 無償課金通貨所持量を設定
	 *
	 * @param int|null $free 無償課金通貨所持量
	 * @return Wallet $this
	 */
	public function withFree(?int $free): Wallet {
		$this->free = $free;
		return $this;
	}
	/**
     * @var WalletDetail[] 詳細
	 */
	protected $detail;

	/**
	 * 詳細を取得
	 *
	 * @return WalletDetail[]|null 詳細
	 */
	public function getDetail(): ?array {
		return $this->detail;
	}

	/**
	 * 詳細を設定
	 *
	 * @param WalletDetail[]|null $detail 詳細
	 */
	public function setDetail(?array $detail) {
		$this->detail = $detail;
	}

	/**
	 * 詳細を設定
	 *
	 * @param WalletDetail[]|null $detail 詳細
	 * @return Wallet $this
	 */
	public function withDetail(?array $detail): Wallet {
		$this->detail = $detail;
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
	 * @return Wallet $this
	 */
	public function withCreatedAt(?int $createdAt): Wallet {
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
	 * @return Wallet $this
	 */
	public function withUpdatedAt(?int $updatedAt): Wallet {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "walletId" => $this->walletId,
            "userId" => $this->userId,
            "slot" => $this->slot,
            "paid" => $this->paid,
            "free" => $this->free,
            "detail" => array_map(
                function (WalletDetail $v) {
                    return $v->toJson();
                },
                $this->detail == null ? [] : $this->detail
            ),
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): Wallet {
        $model = new Wallet();
        $model->setWalletId(isset($data["walletId"]) ? $data["walletId"] : null);
        $model->setUserId(isset($data["userId"]) ? $data["userId"] : null);
        $model->setSlot(isset($data["slot"]) ? $data["slot"] : null);
        $model->setPaid(isset($data["paid"]) ? $data["paid"] : null);
        $model->setFree(isset($data["free"]) ? $data["free"] : null);
        $model->setDetail(array_map(
                function ($v) {
                    return WalletDetail::fromJson($v);
                },
                isset($data["detail"]) ? $data["detail"] : []
            )
        );
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}