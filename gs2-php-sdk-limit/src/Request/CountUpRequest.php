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

namespace Gs2\Limit\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * カウントアップ のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CountUpRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null カウントアップ
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウントアップ
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウントアップ
     * @return CountUpRequest $this
     */
    public function withNamespaceName(string $namespaceName): CountUpRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 回数制限の種類の名前 */
    private $limitName;

    /**
     * 回数制限の種類の名前を取得
     *
     * @return string|null カウントアップ
     */
    public function getLimitName(): ?string {
        return $this->limitName;
    }

    /**
     * 回数制限の種類の名前を設定
     *
     * @param string $limitName カウントアップ
     */
    public function setLimitName(string $limitName) {
        $this->limitName = $limitName;
    }

    /**
     * 回数制限の種類の名前を設定
     *
     * @param string $limitName カウントアップ
     * @return CountUpRequest $this
     */
    public function withLimitName(string $limitName): CountUpRequest {
        $this->setLimitName($limitName);
        return $this;
    }

    /** @var string カウンターの名前 */
    private $counterName;

    /**
     * カウンターの名前を取得
     *
     * @return string|null カウントアップ
     */
    public function getCounterName(): ?string {
        return $this->counterName;
    }

    /**
     * カウンターの名前を設定
     *
     * @param string $counterName カウントアップ
     */
    public function setCounterName(string $counterName) {
        $this->counterName = $counterName;
    }

    /**
     * カウンターの名前を設定
     *
     * @param string $counterName カウントアップ
     * @return CountUpRequest $this
     */
    public function withCounterName(string $counterName): CountUpRequest {
        $this->setCounterName($counterName);
        return $this;
    }

    /** @var int カウントアップする量 */
    private $countUpValue;

    /**
     * カウントアップする量を取得
     *
     * @return int|null カウントアップ
     */
    public function getCountUpValue(): ?int {
        return $this->countUpValue;
    }

    /**
     * カウントアップする量を設定
     *
     * @param int $countUpValue カウントアップ
     */
    public function setCountUpValue(int $countUpValue) {
        $this->countUpValue = $countUpValue;
    }

    /**
     * カウントアップする量を設定
     *
     * @param int $countUpValue カウントアップ
     * @return CountUpRequest $this
     */
    public function withCountUpValue(int $countUpValue): CountUpRequest {
        $this->setCountUpValue($countUpValue);
        return $this;
    }

    /** @var int カウントアップを許容する最大値 を入力してください */
    private $maxValue;

    /**
     * カウントアップを許容する最大値 を入力してくださいを取得
     *
     * @return int|null カウントアップ
     */
    public function getMaxValue(): ?int {
        return $this->maxValue;
    }

    /**
     * カウントアップを許容する最大値 を入力してくださいを設定
     *
     * @param int $maxValue カウントアップ
     */
    public function setMaxValue(int $maxValue) {
        $this->maxValue = $maxValue;
    }

    /**
     * カウントアップを許容する最大値 を入力してくださいを設定
     *
     * @param int $maxValue カウントアップ
     * @return CountUpRequest $this
     */
    public function withMaxValue(int $maxValue): CountUpRequest {
        $this->setMaxValue($maxValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null カウントアップ
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider カウントアップ
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider カウントアップ
     * @return CountUpRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): CountUpRequest {
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
     * @return CountUpRequest this
     */
    public function withAccessToken(string $accessToken): CountUpRequest {
        $this->setAccessToken($accessToken);
        return $this;
    }

}