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
 * 指定したアカウント名のアカウントトークンを発行 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class IssueAccountTokenRequest extends Gs2BasicRequest {

    /** @var string GS2アカウントの名前 */
    private $accountName;

    /**
     * GS2アカウントの名前を取得
     *
     * @return string|null 指定したアカウント名のアカウントトークンを発行
     */
    public function getAccountName(): ?string {
        return $this->accountName;
    }

    /**
     * GS2アカウントの名前を設定
     *
     * @param string $accountName 指定したアカウント名のアカウントトークンを発行
     */
    public function setAccountName(string $accountName = null) {
        $this->accountName = $accountName;
    }

    /**
     * GS2アカウントの名前を設定
     *
     * @param string $accountName 指定したアカウント名のアカウントトークンを発行
     * @return IssueAccountTokenRequest $this
     */
    public function withAccountName(string $accountName = null): IssueAccountTokenRequest {
        $this->setAccountName($accountName);
        return $this;
    }

}