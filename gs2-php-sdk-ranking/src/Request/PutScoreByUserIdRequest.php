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
 * ユーザーIDを指定してスコアを登録 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PutScoreByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定してスコアを登録
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してスコアを登録
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してスコアを登録
     * @return PutScoreByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): PutScoreByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリ名 */
    private $categoryName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null ユーザーIDを指定してスコアを登録
     */
    public function getCategoryName(): ?string {
        return $this->categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName ユーザーIDを指定してスコアを登録
     */
    public function setCategoryName(string $categoryName) {
        $this->categoryName = $categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName ユーザーIDを指定してスコアを登録
     * @return PutScoreByUserIdRequest $this
     */
    public function withCategoryName(string $categoryName): PutScoreByUserIdRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

    /** @var string ユーザID */
    private $userId;

    /**
     * ユーザIDを取得
     *
     * @return string|null ユーザーIDを指定してスコアを登録
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザIDを設定
     *
     * @param string $userId ユーザーIDを指定してスコアを登録
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザIDを設定
     *
     * @param string $userId ユーザーIDを指定してスコアを登録
     * @return PutScoreByUserIdRequest $this
     */
    public function withUserId(string $userId): PutScoreByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int スコア */
    private $score;

    /**
     * スコアを取得
     *
     * @return int|null ユーザーIDを指定してスコアを登録
     */
    public function getScore(): ?int {
        return $this->score;
    }

    /**
     * スコアを設定
     *
     * @param int $score ユーザーIDを指定してスコアを登録
     */
    public function setScore(int $score) {
        $this->score = $score;
    }

    /**
     * スコアを設定
     *
     * @param int $score ユーザーIDを指定してスコアを登録
     * @return PutScoreByUserIdRequest $this
     */
    public function withScore(int $score): PutScoreByUserIdRequest {
        $this->setScore($score);
        return $this;
    }

    /** @var string メタデータ */
    private $metadata;

    /**
     * メタデータを取得
     *
     * @return string|null ユーザーIDを指定してスコアを登録
     */
    public function getMetadata(): ?string {
        return $this->metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ユーザーIDを指定してスコアを登録
     */
    public function setMetadata(string $metadata) {
        $this->metadata = $metadata;
    }

    /**
     * メタデータを設定
     *
     * @param string $metadata ユーザーIDを指定してスコアを登録
     * @return PutScoreByUserIdRequest $this
     */
    public function withMetadata(string $metadata): PutScoreByUserIdRequest {
        $this->setMetadata($metadata);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してスコアを登録
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してスコアを登録
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してスコアを登録
     * @return PutScoreByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): PutScoreByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}