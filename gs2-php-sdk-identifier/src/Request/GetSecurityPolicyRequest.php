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
 * セキュリティポリシーを取得します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class GetSecurityPolicyRequest extends Gs2BasicRequest {

    /** @var string セキュリティポリシー名 */
    private $securityPolicyName;

    /**
     * セキュリティポリシー名を取得
     *
     * @return string|null セキュリティポリシーを取得します
     */
    public function getSecurityPolicyName(): ?string {
        return $this->securityPolicyName;
    }

    /**
     * セキュリティポリシー名を設定
     *
     * @param string $securityPolicyName セキュリティポリシーを取得します
     */
    public function setSecurityPolicyName(string $securityPolicyName) {
        $this->securityPolicyName = $securityPolicyName;
    }

    /**
     * セキュリティポリシー名を設定
     *
     * @param string $securityPolicyName セキュリティポリシーを取得します
     * @return GetSecurityPolicyRequest $this
     */
    public function withSecurityPolicyName(string $securityPolicyName): GetSecurityPolicyRequest {
        $this->setSecurityPolicyName($securityPolicyName);
        return $this;
    }

}