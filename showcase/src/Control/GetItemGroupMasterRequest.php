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

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * @author Game Server Services, Inc.
 */
class GetItemGroupMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "GetItemGroupMaster";

	/** @var string ショーケースの名前 */
	private $showcaseName;

	/** @var string 商品グループの名前 */
	private $itemGroupName;


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
	 * @return GetItemGroupMasterRequest
	 */
	public function withShowcaseName($showcaseName): GetItemGroupMasterRequest {
		$this->setShowcaseName($showcaseName);
		return $this;
	}

	/**
	 * 商品グループの名前を取得
	 *
	 * @return string 商品グループの名前
	 */
	public function getItemGroupName() {
		return $this->itemGroupName;
	}

	/**
	 * 商品グループの名前を設定
	 *
	 * @param string $itemGroupName 商品グループの名前
	 */
	public function setItemGroupName($itemGroupName) {
		$this->itemGroupName = $itemGroupName;
	}

	/**
	 * 商品グループの名前を設定
	 *
	 * @param string $itemGroupName 商品グループの名前
	 * @return GetItemGroupMasterRequest
	 */
	public function withItemGroupName($itemGroupName): GetItemGroupMasterRequest {
		$this->setItemGroupName($itemGroupName);
		return $this;
	}

}