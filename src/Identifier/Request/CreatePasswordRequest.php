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
 * パスワードを新規作成します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreatePasswordRequest extends Gs2BasicRequest {

    /** @var string ユーザー名 */
    private $userName;

    /**
     * ユーザー名を取得
     *
     * @return string|null パスワードを新規作成します
     */
    public function getUserName(): ?string {
        return $this->userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName パスワードを新規作成します
     */
    public function setUserName(string $userName = null) {
        $this->userName = $userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName パスワードを新規作成します
     * @return CreatePasswordRequest $this
     */
    public function withUserName(string $userName = null): CreatePasswordRequest {
        $this->setUserName($userName);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null パスワードを新規作成します
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password パスワードを新規作成します
     */
    public function setPassword(string $password = null) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password パスワードを新規作成します
     * @return CreatePasswordRequest $this
     */
    public function withPassword(string $password = null): CreatePasswordRequest {
        $this->setPassword($password);
        return $this;
    }

}