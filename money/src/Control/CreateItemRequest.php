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

namespace Gs2\Money\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class CreateItemRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateItem";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var string 商品名 */
	private $name;

	/** @var int 付与する課金通貨の数 */
	private $count;


	/**
	 * 課金通貨の名前を取得
	 *
	 * @return string 課金通貨の名前
	 */
	public function getMoneyName() {
		return $this->moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 */
	public function setMoneyName($moneyName) {
		$this->moneyName = $moneyName;
	}

	/**
	 * 課金通貨の名前を設定
	 *
	 * @param string $moneyName 課金通貨の名前
	 * @return CreateItemRequest
	 */
	public function withMoneyName($moneyName): CreateItemRequest {
		$this->setMoneyName($moneyName);
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
	 * @return CreateItemRequest
	 */
	public function withName($name): CreateItemRequest {
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
	 * @return CreateItemRequest
	 */
	public function withCount($count): CreateItemRequest {
		$this->setCount($count);
		return $this;
	}

}