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
 * 購読を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetSubscribeRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 購読を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 購読を取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 購読を取得
     * @return GetSubscribeRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetSubscribeRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カテゴリ名 */
    private $categoryName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null 購読を取得
     */
    public function getCategoryName(): ?string {
        return $this->categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName 購読を取得
     */
    public function setCategoryName(string $categoryName = null) {
        $this->categoryName = $categoryName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $categoryName 購読を取得
     * @return GetSubscribeRequest $this
     */
    public function withCategoryName(string $categoryName = null): GetSubscribeRequest {
        $this->setCategoryName($categoryName);
        return $this;
    }

    /** @var string 購読されるユーザID */
    private $targetUserId;

    /**
     * 購読されるユーザIDを取得
     *
     * @return string|null 購読を取得
     */
    public function getTargetUserId(): ?string {
        return $this->targetUserId;
    }

    /**
     * 購読されるユーザIDを設定
     *
     * @param string $targetUserId 購読を取得
     */
    public function setTargetUserId(string $targetUserId = null) {
        $this->targetUserId = $targetUserId;
    }

    /**
     * 購読されるユーザIDを設定
     *
     * @param string $targetUserId 購読を取得
     * @return GetSubscribeRequest $this
     */
    public function withTargetUserId(string $targetUserId = null): GetSubscribeRequest {
        $this->setTargetUserId($targetUserId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 購読を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 購読を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 購読を取得
     * @return GetSubscribeRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetSubscribeRequest {
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
     * @return GetSubscribeRequest this
     */
    public function withAccessToken(string $accessToken): GetSubscribeRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}