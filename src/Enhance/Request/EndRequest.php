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

namespace Gs2\Enhance\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Enhance\Model\Config;

/**
 * 強化を完了 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class EndRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 強化を完了
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 強化を完了
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 強化を完了
     * @return EndRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): EndRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var Config[] スタンプシートの変数に適用する設定値 */
    private $config;

    /**
     * スタンプシートの変数に適用する設定値を取得
     *
     * @return Config[]|null 強化を完了
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config 強化を完了
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config 強化を完了
     * @return EndRequest $this
     */
    public function withConfig(array $config = null): EndRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 強化を完了
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 強化を完了
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 強化を完了
     * @return EndRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): EndRequest {
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
     * @return EndRequest this
     */
    public function withAccessToken(string $accessToken): EndRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}