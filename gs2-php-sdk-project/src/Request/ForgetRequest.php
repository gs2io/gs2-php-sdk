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
 * パスワード再発行トークンを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class ForgetRequest extends Gs2BasicRequest {

    /** @var string メールアドレス */
    private $email;

    /**
     * メールアドレスを取得
     *
     * @return string|null パスワード再発行トークンを取得
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email パスワード再発行トークンを取得
     */
    public function setEmail(string $email) {
        $this->email = $email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email パスワード再発行トークンを取得
     * @return ForgetRequest $this
     */
    public function withEmail(string $email): ForgetRequest {
        $this->setEmail($email);
        return $this;
    }

}