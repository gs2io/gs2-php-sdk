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
 * ユーザーIDを指定してフレンドを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetFriendByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定してフレンドを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してフレンドを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してフレンドを取得
     * @return GetFriendByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetFriendByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定してフレンドを取得
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してフレンドを取得
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定してフレンドを取得
     * @return GetFriendByUserIdRequest $this
     */
    public function withUserId(string $userId): GetFriendByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string ユーザーID */
    private $targetUserId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定してフレンドを取得
     */
    public function getTargetUserId(): ?string {
        return $this->targetUserId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $targetUserId ユーザーIDを指定してフレンドを取得
     */
    public function setTargetUserId(string $targetUserId) {
        $this->targetUserId = $targetUserId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $targetUserId ユーザーIDを指定してフレンドを取得
     * @return GetFriendByUserIdRequest $this
     */
    public function withTargetUserId(string $targetUserId): GetFriendByUserIdRequest {
        $this->setTargetUserId($targetUserId);
        return $this;
    }

    /** @var bool プロフィールも一緒に取得するか */
    private $withProfile;

    /**
     * プロフィールも一緒に取得するかを取得
     *
     * @return bool|null ユーザーIDを指定してフレンドを取得
     */
    public function getWithProfile(): ?bool {
        return $this->withProfile;
    }

    /**
     * プロフィールも一緒に取得するかを設定
     *
     * @param bool $withProfile ユーザーIDを指定してフレンドを取得
     */
    public function setWithProfile(bool $withProfile) {
        $this->withProfile = $withProfile;
    }

    /**
     * プロフィールも一緒に取得するかを設定
     *
     * @param bool $withProfile ユーザーIDを指定してフレンドを取得
     * @return GetFriendByUserIdRequest $this
     */
    public function withWithProfile(bool $withProfile): GetFriendByUserIdRequest {
        $this->setWithProfile($withProfile);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してフレンドを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してフレンドを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してフレンドを取得
     * @return GetFriendByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): GetFriendByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}