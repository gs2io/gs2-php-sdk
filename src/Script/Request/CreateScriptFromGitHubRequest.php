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

namespace Gs2\Script\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Script\Model\GitHubCheckoutSetting;

/**
 * GitHubリポジトリのコードからスクリプトを新規作成します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class CreateScriptFromGitHubRequest extends Gs2BasicRequest {

    /** @var string ネームスペース名 */
    private $namespaceName;

    /**
     * ネームスペース名を取得
     *
     * @return string|null GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function setNamespaceName(string $namespaceName = null) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペース名を設定
     *
     * @param string $namespaceName GitHubリポジトリのコードからスクリプトを新規作成します
     * @return CreateScriptFromGitHubRequest $this
     */
    public function withNamespaceName(string $namespaceName = null): CreateScriptFromGitHubRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var string スクリプト名 */
    private $name;

    /**
     * スクリプト名を取得
     *
     * @return string|null GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function getName(): ?string {
        return $this->name;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $name GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function setName(string $name = null) {
        $this->name = $name;
    }

    /**
     * スクリプト名を設定
     *
     * @param string $name GitHubリポジトリのコードからスクリプトを新規作成します
     * @return CreateScriptFromGitHubRequest $this
     */
    public function withName(string $name = null): CreateScriptFromGitHubRequest {
        $this->setName($name);
        return $this;
    }

    /** @var string 説明文 */
    private $description;

    /**
     * 説明文を取得
     *
     * @return string|null GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function getDescription(): ?string {
        return $this->description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function setDescription(string $description = null) {
        $this->description = $description;
    }

    /**
     * 説明文を設定
     *
     * @param string $description GitHubリポジトリのコードからスクリプトを新規作成します
     * @return CreateScriptFromGitHubRequest $this
     */
    public function withDescription(string $description = null): CreateScriptFromGitHubRequest {
        $this->setDescription($description);
        return $this;
    }

    /** @var GitHubCheckoutSetting GitHubからソースコードをチェックアウトしてくる設定 */
    private $checkoutSetting;

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を取得
     *
     * @return GitHubCheckoutSetting|null GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function getCheckoutSetting(): ?GitHubCheckoutSetting {
        return $this->checkoutSetting;
    }

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting GitHubリポジトリのコードからスクリプトを新規作成します
     */
    public function setCheckoutSetting(GitHubCheckoutSetting $checkoutSetting = null) {
        $this->checkoutSetting = $checkoutSetting;
    }

    /**
     * GitHubからソースコードをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting GitHubリポジトリのコードからスクリプトを新規作成します
     * @return CreateScriptFromGitHubRequest $this
     */
    public function withCheckoutSetting(GitHubCheckoutSetting $checkoutSetting = null): CreateScriptFromGitHubRequest {
        $this->setCheckoutSetting($checkoutSetting);
        return $this;
    }

}