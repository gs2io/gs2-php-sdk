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
 * ゲームプレイヤーアカウントを認証 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AuthenticationRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null ゲームプレイヤーアカウントを認証
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ゲームプレイヤーアカウントを認証
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName ゲームプレイヤーアカウントを認証
     * @return AuthenticationRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): AuthenticationRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string アカウントID */
    private $userId;

    /**
     * アカウントIDを取得
     *
     * @return string|null ゲームプレイヤーアカウントを認証
     */
    public function getUserId(): ?string {
        return $this->userId;
    }

    /**
     * アカウントIDを設定
     *
     * @param string $userId ゲームプレイヤーアカウントを認証
     */
    public function setUserId(string $userId = null) {
        $this->userId = $userId;
    }

    /**
     * アカウントIDを設定
     *
     * @param string $userId ゲームプレイヤーアカウントを認証
     * @return AuthenticationRequest $this
     */
    public function withUserId(string $userId = null): AuthenticationRequest {
        $this->setUserId($userId);
        return $this;
    }

    /** @var string 認証トークンの暗号化に使用する暗号鍵 のGRN */
    private $keyId;

    /**
     * 認証トークンの暗号化に使用する暗号鍵 のGRNを取得
     *
     * @return string|null ゲームプレイヤーアカウントを認証
     */
    public function getKeyId(): ?string {
        return $this->keyId;
    }

    /**
     * 認証トークンの暗号化に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId ゲームプレイヤーアカウントを認証
     */
    public function setKeyId(string $keyId = null) {
        $this->keyId = $keyId;
    }

    /**
     * 認証トークンの暗号化に使用する暗号鍵 のGRNを設定
     *
     * @param string $keyId ゲームプレイヤーアカウントを認証
     * @return AuthenticationRequest $this
     */
    public function withKeyId(string $keyId = null): AuthenticationRequest {
        $this->setKeyId($keyId);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null ゲームプレイヤーアカウントを認証
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password ゲームプレイヤーアカウントを認証
     */
    public function setPassword(string $password = null) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password ゲームプレイヤーアカウントを認証
     * @return AuthenticationRequest $this
     */
    public function withPassword(string $password = null): AuthenticationRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var string 重複実行回避機能に使用するID */
    private $xGs2DuplicationAvoider;

    /**
     * 重複実行回避機能に使用するIDを取得
     *
     * @return string|null ゲームプレイヤーアカウントを認証
     */
    public function getDuplicationAvoider(): ?string {
        return $this->xGs2DuplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ゲームプレイヤーアカウントを認証
     */
    public function setDuplicationAvoider(string $duplicationAvoider = null) {
        $this->xGs2DuplicationAvoider = $duplicationAvoider;
    }

    /**
     * 重複実行回避機能に使用するIDを設定
     *
     * @param string $duplicationAvoider ゲームプレイヤーアカウントを認証
     * @return AuthenticationRequest $this
     */
    public function withDuplicationAvoider(string $duplicationAvoider = null): AuthenticationRequest {
        $this->setDuplicationAvoider($duplicationAvoider);
        return $this;
    }

}