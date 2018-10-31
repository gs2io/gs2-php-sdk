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
class GetShowcaseItemMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "GetShowcaseItemMaster";

	/** @var string ショーケースの名前 */
	private $showcaseName;

	/** @var string 商品の種類 */
	private $category;

	/** @var string 商品/商品グループ名 */
	private $resourceId;


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
	 * @return GetShowcaseItemMasterRequest
	 */
	public function withShowcaseName($showcaseName): GetShowcaseItemMasterRequest {
		$this->setShowcaseName($showcaseName);
		return $this;
	}

	/**
	 * 商品の種類を取得
	 *
	 * @return string 商品の種類
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * 商品の種類を設定
	 *
	 * @param string $category 商品の種類
	 */
	public function setCategory($category) {
		$this->category = $category;
	}

	/**
	 * 商品の種類を設定
	 *
	 * @param string $category 商品の種類
	 * @return GetShowcaseItemMasterRequest
	 */
	public function withCategory($category): GetShowcaseItemMasterRequest {
		$this->setCategory($category);
		return $this;
	}

	/**
	 * 商品/商品グループ名を取得
	 *
	 * @return string 商品/商品グループ名
	 */
	public function getResourceId() {
		return $this->resourceId;
	}

	/**
	 * 商品/商品グループ名を設定
	 *
	 * @param string $resourceId 商品/商品グループ名
	 */
	public function setResourceId($resourceId) {
		$this->resourceId = $resourceId;
	}

	/**
	 * 商品/商品グループ名を設定
	 *
	 * @param string $resourceId 商品/商品グループ名
	 * @return GetShowcaseItemMasterRequest
	 */
	public function withResourceId($resourceId): GetShowcaseItemMasterRequest {
		$this->setResourceId($resourceId);
		return $this;
	}

}