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
 * パスワードを再発行 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class IssuePasswordRequest extends Gs2BasicRequest {

    /** @var string パスワードを再発行するために必要なトークン */
    private $issuePasswordToken;

    /**
     * パスワードを再発行するために必要なトークンを取得
     *
     * @return string|null パスワードを再発行
     */
    public function getIssuePasswordToken(): ?string {
        return $this->issuePasswordToken;
    }

    /**
     * パスワードを再発行するために必要なトークンを設定
     *
     * @param string $issuePasswordToken パスワードを再発行
     */
    public function setIssuePasswordToken(string $issuePasswordToken) {
        $this->issuePasswordToken = $issuePasswordToken;
    }

    /**
     * パスワードを再発行するために必要なトークンを設定
     *
     * @param string $issuePasswordToken パスワードを再発行
     * @return IssuePasswordRequest $this
     */
    public function withIssuePasswordToken(string $issuePasswordToken): IssuePasswordRequest {
        $this->setIssuePasswordToken($issuePasswordToken);
        return $this;
    }

}