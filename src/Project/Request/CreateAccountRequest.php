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
 * アカウントを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateAccountRequest extends Gs2BasicRequest {

    /** @var string メールアドレス */
    private $email;

    /**
     * メールアドレスを取得
     *
     * @return string|null アカウントを新規作成
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email アカウントを新規作成
     */
    public function setEmail(string $email = null) {
        $this->email = $email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email アカウントを新規作成
     * @return CreateAccountRequest $this
     */
    public function withEmail(string $email = null): CreateAccountRequest {
        $this->setEmail($email);
        return $this;
    }

    /** @var string フルネーム */
    private $fullName;

    /**
     * フルネームを取得
     *
     * @return string|null アカウントを新規作成
     */
    public function getFullName(): ?string {
        return $this->fullName;
    }

    /**
     * フルネームを設定
     *
     * @param string $fullName アカウントを新規作成
     */
    public function setFullName(string $fullName = null) {
        $this->fullName = $fullName;
    }

    /**
     * フルネームを設定
     *
     * @param string $fullName アカウントを新規作成
     * @return CreateAccountRequest $this
     */
    public function withFullName(string $fullName = null): CreateAccountRequest {
        $this->setFullName($fullName);
        return $this;
    }

    /** @var string 会社名 */
    private $companyName;

    /**
     * 会社名を取得
     *
     * @return string|null アカウントを新規作成
     */
    public function getCompanyName(): ?string {
        return $this->companyName;
    }

    /**
     * 会社名を設定
     *
     * @param string $companyName アカウントを新規作成
     */
    public function setCompanyName(string $companyName = null) {
        $this->companyName = $companyName;
    }

    /**
     * 会社名を設定
     *
     * @param string $companyName アカウントを新規作成
     * @return CreateAccountRequest $this
     */
    public function withCompanyName(string $companyName = null): CreateAccountRequest {
        $this->setCompanyName($companyName);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null アカウントを新規作成
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password アカウントを新規作成
     */
    public function setPassword(string $password = null) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password アカウントを新規作成
     * @return CreateAccountRequest $this
     */
    public function withPassword(string $password = null): CreateAccountRequest {
        $this->setPassword($password);
        return $this;
    }

}