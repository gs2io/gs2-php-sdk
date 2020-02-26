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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * イベントを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetEventRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null イベントを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName イベントを取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName イベントを取得
     * @return GetEventRequest $this
     */
    public function withNamespaceName(string $namespaceName): GetEventRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string イベントの種類名 */
    private $eventName;

    /**
     * イベントの種類名を取得
     *
     * @return string|null イベントを取得
     */
    public function getEventName(): ?string {
        return $this->eventName;
    }

    /**
     * イベントの種類名を設定
     *
     * @param string $eventName イベントを取得
     */
    public function setEventName(string $eventName) {
        $this->eventName = $eventName;
    }

    /**
     * イベントの種類名を設定
     *
     * @param string $eventName イベントを取得
     * @return GetEventRequest $this
     */
    public function withEventName(string $eventName): GetEventRequest {
        $this->setEventName($eventName);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null イベントを取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider イベントを取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider イベントを取得
     * @return GetEventRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): GetEventRequest {
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
     * @return GetEventRequest this
     */
    public function withAccessToken(string $accessToken): GetEventRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}