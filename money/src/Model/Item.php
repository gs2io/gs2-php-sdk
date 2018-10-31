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
 * 商品
 *
 * @author Game Server Services, Inc.
 *
 */
class Item {

	/** @var string 商品GRN */
	private $itemId;

	/** @var string 課金通貨GRN */
	private $moneyId;

	/** @var string 商品名 */
	private $name;

	/** @var int 付与する課金通貨の数 */
	private $count;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 商品GRNを取得
	 *
	 * @return string 商品GRN
	 */
	public function getItemId() {
		return $this->itemId;
	}

	/**
	 * 商品GRNを設定
	 *
	 * @param string $itemId 商品GRN
	 */
	public function setItemId($itemId) {
		$this->itemId = $itemId;
	}

	/**
	 * 商品GRNを設定
	 *
	 * @param string $itemId 商品GRN
	 * @return self
	 */
	public function withItemId($itemId): self {
		$this->setItemId($itemId);
		return $this;
	}

	/**
	 * 課金通貨GRNを取得
	 *
	 * @return string 課金通貨GRN
	 */
	public function getMoneyId() {
		return $this->moneyId;
	}

	/**
	 * 課金通貨GRNを設定
	 *
	 * @param string $moneyId 課金通貨GRN
	 */
	public function setMoneyId($moneyId) {
		$this->moneyId = $moneyId;
	}

	/**
	 * 課金通貨GRNを設定
	 *
	 * @param string $moneyId 課金通貨GRN
	 * @return self
	 */
	public function withMoneyId($moneyId): self {
		$this->setMoneyId($moneyId);
		return $this;
	}

	/**
	 * 商品名を取得
	 *
	 * @return string 商品名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string $name 商品名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string $name 商品名
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 付与する課金通貨の数を取得
	 *
	 * @return int 付与する課金通貨の数
	 */
	public function getCount() {
		return $this->count;
	}

	/**
	 * 付与する課金通貨の数を設定
	 *
	 * @param int $count 付与する課金通貨の数
	 */
	public function setCount($count) {
		$this->count = $count;
	}

	/**
	 * 付与する課金通貨の数を設定
	 *
	 * @param int $count 付与する課金通貨の数
	 * @return self
	 */
	public function withCount($count): self {
		$this->setCount($count);
		return $this;
	}

	/**
	 * 作成日時(エポック秒)を取得
	 *
	 * @return int 作成日時(エポック秒)
	 */
	public function getCreateAt() {
		return $this->createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 */
	public function setCreateAt($createAt) {
		$this->createAt = $createAt;
	}

	/**
	 * 作成日時(エポック秒)を設定
	 *
	 * @param int $createAt 作成日時(エポック秒)
	 * @return self
	 */
	public function withCreateAt($createAt): self {
		$this->setCreateAt($createAt);
		return $this;
	}

	/**
	 * 最終更新日時(エポック秒)を取得
	 *
	 * @return int 最終更新日時(エポック秒)
	 */
	public function getUpdateAt() {
		return $this->updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 */
	public function setUpdateAt($updateAt) {
		$this->updateAt = $updateAt;
	}

	/**
	 * 最終更新日時(エポック秒)を設定
	 *
	 * @param int $updateAt 最終更新日時(エポック秒)
	 * @return self
	 */
	public function withUpdateAt($updateAt): self {
		$this->setUpdateAt($updateAt);
		return $this;
	}

	/**
	 * 連想配列からモデルを作成
	 *
	 * @param array $array 連想配列
	 * @return Item
	 */
    static function build(array $array)
    {
        $item = new Item();
        $item->setItemId(isset($array['itemId']) ? $array['itemId'] : null);
        $item->setMoneyId(isset($array['moneyId']) ? $array['moneyId'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setCount(isset($array['count']) ? $array['count'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}