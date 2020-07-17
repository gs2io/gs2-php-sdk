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
 * ユーザIDを指定してスタミナを作成・更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateStaminaByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してスタミナを作成・更新
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): UpdateStaminaByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナの種類名 */
    private $staminaName;

    /**
     * スタミナの種類名を取得
     *
     * @return string|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getStaminaName(): ?string {
        return $this->staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName ユーザIDを指定してスタミナを作成・更新
     */
    public function setStaminaName(string $staminaName = null) {
        $this->staminaName = $staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withStaminaName(string $staminaName = null): UpdateStaminaByUserIdRequest {
        $this->setStaminaName($staminaName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してスタミナを作成・更新
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withUserId(string $userId = null): UpdateStaminaByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int 最終更新時におけるスタミナ値 */
    private $value;

    /**
     * 最終更新時におけるスタミナ値を取得
     *
     * @return int|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getValue(): ?int {
        return $this->value;
    }

    /**
     * 最終更新時におけるスタミナ値を設定
     *
     * @param int $value ユーザIDを指定してスタミナを作成・更新
     */
    public function setValue(int $value = null) {
        $this->value = $value;
    }

    /**
     * 最終更新時におけるスタミナ値を設定
     *
     * @param int $value ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withValue(int $value = null): UpdateStaminaByUserIdRequest {
        $this->setValue($value);
        return $this;
    }

    /** @var int スタミナの最大値 */
    private $maxValue;

    /**
     * スタミナの最大値を取得
     *
     * @return int|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getMaxValue(): ?int {
        return $this->maxValue;
    }

    /**
     * スタミナの最大値を設定
     *
     * @param int $maxValue ユーザIDを指定してスタミナを作成・更新
     */
    public function setMaxValue(int $maxValue = null) {
        $this->maxValue = $maxValue;
    }

    /**
     * スタミナの最大値を設定
     *
     * @param int $maxValue ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withMaxValue(int $maxValue = null): UpdateStaminaByUserIdRequest {
        $this->setMaxValue($maxValue);
        return $this;
    }

    /** @var int スタミナの回復間隔(分) */
    private $recoverIntervalMinutes;

    /**
     * スタミナの回復間隔(分)を取得
     *
     * @return int|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getRecoverIntervalMinutes(): ?int {
        return $this->recoverIntervalMinutes;
    }

    /**
     * スタミナの回復間隔(分)を設定
     *
     * @param int $recoverIntervalMinutes ユーザIDを指定してスタミナを作成・更新
     */
    public function setRecoverIntervalMinutes(int $recoverIntervalMinutes = null) {
        $this->recoverIntervalMinutes = $recoverIntervalMinutes;
    }

    /**
     * スタミナの回復間隔(分)を設定
     *
     * @param int $recoverIntervalMinutes ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withRecoverIntervalMinutes(int $recoverIntervalMinutes = null): UpdateStaminaByUserIdRequest {
        $this->setRecoverIntervalMinutes($recoverIntervalMinutes);
        return $this;
    }

    /** @var int スタミナの回復量 */
    private $recoverValue;

    /**
     * スタミナの回復量を取得
     *
     * @return int|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getRecoverValue(): ?int {
        return $this->recoverValue;
    }

    /**
     * スタミナの回復量を設定
     *
     * @param int $recoverValue ユーザIDを指定してスタミナを作成・更新
     */
    public function setRecoverValue(int $recoverValue = null) {
        $this->recoverValue = $recoverValue;
    }

    /**
     * スタミナの回復量を設定
     *
     * @param int $recoverValue ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withRecoverValue(int $recoverValue = null): UpdateStaminaByUserIdRequest {
        $this->setRecoverValue($recoverValue);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してスタミナを作成・更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してスタミナを作成・更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してスタミナを作成・更新
     * @return UpdateStaminaByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): UpdateStaminaByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}