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

namespace Gs2\Friend\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * アンフォロー のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UnfollowRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null アンフォロー
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アンフォロー
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName アンフォロー
     * @return UnfollowRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UnfollowRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォローされているユーザID */
    private $targetUserId;

    /**
     * フォローされているユーザIDを取得
     *
     * @return string|null アンフォロー
     */
    public function getTargetUserId(): ?string {
        return $this->targetUserId;
    }

    /**
     * フォローされているユーザIDを設定
     *
     * @param string $targetUserId アンフォロー
     */
    public function setTargetUserId(string $targetUserId = null) {
        $this->targetUserId = $targetUserId;
    }

    /**
     * フォローされているユーザIDを設定
     *
     * @param string $targetUserId アンフォロー
     * @return UnfollowRequest $this
     */
    public function withTargetUserId(string $targetUserId = null): UnfollowRequest {
        $this->setTargetUserId($targetUserId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null アンフォロー
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider アンフォロー
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider アンフォロー
     * @return UnfollowRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): UnfollowRequest {
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
     * @return UnfollowRequest this
     */
    public function withAccessToken(string $accessToken): UnfollowRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}