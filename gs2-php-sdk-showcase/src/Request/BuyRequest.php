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

namespace Gs2\Showcase\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Showcase\Model\Config;

/**
 * 陳列棚を取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class BuyRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 陳列棚を取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 陳列棚を取得
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 陳列棚を取得
     * @return BuyRequest $this
     */
    public function withNamespaceName(string $namespaceName): BuyRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 商品名 */
    private $showcaseName;

    /**
     * 商品名を取得
     *
     * @return string|null 陳列棚を取得
     */
    public function getShowcaseName(): ?string {
        return $this->showcaseName;
    }

    /**
     * 商品名を設定
     *
     * @param string $showcaseName 陳列棚を取得
     */
    public function setShowcaseName(string $showcaseName) {
        $this->showcaseName = $showcaseName;
    }

    /**
     * 商品名を設定
     *
     * @param string $showcaseName 陳列棚を取得
     * @return BuyRequest $this
     */
    public function withShowcaseName(string $showcaseName): BuyRequest {
        $this->setShowcaseName($showcaseName);
        return $this;
    }

    /** @var string 陳列商品ID */
    private $displayItemId;

    /**
     * 陳列商品IDを取得
     *
     * @return string|null 陳列棚を取得
     */
    public function getDisplayItemId(): ?string {
        return $this->displayItemId;
    }

    /**
     * 陳列商品IDを設定
     *
     * @param string $displayItemId 陳列棚を取得
     */
    public function setDisplayItemId(string $displayItemId) {
        $this->displayItemId = $displayItemId;
    }

    /**
     * 陳列商品IDを設定
     *
     * @param string $displayItemId 陳列棚を取得
     * @return BuyRequest $this
     */
    public function withDisplayItemId(string $displayItemId): BuyRequest {
        $this->setDisplayItemId($displayItemId);
        return $this;
    }

    /** @var Config[] 設定値 */
    private $config;

    /**
     * 設定値を取得
     *
     * @return Config[]|null 陳列棚を取得
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config 陳列棚を取得
     */
    public function setConfig(array $config) {
        $this->config = $config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config 陳列棚を取得
     * @return BuyRequest $this
     */
    public function withConfig(array $config): BuyRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 陳列棚を取得
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 陳列棚を取得
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 陳列棚を取得
     * @return BuyRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): BuyRequest {
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
     * @return BuyRequest this
     */
    public function withAccessToken(string $accessToken): BuyRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}