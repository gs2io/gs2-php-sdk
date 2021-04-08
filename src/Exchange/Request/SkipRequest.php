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
 * 交換待機を対価を払ってスキップ のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SkipRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 交換待機を対価を払ってスキップ
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 交換待機を対価を払ってスキップ
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 交換待機を対価を払ってスキップ
     * @return SkipRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): SkipRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 交換レート名 */
    private $rateName;

    /**
     * 交換レート名を取得
     *
     * @return string|null 交換待機を対価を払ってスキップ
     */
    public function getRateName(): ?string {
        return $this->rateName;
    }

    /**
     * 交換レート名を設定
     *
     * @param string $rateName 交換待機を対価を払ってスキップ
     */
    public function setRateName(string $rateName = null) {
        $this->rateName = $rateName;
    }

    /**
     * 交換レート名を設定
     *
     * @param string $rateName 交換待機を対価を払ってスキップ
     * @return SkipRequest $this
     */
    public function withRateName(string $rateName = null): SkipRequest {
        $this->setRateName($rateName);
        return $this;
    }

    /** @var string 交換待機の名前 */
    private $awaitName;

    /**
     * 交換待機の名前を取得
     *
     * @return string|null 交換待機を対価を払ってスキップ
     */
    public function getAwaitName(): ?string {
        return $this->awaitName;
    }

    /**
     * 交換待機の名前を設定
     *
     * @param string $awaitName 交換待機を対価を払ってスキップ
     */
    public function setAwaitName(string $awaitName = null) {
        $this->awaitName = $awaitName;
    }

    /**
     * 交換待機の名前を設定
     *
     * @param string $awaitName 交換待機を対価を払ってスキップ
     * @return SkipRequest $this
     */
    public function withAwaitName(string $awaitName = null): SkipRequest {
        $this->setAwaitName($awaitName);
        return $this;
    }

    /** @var Config[] 設定値 */
    private $config;

    /**
     * 設定値を取得
     *
     * @return Config[]|null 交換待機を対価を払ってスキップ
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config 交換待機を対価を払ってスキップ
     */
    public function setConfig(array $config = null) {
        $this->config = $config;
    }

    /**
     * 設定値を設定
     *
     * @param Config[] $config 交換待機を対価を払ってスキップ
     * @return SkipRequest $this
     */
    public function withConfig(array $config = null): SkipRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 交換待機を対価を払ってスキップ
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 交換待機を対価を払ってスキップ
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 交換待機を対価を払ってスキップ
     * @return SkipRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): SkipRequest {
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
     * @return SkipRequest this
     */
    public function withAccessToken(string $accessToken): SkipRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}