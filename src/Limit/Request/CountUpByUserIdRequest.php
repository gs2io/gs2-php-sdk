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
 * ユーザIDを指定してカウントアップ のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CountUpByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してカウントアップ
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してカウントアップ
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してカウントアップ
     * @return CountUpByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CountUpByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 回数制限の種類の名前 */
    private $limitName;

    /**
     * 回数制限の種類の名前を取得
     *
     * @return string|null ユーザIDを指定してカウントアップ
     */
    public function getLimitName(): ?string {
        return $this->limitName;
    }

    /**
     * 回数制限の種類の名前を設定
     *
     * @param string $limitName ユーザIDを指定してカウントアップ
     */
    public function setLimitName(string $limitName = null) {
        $this->limitName = $limitName;
    }

    /**
     * 回数制限の種類の名前を設定
     *
     * @param string $limitName ユーザIDを指定してカウントアップ
     * @return CountUpByUserIdRequest $this
     */
    public function withLimitName(string $limitName = null): CountUpByUserIdRequest {
        $this->setLimitName($limitName);
        return $this;
    }

    /** @var string カウンターの名前 */
    private $counterName;

    /**
     * カウンターの名前を取得
     *
     * @return string|null ユーザIDを指定してカウントアップ
     */
    public function getCounterName(): ?string {
        return $this->counterName;
    }

    /**
     * カウンターの名前を設定
     *
     * @param string $counterName ユーザIDを指定してカウントアップ
     */
    public function setCounterName(string $counterName = null) {
        $this->counterName = $counterName;
    }

    /**
     * カウンターの名前を設定
     *
     * @param string $counterName ユーザIDを指定してカウントアップ
     * @return CountUpByUserIdRequest $this
     */
    public function withCounterName(string $counterName = null): CountUpByUserIdRequest {
        $this->setCounterName($counterName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してカウントアップ
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してカウントアップ
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してカウントアップ
     * @return CountUpByUserIdRequest $this
     */
    public function withUserId(string $userId = null): CountUpByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int カウントアップする量 */
    private $countUpValue;

    /**
     * カウントアップする量を取得
     *
     * @return int|null ユーザIDを指定してカウントアップ
     */
    public function getCountUpValue(): ?int {
        return $this->countUpValue;
    }

    /**
     * カウントアップする量を設定
     *
     * @param int $countUpValue ユーザIDを指定してカウントアップ
     */
    public function setCountUpValue(int $countUpValue = null) {
        $this->countUpValue = $countUpValue;
    }

    /**
     * カウントアップする量を設定
     *
     * @param int $countUpValue ユーザIDを指定してカウントアップ
     * @return CountUpByUserIdRequest $this
     */
    public function withCountUpValue(int $countUpValue = null): CountUpByUserIdRequest {
        $this->setCountUpValue($countUpValue);
        return $this;
    }

    /** @var int カウントアップを許容する最大値 を入力してください */
    private $maxValue;

    /**
     * カウントアップを許容する最大値 を入力してくださいを取得
     *
     * @return int|null ユーザIDを指定してカウントアップ
     */
    public function getMaxValue(): ?int {
        return $this->maxValue;
    }

    /**
     * カウントアップを許容する最大値 を入力してくださいを設定
     *
     * @param int $maxValue ユーザIDを指定してカウントアップ
     */
    public function setMaxValue(int $maxValue = null) {
        $this->maxValue = $maxValue;
    }

    /**
     * カウントアップを許容する最大値 を入力してくださいを設定
     *
     * @param int $maxValue ユーザIDを指定してカウントアップ
     * @return CountUpByUserIdRequest $this
     */
    public function withMaxValue(int $maxValue = null): CountUpByUserIdRequest {
        $this->setMaxValue($maxValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してカウントアップ
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してカウントアップ
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してカウントアップ
     * @return CountUpByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): CountUpByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}