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
class DeletePlatformedItemRequest extends Gs2BasicRequest {

    const FUNCTION = "DeletePlatformedItem";

	/** @var string 課金通貨の名前 */
	private $moneyName;

	/** @var string 商品の名前 */
	private $itemName;

	/** @var string プラットフォームの名前 */
	private $platform;


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
	 * @return DeletePlatformedItemRequest
	 */
	public function withMoneyName($moneyName): DeletePlatformedItemRequest {
		$this->setMoneyName($moneyName);
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
	 * @return DeletePlatformedItemRequest
	 */
	public function withItemName($itemName): DeletePlatformedItemRequest {
		$this->setItemName($itemName);
		return $this;
	}

	/**
	 * プラットフォームの名前を取得
	 *
	 * @return string プラットフォームの名前
	 */
	public function getPlatform() {
		return $this->platform;
	}

	/**
	 * プラットフォームの名前を設定
	 *
	 * @param string $platform プラットフォームの名前
	 */
	public function setPlatform($platform) {
		$this->platform = $platform;
	}

	/**
	 * プラットフォームの名前を設定
	 *
	 * @param string $platform プラットフォームの名前
	 * @return DeletePlatformedItemRequest
	 */
	public function withPlatform($platform): DeletePlatformedItemRequest {
		$this->setPlatform($platform);
		return $this;
	}

}