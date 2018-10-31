<?php
/*
 * Copyright 2016-2018 Game Server Services, Inc. or its affiliates. All Rights
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

/**
 * レシート
 *
 * @author Game Server Services, Inc.
 *
 */
class Receipt {

	/** @var string ユーザID */
	private $userId;

	/** @var int スロット番号 */
	private $slot;

	/** @var string 種類 */
	private $type;

	/** @var double 金額 */
	private $price;

	/** @var int 有償課金通貨 */
	private $paid;

	/** @var int 無償課金通貨 */
	private $free;

	/** @var int 総数 */
	private $total;

	/** @var int 用途 */
	private $use;

	/** @var int 決済日時(エポック秒) */
	private $createAt;

	/**
	 * ユーザIDを取得
	 *
	 * @return string ユーザID
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
	}

	/**
	 * ユーザIDを設定
	 *
	 * @param string $userId ユーザID
	 * @return self
	 */
	public function withUserId($userId): self {
		$this->setUserId($userId);
		return $this;
	}

	/**
	 * スロット番号を取得
	 *
	 * @return int スロット番号
	 */
	public function getSlot() {
		return $this->slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 */
	public function setSlot($slot) {
		$this->slot = $slot;
	}

	/**
	 * スロット番号を設定
	 *
	 * @param int $slot スロット番号
	 * @return self
	 */
	public function withSlot($slot): self {
		$this->setSlot($slot);
		return $this;
	}

	/**
	 * 種類を取得
	 *
	 * @return string 種類
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * 種類を設定
	 *
	 * @param string $type 種類
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * 種類を設定
	 *
	 * @param string $type 種類
	 * @return self
	 */
	public function withType($type): self {
		$this->setType($type);
		return $this;
	}

	/**
	 * 金額を取得
	 *
	 * @return double 金額
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * 金額を設定
	 *
	 * @param double $price 金額
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * 金額を設定
	 *
	 * @param double $price 金額
	 * @return self
	 */
	public function withPrice($price): self {
		$this->setPrice($price);
		return $this;
	}

	/**
	 * 有償課金通貨を取得
	 *
	 * @return int 有償課金通貨
	 */
	public function getPaid() {
		return $this->paid;
	}

	/**
	 * 有償課金通貨を設定
	 *
	 * @param int $paid 有償課金通貨
	 */
	public function setPaid($paid) {
		$this->paid = $paid;
	}

	/**
	 * 有償課金通貨を設定
	 *
	 * @param int $paid 有償課金通貨
	 * @return self
	 */
	public function withPaid($paid): self {
		$this->setPaid($paid);
		return $this;
	}

	/**
	 * 無償課金通貨を取得
	 *
	 * @return int 無償課金通貨
	 */
	public function getFree() {
		return $this->free;
	}

	/**
	 * 無償課金通貨を設定
	 *
	 * @param int $free 無償課金通貨
	 */
	public function setFree($free) {
		$this->free = $free;
	}

	/**
	 * 無償課金通貨を設定
	 *
	 * @param int $free 無償課金通貨
	 * @return self
	 */
	public function withFree($free): self {
		$this->setFree($free);
		return $this;
	}

	/**
	 * 総数を取得
	 *
	 * @return int 総数
	 */
	public function getTotal() {
		return $this->total;
	}

	/**
	 * 総数を設定
	 *
	 * @param int $total 総数
	 */
	public function setTotal($total) {
		$this->total = $total;
	}

	/**
	 * 総数を設定
	 *
	 * @param int $total 総数
	 * @return self
	 */
	public function withTotal($total): self {
		$this->setTotal($total);
		return $this;
	}

	/**
	 * 用途を取得
	 *
	 * @return int 用途
	 */
	public function getUse() {
		return $this->use;
	}

	/**
	 * 用途を設定
	 *
	 * @param int $use 用途
	 */
	public function setUse($use) {
		$this->use = $use;
	}

	/**
	 * 用途を設定
	 *
	 * @param int $use 用途
	 * @return self
	 */
	public function withUse($use): self {
		$this->setUse($use);
		return $this;
	}

	/**
	 * 決済日時(エポック秒)を取得
	 *
	 * @return int 決済日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 決済日時(エポック秒)を設定
	 *
	 * @param int $createAt 決済日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 決済日時(エポック秒)を設定
	 *
	 * @param int $createAt 決済日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Receipt
	 */
    static function build(array $array)
    {
        $item = new Receipt();
        $item->setUserId(isset($array['userId']) ? $array['userId'] : null);
        $item->setSlot(isset($array['slot']) ? $array['slot'] : null);
        $item->setType(isset($array['type']) ? $array['type'] : null);
        $item->setPrice(isset($array['price']) ? $array['price'] : null);
        $item->setPaid(isset($array['paid']) ? $array['paid'] : null);
        $item->setFree(isset($array['free']) ? $array['free'] : null);
        $item->setTotal(isset($array['total']) ? $array['total'] : null);
        $item->setUse(isset($array['use']) ? $array['use'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        return $item;
    }

}