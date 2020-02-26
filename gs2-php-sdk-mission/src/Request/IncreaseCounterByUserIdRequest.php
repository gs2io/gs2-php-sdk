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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * カウンターに加算 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class IncreaseCounterByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null カウンターに加算
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウンターに加算
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName カウンターに加算
     * @return IncreaseCounterByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): IncreaseCounterByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string カウンター名 */
    private $counterName;

    /**
     * カウンター名を取得
     *
     * @return string|null カウンターに加算
     */
    public function getCounterName(): ?string {
        return $this->counterName;
    }

    /**
     * カウンター名を設定
     *
     * @param string $counterName カウンターに加算
     */
    public function setCounterName(string $counterName) {
        $this->counterName = $counterName;
    }

    /**
     * カウンター名を設定
     *
     * @param string $counterName カウンターに加算
     * @return IncreaseCounterByUserIdRequest $this
     */
    public function withCounterName(string $counterName): IncreaseCounterByUserIdRequest {
        $this->setCounterName($counterName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null カウンターに加算
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId カウンターに加算
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId カウンターに加算
     * @return IncreaseCounterByUserIdRequest $this
     */
    public function withUserId(string $userId): IncreaseCounterByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 加算する値 */
    private $value;

    /**
     * 加算する値を取得
     *
     * @return int|null カウンターに加算
     */
    public function getValue(): ?int {
        return $this->value;
    }

    /**
     * 加算する値を設定
     *
     * @param int $value カウンターに加算
     */
    public function setValue(int $value) {
        $this->value = $value;
    }

    /**
     * 加算する値を設定
     *
     * @param int $value カウンターに加算
     * @return IncreaseCounterByUserIdRequest $this
     */
    public function withValue(int $value): IncreaseCounterByUserIdRequest {
        $this->setValue($value);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null カウンターに加算
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider カウンターに加算
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider カウンターに加算
     * @return IncreaseCounterByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): IncreaseCounterByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}