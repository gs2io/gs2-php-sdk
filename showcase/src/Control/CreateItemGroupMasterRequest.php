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
class CreateItemGroupMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateItemGroupMaster";

	/** @var string ショーケースの名前 */
	private $showcaseName;

	/** @var string 商品グループ名 */
	private $name;

	/** @var string[] 販売している商品名のリスト */
	private $itemNames;


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
	 * @return CreateItemGroupMasterRequest
	 */
	public function withShowcaseName($showcaseName): CreateItemGroupMasterRequest {
		$this->setShowcaseName($showcaseName);
		return $this;
	}

	/**
	 * 商品グループ名を取得
	 *
	 * @return string 商品グループ名
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * 商品グループ名を設定
	 *
	 * @param string $name 商品グループ名
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * 商品グループ名を設定
	 *
	 * @param string $name 商品グループ名
	 * @return CreateItemGroupMasterRequest
	 */
	public function withName($name): CreateItemGroupMasterRequest {
		$this->setName($name);
		return $this;
	}

	/**
	 * 販売している商品名のリストを取得
	 *
	 * @return string[] 販売している商品名のリスト
	 */
	public function getItemNames() {
		return $this->itemNames;
	}

	/**
	 * 販売している商品名のリストを設定
	 *
	 * @param string[] $itemNames 販売している商品名のリスト
	 */
	public function setItemNames($itemNames) {
		$this->itemNames = $itemNames;
	}

	/**
	 * 販売している商品名のリストを設定
	 *
	 * @param string[] $itemNames 販売している商品名のリスト
	 * @return CreateItemGroupMasterRequest
	 */
	public function withItemNames($itemNames): CreateItemGroupMasterRequest {
		$this->setItemNames($itemNames);
		return $this;
	}

}