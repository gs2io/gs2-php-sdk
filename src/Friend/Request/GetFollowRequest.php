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
 * フォローを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetFollowRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null フォローを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォローを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName フォローを取得
     * @return GetFollowRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetFollowRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォローされているユーザID */
    private $targetUserId;

    /**
     * フォローされているユーザIDを取得
     *
     * @return string|null フォローを取得
     */
    public function getTargetUserId(): ?string {
        return $this->targetUserId;
    }

    /**
     * フォローされているユーザIDを設定
     *
     * @param string $targetUserId フォローを取得
     */
    public function setTargetUserId(string $targetUserId = null) {
        $this->targetUserId = $targetUserId;
    }

    /**
     * フォローされているユーザIDを設定
     *
     * @param string $targetUserId フォローを取得
     * @return GetFollowRequest $this
     */
    public function withTargetUserId(string $targetUserId = null): GetFollowRequest {
        $this->setTargetUserId($targetUserId);
        return $this;
    }

    /** @var bool プロフィールも一緒に取得するか */
    private $withProfile;

    /**
     * プロフィールも一緒に取得するかを取得
     *
     * @return bool|null フォローを取得
     */
    public function getWithProfile(): ?bool {
        return $this->withProfile;
    }

    /**
     * プロフィールも一緒に取得するかを設定
     *
     * @param bool $withProfile フォローを取得
     */
    public function setWithProfile(bool $withProfile = null) {
        $this->withProfile = $withProfile;
    }

    /**
     * プロフィールも一緒に取得するかを設定
     *
     * @param bool $withProfile フォローを取得
     * @return GetFollowRequest $this
     */
    public function withWithProfile(bool $withProfile = null): GetFollowRequest {
        $this->setWithProfile($withProfile);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null フォローを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider フォローを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider フォローを取得
     * @return GetFollowRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): GetFollowRequest {
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
     * @return GetFollowRequest this
     */
    public function withAccessToken(string $accessToken): GetFollowRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}