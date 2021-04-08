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

namespace Gs2\Identifier\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * プロジェクトトークン を取得します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class LoginByUserRequest extends Gs2BasicRequest {

    /** @var string GS2-Identifier のユーザ名 */
    private $userName;

    /**
     * GS2-Identifier のユーザ名を取得
     *
     * @return string|null プロジェクトトークン を取得します
     */
    public function getUserName(): ?string {
        return $this->userName;
    }

    /**
     * GS2-Identifier のユーザ名を設定
     *
     * @param string $userName プロジェクトトークン を取得します
     */
    public function setUserName(string $userName = null) {
        $this->userName = $userName;
    }

    /**
     * GS2-Identifier のユーザ名を設定
     *
     * @param string $userName プロジェクトトークン を取得します
     * @return LoginByUserRequest $this
     */
    public function withUserName(string $userName = null): LoginByUserRequest {
        $this->setUserName($userName);
        return $this;
    }

    /** @var string GS2-Identifier のユーザのパスワード */
    private $password;

    /**
     * GS2-Identifier のユーザのパスワードを取得
     *
     * @return string|null プロジェクトトークン を取得します
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * GS2-Identifier のユーザのパスワードを設定
     *
     * @param string $password プロジェクトトークン を取得します
     */
    public function setPassword(string $password = null) {
        $this->password = $password;
    }

    /**
     * GS2-Identifier のユーザのパスワードを設定
     *
     * @param string $password プロジェクトトークン を取得します
     * @return LoginByUserRequest $this
     */
    public function withPassword(string $password = null): LoginByUserRequest {
        $this->setPassword($password);
        return $this;
    }

}