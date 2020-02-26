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
 * ユーザーIDを指定してプロフィールを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateProfileByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定してプロフィールを更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してプロフィールを更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してプロフィールを更新
     * @return UpdateProfileByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateProfileByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定してプロフィールを更新
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してプロフィールを更新
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してプロフィールを更新
     * @return UpdateProfileByUserIdRequest $this
     */
    public function withUserId(string $userId): UpdateProfileByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 公開されるプロフィール */
    private $publicProfile;

    /**
     * 公開されるプロフィールを取得
     *
     * @return string|null ユーザーIDを指定してプロフィールを更新
     */
    public function getPublicProfile(): ?string {
        return $this->publicProfile;
    }

    /**
     * 公開されるプロフィールを設定
     *
     * @param string $publicProfile ユーザーIDを指定してプロフィールを更新
     */
    public function setPublicProfile(string $publicProfile) {
        $this->publicProfile = $publicProfile;
    }

    /**
     * 公開されるプロフィールを設定
     *
     * @param string $publicProfile ユーザーIDを指定してプロフィールを更新
     * @return UpdateProfileByUserIdRequest $this
     */
    public function withPublicProfile(string $publicProfile): UpdateProfileByUserIdRequest {
        $this->setPublicProfile($publicProfile);
        return $this;
    }

    /** @var string フォロワー向けに公開されるプロフィール */
    private $followerProfile;

    /**
     * フォロワー向けに公開されるプロフィールを取得
     *
     * @return string|null ユーザーIDを指定してプロフィールを更新
     */
    public function getFollowerProfile(): ?string {
        return $this->followerProfile;
    }

    /**
     * フォロワー向けに公開されるプロフィールを設定
     *
     * @param string $followerProfile ユーザーIDを指定してプロフィールを更新
     */
    public function setFollowerProfile(string $followerProfile) {
        $this->followerProfile = $followerProfile;
    }

    /**
     * フォロワー向けに公開されるプロフィールを設定
     *
     * @param string $followerProfile ユーザーIDを指定してプロフィールを更新
     * @return UpdateProfileByUserIdRequest $this
     */
    public function withFollowerProfile(string $followerProfile): UpdateProfileByUserIdRequest {
        $this->setFollowerProfile($followerProfile);
        return $this;
    }

    /** @var string フレンド向けに公開されるプロフィール */
    private $friendProfile;

    /**
     * フレンド向けに公開されるプロフィールを取得
     *
     * @return string|null ユーザーIDを指定してプロフィールを更新
     */
    public function getFriendProfile(): ?string {
        return $this->friendProfile;
    }

    /**
     * フレンド向けに公開されるプロフィールを設定
     *
     * @param string $friendProfile ユーザーIDを指定してプロフィールを更新
     */
    public function setFriendProfile(string $friendProfile) {
        $this->friendProfile = $friendProfile;
    }

    /**
     * フレンド向けに公開されるプロフィールを設定
     *
     * @param string $friendProfile ユーザーIDを指定してプロフィールを更新
     * @return UpdateProfileByUserIdRequest $this
     */
    public function withFriendProfile(string $friendProfile): UpdateProfileByUserIdRequest {
        $this->setFriendProfile($friendProfile);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してプロフィールを更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してプロフィールを更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してプロフィールを更新
     * @return UpdateProfileByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): UpdateProfileByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}