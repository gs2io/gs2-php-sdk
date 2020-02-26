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
 * スタックを新規作成 のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateStackFromGitHubRequest extends Gs2BasicRequest {

    /** @var string スタック名 */
    private $name;

    /**
     * スタック名を取得
     *
     * @return string|null スタックを新規作成
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * スタック名を設定
     *
     * @param string $name スタックを新規作成
     */
    public function setName(string $name) {
        $this->name = $name;
    }

    /**
     * スタック名を設定
     *
     * @param string $name スタックを新規作成
     * @return CreateStackFromGitHubRequest $this
     */
    public function withName(string $name): CreateStackFromGitHubRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string スタックの説明 */
    private $description;

    /**
     * スタックの説明を取得
     *
     * @return string|null スタックを新規作成
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * スタックの説明を設定
     *
     * @param string $description スタックを新規作成
     */
    public function setDescription(string $description) {
        $this->description = $description;
    }

    /**
     * スタックの説明を設定
     *
     * @param string $description スタックを新規作成
     * @return CreateStackFromGitHubRequest $this
     */
    public function withDescription(string $description): CreateStackFromGitHubRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var GitHubCheckoutSetting GitHubからソースコードをチェックアウトしてくる設定 */
    private $checkoutSetting;

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を取得
     *
     * @return GitHubCheckoutSetting|null スタックを新規作成
     */
    public function getCheckoutSetting(): ?GitHubCheckoutSetting {
        return $this->checkoutSetting;
    }

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting スタックを新規作成
     */
    public function setCheckoutSetting(GitHubCheckoutSetting $checkoutSetting) {
        $this->checkoutSetting = $checkoutSetting;
    }

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting スタックを新規作成
     * @return CreateStackFromGitHubRequest $this
     */
    public function withCheckoutSetting(GitHubCheckoutSetting $checkoutSetting): CreateStackFromGitHubRequest {
        $this->setCheckoutSetting($checkoutSetting);
        return $this;
    }

}