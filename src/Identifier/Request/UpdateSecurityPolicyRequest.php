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
 * セキュリティポリシーを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateSecurityPolicyRequest extends Gs2BasicRequest {

    /** @var string セキュリティポリシー名 */
    private $securityPolicyName;

    /**
     * セキュリティポリシー名を取得
     *
     * @return string|null セキュリティポリシーを更新します
     */
    public function getSecurityPolicyName(): ?string {
        return $this->securityPolicyName;
    }

    /**
     * セキュリティポリシー名を設定
     *
     * @param string $securityPolicyName セキュリティポリシーを更新します
     */
    public function setSecurityPolicyName(string $securityPolicyName = null) {
        $this->securityPolicyName = $securityPolicyName;
    }

    /**
     * セキュリティポリシー名を設定
     *
     * @param string $securityPolicyName セキュリティポリシーを更新します
     * @return UpdateSecurityPolicyRequest $this
     */
    public function withSecurityPolicyName(string $securityPolicyName = null): UpdateSecurityPolicyRequest {
        $this->setSecurityPolicyName($securityPolicyName);
        return $this;
    }

    /** @var string セキュリティポリシーの説明 */
    private $description;

    /**
     * セキュリティポリシーの説明を取得
     *
     * @return string|null セキュリティポリシーを更新します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * セキュリティポリシーの説明を設定
     *
     * @param string $description セキュリティポリシーを更新します
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * セキュリティポリシーの説明を設定
     *
     * @param string $description セキュリティポリシーを更新します
     * @return UpdateSecurityPolicyRequest $this
     */
    public function withDescription(string $description = null): UpdateSecurityPolicyRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ポリシードキュメント */
    private $policy;

    /**
     * ポリシードキュメントを取得
     *
     * @return string|null セキュリティポリシーを更新します
     */
    public function getPolicy(): ?string {
        return $this->policy;
    }

    /**
     * ポリシードキュメントを設定
     *
     * @param string $policy セキュリティポリシーを更新します
     */
    public function setPolicy(string $policy = null) {
        $this->policy = $policy;
    }

    /**
     * ポリシードキュメントを設定
     *
     * @param string $policy セキュリティポリシーを更新します
     * @return UpdateSecurityPolicyRequest $this
     */
    public function withPolicy(string $policy = null): UpdateSecurityPolicyRequest {
        $this->setPolicy($policy);
        return $this;
    }

}