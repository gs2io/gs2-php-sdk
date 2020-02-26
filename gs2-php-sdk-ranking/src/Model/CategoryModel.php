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
 * カテゴリ
 *
 * @author Game Server Services, Inc.
 *
 */
class CategoryModel implements IModel {
	/**
     * @var string カテゴリ
	 */
	protected $categoryModelId;

	/**
	 * カテゴリを取得
	 *
	 * @return string|null カテゴリ
	 */
	public function getCategoryModelId(): ?string {
		return $this->categoryModelId;
	}

	/**
	 * カテゴリを設定
	 *
	 * @param string|null $categoryModelId カテゴリ
	 */
	public function setCategoryModelId(?string $categoryModelId) {
		$this->categoryModelId = $categoryModelId;
	}

	/**
	 * カテゴリを設定
	 *
	 * @param string|null $categoryModelId カテゴリ
	 * @return CategoryModel $this
	 */
	public function withCategoryModelId(?string $categoryModelId): CategoryModel {
		$this->categoryModelId = $categoryModelId;
		return $this;
	}
	/**
     * @var string カテゴリ名
	 */
	protected $name;

	/**
	 * カテゴリ名を取得
	 *
	 * @return string|null カテゴリ名
	 */
	public function getName(): ?string {
		return $this->name;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $name カテゴリ名
	 */
	public function setName(?string $name) {
		$this->name = $name;
	}

	/**
	 * カテゴリ名を設定
	 *
	 * @param string|null $name カテゴリ名
	 * @return CategoryModel $this
	 */
	public function withName(?string $name): CategoryModel {
		$this->name = $name;
		return $this;
	}
	/**
     * @var string カテゴリのメタデータ
	 */
	protected $metadata;

	/**
	 * カテゴリのメタデータを取得
	 *
	 * @return string|null カテゴリのメタデータ
	 */
	public function getMetadata(): ?string {
		return $this->metadata;
	}

	/**
	 * カテゴリのメタデータを設定
	 *
	 * @param string|null $metadata カテゴリのメタデータ
	 */
	public function setMetadata(?string $metadata) {
		$this->metadata = $metadata;
	}

	/**
	 * カテゴリのメタデータを設定
	 *
	 * @param string|null $metadata カテゴリのメタデータ
	 * @return CategoryModel $this
	 */
	public function withMetadata(?string $metadata): CategoryModel {
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
	 * @return CategoryModel $this
	 */
	public function withMinimumValue(?int $minimumValue): CategoryModel {
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
	 * @return CategoryModel $this
	 */
	public function withMaximumValue(?int $maximumValue): CategoryModel {
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
	 * @return CategoryModel $this
	 */
	public function withOrderDirection(?string $orderDirection): CategoryModel {
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
	 * @return CategoryModel $this
	 */
	public function withScope(?string $scope): CategoryModel {
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
	 * @return CategoryModel $this
	 */
	public function withUniqueByUserId(?bool $uniqueByUserId): CategoryModel {
		$this->uniqueByUserId = $uniqueByUserId;
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
	 * @return CategoryModel $this
	 */
	public function withCalculateIntervalMinutes(?int $calculateIntervalMinutes): CategoryModel {
		$this->calculateIntervalMinutes = $calculateIntervalMinutes;
		return $this;
	}

    public function toJson(): array {
        return array(
            "categoryModelId" => $this->categoryModelId,
            "name" => $this->name,
            "metadata" => $this->metadata,
            "minimumValue" => $this->minimumValue,
            "maximumValue" => $this->maximumValue,
            "orderDirection" => $this->orderDirection,
            "scope" => $this->scope,
            "uniqueByUserId" => $this->uniqueByUserId,
            "calculateIntervalMinutes" => $this->calculateIntervalMinutes,
        );
    }

    public static function fromJson(array $data): CategoryModel {
        $model = new CategoryModel();
        $model->setCategoryModelId(isset($data["categoryModelId"]) ? $data["categoryModelId"] : null);
        $model->setName(isset($data["name"]) ? $data["name"] : null);
        $model->setMetadata(isset($data["metadata"]) ? $data["metadata"] : null);
        $model->setMinimumValue(isset($data["minimumValue"]) ? $data["minimumValue"] : null);
        $model->setMaximumValue(isset($data["maximumValue"]) ? $data["maximumValue"] : null);
        $model->setOrderDirection(isset($data["orderDirection"]) ? $data["orderDirection"] : null);
        $model->setScope(isset($data["scope"]) ? $data["scope"] : null);
        $model->setUniqueByUserId(isset($data["uniqueByUserId"]) ? $data["uniqueByUserId"] : null);
        $model->setCalculateIntervalMinutes(isset($data["calculateIntervalMinutes"]) ? $data["calculateIntervalMinutes"] : null);
        return $model;
    }
}