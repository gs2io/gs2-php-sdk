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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * スタミナを消費 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class ConsumeStaminaRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null スタミナを消費
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナを消費
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName スタミナを消費
     * @return ConsumeStaminaRequest $this
     */
    public function withNamespaceName(string $namespaceName): ConsumeStaminaRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナの種類名 */
    private $staminaName;

    /**
     * スタミナの種類名を取得
     *
     * @return string|null スタミナを消費
     */
    public function getStaminaName(): ?string {
        return $this->staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName スタミナを消費
     */
    public function setStaminaName(string $staminaName) {
        $this->staminaName = $staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName スタミナを消費
     * @return ConsumeStaminaRequest $this
     */
    public function withStaminaName(string $staminaName): ConsumeStaminaRequest {
        $this->setStaminaName($staminaName);
        return $this;
    }

    /** @var int 消費するスタミナ量 */
    private $consumeValue;

    /**
     * 消費するスタミナ量を取得
     *
     * @return int|null スタミナを消費
     */
    public function getConsumeValue(): ?int {
        return $this->consumeValue;
    }

    /**
     * 消費するスタミナ量を設定
     *
     * @param int $consumeValue スタミナを消費
     */
    public function setConsumeValue(int $consumeValue) {
        $this->consumeValue = $consumeValue;
    }

    /**
     * 消費するスタミナ量を設定
     *
     * @param int $consumeValue スタミナを消費
     * @return ConsumeStaminaRequest $this
     */
    public function withConsumeValue(int $consumeValue): ConsumeStaminaRequest {
        $this->setConsumeValue($consumeValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null スタミナを消費
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタミナを消費
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider スタミナを消費
     * @return ConsumeStaminaRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): ConsumeStaminaRequest {
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
     * @return ConsumeStaminaRequest this
     */
    public function withAccessToken(string $accessToken): ConsumeStaminaRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}