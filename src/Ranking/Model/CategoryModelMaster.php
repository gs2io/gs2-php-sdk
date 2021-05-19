<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
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

namespace Gs2\Ranking\Model;

use Gs2\Core\Model\IModel;

/**
 * カテゴリマスター
 *
 * @author Game Server Services, Inc.
 *
 */
class CategoryModelMaster implements IModel {
	/**
     * @var string カテゴリマスター
	 */
	protected $categoryModelId;

	/**
	 * カテゴリマスターを取得
	 *
	 * @return string|null カテゴリマスター
	 */
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}

	/**
	 * カテゴリマスターを設定
	 *
	 * @param string|null $categoryModelId カテゴリマスター
	 */
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}

	/**
	 * カテゴリマスターを設定
	 *
	 * @param string|null $categoryModelId カテゴリマスター
	 * @return CategoryModelMaster $this
	 */
	public function withCategoryModelId(?string $categoryModelId): CategoryModelMaster {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
	/**
     * @var string カテゴリモデル名
	 */
	protected $name;

	/**
	 * カテゴリモデル名を取得
	 *
	 * @return string|null カテゴリモデル名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * カテゴリモデル名を設定
	 *
	 * @param string|null $name カテゴリモデル名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * カテゴリモデル名を設定
	 *
	 * @param string|null $name カテゴリモデル名
	 * @return CategoryModelMaster $this
	 */
	public function withName(?string $name): CategoryModelMaster {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string カテゴリマスターの説明
	 */
	protected $description;

	/**
	 * カテゴリマスターの説明を取得
	 *
	 * @return string|null カテゴリマスターの説明
	 */
	public function getDescription(): ?string {
		return $this->description;
	}

	/**
	 * カテゴリマスターの説明を設定
	 *
	 * @param string|null $description カテゴリマスターの説明
	 */
	public function setDescription(?string $description) {
		$this->description = $description;
	}

	/**
	 * カテゴリマスターの説明を設定
	 *
	 * @param string|null $description カテゴリマスターの説明
	 * @return CategoryModelMaster $this
	 */
	public function withDescription(?string $description): CategoryModelMaster {
		$this->description = $description;
		return $this;
	}
	/**
     * @var string カテゴリマスターのメタデータ
	 */
	protected $metadata;

	/**
	 * カテゴリマスターのメタデータを取得
	 *
	 * @return string|null カテゴリマスターのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * カテゴリマスターのメタデータを設定
	 *
	 * @param string|null $metadata カテゴリマスターのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * カテゴリマスターのメタデータを設定
	 *
	 * @param string|null $metadata カテゴリマスターのメタデータ
	 * @return CategoryModelMaster $this
	 */
	public function withMetadata(?string $metadata): CategoryModelMaster {
		$this->metadata = $metadata;
		return $this;
	}
	/**
     * @var int スコアの最小値
	 */
	protected $minimumValue;

	/**
	 * スコアの最小値を取得
	 *
	 * @return int|null スコアの最小値
	 */
	public function getMinimumValue(): ?int {
		return $this->minimumValue;
	}

	/**
	 * スコアの最小値を設定
	 *
	 * @param int|null $minimumValue スコアの最小値
	 */
	public function setMinimumValue(?int $minimumValue) {
		$this->minimumValue = $minimumValue;
	}

	/**
	 * スコアの最小値を設定
	 *
	 * @param int|null $minimumValue スコアの最小値
	 * @return CategoryModelMaster $this
	 */
	public function withMinimumValue(?int $minimumValue): CategoryModelMaster {
		$this->minimumValue = $minimumValue;
		return $this;
	}
	/**
     * @var int スコアの最大値
	 */
	protected $maximumValue;

	/**
	 * スコアの最大値を取得
	 *
	 * @return int|null スコアの最大値
	 */
	public function getMaximumValue(): ?int {
		return $this->maximumValue;
	}

	/**
	 * スコアの最大値を設定
	 *
	 * @param int|null $maximumValue スコアの最大値
	 */
	public function setMaximumValue(?int $maximumValue) {
		$this->maximumValue = $maximumValue;
	}

	/**
	 * スコアの最大値を設定
	 *
	 * @param int|null $maximumValue スコアの最大値
	 * @return CategoryModelMaster $this
	 */
	public function withMaximumValue(?int $maximumValue): CategoryModelMaster {
		$this->maximumValue = $maximumValue;
		return $this;
	}
	/**
     * @var string スコアのソート方向
	 */
	protected $orderDirection;

	/**
	 * スコアのソート方向を取得
	 *
	 * @return string|null スコアのソート方向
	 */
	public function getOrderDirection(): ?string {
		return $this->orderDirection;
	}

	/**
	 * スコアのソート方向を設定
	 *
	 * @param string|null $orderDirection スコアのソート方向
	 */
	public function setOrderDirection(?string $orderDirection) {
		$this->orderDirection = $orderDirection;
	}

	/**
	 * スコアのソート方向を設定
	 *
	 * @param string|null $orderDirection スコアのソート方向
	 * @return CategoryModelMaster $this
	 */
	public function withOrderDirection(?string $orderDirection): CategoryModelMaster {
		$this->orderDirection = $orderDirection;
		return $this;
	}
	/**
     * @var string ランキングの種類
	 */
	protected $scope;

	/**
	 * ランキングの種類を取得
	 *
	 * @return string|null ランキングの種類
	 */
	public function getScope(): ?string {
		return $this->scope;
	}

	/**
	 * ランキングの種類を設定
	 *
	 * @param string|null $scope ランキングの種類
	 */
	public function setScope(?string $scope) {
		$this->scope = $scope;
	}

	/**
	 * ランキングの種類を設定
	 *
	 * @param string|null $scope ランキングの種類
	 * @return CategoryModelMaster $this
	 */
	public function withScope(?string $scope): CategoryModelMaster {
		$this->scope = $scope;
		return $this;
	}
	/**
     * @var bool ユーザID毎にスコアを1つしか登録されないようにする
	 */
	protected $uniqueByUserId;

	/**
	 * ユーザID毎にスコアを1つしか登録されないようにするを取得
	 *
	 * @return bool|null ユーザID毎にスコアを1つしか登録されないようにする
	 */
	public function getUniqueByUserId(): ?bool {
		return $this->uniqueByUserId;
	}

	/**
	 * ユーザID毎にスコアを1つしか登録されないようにするを設定
	 *
	 * @param bool|null $uniqueByUserId ユーザID毎にスコアを1つしか登録されないようにする
	 */
	public function setUniqueByUserId(?bool $uniqueByUserId) {
		$this->uniqueByUserId = $uniqueByUserId;
	}

	/**
	 * ユーザID毎にスコアを1つしか登録されないようにするを設定
	 *
	 * @param bool|null $uniqueByUserId ユーザID毎にスコアを1つしか登録されないようにする
	 * @return CategoryModelMaster $this
	 */
	public function withUniqueByUserId(?bool $uniqueByUserId): CategoryModelMaster {
		$this->uniqueByUserId = $uniqueByUserId;
		return $this;
	}
	/**
     * @var int スコアの固定集計開始時刻(時)
	 */
	protected $calculateFixedTimingHour;

	/**
	 * スコアの固定集計開始時刻(時)を取得
	 *
	 * @return int|null スコアの固定集計開始時刻(時)
	 */
	public function getCalculateFixedTimingHour(): ?int {
		return $this->calculateFixedTimingHour;
	}

	/**
	 * スコアの固定集計開始時刻(時)を設定
	 *
	 * @param int|null $calculateFixedTimingHour スコアの固定集計開始時刻(時)
	 */
	public function setCalculateFixedTimingHour(?int $calculateFixedTimingHour) {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
	}

	/**
	 * スコアの固定集計開始時刻(時)を設定
	 *
	 * @param int|null $calculateFixedTimingHour スコアの固定集計開始時刻(時)
	 * @return CategoryModelMaster $this
	 */
	public function withCalculateFixedTimingHour(?int $calculateFixedTimingHour): CategoryModelMaster {
		$this->calculateFixedTimingHour = $calculateFixedTimingHour;
		return $this;
	}
	/**
     * @var int スコアの固定集計開始時刻(分)
	 */
	protected $calculateFixedTimingMinute;

	/**
	 * スコアの固定集計開始時刻(分)を取得
	 *
	 * @return int|null スコアの固定集計開始時刻(分)
	 */
	public function getCalculateFixedTimingMinute(): ?int {
		return $this->calculateFixedTimingMinute;
	}

	/**
	 * スコアの固定集計開始時刻(分)を設定
	 *
	 * @param int|null $calculateFixedTimingMinute スコアの固定集計開始時刻(分)
	 */
	public function setCalculateFixedTimingMinute(?int $calculateFixedTimingMinute) {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
	}

	/**
	 * スコアの固定集計開始時刻(分)を設定
	 *
	 * @param int|null $calculateFixedTimingMinute スコアの固定集計開始時刻(分)
	 * @return CategoryModelMaster $this
	 */
	public function withCalculateFixedTimingMinute(?int $calculateFixedTimingMinute): CategoryModelMaster {
		$this->calculateFixedTimingMinute = $calculateFixedTimingMinute;
		return $this;
	}
	/**
     * @var int スコアの集計間隔(分)
	 */
	protected $calculateIntervalMinutes;

	/**
	 * スコアの集計間隔(分)を取得
	 *
	 * @return int|null スコアの集計間隔(分)
	 */
	public function getCalculateIntervalMinutes(): ?int {
		return $this->calculateIntervalMinutes;
	}

	/**
	 * スコアの集計間隔(分)を設定
	 *
	 * @param int|null $calculateIntervalMinutes スコアの集計間隔(分)
	 */
	public function setCalculateIntervalMinutes(?int $calculateIntervalMinutes) {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
	}

	/**
	 * スコアの集計間隔(分)を設定
	 *
	 * @param int|null $calculateIntervalMinutes スコアの集計間隔(分)
	 * @return CategoryModelMaster $this
	 */
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): CategoryModelMaster {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}
	/**
     * @var string スコアの登録可能期間とするイベントマスター のGRN
	 */
	protected $entryPeriodEventId;

	/**
	 * スコアの登録可能期間とするイベントマスター のGRNを取得
	 *
	 * @return string|null スコアの登録可能期間とするイベントマスター のGRN
	 */
	public function getEntryPeriodEventId(): ?string {
		return $this->entryPeriodEventId;
	}

	/**
	 * スコアの登録可能期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $entryPeriodEventId スコアの登録可能期間とするイベントマスター のGRN
	 */
	public function setEntryPeriodEventId(?string $entryPeriodEventId) {
		$this->entryPeriodEventId = $entryPeriodEventId;
	}

	/**
	 * スコアの登録可能期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $entryPeriodEventId スコアの登録可能期間とするイベントマスター のGRN
	 * @return CategoryModelMaster $this
	 */
	public function withEntryPeriodEventId(?string $entryPeriodEventId): CategoryModelMaster {
		$this->entryPeriodEventId = $entryPeriodEventId;
		return $this;
	}
	/**
     * @var string アクセス可能期間とするイベントマスター のGRN
	 */
	protected $accessPeriodEventId;

	/**
	 * アクセス可能期間とするイベントマスター のGRNを取得
	 *
	 * @return string|null アクセス可能期間とするイベントマスター のGRN
	 */
	public function getAccessPeriodEventId(): ?string {
		return $this->accessPeriodEventId;
	}

	/**
	 * アクセス可能期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $accessPeriodEventId アクセス可能期間とするイベントマスター のGRN
	 */
	public function setAccessPeriodEventId(?string $accessPeriodEventId) {
		$this->accessPeriodEventId = $accessPeriodEventId;
	}

	/**
	 * アクセス可能期間とするイベントマスター のGRNを設定
	 *
	 * @param string|null $accessPeriodEventId アクセス可能期間とするイベントマスター のGRN
	 * @return CategoryModelMaster $this
	 */
	public function withAccessPeriodEventId(?string $accessPeriodEventId): CategoryModelMaster {
		$this->accessPeriodEventId = $accessPeriodEventId;
		return $this;
	}
	/**
     * @var string ランキングの世代
	 */
	protected $generation;

	/**
	 * ランキングの世代を取得
	 *
	 * @return string|null ランキングの世代
	 */
	public function getGeneration(): ?string {
		return $this->generation;
	}

	/**
	 * ランキングの世代を設定
	 *
	 * @param string|null $generation ランキングの世代
	 */
	public function setGeneration(?string $generation) {
		$this->generation = $generation;
	}

	/**
	 * ランキングの世代を設定
	 *
	 * @param string|null $generation ランキングの世代
	 * @return CategoryModelMaster $this
	 */
	public function withGeneration(?string $generation): CategoryModelMaster {
		$this->generation = $generation;
		return $this;
	}
	/**
     * @var int 作成日時
	 */
	protected $createdAt;

	/**
	 * 作成日時を取得
	 *
	 * @return int|null 作成日時
	 */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	/**
	 * 作成日時を設定
	 *
	 * @param int|null $createdAt 作成日時
	 * @return CategoryModelMaster $this
	 */
	public function withCreatedAt(?int $createdAt): CategoryModelMaster {
		$this->createdAt = $createdAt;
		return $this;
	}
	/**
     * @var int 最終更新日時
	 */
	protected $updatedAt;

	/**
	 * 最終更新日時を取得
	 *
	 * @return int|null 最終更新日時
	 */
	public function getUpdatedAt(): ?int {
		return $this->updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 */
	public function setUpdatedAt(?int $updatedAt) {
		$this->updatedAt = $updatedAt;
	}

	/**
	 * 最終更新日時を設定
	 *
	 * @param int|null $updatedAt 最終更新日時
	 * @return CategoryModelMaster $this
	 */
	public function withUpdatedAt(?int $updatedAt): CategoryModelMaster {
		$this->updatedAt = $updatedAt;
		return $this;
	}

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->categoryModelId,
            "name" => $this->name,
            "description" => $this->description,
            "metadata" => $this->metadata,
            "minimumValue" => $this->minimumValue,
            "maximumValue" => $this->maximumValue,
            "orderDirection" => $this->orderDirection,
            "scope" => $this->scope,
            "uniqueByUserId" => $this->uniqueByUserId,
            "calculateFixedTimingHour" => $this->calculateFixedTimingHour,
            "calculateFixedTimingMinute" => $this->calculateFixedTimingMinute,
            "calculateIntervalMinutes" => $this->calculateIntervalMinutes,
            "entryPeriodEventId" => $this->entryPeriodEventId,
            "accessPeriodEventId" => $this->accessPeriodEventId,
            "generation" => $this->generation,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
        );
    }

    public static function fromJson(array $data): CategoryModelMaster {
        $model = new CategoryModelMaster();
        $model->setCategoryModelId(isset($data["categoryModelId"]) ? $data["categoryModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setDescription(isset($data["description"]) ? $data["description"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setMinimumValue(isset($data["minimumValue"]) ? $data["minimumValue"] : null);
        $model->setMaximumValue(isset($data["maximumValue"]) ? $data["maximumValue"] : null);
        $model->setOrderDirection(isset($data["orderDirection"]) ? $data["orderDirection"] : null);
        $model->setScope(isset($data["scope"]) ? $data["scope"] : null);
        $model->setUniqueByUserId(isset($data["uniqueByUserId"]) ? $data["uniqueByUserId"] : null);
        $model->setCalculateFixedTimingHour(isset($data["calculateFixedTimingHour"]) ? $data["calculateFixedTimingHour"] : null);
        $model->setCalculateFixedTimingMinute(isset($data["calculateFixedTimingMinute"]) ? $data["calculateFixedTimingMinute"] : null);
        $model->setCalculateIntervalMinutes(isset($data["calculateIntervalMinutes"]) ? $data["calculateIntervalMinutes"] : null);
        $model->setEntryPeriodEventId(isset($data["entryPeriodEventId"]) ? $data["entryPeriodEventId"] : null);
        $model->setAccessPeriodEventId(isset($data["accessPeriodEventId"]) ? $data["accessPeriodEventId"] : null);
        $model->setGeneration(isset($data["generation"]) ? $data["generation"] : null);
        $model->setCreatedAt(isset($data["createdAt"]) ? $data["createdAt"] : null);
        $model->setUpdatedAt(isset($data["updatedAt"]) ? $data["updatedAt"] : null);
        return $model;
    }
}