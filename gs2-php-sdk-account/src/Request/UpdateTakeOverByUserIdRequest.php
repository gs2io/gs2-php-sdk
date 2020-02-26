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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 引き継ぎ設定を更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateTakeOverByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 引き継ぎ設定を更新
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 引き継ぎ設定を更新
     * @return UpdateTakeOverByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): UpdateTakeOverByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 引き継ぎ設定を更新
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId 引き継ぎ設定を更新
     * @return UpdateTakeOverByUserIdRequest $this
     */
    public function withUserId(string $userId): UpdateTakeOverByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int スロット番号 */
    private $type;

    /**
     * スロット番号を取得
     *
     * @return int|null 引き継ぎ設定を更新
     */
    public function getType(): ?int {
        return $this->type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type 引き継ぎ設定を更新
     */
    public function setType(int $type) {
        $this->type = $type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type 引き継ぎ設定を更新
     * @return UpdateTakeOverByUserIdRequest $this
     */
    public function withType(int $type): UpdateTakeOverByUserIdRequest {
        $this->setType($type);
        return $this;
    }

    /** @var string 古いパスワード */
    private $oldPassword;

    /**
     * 古いパスワードを取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getOldPassword(): ?string {
        return $this->oldPassword;
    }

    /**
     * 古いパスワードを設定
     *
     * @param string $oldPassword 引き継ぎ設定を更新
     */
    public function setOldPassword(string $oldPassword) {
        $this->oldPassword = $oldPassword;
    }

    /**
     * 古いパスワードを設定
     *
     * @param string $oldPassword 引き継ぎ設定を更新
     * @return UpdateTakeOverByUserIdRequest $this
     */
    public function withOldPassword(string $oldPassword): UpdateTakeOverByUserIdRequest {
        $this->setOldPassword($oldPassword);
        return $this;
    }

    /** @var string 新しいパスワード */
    private $password;

    /**
     * 新しいパスワードを取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * 新しいパスワードを設定
     *
     * @param string $password 引き継ぎ設定を更新
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * 新しいパスワードを設定
     *
     * @param string $password 引き継ぎ設定を更新
     * @return UpdateTakeOverByUserIdRequest $this
     */
    public function withPassword(string $password): UpdateTakeOverByUserIdRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null 引き継ぎ設定を更新
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 引き継ぎ設定を更新
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider 引き継ぎ設定を更新
     * @return UpdateTakeOverByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): UpdateTakeOverByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}