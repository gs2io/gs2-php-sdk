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
 * プロジェクトを削除 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DeleteProjectRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントトークン */
    private $accountToken;

    /**
     * GS2アカウントトークンを取得
     *
     * @return string|null プロジェクトを削除
     */
    public function getAccountToken(): ?string {
        return $this->accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken プロジェクトを削除
     */
    public function setAccountToken(string $accountToken = null) {
        $this->accountToken = $accountToken;
    }

    /**
     * GS2アカウントトークンを設定
     *
     * @param string $accountToken プロジェクトを削除
     * @return DeleteProjectRequest $this
     */
    public function withAccountToken(string $accountToken = null): DeleteProjectRequest {
        $this->setAccountToken($accountToken);
        return $this;
    }

    /** @var string プロジェクト名 */
    private $projectName;

    /**
     * プロジェクト名を取得
     *
     * @return string|null プロジェクトを削除
     */
    public function getProjectName(): ?string {
        return $this->projectName;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $projectName プロジェクトを削除
     */
    public function setProjectName(string $projectName = null) {
        $this->projectName = $projectName;
    }

    /**
     * プロジェクト名を設定
     *
     * @param string $projectName プロジェクトを削除
     * @return DeleteProjectRequest $this
     */
    public function withProjectName(string $projectName = null): DeleteProjectRequest {
        $this->setProjectName($projectName);
        return $this;
    }

}