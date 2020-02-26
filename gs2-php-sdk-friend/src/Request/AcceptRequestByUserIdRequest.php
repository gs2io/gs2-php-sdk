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
 * ユーザーIDを指定してフレンドリクエストを承諾 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AcceptRequestByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定してフレンドリクエストを承諾
     * @return AcceptRequestByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): AcceptRequestByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string フレンドリクエストを受け取ったユーザID */
    private $userId;

    /**
     * フレンドリクエストを受け取ったユーザIDを取得
     *
     * @return string|null ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * フレンドリクエストを受け取ったユーザIDを設定
     *
     * @param string $userId ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * フレンドリクエストを受け取ったユーザIDを設定
     *
     * @param string $userId ユーザーIDを指定してフレンドリクエストを承諾
     * @return AcceptRequestByUserIdRequest $this
     */
    public function withUserId(string $userId): AcceptRequestByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string フレンドリクエストを送信したユーザID */
    private $fromUserId;

    /**
     * フレンドリクエストを送信したユーザIDを取得
     *
     * @return string|null ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function getFromUserId(): ?string {
        return $this->fromUserId;
    }

    /**
     * フレンドリクエストを送信したユーザIDを設定
     *
     * @param string $fromUserId ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function setFromUserId(string $fromUserId) {
        $this->fromUserId = $fromUserId;
    }

    /**
     * フレンドリクエストを送信したユーザIDを設定
     *
     * @param string $fromUserId ユーザーIDを指定してフレンドリクエストを承諾
     * @return AcceptRequestByUserIdRequest $this
     */
    public function withFromUserId(string $fromUserId): AcceptRequestByUserIdRequest {
        $this->setFromUserId($fromUserId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してフレンドリクエストを承諾
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定してフレンドリクエストを承諾
     * @return AcceptRequestByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): AcceptRequestByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}