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

namespace Gs2\ConsumableItem\Control;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetItemMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "GetItemMaster";

	/** @var string 仮想通貨の名前 */
	private $itemPoolName;

	/** @var string 商品の名前 */
	private $itemName;


	/**
	 * 仮想通貨の名前を取得
	 *
	 * @return string 仮想通貨の名前
	 */
	public function getItemPoolName() {
		return $this->itemPoolName;
	}

	/**
	 * 仮想通貨の名前を設定
	 *
	 * @param string $itemPoolName 仮想通貨の名前
	 */
	public function setItemPoolName($itemPoolName) {
		$this->itemPoolName = $itemPoolName;
	}

	/**
	 * 仮想通貨の名前を設定
	 *
	 * @param string $itemPoolName 仮想通貨の名前
	 * @return GetItemMasterRequest
	 */
	public function withItemPoolName($itemPoolName): GetItemMasterRequest {
		$this->setItemPoolName($itemPoolName);
		return $this;
	}

	/**
	 * 商品の名前を取得
	 *
	 * @return string 商品の名前
	 */
	public function getItemName() {
		return $this->itemName;
	}

	/**
	 * 商品の名前を設定
	 *
	 * @param string $itemName 商品の名前
	 */
	public function setItemName($itemName) {
		$this->itemName = $itemName;
	}

	/**
	 * 商品の名前を設定
	 *
	 * @param string $itemName 商品の名前
	 * @return GetItemMasterRequest
	 */
	public function withItemName($itemName): GetItemMasterRequest {
		$this->setItemName($itemName);
		return $this;
	}

}