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
 * ユーザーIDを指定して引き継ぎ設定を新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateTakeOverByUserIdRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ユーザーIDを指定して引き継ぎ設定を新規作成
     * @return CreateTakeOverByUserIdRequest $this
     */
    public function withNamespaceName(string $namespaceName): CreateTakeOverByUserIdRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string ユーザーID */
    private $userId;

    /**
     * ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function setUserId(string $userId) {
        $this->userId = $userId;
    }

    /**
     * ユーザーIDを設定
     *
     * @param string $userId ユーザーIDを指定して引き継ぎ設定を新規作成
     * @return CreateTakeOverByUserIdRequest $this
     */
    public function withUserId(string $userId): CreateTakeOverByUserIdRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var int スロット番号 */
    private $type;

    /**
     * スロット番号を取得
     *
     * @return int|null ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function getType(): ?int {
        return $this->type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function setType(int $type) {
        $this->type = $type;
    }

    /**
     * スロット番号を設定
     *
     * @param int $type ユーザーIDを指定して引き継ぎ設定を新規作成
     * @return CreateTakeOverByUserIdRequest $this
     */
    public function withType(int $type): CreateTakeOverByUserIdRequest {
        $this->setType($type);
        return $this;
    }

    /** @var string 引き継ぎ用ユーザーID */
    private $userIdentifier;

    /**
     * 引き継ぎ用ユーザーIDを取得
     *
     * @return string|null ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function getUserIdentifier(): ?string {
        return $this->userIdentifier;
    }

    /**
     * 引き継ぎ用ユーザーIDを設定
     *
     * @param string $userIdentifier ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function setUserIdentifier(string $userIdentifier) {
        $this->userIdentifier = $userIdentifier;
    }

    /**
     * 引き継ぎ用ユーザーIDを設定
     *
     * @param string $userIdentifier ユーザーIDを指定して引き継ぎ設定を新規作成
     * @return CreateTakeOverByUserIdRequest $this
     */
    public function withUserIdentifier(string $userIdentifier): CreateTakeOverByUserIdRequest {
        $this->setUserIdentifier($userIdentifier);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password ユーザーIDを指定して引き継ぎ設定を新規作成
     * @return CreateTakeOverByUserIdRequest $this
     */
    public function withPassword(string $password): CreateTakeOverByUserIdRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定して引き継ぎ設定を新規作成
     */
    public function setDuplicationAvoider(string $duplicationAvoider) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ユーザーIDを指定して引き継ぎ設定を新規作成
     * @return CreateTakeOverByUserIdRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider): CreateTakeOverByUserIdRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}