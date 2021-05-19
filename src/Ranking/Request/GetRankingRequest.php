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
 * ランキングを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetRankingRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ランキングを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランキングを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ランキングを取得
     * @return GetRankingRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetRankingRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリ名 */
    private $categoryName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null ランキングを取得
     */
    public function getCategoryName(): ?string {
        return $this->categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName ランキングを取得
     */
    public function setCategoryName(string $categoryName = null) {
        $this->categoryName = $categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName ランキングを取得
     * @return GetRankingRequest $this
     */
    public function withCategoryName(string $categoryName = null): GetRankingRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

    /** @var string スコアを獲得したユーザID */
    private $scorerUserId;

    /**
     * スコアを獲得したユーザIDを取得
     *
     * @return string|null ランキングを取得
     */
    public function getScorerUserId(): ?string {
        return $this->scorerUserId;
    }

    /**
     * スコアを獲得したユーザIDを設定
     *
     * @param string $scorerUserId ランキングを取得
     */
    public function setScorerUserId(string $scorerUserId = null) {
        $this->scorerUserId = $scorerUserId;
    }

    /**
     * スコアを獲得したユーザIDを設定
     *
     * @param string $scorerUserId ランキングを取得
     * @return GetRankingRequest $this
     */
    public function withScorerUserId(string $scorerUserId = null): GetRankingRequest {
        $this->setScorerUserId($scorerUserId);
        return $this;
    }

    /** @var string スコアのユニークID */
    private $uniqueId;

    /**
     * スコアのユニークIDを取得
     *
     * @return string|null ランキングを取得
     */
    public function getUniqueId(): ?string {
        return $this->uniqueId;
    }

    /**
     * スコアのユニークIDを設定
     *
     * @param string $uniqueId ランキングを取得
     */
    public function setUniqueId(string $uniqueId = null) {
        $this->uniqueId = $uniqueId;
    }

    /**
     * スコアのユニークIDを設定
     *
     * @param string $uniqueId ランキングを取得
     * @return GetRankingRequest $this
     */
    public function withUniqueId(string $uniqueId = null): GetRankingRequest {
        $this->setUniqueId($uniqueId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ランキングを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ランキングを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ランキングを取得
     * @return GetRankingRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetRankingRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

    /** @var string アクセストークン */
    private $accessToken;

    /**
     * アクセストークンを取得
     *
     * @return string アクセストークン
     */
    public function getAccessToken(): string {
        return $this->accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     */
    public function setAccessToken(string $accessToken) {
        $this->accessToken = $accessToken;
    }

    /**
     * アクセストークンを設定
     *
     * @param string $accessToken アクセストークン
     * @return GetRankingRequest this
     */
    public function withAccessToken(string $accessToken): GetRankingRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}