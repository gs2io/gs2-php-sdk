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

namespace Gs2\Exchange\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Exchange\Model\Config;

/**
 * 交換を実行 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class ExchangeRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 交換を実行
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 交換を実行
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 交換を実行
     * @return ExchangeRequest $this
     */
    public function withNamespaceName(string $namespaceName): ExchangeRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 交換レートの種類名 */
    private $rateName;

    /**
     * 交換レートの種類名を取得
     *
     * @return string|null 交換を実行
     */
    public function getRateName(): ?string {
        return $this->rateName;
    }

    /**
     * 交換レートの種類名を設定
     *
     * @param string $rateName 交換を実行
     */
    public function setRateName(string $rateName) {
        $this->rateName = $rateName;
    }

    /**
     * 交換レートの種類名を設定
     *
     * @param string $rateName 交換を実行
     * @return ExchangeRequest $this
     */
    public function withRateName(string $rateName): ExchangeRequest {
        $this->setRateName($rateName);
        return $this;
    }

    /** @var int 交換するロット数 */
    private $count;

    /**
     * 交換するロット数を取得
     *
     * @return int|null 交換を実行
     */
    public function getCount(): ?int {
        return $this->count;
    }

    /**
     * 交換するロット数を設定
     *
     * @param int $count 交換を実行
     */
    public function setCount(int $count) {
        $this->count = $count;
    }

    /**
     * 交換するロット数を設定
     *
     * @param int $count 交換を実行
     * @return ExchangeRequest $this
     */
    public function withCount(int $count): ExchangeRequest {
        $this->setCount($count);
        return $this;
    }

    /** @var Config[] 設定値 */
    private $config;

    /**
     * 設定値を取得
     *
     * @return Config[]|null 交換を実行
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config 交換を実行
     */
    public function setConfig(array $config) {
        $this->config = $config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config 交換を実行
     * @return ExchangeRequest $this
     */
    public function withConfig(array $config): ExchangeRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 交換を実行
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 交換を実行
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 交換を実行
     * @return ExchangeRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): ExchangeRequest {
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
     * @return ExchangeRequest this
     */
    public function withAccessToken(string $accessToken): ExchangeRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}