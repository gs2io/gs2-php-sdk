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
 * 割り当てられたセキュリティポリシーをユーザーから外します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class DetachSecurityPolicyRequest extends Gs2BasicRequest {

    /** @var string ユーザー名 */
    private $userName;

    /**
     * ユーザー名を取得
     *
     * @return string|null 割り当てられたセキュリティポリシーをユーザーから外します
     */
    public function getUserName(): ?string {
        return $this->userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName 割り当てられたセキュリティポリシーをユーザーから外します
     */
    public function setUserName(string $userName = null) {
        $this->userName = $userName;
    }

    /**
     * ユーザー名を設定
     *
     * @param string $userName 割り当てられたセキュリティポリシーをユーザーから外します
     * @return DetachSecurityPolicyRequest $this
     */
    public function withUserName(string $userName = null): DetachSecurityPolicyRequest {
        $this->setUserName($userName);
        return $this;
    }

    /** @var string 剥奪するセキュリティポリシーのGRN */
    private $securityPolicyId;

    /**
     * 剥奪するセキュリティポリシーのGRNを取得
     *
     * @return string|null 割り当てられたセキュリティポリシーをユーザーから外します
     */
    public function getSecurityPolicyId(): ?string {
        return $this->securityPolicyId;
    }

    /**
     * 剥奪するセキュリティポリシーのGRNを設定
     *
     * @param string $securityPolicyId 割り当てられたセキュリティポリシーをユーザーから外します
     */
    public function setSecurityPolicyId(string $securityPolicyId = null) {
        $this->securityPolicyId = $securityPolicyId;
    }

    /**
     * 剥奪するセキュリティポリシーのGRNを設定
     *
     * @param string $securityPolicyId 割り当てられたセキュリティポリシーをユーザーから外します
     * @return DetachSecurityPolicyRequest $this
     */
    public function withSecurityPolicyId(string $securityPolicyId = null): DetachSecurityPolicyRequest {
        $this->setSecurityPolicyId($securityPolicyId);
        return $this;
    }

}