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
class GetItemPoolStatusRequest extends Gs2BasicRequest {

    const FUNCTION = "GetItemPoolStatus";

	/** @var string 状態を取得する消費型アイテムプールの名前 */
	private $itemPoolName;


	/**
	 * 状態を取得する消費型アイテムプールの名前を取得
	 *
	 * @return string 状態を取得する消費型アイテムプールの名前
	 */
	public function getItemPoolName() {
		return $this->itemPoolName;
	}

	/**
	 * 状態を取得する消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 状態を取得する消費型アイテムプールの名前
	 */
	public function setItemPoolName($itemPoolName) {
		$this->itemPoolName = $itemPoolName;
	}

	/**
	 * 状態を取得する消費型アイテムプールの名前を設定
	 *
	 * @param string $itemPoolName 状態を取得する消費型アイテムプールの名前
	 * @return GetItemPoolStatusRequest
	 */
	public function withItemPoolName($itemPoolName): GetItemPoolStatusRequest {
		$this->setItemPoolName($itemPoolName);
		return $this;
	}

}