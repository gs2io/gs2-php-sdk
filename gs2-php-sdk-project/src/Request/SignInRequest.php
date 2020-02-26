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

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * サインインします のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class SignInRequest extends Gs2BasicRequest {

    /** @var string メールアドレス */
    private $email;

    /**
     * メールアドレスを取得
     *
     * @return string|null サインインします
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email サインインします
     */
    public function setEmail(string $email) {
        $this->email = $email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email サインインします
     * @return SignInRequest $this
     */
    public function withEmail(string $email): SignInRequest {
        $this->setEmail($email);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null サインインします
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password サインインします
     */
    public function setPassword(string $password) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password サインインします
     * @return SignInRequest $this
     */
    public function withPassword(string $password): SignInRequest {
        $this->setPassword($password);
        return $this;
    }

}