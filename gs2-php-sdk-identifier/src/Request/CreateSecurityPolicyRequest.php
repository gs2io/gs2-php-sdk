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
 * セキュリティポリシーを新規作成します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateSecurityPolicyRequest extends Gs2BasicRequest {

    /** @var string セキュリティポリシー名 */
    private $name;

    /**
     * セキュリティポリシー名を取得
     *
     * @return string|null セキュリティポリシーを新規作成します
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * セキュリティポリシー名を設定
     *
     * @param string $name セキュリティポリシーを新規作成します
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * セキュリティポリシー名を設定
     *
     * @param string $name セキュリティポリシーを新規作成します
     * @return CreateSecurityPolicyRequest $this
     */
    public function withName(string $name): CreateSecurityPolicyRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string セキュリティポリシーの説明 */
    private $description;

    /**
     * セキュリティポリシーの説明を取得
     *
     * @return string|null セキュリティポリシーを新規作成します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * セキュリティポリシーの説明を設定
     *
     * @param string $description セキュリティポリシーを新規作成します
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * セキュリティポリシーの説明を設定
     *
     * @param string $description セキュリティポリシーを新規作成します
     * @return CreateSecurityPolicyRequest $this
     */
    public function withDescription(string $description): CreateSecurityPolicyRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var string ポリシードキュメント */
    private $policy;

    /**
     * ポリシードキュメントを取得
     *
     * @return string|null セキュリティポリシーを新規作成します
     */
    public function getPolicy(): ?string {
        return $this->policy;
    }

    /**
     * ポリシードキュメントを設定
     *
     * @param string $policy セキュリティポリシーを新規作成します
     */
    public function setPolicy(string $policy) {
        $this->policy = $policy;
    }

    /**
     * ポリシードキュメントを設定
     *
     * @param string $policy セキュリティポリシーを新規作成します
     * @return CreateSecurityPolicyRequest $this
     */
    public function withPolicy(string $policy): CreateSecurityPolicyRequest {
        $this->setPolicy($policy);
        return $this;
    }

}