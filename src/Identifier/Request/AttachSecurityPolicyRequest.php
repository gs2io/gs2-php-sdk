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
 * 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class AttachSecurityPolicyRequest extends Gs2BasicRequest {

    /** @var string ユーザー名 */
    private $userName;

    /**
     * ユーザー名を取得
     *
     * @return string|null 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
     */
    public function getUserName(): ?string {
        return $this->userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
     */
    public function setUserName(string $userName = null) {
        $this->userName = $userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
     * @return AttachSecurityPolicyRequest $this
     */
    public function withUserName(string $userName = null): AttachSecurityPolicyRequest {
        $this->setUserName($userName);
        return $this;
    }

    /** @var string 割り当てるセキュリティポリシーのGRN */
    private $securityPolicyId;

    /**
     * 割り当てるセキュリティポリシーのGRNを取得
     *
     * @return string|null 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
     */
    public function getSecurityPolicyId(): ?string {
        return $this->securityPolicyId;
    }

    /**
     * 割り当てるセキュリティポリシーのGRNを設定
     *
     * @param string $securityPolicyId 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
     */
    public function setSecurityPolicyId(string $securityPolicyId = null) {
        $this->securityPolicyId = $securityPolicyId;
    }

    /**
     * 割り当てるセキュリティポリシーのGRNを設定
     *
     * @param string $securityPolicyId 割り当てられたセキュリティポリシーを新しくユーザーに割り当てます
     * @return AttachSecurityPolicyRequest $this
     */
    public function withSecurityPolicyId(string $securityPolicyId = null): AttachSecurityPolicyRequest {
        $this->setSecurityPolicyId($securityPolicyId);
        return $this;
    }

}