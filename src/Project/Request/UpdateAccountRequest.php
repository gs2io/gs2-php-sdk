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
 * GS2アカウントを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateAccountRequest extends Gs2BasicRequest {

    /** @var string メールアドレス */
    private $email;

    /**
     * メールアドレスを取得
     *
     * @return string|null GS2アカウントを更新します
     */
    public function getEmail(): ?string {
        return $this->email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email GS2アカウントを更新します
     */
    public function setEmail(string $email = null) {
        $this->email = $email;
    }

    /**
     * メールアドレスを設定
     *
     * @param string $email GS2アカウントを更新します
     * @return UpdateAccountRequest $this
     */
    public function withEmail(string $email = null): UpdateAccountRequest {
        $this->setEmail($email);
        return $this;
    }

    /** @var string フルネーム */
    private $fullName;

    /**
     * フルネームを取得
     *
     * @return string|null GS2アカウントを更新します
     */
    public function getFullName(): ?string {
        return $this->fullName;
    }

    /**
     * フルネームを設定
     *
     * @param string $fullName GS2アカウントを更新します
     */
    public function setFullName(string $fullName = null) {
        $this->fullName = $fullName;
    }

    /**
     * フルネームを設定
     *
     * @param string $fullName GS2アカウントを更新します
     * @return UpdateAccountRequest $this
     */
    public function withFullName(string $fullName = null): UpdateAccountRequest {
        $this->setFullName($fullName);
        return $this;
    }

    /** @var string 会社名 */
    private $companyName;

    /**
     * 会社名を取得
     *
     * @return string|null GS2アカウントを更新します
     */
    public function getCompanyName(): ?string {
        return $this->companyName;
    }

    /**
     * 会社名を設定
     *
     * @param string $companyName GS2アカウントを更新します
     */
    public function setCompanyName(string $companyName = null) {
        $this->companyName = $companyName;
    }

    /**
     * 会社名を設定
     *
     * @param string $companyName GS2アカウントを更新します
     * @return UpdateAccountRequest $this
     */
    public function withCompanyName(string $companyName = null): UpdateAccountRequest {
        $this->setCompanyName($companyName);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null GS2アカウントを更新します
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password GS2アカウントを更新します
     */
    public function setPassword(string $password = null) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password GS2アカウントを更新します
     * @return UpdateAccountRequest $this
     */
    public function withPassword(string $password = null): UpdateAccountRequest {
        $this->setPassword($password);
        return $this;
    }

    /** @var string GS2アカウントトークン */
    private $accountToken;

    /**
     * GS2アカウントトークンを取得
     *
     * @return string|null GS2アカウントを更新します
     */
    public function getAccountToken(): ?string {
        return $this->accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken GS2アカウントを更新します
     */
    public function setAccountToken(string $accountToken = null) {
        $this->accountToken = $accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken GS2アカウントを更新します
     * @return UpdateAccountRequest $this
     */
    public function withAccountToken(string $accountToken = null): UpdateAccountRequest {
        $this->setAccountToken($accountToken);
        return $this;
    }

}