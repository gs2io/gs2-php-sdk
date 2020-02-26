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
 * ユーザIDを指定して購読の購読を解除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UnsubscribeByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定して購読の購読を解除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して購読の購読を解除
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定して購読の購読を解除
     * @return UnsubscribeByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): UnsubscribeByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリ名 */
    private $categoryName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null ユーザIDを指定して購読の購読を解除
     */
    public function getCategoryName(): ?string {
        return $this->categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName ユーザIDを指定して購読の購読を解除
     */
    public function setCategoryName(string $categoryName) {
        $this->categoryName = $categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName ユーザIDを指定して購読の購読を解除
     * @return UnsubscribeByUserIdRequest $this
     */
    public function withCategoryName(string $categoryName): UnsubscribeByUserIdRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

    /** @var string 購読するユーザID */
    private $userId;

    /**
     * 購読するユーザIDを取得
     *
     * @return string|null ユーザIDを指定して購読の購読を解除
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * 購読するユーザIDを設定
     *
     * @param string $userId ユーザIDを指定して購読の購読を解除
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * 購読するユーザIDを設定
     *
     * @param string $userId ユーザIDを指定して購読の購読を解除
     * @return UnsubscribeByUserIdRequest $this
     */
    public function withUserId(string $userId): UnsubscribeByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 購読されるユーザID */
    private $targetUserId;

    /**
     * 購読されるユーザIDを取得
     *
     * @return string|null ユーザIDを指定して購読の購読を解除
     */
    public function getTargetUserId(): ?string {
        return $this->targetUserId;
    }

    /**
     * 購読されるユーザIDを設定
     *
     * @param string $targetUserId ユーザIDを指定して購読の購読を解除
     */
    public function setTargetUserId(string $targetUserId) {
        $this->targetUserId = $targetUserId;
    }

    /**
     * 購読されるユーザIDを設定
     *
     * @param string $targetUserId ユーザIDを指定して購読の購読を解除
     * @return UnsubscribeByUserIdRequest $this
     */
    public function withTargetUserId(string $targetUserId): UnsubscribeByUserIdRequest {
        $this->setTargetUserId($targetUserId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定して購読の購読を解除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して購読の購読を解除
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定して購読の購読を解除
     * @return UnsubscribeByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): UnsubscribeByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}