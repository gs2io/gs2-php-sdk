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

namespace Gs2\Ranking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * カテゴリマスターを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateCategoryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カテゴリマスターを更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateCategoryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリモデル名 */
    private $categoryName;

    /**
     * カテゴリモデル名を取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getCategoryName(): ?string {
        return $this->categoryName;
    }

    /**
     * カテゴリモデル名を設定
     *
     * @param string $categoryName カテゴリマスターを更新
     */
    public function setCategoryName(string $categoryName = null) {
        $this->categoryName = $categoryName;
    }

    /**
     * カテゴリモデル名を設定
     *
     * @param string $categoryName カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withCategoryName(string $categoryName = null): UpdateCategoryModelMasterRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

    /** @var string カテゴリマスターの説明 */
    private $description;

    /**
     * カテゴリマスターの説明を取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * カテゴリマスターの説明を設定
     *
     * @param string $description カテゴリマスターを更新
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * カテゴリマスターの説明を設定
     *
     * @param string $description カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withDescription(string $description = null): UpdateCategoryModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string カテゴリマスターのメタデータ */
    private $metadata;

    /**
     * カテゴリマスターのメタデータを取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * カテゴリマスターのメタデータを設定
     *
     * @param string $metadata カテゴリマスターを更新
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * カテゴリマスターのメタデータを設定
     *
     * @param string $metadata カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): UpdateCategoryModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int スコアの最小値 */
    private $minimumValue;

    /**
     * スコアの最小値を取得
     *
     * @return int|null カテゴリマスターを更新
     */
    public function getMinimumValue(): ?int {
        return $this->minimumValue;
    }

    /**
     * スコアの最小値を設定
     *
     * @param int $minimumValue カテゴリマスターを更新
     */
    public function setMinimumValue(int $minimumValue = null) {
        $this->minimumValue = $minimumValue;
    }

    /**
     * スコアの最小値を設定
     *
     * @param int $minimumValue カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withMinimumValue(int $minimumValue = null): UpdateCategoryModelMasterRequest {
        $this->setMinimumValue($minimumValue);
        return $this;
    }

    /** @var int スコアの最大値 */
    private $maximumValue;

    /**
     * スコアの最大値を取得
     *
     * @return int|null カテゴリマスターを更新
     */
    public function getMaximumValue(): ?int {
        return $this->maximumValue;
    }

    /**
     * スコアの最大値を設定
     *
     * @param int $maximumValue カテゴリマスターを更新
     */
    public function setMaximumValue(int $maximumValue = null) {
        $this->maximumValue = $maximumValue;
    }

    /**
     * スコアの最大値を設定
     *
     * @param int $maximumValue カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withMaximumValue(int $maximumValue = null): UpdateCategoryModelMasterRequest {
        $this->setMaximumValue($maximumValue);
        return $this;
    }

    /** @var string スコアのソート方向 */
    private $orderDirection;

    /**
     * スコアのソート方向を取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getOrderDirection(): ?string {
        return $this->orderDirection;
    }

    /**
     * スコアのソート方向を設定
     *
     * @param string $orderDirection カテゴリマスターを更新
     */
    public function setOrderDirection(string $orderDirection = null) {
        $this->orderDirection = $orderDirection;
    }

    /**
     * スコアのソート方向を設定
     *
     * @param string $orderDirection カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withOrderDirection(string $orderDirection = null): UpdateCategoryModelMasterRequest {
        $this->setOrderDirection($orderDirection);
        return $this;
    }

    /** @var string ランキングの種類 */
    private $scope;

    /**
     * ランキングの種類を取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getScope(): ?string {
        return $this->scope;
    }

    /**
     * ランキングの種類を設定
     *
     * @param string $scope カテゴリマスターを更新
     */
    public function setScope(string $scope = null) {
        $this->scope = $scope;
    }

    /**
     * ランキングの種類を設定
     *
     * @param string $scope カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withScope(string $scope = null): UpdateCategoryModelMasterRequest {
        $this->setScope($scope);
        return $this;
    }

    /** @var bool ユーザID毎にスコアを1つしか登録されないようにする */
    private $uniqueByUserId;

    /**
     * ユーザID毎にスコアを1つしか登録されないようにするを取得
     *
     * @return bool|null カテゴリマスターを更新
     */
    public function getUniqueByUserId(): ?bool {
        return $this->uniqueByUserId;
    }

    /**
     * ユーザID毎にスコアを1つしか登録されないようにするを設定
     *
     * @param bool $uniqueByUserId カテゴリマスターを更新
     */
    public function setUniqueByUserId(bool $uniqueByUserId = null) {
        $this->uniqueByUserId = $uniqueByUserId;
    }

    /**
     * ユーザID毎にスコアを1つしか登録されないようにするを設定
     *
     * @param bool $uniqueByUserId カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withUniqueByUserId(bool $uniqueByUserId = null): UpdateCategoryModelMasterRequest {
        $this->setUniqueByUserId($uniqueByUserId);
        return $this;
    }

    /** @var int スコアの集計間隔(分) */
    private $calculateIntervalMinutes;

    /**
     * スコアの集計間隔(分)を取得
     *
     * @return int|null カテゴリマスターを更新
     */
    public function getCalculateIntervalMinutes(): ?int {
        return $this->calculateIntervalMinutes;
    }

    /**
     * スコアの集計間隔(分)を設定
     *
     * @param int $calculateIntervalMinutes カテゴリマスターを更新
     */
    public function setCalculateIntervalMinutes(int $calculateIntervalMinutes = null) {
        $this->calculateIntervalMinutes = $calculateIntervalMinutes;
    }

    /**
     * スコアの集計間隔(分)を設定
     *
     * @param int $calculateIntervalMinutes カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withCalculateIntervalMinutes(int $calculateIntervalMinutes = null): UpdateCategoryModelMasterRequest {
        $this->setCalculateIntervalMinutes($calculateIntervalMinutes);
        return $this;
    }

    /** @var string スコアの登録可能期間とするイベントマスター のGRN */
    private $entryPeriodEventId;

    /**
     * スコアの登録可能期間とするイベントマスター のGRNを取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getEntryPeriodEventId(): ?string {
        return $this->entryPeriodEventId;
    }

    /**
     * スコアの登録可能期間とするイベントマスター のGRNを設定
     *
     * @param string $entryPeriodEventId カテゴリマスターを更新
     */
    public function setEntryPeriodEventId(string $entryPeriodEventId = null) {
        $this->entryPeriodEventId = $entryPeriodEventId;
    }

    /**
     * スコアの登録可能期間とするイベントマスター のGRNを設定
     *
     * @param string $entryPeriodEventId カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withEntryPeriodEventId(string $entryPeriodEventId = null): UpdateCategoryModelMasterRequest {
        $this->setEntryPeriodEventId($entryPeriodEventId);
        return $this;
    }

    /** @var string アクセス可能期間とするイベントマスター のGRN */
    private $accessPeriodEventId;

    /**
     * アクセス可能期間とするイベントマスター のGRNを取得
     *
     * @return string|null カテゴリマスターを更新
     */
    public function getAccessPeriodEventId(): ?string {
        return $this->accessPeriodEventId;
    }

    /**
     * アクセス可能期間とするイベントマスター のGRNを設定
     *
     * @param string $accessPeriodEventId カテゴリマスターを更新
     */
    public function setAccessPeriodEventId(string $accessPeriodEventId = null) {
        $this->accessPeriodEventId = $accessPeriodEventId;
    }

    /**
     * アクセス可能期間とするイベントマスター のGRNを設定
     *
     * @param string $accessPeriodEventId カテゴリマスターを更新
     * @return UpdateCategoryModelMasterRequest $this
     */
    public function withAccessPeriodEventId(string $accessPeriodEventId = null): UpdateCategoryModelMasterRequest {
        $this->setAccessPeriodEventId($accessPeriodEventId);
        return $this;
    }

}