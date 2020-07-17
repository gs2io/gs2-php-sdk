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

namespace Gs2\Inbox\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * 全ユーザに向けたメッセージを取得 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetGlobalMessageMasterRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null 全ユーザに向けたメッセージを取得
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 全ユーザに向けたメッセージを取得
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName 全ユーザに向けたメッセージを取得
     * @return GetGlobalMessageMasterRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): GetGlobalMessageMasterRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string 全ユーザに向けたメッセージ名 */
    private $globalMessageName;

    /**
     * 全ユーザに向けたメッセージ名を取得
     *
     * @return string|null 全ユーザに向けたメッセージを取得
     */
    public function getGlobalMessageName(): ?string {
        return $this->globalMessageName;
    }

    /**
     * 全ユーザに向けたメッセージ名を設定
     *
     * @param string $globalMessageName 全ユーザに向けたメッセージを取得
     */
    public function setGlobalMessageName(string $globalMessageName = null) {
        $this->globalMessageName = $globalMessageName;
    }

    /**
     * 全ユーザに向けたメッセージ名を設定
     *
     * @param string $globalMessageName 全ユーザに向けたメッセージを取得
     * @return GetGlobalMessageMasterRequest $this
     */
    public function withGlobalMessageName(string $globalMessageName = null): GetGlobalMessageMasterRequest {
        $this->setGlobalMessageName($globalMessageName);
        return $this;
    }

}