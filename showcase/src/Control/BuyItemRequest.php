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

namespace Gs2\Showcase\Control;

use Gs2\Core\Control\Gs2UserRequest;

/**
 * @author Game Server Services, Inc.
 */
class BuyItemRequest extends Gs2UserRequest {

    const FUNCTION = "BuyItem";

	/** @var string ショーケースの名前 */
	private $showcaseName;

	/** @var string 陳列商品のID */
	private $showcaseItemId;

	/** @var string スタンプシートの暗号化に使う GS2-Key 暗号鍵名 */
	private $keyName;


	/**
	 * ショーケースの名前を取得
	 *
	 * @return string ショーケースの名前
	 */
	public function getShowcaseName() {
		return $this->showcaseName;
	}

	/**
	 * ショーケースの名前を設定
	 *
	 * @param string $showcaseName ショーケースの名前
	 */
	public function setShowcaseName($showcaseName) {
		$this->showcaseName = $showcaseName;
	}

	/**
	 * ショーケースの名前を設定
	 *
	 * @param string $showcaseName ショーケースの名前
	 * @return BuyItemRequest
	 */
	public function withShowcaseName($showcaseName): BuyItemRequest {
		$this->setShowcaseName($showcaseName);
		return $this;
	}

	/**
	 * 陳列商品のIDを取得
	 *
	 * @return string 陳列商品のID
	 */
	public function getShowcaseItemId() {
		return $this->showcaseItemId;
	}

	/**
	 * 陳列商品のIDを設定
	 *
	 * @param string $showcaseItemId 陳列商品のID
	 */
	public function setShowcaseItemId($showcaseItemId) {
		$this->showcaseItemId = $showcaseItemId;
	}

	/**
	 * 陳列商品のIDを設定
	 *
	 * @param string $showcaseItemId 陳列商品のID
	 * @return BuyItemRequest
	 */
	public function withShowcaseItemId($showcaseItemId): BuyItemRequest {
		$this->setShowcaseItemId($showcaseItemId);
		return $this;
	}

	/**
	 * スタンプシートの暗号化に使う GS2-Key 暗号鍵名を取得
	 *
	 * @return string スタンプシートの暗号化に使う GS2-Key 暗号鍵名
	 */
	public function getKeyName() {
		return $this->keyName;
	}

	/**
	 * スタンプシートの暗号化に使う GS2-Key 暗号鍵名を設定
	 *
	 * @param string $keyName スタンプシートの暗号化に使う GS2-Key 暗号鍵名
	 */
	public function setKeyName($keyName) {
		$this->keyName = $keyName;
	}

	/**
	 * スタンプシートの暗号化に使う GS2-Key 暗号鍵名を設定
	 *
	 * @param string $keyName スタンプシートの暗号化に使う GS2-Key 暗号鍵名
	 * @return BuyItemRequest
	 */
	public function withKeyName($keyName): BuyItemRequest {
		$this->setKeyName($keyName);
		return $this;
	}

}