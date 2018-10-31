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
class CreateShowcaseItemMasterRequest extends Gs2BasicRequest {

    const FUNCTION = "CreateShowcaseItemMaster";

	/** @var string ショーケースの名前 */
	private $showcaseName;

	/** @var string 商品の種類 */
	private $category;

	/** @var string 商品名 */
	private $itemName;

	/** @var string グループ名 */
	private $itemGroupName;

	/** @var string 公開判定の種類 */
	private $releaseConditionType;

	/** @var string 公開許可判定 に実行されるGS2-Schedule */
	private $releaseConditionScheduleName;

	/** @var string 公開許可判定 に実行されるGS2-Schedule のイベント名 */
	private $releaseConditionScheduleEventName;

	/** @var int 応答順序優先度 */
	private $priority;


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
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withShowcaseName($showcaseName): CreateShowcaseItemMasterRequest {
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
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withCategory($category): CreateShowcaseItemMasterRequest {
		$this->setCategory($category);
		return $this;
	}

	/**
	 * 商品名を取得
	 *
	 * @return string 商品名
	 */
	public function getItemName() {
		return $this->itemName;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string $itemName 商品名
	 */
	public function setItemName($itemName) {
		$this->itemName = $itemName;
	}

	/**
	 * 商品名を設定
	 *
	 * @param string $itemName 商品名
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withItemName($itemName): CreateShowcaseItemMasterRequest {
		$this->setItemName($itemName);
		return $this;
	}

	/**
	 * グループ名を取得
	 *
	 * @return string グループ名
	 */
	public function getItemGroupName() {
		return $this->itemGroupName;
	}

	/**
	 * グループ名を設定
	 *
	 * @param string $itemGroupName グループ名
	 */
	public function setItemGroupName($itemGroupName) {
		$this->itemGroupName = $itemGroupName;
	}

	/**
	 * グループ名を設定
	 *
	 * @param string $itemGroupName グループ名
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withItemGroupName($itemGroupName): CreateShowcaseItemMasterRequest {
		$this->setItemGroupName($itemGroupName);
		return $this;
	}

	/**
	 * 公開判定の種類を取得
	 *
	 * @return string 公開判定の種類
	 */
	public function getReleaseConditionType() {
		return $this->releaseConditionType;
	}

	/**
	 * 公開判定の種類を設定
	 *
	 * @param string $releaseConditionType 公開判定の種類
	 */
	public function setReleaseConditionType($releaseConditionType) {
		$this->releaseConditionType = $releaseConditionType;
	}

	/**
	 * 公開判定の種類を設定
	 *
	 * @param string $releaseConditionType 公開判定の種類
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withReleaseConditionType($releaseConditionType): CreateShowcaseItemMasterRequest {
		$this->setReleaseConditionType($releaseConditionType);
		return $this;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Scheduleを取得
	 *
	 * @return string 公開許可判定 に実行されるGS2-Schedule
	 */
	public function getReleaseConditionScheduleName() {
		return $this->releaseConditionScheduleName;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Scheduleを設定
	 *
	 * @param string $releaseConditionScheduleName 公開許可判定 に実行されるGS2-Schedule
	 */
	public function setReleaseConditionScheduleName($releaseConditionScheduleName) {
		$this->releaseConditionScheduleName = $releaseConditionScheduleName;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Scheduleを設定
	 *
	 * @param string $releaseConditionScheduleName 公開許可判定 に実行されるGS2-Schedule
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withReleaseConditionScheduleName($releaseConditionScheduleName): CreateShowcaseItemMasterRequest {
		$this->setReleaseConditionScheduleName($releaseConditionScheduleName);
		return $this;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Schedule のイベント名を取得
	 *
	 * @return string 公開許可判定 に実行されるGS2-Schedule のイベント名
	 */
	public function getReleaseConditionScheduleEventName() {
		return $this->releaseConditionScheduleEventName;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Schedule のイベント名を設定
	 *
	 * @param string $releaseConditionScheduleEventName 公開許可判定 に実行されるGS2-Schedule のイベント名
	 */
	public function setReleaseConditionScheduleEventName($releaseConditionScheduleEventName) {
		$this->releaseConditionScheduleEventName = $releaseConditionScheduleEventName;
	}

	/**
	 * 公開許可判定 に実行されるGS2-Schedule のイベント名を設定
	 *
	 * @param string $releaseConditionScheduleEventName 公開許可判定 に実行されるGS2-Schedule のイベント名
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withReleaseConditionScheduleEventName($releaseConditionScheduleEventName): CreateShowcaseItemMasterRequest {
		$this->setReleaseConditionScheduleEventName($releaseConditionScheduleEventName);
		return $this;
	}

	/**
	 * 応答順序優先度を取得
	 *
	 * @return int 応答順序優先度
	 */
	public function getPriority() {
		return $this->priority;
	}

	/**
	 * 応答順序優先度を設定
	 *
	 * @param int $priority 応答順序優先度
	 */
	public function setPriority($priority) {
		$this->priority = $priority;
	}

	/**
	 * 応答順序優先度を設定
	 *
	 * @param int $priority 応答順序優先度
	 * @return CreateShowcaseItemMasterRequest
	 */
	public function withPriority($priority): CreateShowcaseItemMasterRequest {
		$this->setPriority($priority);
		return $this;
	}

}