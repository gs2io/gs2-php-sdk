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

namespace Gs2\Showcase\Model;

/**
 * 陳列商品
 *
 * @author Game Server Services, Inc.
 *
 */
class ShowcaseItemMaster {

	/** @var string 陳列商品GRN */
	private $showcaseItemId;

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

	/** @var int 作成日時(エポック秒) */
	private $createAt;

	/** @var int 最終更新日時(エポック秒) */
	private $updateAt;

	/**
	 * 陳列商品GRNを取得
	 *
	 * @return string 陳列商品GRN
	 */
	public function getShowcaseItemId() {
		return $this->showcaseItemId;
	}

	/**
	 * 陳列商品GRNを設定
	 *
	 * @param string $showcaseItemId 陳列商品GRN
	 */
	public function setShowcaseItemId($showcaseItemId) {
		$this->showcaseItemId = $showcaseItemId;
	}

	/**
	 * 陳列商品GRNを設定
	 *
	 * @param string $showcaseItemId 陳列商品GRN
	 * @return self
	 */
	public function withShowcaseItemId($showcaseItemId): self {
		$this->setShowcaseItemId($showcaseItemId);
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
	 * @return self
	 */
	public function withCategory($category): self {
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
	 * @return self
	 */
	public function withItemName($itemName): self {
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
	 * @return self
	 */
	public function withItemGroupName($itemGroupName): self {
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
	 * @return self
	 */
	public function withReleaseConditionType($releaseConditionType): self {
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
	 * @return self
	 */
	public function withReleaseConditionScheduleName($releaseConditionScheduleName): self {
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
	 * @return self
	 */
	public function withReleaseConditionScheduleEventName($releaseConditionScheduleEventName): self {
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
	 * @return self
	 */
	public function withPriority($priority): self {
		$this->setPriority($priority);
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
	 * @return ShowcaseItemMaster
	 */
    static function build(array $array)
    {
        $item = new ShowcaseItemMaster();
        $item->setShowcaseItemId(isset($array['showcaseItemId']) ? $array['showcaseItemId'] : null);
        $item->setCategory(isset($array['category']) ? $array['category'] : null);
        $item->setItemName(isset($array['itemName']) ? $array['itemName'] : null);
        $item->setItemGroupName(isset($array['itemGroupName']) ? $array['itemGroupName'] : null);
        $item->setReleaseConditionType(isset($array['releaseConditionType']) ? $array['releaseConditionType'] : null);
        $item->setReleaseConditionScheduleName(isset($array['releaseConditionScheduleName']) ? $array['releaseConditionScheduleName'] : null);
        $item->setReleaseConditionScheduleEventName(isset($array['releaseConditionScheduleEventName']) ? $array['releaseConditionScheduleEventName'] : null);
        $item->setPriority(isset($array['priority']) ? $array['priority'] : null);
        $item->setCreateAt(isset($array['createAt']) ? $array['createAt'] : null);
        $item->setUpdateAt(isset($array['updateAt']) ? $array['updateAt'] : null);
        return $item;
    }

}