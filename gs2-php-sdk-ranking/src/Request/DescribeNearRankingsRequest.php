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
 * 指定したスコア付近のランキングを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DescribeNearRankingsRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 指定したスコア付近のランキングを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 指定したスコア付近のランキングを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 指定したスコア付近のランキングを取得
     * @return DescribeNearRankingsRequest $this
     */
    public function withNamespaceName(string $namespaceName): DescribeNearRankingsRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリ名 */
    private $categoryName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null 指定したスコア付近のランキングを取得
     */
    public function getCategoryName(): ?string {
        return $this->categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName 指定したスコア付近のランキングを取得
     */
    public function setCategoryName(string $categoryName) {
        $this->categoryName = $categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName 指定したスコア付近のランキングを取得
     * @return DescribeNearRankingsRequest $this
     */
    public function withCategoryName(string $categoryName): DescribeNearRankingsRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

    /** @var int スコア */
    private $score;

    /**
     * スコアを取得
     *
     * @return int|null 指定したスコア付近のランキングを取得
     */
    public function getScore(): ?int {
        return $this->score;
    }

    /**
     * スコアを設定
     *
     * @param int $score 指定したスコア付近のランキングを取得
     */
    public function setScore(int $score) {
        $this->score = $score;
    }

    /**
     * スコアを設定
     *
     * @param int $score 指定したスコア付近のランキングを取得
     * @return DescribeNearRankingsRequest $this
     */
    public function withScore(int $score): DescribeNearRankingsRequest {
        $this->setScore($score);
        return $this;
    }

}