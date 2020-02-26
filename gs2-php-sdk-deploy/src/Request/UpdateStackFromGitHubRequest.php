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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Deploy\Model\GitHubCheckoutSetting;

/**
 * スタックを更新 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class UpdateStackFromGitHubRequest extends Gs2BasicRequest {

    /** @var string スタック名 */
    private $stackName;

    /**
     * スタック名を取得
     *
     * @return string|null スタックを更新
     */
    public function getStackName(): ?string {
        return $this->stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName スタックを更新
     */
    public function setStackName(string $stackName) {
        $this->stackName = $stackName;
    }

    /**
     * スタック名を設定
     *
     * @param string $stackName スタックを更新
     * @return UpdateStackFromGitHubRequest $this
     */
    public function withStackName(string $stackName): UpdateStackFromGitHubRequest {
        $this->setStackName($stackName);
        return $this;
    }

    /** @var string スタックの説明 */
    private $description;

    /**
     * スタックの説明を取得
     *
     * @return string|null スタックを更新
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * スタックの説明を設定
     *
     * @param string $description スタックを更新
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * スタックの説明を設定
     *
     * @param string $description スタックを更新
     * @return UpdateStackFromGitHubRequest $this
     */
    public function withDescription(string $description): UpdateStackFromGitHubRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var GitHubCheckoutSetting GitHubからソースコードをチェックアウトしてくる設定 */
    private $checkoutSetting;

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を取得
     *
     * @return GitHubCheckoutSetting|null スタックを更新
     */
    public function getCheckoutSetting(): ?GitHubCheckoutSetting {
        return $this->checkoutSetting;
    }

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting スタックを更新
     */
    public function setCheckoutSetting(GitHubCheckoutSetting $checkoutSetting) {
        $this->checkoutSetting = $checkoutSetting;
    }

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting スタックを更新
     * @return UpdateStackFromGitHubRequest $this
     */
    public function withCheckoutSetting(GitHubCheckoutSetting $checkoutSetting): UpdateStackFromGitHubRequest {
        $this->setCheckoutSetting($checkoutSetting);
        return $this;
    }

}