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
 * ユーザーIDを指定してフォロー のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class FollowByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定してフォロー
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してフォロー
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してフォロー
     * @return FollowByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): FollowByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フォローするユーザID */
    private $userId;

    /**
     * フォローするユーザIDを取得
     *
     * @return string|null ユーザーIDを指定してフォロー
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * フォローするユーザIDを設定
     *
     * @param string $userId ユーザーIDを指定してフォロー
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * フォローするユーザIDを設定
     *
     * @param string $userId ユーザーIDを指定してフォロー
     * @return FollowByUserIdRequest $this
     */
    public function withUserId(string $userId = null): FollowByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string フォローされるユーザID */
    private $targetUserId;

    /**
     * フォローされるユーザIDを取得
     *
     * @return string|null ユーザーIDを指定してフォロー
     */
    public function getTargetUserId(): ?string {
        return $this->targetUserId;
    }

    /**
     * フォローされるユーザIDを設定
     *
     * @param string $targetUserId ユーザーIDを指定してフォロー
     */
    public function setTargetUserId(string $targetUserId = null) {
        $this->targetUserId = $targetUserId;
    }

    /**
     * フォローされるユーザIDを設定
     *
     * @param string $targetUserId ユーザーIDを指定してフォロー
     * @return FollowByUserIdRequest $this
     */
    public function withTargetUserId(string $targetUserId = null): FollowByUserIdRequest {
        $this->setTargetUserId($targetUserId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してフォロー
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してフォロー
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してフォロー
     * @return FollowByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): FollowByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}