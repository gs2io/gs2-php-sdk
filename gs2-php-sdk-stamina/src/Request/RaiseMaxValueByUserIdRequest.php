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
 * ユーザIDを指定してスタミナの最大値を加算 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class RaiseMaxValueByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してスタミナの最大値を加算
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してスタミナの最大値を加算
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してスタミナの最大値を加算
     * @return RaiseMaxValueByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): RaiseMaxValueByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナの種類名 */
    private $staminaName;

    /**
     * スタミナの種類名を取得
     *
     * @return string|null ユーザIDを指定してスタミナの最大値を加算
     */
    public function getStaminaName(): ?string {
        return $this->staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName ユーザIDを指定してスタミナの最大値を加算
     */
    public function setStaminaName(string $staminaName) {
        $this->staminaName = $staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName ユーザIDを指定してスタミナの最大値を加算
     * @return RaiseMaxValueByUserIdRequest $this
     */
    public function withStaminaName(string $staminaName): RaiseMaxValueByUserIdRequest {
        $this->setStaminaName($staminaName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してスタミナの最大値を加算
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してスタミナの最大値を加算
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してスタミナの最大値を加算
     * @return RaiseMaxValueByUserIdRequest $this
     */
    public function withUserId(string $userId): RaiseMaxValueByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 上昇する最大スタミナ量 */
    private $raiseValue;

    /**
     * 上昇する最大スタミナ量を取得
     *
     * @return int|null ユーザIDを指定してスタミナの最大値を加算
     */
    public function getRaiseValue(): ?int {
        return $this->raiseValue;
    }

    /**
     * 上昇する最大スタミナ量を設定
     *
     * @param int $raiseValue ユーザIDを指定してスタミナの最大値を加算
     */
    public function setRaiseValue(int $raiseValue) {
        $this->raiseValue = $raiseValue;
    }

    /**
     * 上昇する最大スタミナ量を設定
     *
     * @param int $raiseValue ユーザIDを指定してスタミナの最大値を加算
     * @return RaiseMaxValueByUserIdRequest $this
     */
    public function withRaiseValue(int $raiseValue): RaiseMaxValueByUserIdRequest {
        $this->setRaiseValue($raiseValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してスタミナの最大値を加算
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してスタミナの最大値を加算
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してスタミナの最大値を加算
     * @return RaiseMaxValueByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): RaiseMaxValueByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}