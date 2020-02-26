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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Quest\Model\Reward;
use Gs2\Quest\Model\Config;

/**
 * クエストを完了 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class EndRequest extends Gs2BasicRequest {

    /** @var string カテゴリ名 */
    private $namespaceName;

    /**
     * カテゴリ名を取得
     *
     * @return string|null クエストを完了
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストを完了
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * カテゴリ名を設定
     *
     * @param string $namespaceName クエストを完了
     * @return EndRequest $this
     */
    public function withNamespaceName(string $namespaceName): EndRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string トランザクションID */
    private $transactionId;

    /**
     * トランザクションIDを取得
     *
     * @return string|null クエストを完了
     */
    public function getTransactionId(): ?string {
        return $this->transactionId;
    }

    /**
     * トランザクションIDを設定
     *
     * @param string $transactionId クエストを完了
     */
    public function setTransactionId(string $transactionId) {
        $this->transactionId = $transactionId;
    }

    /**
     * トランザクションIDを設定
     *
     * @param string $transactionId クエストを完了
     * @return EndRequest $this
     */
    public function withTransactionId(string $transactionId): EndRequest {
        $this->setTransactionId($transactionId);
        return $this;
    }

    /** @var Reward[] 実際にクエストで得た報酬 */
    private $rewards;

    /**
     * 実際にクエストで得た報酬を取得
     *
     * @return Reward[]|null クエストを完了
     */
    public function getRewards(): ?array {
        return $this->rewards;
    }

    /**
     * 実際にクエストで得た報酬を設定
     *
     * @param Reward[] $rewards クエストを完了
     */
    public function setRewards(array $rewards) {
        $this->rewards = $rewards;
    }

    /**
     * 実際にクエストで得た報酬を設定
     *
     * @param Reward[] $rewards クエストを完了
     * @return EndRequest $this
     */
    public function withRewards(array $rewards): EndRequest {
        $this->setRewards($rewards);
        return $this;
    }

    /** @var bool クエストをクリアしたか */
    private $isComplete;

    /**
     * クエストをクリアしたかを取得
     *
     * @return bool|null クエストを完了
     */
    public function getIsComplete(): ?bool {
        return $this->isComplete;
    }

    /**
     * クエストをクリアしたかを設定
     *
     * @param bool $isComplete クエストを完了
     */
    public function setIsComplete(bool $isComplete) {
        $this->isComplete = $isComplete;
    }

    /**
     * クエストをクリアしたかを設定
     *
     * @param bool $isComplete クエストを完了
     * @return EndRequest $this
     */
    public function withIsComplete(bool $isComplete): EndRequest {
        $this->setIsComplete($isComplete);
        return $this;
    }

    /** @var Config[] スタンプシートの変数に適用する設定値 */
    private $config;

    /**
     * スタンプシートの変数に適用する設定値を取得
     *
     * @return Config[]|null クエストを完了
     */
    public function getConfig(): ?array {
        return $this->config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config クエストを完了
     */
    public function setConfig(array $config) {
        $this->config = $config;
    }

    /**
     * スタンプシートの変数に適用する設定値を設定
     *
     * @param Config[] $config クエストを完了
     * @return EndRequest $this
     */
    public function withConfig(array $config): EndRequest {
        $this->setConfig($config);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null クエストを完了
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider クエストを完了
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider クエストを完了
     * @return EndRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): EndRequest {
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