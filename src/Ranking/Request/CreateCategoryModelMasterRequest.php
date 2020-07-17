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
 * カテゴリマスターを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateCategoryModelMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カテゴリマスターを新規作成
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateCategoryModelMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリモデル名 */
    private $name;

    /**
     * カテゴリモデル名を取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * カテゴリモデル名を設定
     *
     * @param string $name カテゴリマスターを新規作成
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * カテゴリモデル名を設定
     *
     * @param string $name カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withName(string $name = null): CreateCategoryModelMasterRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string カテゴリマスターの説明 */
    private $description;

    /**
     * カテゴリマスターの説明を取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * カテゴリマスターの説明を設定
     *
     * @param string $description カテゴリマスターを新規作成
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * カテゴリマスターの説明を設定
     *
     * @param string $description カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withDescription(string $description = null): CreateCategoryModelMasterRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string カテゴリマスターのメタデータ */
    private $metadata;

    /**
     * カテゴリマスターのメタデータを取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * カテゴリマスターのメタデータを設定
     *
     * @param string $metadata カテゴリマスターを新規作成
     */
    public function setMetadata(string $metadata = null) {
        $this->metadata = $metadata;
    }

    /**
     * カテゴリマスターのメタデータを設定
     *
     * @param string $metadata カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withMetadata(string $metadata = null): CreateCategoryModelMasterRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var int スコアの最小値 */
    private $minimumValue;

    /**
     * スコアの最小値を取得
     *
     * @return int|null カテゴリマスターを新規作成
     */
    public function getMinimumValue(): ?int {
        return $this->minimumValue;
    }

    /**
     * スコアの最小値を設定
     *
     * @param int $minimumValue カテゴリマスターを新規作成
     */
    public function setMinimumValue(int $minimumValue = null) {
        $this->minimumValue = $minimumValue;
    }

    /**
     * スコアの最小値を設定
     *
     * @param int $minimumValue カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withMinimumValue(int $minimumValue = null): CreateCategoryModelMasterRequest {
        $this->setMinimumValue($minimumValue);
        return $this;
    }

    /** @var int スコアの最大値 */
    private $maximumValue;

    /**
     * スコアの最大値を取得
     *
     * @return int|null カテゴリマスターを新規作成
     */
    public function getMaximumValue(): ?int {
        return $this->maximumValue;
    }

    /**
     * スコアの最大値を設定
     *
     * @param int $maximumValue カテゴリマスターを新規作成
     */
    public function setMaximumValue(int $maximumValue = null) {
        $this->maximumValue = $maximumValue;
    }

    /**
     * スコアの最大値を設定
     *
     * @param int $maximumValue カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withMaximumValue(int $maximumValue = null): CreateCategoryModelMasterRequest {
        $this->setMaximumValue($maximumValue);
        return $this;
    }

    /** @var string スコアのソート方向 */
    private $orderDirection;

    /**
     * スコアのソート方向を取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getOrderDirection(): ?string {
        return $this->orderDirection;
    }

    /**
     * スコアのソート方向を設定
     *
     * @param string $orderDirection カテゴリマスターを新規作成
     */
    public function setOrderDirection(string $orderDirection = null) {
        $this->orderDirection = $orderDirection;
    }

    /**
     * スコアのソート方向を設定
     *
     * @param string $orderDirection カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withOrderDirection(string $orderDirection = null): CreateCategoryModelMasterRequest {
        $this->setOrderDirection($orderDirection);
        return $this;
    }

    /** @var string ランキングの種類 */
    private $scope;

    /**
     * ランキングの種類を取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getScope(): ?string {
        return $this->scope;
    }

    /**
     * ランキングの種類を設定
     *
     * @param string $scope カテゴリマスターを新規作成
     */
    public function setScope(string $scope = null) {
        $this->scope = $scope;
    }

    /**
     * ランキングの種類を設定
     *
     * @param string $scope カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withScope(string $scope = null): CreateCategoryModelMasterRequest {
        $this->setScope($scope);
        return $this;
    }

    /** @var bool ユーザID毎にスコアを1つしか登録されないようにする */
    private $uniqueByUserId;

    /**
     * ユーザID毎にスコアを1つしか登録されないようにするを取得
     *
     * @return bool|null カテゴリマスターを新規作成
     */
    public function getUniqueByUserId(): ?bool {
        return $this->uniqueByUserId;
    }

    /**
     * ユーザID毎にスコアを1つしか登録されないようにするを設定
     *
     * @param bool $uniqueByUserId カテゴリマスターを新規作成
     */
    public function setUniqueByUserId(bool $uniqueByUserId = null) {
        $this->uniqueByUserId = $uniqueByUserId;
    }

    /**
     * ユーザID毎にスコアを1つしか登録されないようにするを設定
     *
     * @param bool $uniqueByUserId カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withUniqueByUserId(bool $uniqueByUserId = null): CreateCategoryModelMasterRequest {
        $this->setUniqueByUserId($uniqueByUserId);
        return $this;
    }

    /** @var int スコアの集計間隔(分) */
    private $calculateIntervalMinutes;

    /**
     * スコアの集計間隔(分)を取得
     *
     * @return int|null カテゴリマスターを新規作成
     */
    public function getCalculateIntervalMinutes(): ?int {
        return $this->calculateIntervalMinutes;
    }

    /**
     * スコアの集計間隔(分)を設定
     *
     * @param int $calculateIntervalMinutes カテゴリマスターを新規作成
     */
    public function setCalculateIntervalMinutes(int $calculateIntervalMinutes = null) {
        $this->calculateIntervalMinutes = $calculateIntervalMinutes;
    }

    /**
     * スコアの集計間隔(分)を設定
     *
     * @param int $calculateIntervalMinutes カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withCalculateIntervalMinutes(int $calculateIntervalMinutes = null): CreateCategoryModelMasterRequest {
        $this->setCalculateIntervalMinutes($calculateIntervalMinutes);
        return $this;
    }

    /** @var string スコアの登録可能期間とするイベントマスター のGRN */
    private $entryPeriodEventId;

    /**
     * スコアの登録可能期間とするイベントマスター のGRNを取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getEntryPeriodEventId(): ?string {
        return $this->entryPeriodEventId;
    }

    /**
     * スコアの登録可能期間とするイベントマスター のGRNを設定
     *
     * @param string $entryPeriodEventId カテゴリマスターを新規作成
     */
    public function setEntryPeriodEventId(string $entryPeriodEventId = null) {
        $this->entryPeriodEventId = $entryPeriodEventId;
    }

    /**
     * スコアの登録可能期間とするイベントマスター のGRNを設定
     *
     * @param string $entryPeriodEventId カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withEntryPeriodEventId(string $entryPeriodEventId = null): CreateCategoryModelMasterRequest {
        $this->setEntryPeriodEventId($entryPeriodEventId);
        return $this;
    }

    /** @var string アクセス可能期間とするイベントマスター のGRN */
    private $accessPeriodEventId;

    /**
     * アクセス可能期間とするイベントマスター のGRNを取得
     *
     * @return string|null カテゴリマスターを新規作成
     */
    public function getAccessPeriodEventId(): ?string {
        return $this->accessPeriodEventId;
    }

    /**
     * アクセス可能期間とするイベントマスター のGRNを設定
     *
     * @param string $accessPeriodEventId カテゴリマスターを新規作成
     */
    public function setAccessPeriodEventId(string $accessPeriodEventId = null) {
        $this->accessPeriodEventId = $accessPeriodEventId;
    }

    /**
     * アクセス可能期間とするイベントマスター のGRNを設定
     *
     * @param string $accessPeriodEventId カテゴリマスターを新規作成
     * @return CreateCategoryModelMasterRequest $this
     */
    public function withAccessPeriodEventId(string $accessPeriodEventId = null): CreateCategoryModelMasterRequest {
        $this->setAccessPeriodEventId($accessPeriodEventId);
        return $this;
    }

}