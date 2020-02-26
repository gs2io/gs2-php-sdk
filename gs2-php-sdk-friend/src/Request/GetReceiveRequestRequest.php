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
 * 受信したフレンドリクエストを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetReceiveRequestRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 受信したフレンドリクエストを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 受信したフレンドリクエストを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 受信したフレンドリクエストを取得
     * @return GetReceiveRequestRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetReceiveRequestRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $fromUserId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 受信したフレンドリクエストを取得
     */
    public function getFromUserId(): ?string {
        return $this->fromUserId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $fromUserId 受信したフレンドリクエストを取得
     */
    public function setFromUserId(string $fromUserId) {
        $this->fromUserId = $fromUserId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $fromUserId 受信したフレンドリクエストを取得
     * @return GetReceiveRequestRequest $this
     */
    public function withFromUserId(string $fromUserId): GetReceiveRequestRequest {
        $this->setFromUserId($fromUserId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 受信したフレンドリクエストを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 受信したフレンドリクエストを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 受信したフレンドリクエストを取得
     * @return GetReceiveRequestRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): GetReceiveRequestRequest {
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
     * @return GetReceiveRequestRequest this
     */
    public function withAccessToken(string $accessToken): GetReceiveRequestRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}