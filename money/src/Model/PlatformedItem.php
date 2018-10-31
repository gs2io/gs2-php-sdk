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
 * プラットフォーム個別商品
 *
 * @author Game Server Services, Inc.
 *
 */
class PlatformedItem {

	/** @var string プラットフォーム個別商品GRN */
	private $platformedItemId;

	/** @var string 課金通貨GRN */
	private $moneyId;

	/** @var string 商品GRN */
	private $itemId;

	/** @var string 販売プラットフォーム */
	private $platform;

	/** @var string アプリ内課金ID */
	private $name;

	/** @var double 販売価格 */
	private $price;

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * プラットフォーム個別商品GRNを取得
	 *
	 * @return string プラットフォーム個別商品GRN
	 */
	public function getPlatformedItemId() {
		return $this->platformedItemId;
	}

	/**
	 * プラットフォーム個別商品GRNを設定
	 *
	 * @param string $platformedItemId プラットフォーム個別商品GRN
	 */
	public function setPlatformedItemId($platformedItemId) {
		$this->platformedItemId = $platformedItemId;
	}

	/**
	 * プラットフォーム個別商品GRNを設定
	 *
	 * @param string $platformedItemId プラットフォーム個別商品GRN
	 * @return self
	 */
	public function withPlatformedItemId($platformedItemId): self {
		$this->setPlatformedItemId($platformedItemId);
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
	 * 販売プラットフォームを取得
	 *
	 * @return string 販売プラットフォーム
	 */
	public function getPlatform() {
		return $this->platform;
	}

	/**
	 * 販売プラットフォームを設定
	 *
	 * @param string $platform 販売プラットフォーム
	 */
	public function setPlatform($platform) {
		$this->platform = $platform;
	}

	/**
	 * 販売プラットフォームを設定
	 *
	 * @param string $platform 販売プラットフォーム
	 * @return self
	 */
	public function withPlatform($platform): self {
		$this->setPlatform($platform);
		return $this;
	}

	/**
	 * アプリ内課金IDを取得
	 *
	 * @return string アプリ内課金ID
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * アプリ内課金IDを設定
	 *
	 * @param string $name アプリ内課金ID
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * アプリ内課金IDを設定
	 *
	 * @param string $name アプリ内課金ID
	 * @return self
	 */
	public function withName($name): self {
		$this->setName($name);
		return $this;
	}

	/**
	 * 販売価格を取得
	 *
	 * @return double 販売価格
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 * 販売価格を設定
	 *
	 * @param double $price 販売価格
	 */
	public function setPrice($price) {
		$this->price = $price;
	}

	/**
	 * 販売価格を設定
	 *
	 * @param double $price 販売価格
	 * @return self
	 */
	public function withPrice($price): self {
		$this->setPrice($price);
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
	 * @return PlatformedItem
	 */
    static function build(array $array)
    {
        $item = new PlatformedItem();
        $item->setPlatformedItemId(isset($array['platformedItemId']) ? $array['platformedItemId'] : null);
        $item->setMoneyId(isset($array['moneyId']) ? $array['moneyId'] : null);
        $item->setItemId(isset($array['itemId']) ? $array['itemId'] : null);
        $item->setPlatform(isset($array['platform']) ? $array['platform'] : null);
        $item->setName(isset($array['name']) ? $array['name'] : null);
        $item->setPrice(isset($array['price']) ? $array['price'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}