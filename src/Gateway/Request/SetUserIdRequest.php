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

namespace Gs2\Gateway\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * WebsocketセッションにユーザIDを設定 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SetUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null WebsocketセッションにユーザIDを設定
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName WebsocketセッションにユーザIDを設定
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName WebsocketセッションにユーザIDを設定
     * @return SetUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): SetUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string コネクションID */
    private $connectionId;

    /**
     * コネクションIDを取得
     *
     * @return string|null WebsocketセッションにユーザIDを設定
     */
    public function getConnectionId(): ?string {
        return $this->connectionId;
    }

    /**
     * コネクションIDを設定
     *
     * @param string $connectionId WebsocketセッションにユーザIDを設定
     */
    public function setConnectionId(string $connectionId = null) {
        $this->connectionId = $connectionId;
    }

    /**
     * コネクションIDを設定
     *
     * @param string $connectionId WebsocketセッションにユーザIDを設定
     * @return SetUserIdRequest $this
     */
    public function withConnectionId(string $connectionId = null): SetUserIdRequest {
        $this->setConnectionId($connectionId);
        return $this;
    }

    /** @var bool 同時に異なるクライアントからの接続を許容するか */
    private $allowConcurrentAccess;

    /**
     * 同時に異なるクライアントからの接続を許容するかを取得
     *
     * @return bool|null WebsocketセッションにユーザIDを設定
     */
    public function getAllowConcurrentAccess(): ?bool {
        return $this->allowConcurrentAccess;
    }

    /**
     * 同時に異なるクライアントからの接続を許容するかを設定
     *
     * @param bool $allowConcurrentAccess WebsocketセッションにユーザIDを設定
     */
    public function setAllowConcurrentAccess(bool $allowConcurrentAccess = null) {
        $this->allowConcurrentAccess = $allowConcurrentAccess;
    }

    /**
     * 同時に異なるクライアントからの接続を許容するかを設定
     *
     * @param bool $allowConcurrentAccess WebsocketセッションにユーザIDを設定
     * @return SetUserIdRequest $this
     */
    public function withAllowConcurrentAccess(bool $allowConcurrentAccess = null): SetUserIdRequest {
        $this->setAllowConcurrentAccess($allowConcurrentAccess);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null WebsocketセッションにユーザIDを設定
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider WebsocketセッションにユーザIDを設定
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider WebsocketセッションにユーザIDを設定
     * @return SetUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): SetUserIdRequest {
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
     * @return SetUserIdRequest this
     */
    public function withAccessToken(string $accessToken): SetUserIdRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}