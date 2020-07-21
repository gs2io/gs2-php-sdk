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
 *
 * deny overwrite
 */

namespace Gs2\Ranking\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * ランキングを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeRankingsRequest extends Gs2BasicRequest {

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
     * @return DescribeRankingsRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): DescribeRankingsRequest {
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
     * @return DescribeRankingsRequest $this
     */
    public function withCategoryName(string $categoryName = null): DescribeRankingsRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

    /** @var int ランキングの取得を開始するインデックス */
    private $startIndex;

    /**
     * ランキングの取得を開始するインデックスを取得
     *
     * @return int|null ランキングを取得
     */
    public function getStartIndex(): ?int {
        return $this->startIndex;
    }

    /**
     * ランキングの取得を開始するインデックスを設定
     *
     * @param int $startIndex ランキングを取得
     */
    public function setStartIndex(int $startIndex = null) {
        $this->startIndex = $startIndex;
    }

    /**
     * ランキングの取得を開始するインデックスを設定
     *
     * @param int $startIndex ランキングを取得
     * @return DescribeRankingsRequest $this
     */
    public function withStartIndex(int $startIndex = null): DescribeRankingsRequest {
        $this->setStartIndex($startIndex);
        return $this;
    }

    /** @var string データの取得を開始する位置を指定するトークン */
    private $pageToken;

    /**
     * データの取得を開始する位置を指定するトークンを取得
     *
     * @return string|null ランキングを取得
     */
    public function getPageToken(): ?string {
        return $this->pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken ランキングを取得
     */
    public function setPageToken(string $pageToken = null) {
        $this->pageToken = $pageToken;
    }

    /**
     * データの取得を開始する位置を指定するトークンを設定
     *
     * @param string $pageToken ランキングを取得
     * @return DescribeRankingsRequest $this
     */
    public function withPageToken(string $pageToken = null): DescribeRankingsRequest {
        $this->setPageToken($pageToken);
        return $this;
    }

    /** @var int データの取得件数 */
    private $limit;

    /**
     * データの取得件数を取得
     *
     * @return int|null ランキングを取得
     */
    public function getLimit(): ?int {
        return $this->limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit ランキングを取得
     */
    public function setLimit(int $limit = null) {
        $this->limit = $limit;
    }

    /**
     * データの取得件数を設定
     *
     * @param int $limit ランキングを取得
     * @return DescribeRankingsRequest $this
     */
    public function withLimit(int $limit = null): DescribeRankingsRequest {
        $this->setLimit($limit);
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
     * @return DescribeRankingsRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): DescribeRankingsRequest {
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
    public function getAccessToken(): ?string {
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
     * @return DescribeRankingsRequest this
     */
    public function withAccessToken(string $accessToken): DescribeRankingsRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}