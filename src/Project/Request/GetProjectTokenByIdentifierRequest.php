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
 * プロジェクトトークンを発行します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetProjectTokenByIdentifierRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントの名前 */
    private $accountName;

    /**
     * GS2アカウントの名前を取得
     *
     * @return string|null プロジェクトトークンを発行します
     */
    public function getAccountName(): ?string {
        return $this->accountName;
    }

    /**
     * GS2アカウントの名前を設定
     *
     * @param string $accountName プロジェクトトークンを発行します
     */
    public function setAccountName(string $accountName = null) {
        $this->accountName = $accountName;
    }

    /**
     * GS2アカウントの名前を設定
     *
     * @param string $accountName プロジェクトトークンを発行します
     * @return GetProjectTokenByIdentifierRequest $this
     */
    public function withAccountName(string $accountName = null): GetProjectTokenByIdentifierRequest {
        $this->setAccountName($accountName);
        return $this;
    }

    /** @var string プロジェクト名 */
    private $projectName;

    /**
     * プロジェクト名を取得
     *
     * @return string|null プロジェクトトークンを発行します
     */
    public function getProjectName(): ?string {
        return $this->projectName;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $projectName プロジェクトトークンを発行します
     */
    public function setProjectName(string $projectName = null) {
        $this->projectName = $projectName;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $projectName プロジェクトトークンを発行します
     * @return GetProjectTokenByIdentifierRequest $this
     */
    public function withProjectName(string $projectName = null): GetProjectTokenByIdentifierRequest {
        $this->setProjectName($projectName);
        return $this;
    }

    /** @var string ユーザ名 */
    private $userName;

    /**
     * ユーザ名を取得
     *
     * @return string|null プロジェクトトークンを発行します
     */
    public function getUserName(): ?string {
        return $this->userName;
    }

    /**
     * ユーザ名を設定
     *
     * @param string $userName プロジェクトトークンを発行します
     */
    public function setUserName(string $userName = null) {
        $this->userName = $userName;
    }

    /**
     * ユーザ名を設定
     *
     * @param string $userName プロジェクトトークンを発行します
     * @return GetProjectTokenByIdentifierRequest $this
     */
    public function withUserName(string $userName = null): GetProjectTokenByIdentifierRequest {
        $this->setUserName($userName);
        return $this;
    }

    /** @var string パスワード */
    private $password;

    /**
     * パスワードを取得
     *
     * @return string|null プロジェクトトークンを発行します
     */
    public function getPassword(): ?string {
        return $this->password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password プロジェクトトークンを発行します
     */
    public function setPassword(string $password = null) {
        $this->password = $password;
    }

    /**
     * パスワードを設定
     *
     * @param string $password プロジェクトトークンを発行します
     * @return GetProjectTokenByIdentifierRequest $this
     */
    public function withPassword(string $password = null): GetProjectTokenByIdentifierRequest {
        $this->setPassword($password);
        return $this;
    }

}