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

namespace Gs2\News\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\News\Model\GitHubCheckoutSetting;

/**
 * 現在有効なお知らせを更新します のリクエストモデル
 *
 * @author Game Server Services, Inc.
 */
class PrepareUpdateCurrentNewsMasterFromGitHubRequest extends Gs2BasicRequest {

    /** @var string ネームスペースの名前 */
    private $namespaceName;

    /**
     * ネームスペースの名前を取得
     *
     * @return string|null 現在有効なお知らせを更新します
     */
    public function getNamespaceName(): ?string {
        return $this->namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName 現在有効なお知らせを更新します
     */
    public function setNamespaceName(string $namespaceName) {
        $this->namespaceName = $namespaceName;
    }

    /**
     * ネームスペースの名前を設定
     *
     * @param string $namespaceName 現在有効なお知らせを更新します
     * @return PrepareUpdateCurrentNewsMasterFromGitHubRequest $this
     */
    public function withNamespaceName(string $namespaceName): PrepareUpdateCurrentNewsMasterFromGitHubRequest {
        $this->setNamespaceName($namespaceName);
        return $this;
    }

    /** @var GitHubCheckoutSetting GitHubからマスターデータをチェックアウトしてくる設定 */
    private $checkoutSetting;

    /**
     * GitHubからマスターデータをチェックアウトしてくる設定を取得
     *
     * @return GitHubCheckoutSetting|null 現在有効なお知らせを更新します
     */
    public function getCheckoutSetting(): ?GitHubCheckoutSetting {
        return $this->checkoutSetting;
    }

    /**
     * GitHubからマスターデータをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting 現在有効なお知らせを更新します
     */
    public function setCheckoutSetting(GitHubCheckoutSetting $checkoutSetting) {
        $this->checkoutSetting = $checkoutSetting;
    }

    /**
     * GitHubからマスターデータをチェックアウトしてくる設定を設定
     *
     * @param GitHubCheckoutSetting $checkoutSetting 現在有効なお知らせを更新します
     * @return PrepareUpdateCurrentNewsMasterFromGitHubRequest $this
     */
    public function withCheckoutSetting(GitHubCheckoutSetting $checkoutSetting): PrepareUpdateCurrentNewsMasterFromGitHubRequest {
        $this->setCheckoutSetting($checkoutSetting);
        return $this;
    }

}