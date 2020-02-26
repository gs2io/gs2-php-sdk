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
 * ユーザIDを指定してスタミナを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteStaminaByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザIDを指定してスタミナを削除
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してスタミナを削除
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザIDを指定してスタミナを削除
     * @return DeleteStaminaByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): DeleteStaminaByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スタミナの種類名 */
    private $staminaName;

    /**
     * スタミナの種類名を取得
     *
     * @return string|null ユーザIDを指定してスタミナを削除
     */
    public function getStaminaName(): ?string {
        return $this->staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName ユーザIDを指定してスタミナを削除
     */
    public function setStaminaName(string $staminaName) {
        $this->staminaName = $staminaName;
    }

    /**
     * スタミナの種類名を設定
     *
     * @param string $staminaName ユーザIDを指定してスタミナを削除
     * @return DeleteStaminaByUserIdRequest $this
     */
    public function withStaminaName(string $staminaName): DeleteStaminaByUserIdRequest {
        $this->setStaminaName($staminaName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザIDを指定してスタミナを削除
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してスタミナを削除
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザIDを指定してスタミナを削除
     * @return DeleteStaminaByUserIdRequest $this
     */
    public function withUserId(string $userId): DeleteStaminaByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザIDを指定してスタミナを削除
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してスタミナを削除
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザIDを指定してスタミナを削除
     * @return DeleteStaminaByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): DeleteStaminaByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}